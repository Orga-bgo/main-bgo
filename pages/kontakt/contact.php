<?php
/**
 * Kontaktformular Backend
 * babixGO - contact.php
 * DSGVO-konform
 */

// Error Reporting (in Production auf 0 setzen)
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Headers
header('Content-Type: application/json');
$allowedOrigin = 'https://babixgo.de';
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if ($origin === $allowedOrigin) {
    header('Access-Control-Allow-Origin: ' . $allowedOrigin);
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Vary: Origin');
}

// Preflight Request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code($origin === $allowedOrigin ? 200 : 403);
    exit();
}

function respondWithStatus(bool $expectsJson, string $statusKey, string $message, int $httpCode = 400): void
{
    if ($expectsJson) {
        http_response_code($httpCode);
        echo json_encode([
            'success' => $statusKey === 'success',
            'message' => $message
        ]);
        exit();
    }

    $location = '/kontakt/?status=' . urlencode($statusKey);
    header('Location: ' . $location);
    exit();
}

function sanitizeHeaderValue(string $value): string
{
    return preg_replace('/[\r\n]+/', '', $value);
}

/**
 * Sendet E-Mails an Admin und User
 * 
 * @param string $name Name des Users
 * @param string $email E-Mail des Users
 * @param string|null $whatsapp WhatsApp-Nummer (optional)
 * @param string $message Nachricht
 * @param string $ipAddress IP-Adresse
 * @return array ['admin_sent' => bool, 'user_sent' => bool]
 */
function sendNotificationEmails(string $name, string $email, ?string $whatsapp, string $message, string $ipAddress): array {
    $safeName = sanitizeHeaderValue($name);
    $safeEmail = sanitizeHeaderValue($email);
    
    $results = [
        'admin_sent' => false,
        'user_sent' => false
    ];
    
    // Admin email address
    $adminEmail = 'admin@babixgo.de';
    
    // ==========================================
    // ADMIN-E-MAIL
    // ==========================================
    $adminSubject = 'Neue Kontaktanfrage von ' . $safeName;
    $adminMessage = "
═══════════════════════════════════════
  NEUE KONTAKTANFRAGE - babixGO
═══════════════════════════════════════

📅 Datum: " . date('d.m.Y H:i') . " Uhr

👤 KONTAKTDATEN
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Name:     $name
E-Mail:   $email
WhatsApp: " . ($whatsapp ?: 'Nicht angegeben') . "

💬 NACHRICHT
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
$message

🖥️  TECHNISCHE DETAILS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
IP-Adresse: " . $ipAddress . "
User-Agent: " . htmlspecialchars(substr($_SERVER['HTTP_USER_AGENT'] ?? 'unknown', 0, 100), ENT_QUOTES, 'UTF-8') . "

═══════════════════════════════════════
  Über Admin-Panel bearbeiten:
  https://babixgo.de/kontakt/admin/
═══════════════════════════════════════
";

    $adminHeaders = "From: Kontaktformular <support@babixgo-mail.de>\r\n";
    $adminHeaders .= "Reply-To: $safeEmail\r\n";
    $adminHeaders .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    $results['admin_sent'] = @mail($adminEmail, $adminSubject, $adminMessage, $adminHeaders);
    
    // ==========================================
    // USER-BESTÄTIGUNGS-E-MAIL
    // ==========================================
    $userSubject = 'Deine Nachricht bei babixGO wurde empfangen';
    $userMessage = "
Hallo $name,

vielen Dank für deine Nachricht! 🎉

Wir haben deine Anfrage erfolgreich erhalten und werden uns so schnell wie möglich bei dir melden – in der Regel innerhalb von 24 Stunden.

═══════════════════════════════════════
  DEINE NACHRICHT
═══════════════════════════════════════

Name:     $name
E-Mail:   $email" . ($whatsapp ? "\nWhatsApp: $whatsapp" : "") . "

Nachricht:
$message

═══════════════════════════════════════

⚡ SCHNELLERE ANTWORT GEWÜNSCHT?
───────────────────────────────────────
Für dringende Anfragen empfehlen wir unseren WhatsApp-Support:
👉 https://wa.me/4915223842897

Dort antworten wir meist innerhalb weniger Minuten!

======================================

NUETZLICHE LINKS
--------------------------------------
Startseite:      https://babixgo.de
Sticker Service: https://babixgo.de/sticker/
Partner Events:  https://babixgo.de/partnerevents/
Racers:          https://babixgo.de/racers/

======================================

Beste Grüße
Dein babixGO Team

---
babixGO - Monopoly GO Services
Website:  https://babixgo.de
WhatsApp: +49 152 23842897
E-Mail:   admin@babixgo.de
";

    $userHeaders = "From: babixGO Support <support@babixgo-mail.de>\r\n";
    $userHeaders .= "Reply-To: $adminEmail\r\n";
    $userHeaders .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Sende Bestätigungs-E-Mail an den Nutzer mit Fehlererfassung
    $userMailError = null;
    $previousErrorHandler = set_error_handler(function (int $errno, string $errstr) use (&$userMailError): bool {
        // Nur Fehler von mail() abfangen, ohne globale Error-Handling-Logik zu verändern
        $userMailError = sprintf('mail() warning [%d]: %s', $errno, $errstr);
        // Fehler als "behandelt" markieren, damit sie nicht ausgegeben werden
        return true;
    });

    $results['user_sent'] = mail($safeEmail, $userSubject, $userMessage, $userHeaders);

    if ($previousErrorHandler !== null) {
        restore_error_handler();
    } else {
        // Falls kein vorheriger Handler existierte, stelle den Standard-Handler wieder her
        restore_error_handler();
    }

    if (!$results['user_sent']) {
        error_log(sprintf(
            'Contact form user email FAILED (to: %s)%s',
            $safeEmail,
            $userMailError !== null ? ' - ' . $userMailError : ''
        ));
    }
    
    // Log E-Mail-Versand-Status
    error_log(sprintf(
        'Contact form emails sent - Admin: %s, User: %s (to: %s)',
        $results['admin_sent'] ? 'SUCCESS' : 'FAILED',
        $results['user_sent'] ? 'SUCCESS' : 'FAILED',
        $safeEmail
    ));
    
    return $results;
}

$contentType = $_SERVER['CONTENT_TYPE'] ?? '';
$accept = $_SERVER['HTTP_ACCEPT'] ?? '';
$expectsJson = stripos($contentType, 'application/json') !== false
    || stripos($accept, 'application/json') !== false;

// Nur POST erlauben
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respondWithStatus($expectsJson, 'error', 'Method not allowed', 405);
}

$dbHost = getenv('BABIXGO_DB_HOST');
$dbName = getenv('BABIXGO_DB_NAME');
$dbUser = getenv('BABIXGO_DB_USER');
$dbPass = getenv('BABIXGO_DB_PASS');

if (!$dbHost || !$dbName || !$dbUser || !$dbPass) {
    respondWithStatus(
        $expectsJson,
        'config',
        'Serverkonfiguration fehlt. Bitte versuche es später erneut.',
        500
    );
}

function isRateLimited(string $ip, int $limit = 5, int $windowSeconds = 600): bool
{
    $safeIp = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', $ip);
    $file = sys_get_temp_dir() . '/contact_rate_' . hash('sha256', $safeIp) . '.json';
    $now = time();
    $data = ['start' => $now, 'count' => 0];

    $handle = @fopen($file, 'c+');
    if ($handle === false) {
        return false;
    }

    try {
        if (flock($handle, LOCK_EX)) {
            $content = stream_get_contents($handle);
            if ($content) {
                $decoded = json_decode($content, true);
                if (is_array($decoded) && isset($decoded['start'], $decoded['count'])) {
                    $data = $decoded;
                }
            }

            if ($now - (int) $data['start'] > $windowSeconds) {
                $data = ['start' => $now, 'count' => 0];
            }

            if ((int) $data['count'] >= $limit) {
                return true;
            }

            $data['count'] = (int) $data['count'] + 1;
            ftruncate($handle, 0);
            rewind($handle);
            fwrite($handle, json_encode($data));
        }
    } finally {
        flock($handle, LOCK_UN);
        fclose($handle);
    }

    return false;
}

try {
    $data = [];

    if (stripos($contentType, 'application/json') !== false) {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
    } else {
        $data = $_POST;
    }

    if (!is_array($data) || empty($data)) {
        throw new Exception('Ungültige Anfrage.');
    }

    $ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    if (isRateLimited($ipAddress)) {
        respondWithStatus($expectsJson, 'rate', 'Zu viele Anfragen. Bitte versuche es später erneut.', 429);
    }

    if (!empty($data['website'])) {
        throw new Exception('Ungültige Anfrage.');
    }

    $formTime = isset($data['form_time']) ? (int) $data['form_time'] : 0;
    if ($formTime > 0) {
        $delta = time() - $formTime;
        if ($delta < 3 || $delta > 86400) {
            throw new Exception('Ungültige Anfrage.');
        }
    }

    // Validierung
    if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
        respondWithStatus($expectsJson, 'validation', 'Bitte fülle alle Pflichtfelder aus.', 400);
    }

    // DSGVO: Datenschutz-Checkbox prüfen
    $privacyAccepted = false;
    if (is_bool($data['privacy'] ?? null)) {
        $privacyAccepted = $data['privacy'] === true;
    } elseif (is_string($data['privacy'] ?? null)) {
        $privacyAccepted = in_array($data['privacy'], ['1', 'on', 'true'], true);
    } elseif (is_int($data['privacy'] ?? null)) {
        $privacyAccepted = $data['privacy'] === 1;
    }

    if (!$privacyAccepted) {
        respondWithStatus($expectsJson, 'validation', 'Bitte akzeptiere die Datenschutzerklärung.', 400);
    }

    // Input bereinigen
    $name = htmlspecialchars(trim($data['name']), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
    $whatsapp = !empty($data['whatsapp']) ? htmlspecialchars(trim($data['whatsapp']), ENT_QUOTES, 'UTF-8') : null;
    $message = htmlspecialchars(trim($data['message']), ENT_QUOTES, 'UTF-8');

    // E-Mail validieren
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        respondWithStatus($expectsJson, 'validation', 'Ungültige E-Mail-Adresse.', 400);
    }

    // Nachricht validieren
    if (strlen($message) < 10) {
        respondWithStatus($expectsJson, 'validation', 'Nachricht ist zu kurz (mindestens 10 Zeichen).', 400);
    }

    if (strlen($message) > 5000) {
        respondWithStatus($expectsJson, 'validation', 'Nachricht ist zu lang (maximal 5000 Zeichen).', 400);
    }

    // Datenbankverbindung
    $pdo = new PDO(
        "mysql:host=" . $dbHost . ";dbname=" . $dbName . ";charset=utf8mb4",
        $dbUser,
        $dbPass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

    // Alte Kontakte automatisch löschen (DSGVO: 6 Monate nach Archivierung)
    $pdo->exec("
        DELETE FROM contacts 
        WHERE created_at < DATE_SUB(NOW(), INTERVAL 6 MONTH) 
        AND status = 'archived'
    ");

    // In Datenbank einfügen
    $stmt = $pdo->prepare("
        INSERT INTO contacts (name, email, whatsapp, message, ip_address, user_agent, created_at) 
        VALUES (:name, :email, :whatsapp, :message, :ip, :user_agent, NOW())
    ");

    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':whatsapp' => $whatsapp,
        ':message' => $message,
        ':ip' => $ipAddress,
        ':user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown'
    ]);

    // E-Mails versenden (Admin + User)
    $emailResults = sendNotificationEmails($name, $email, $whatsapp, $message, $ipAddress);

    // Erfolg (auch wenn E-Mails fehlschlagen - Daten sind in DB)
    respondWithStatus($expectsJson, 'success', 'Nachricht erfolgreich gesendet!', 200);

} catch (PDOException $e) {
    error_log('Database error: ' . $e->getMessage());
    respondWithStatus($expectsJson, 'error', 'Datenbankfehler. Bitte versuche es später erneut.', 500);

} catch (Exception $e) {
    respondWithStatus($expectsJson, 'error', $e->getMessage(), 400);
}
?>
