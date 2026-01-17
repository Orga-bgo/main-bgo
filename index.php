<!DOCTYPE html>
<html lang="de">
<head>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/head-meta.php'; ?>

  <title>babixGO – Monopoly GO Services | Sticker, Events &amp; Accounts</title>
  <meta name="description" content="babixGO bietet Monopoly GO Services: Sticker, Partnerevents, Racers &amp; Accounts. Direkt per WhatsApp erreichbar – schnell, zuverlässig, fair." />
  <link rel="canonical" href="https://babixgo.de/" />

  <meta property="og:title" content="babixGO – Monopoly GO Services | Sticker, Events &amp; Accounts" />
  <meta property="og:description" content="babixGO bietet Monopoly GO Services: Sticker, Partnerevents, Racers &amp; Accounts. Direkt per WhatsApp erreichbar – schnell, zuverlässig, fair." />
  <meta property="og:url" content="https://babixgo.de/" />
  <meta property="og:image:alt" content="babixGO bietet Monopoly GO Services: Sticker, Partnerevents, Racers &amp; Accounts. Direkt per WhatsApp erreichbar – schnell, zuverlässig, fair." />

  <meta name="twitter:title" content="babixGO – Monopoly GO Services | Sticker, Events &amp; Accounts" />
  <meta name="twitter:description" content="babixGO bietet Monopoly GO Services: Sticker, Partnerevents, Racers &amp; Accounts. Direkt per WhatsApp erreichbar – schnell, zuverlässig, fair." />

  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/head-links.php'; ?>

  <!-- Structured Data (site-wide) -->
  <?php
    $structured_data_files = ['organization.json', 'website.json'];
    require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/structured-data.php';
  ?>
</head>

<body>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/tracking.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/cookie-banner.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/header.php'; ?>

  <main id="main-content">
    <div class="box">

      <!-- CARD 1: Welcome -->
      <div class="section-card">
        <h1 class="welcome-title">Willkommen bei babixGO</h1>
        <p class="intro-text">
          Dein zuverlässiger Partner für Monopoly Go Würfel, Sticker und mehr.
        </p>
      </div>

      <!-- ===== SERVICE CARDS SECTION (HORIZONTAL) ===== -->
      <section class="services-horizontal-section" id="services">
        <div class="section-header">
          <h2>Unsere Premium Services</h2>
          <p>Alles für dein perfektes Monopoly Go Erlebnis</p>
        </div>

        <div class="service-cards-grid">
          
          <!-- CARD 1: Würfel -->
          <div class="card">
            <div class="card-left">
              <svg class="icon-main" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="3" width="18" height="18" rx="3" fill="#00d4ff" opacity="0.2"/>
                <rect x="3" y="3" width="18" height="18" rx="3" stroke="#00d4ff" stroke-width="2"/>
                <circle cx="12" cy="12" r="2" fill="#00d4ff"/>
              </svg>
            </div>
            <div class="card-right">
              <div class="name-row">
                <h3 class="label-big">Würfel Pakete</h3>
                <span class="price">ab 9,99€</span>
              </div>
              <span class="category">Premium Würfel</span>
              <div class="description">
                Hochwertige Würfel-Pakete für maximalen Spielspaß. Sofortige Lieferung und beste Preise garantiert.
              </div>
              <div class="download-row">
                <button class="dl-btn" onclick="window.location.href='/wuerfel/'">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z" fill="currentColor"/>
                  </svg>
                  Mehr erfahren
                </button>
              </div>
            </div>
          </div>

          <!-- CARD 2: Partnerevents -->
          <div class="card">
            <div class="card-left">
              <svg class="icon-main" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="3" width="18" height="18" rx="3" fill="#00d4ff" opacity="0.2"/>
                <rect x="3" y="3" width="18" height="18" rx="3" stroke="#00d4ff" stroke-width="2"/>
                <path d="M7 10h10M7 14h7" stroke="#00d4ff" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="card-right">
              <div class="name-row">
                <h3 class="label-big">Partnerevents</h3>
                <span class="price">ab 4,99€</span>
              </div>
              <span class="category">Events</span>
              <div class="description">
                Exklusive Partnerevent-Tokens für besondere Belohnungen und limitierte Items im Spiel.
              </div>
              <div class="download-row">
                <button class="dl-btn" onclick="window.location.href='/partnerevents/'">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z" fill="currentColor"/>
                  </svg>
                  Mehr erfahren
                </button>
              </div>
            </div>
          </div>

          <!-- CARD 3: Accounts -->
          <div class="card">
            <div class="card-left">
              <svg class="icon-main" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="3" width="18" height="18" rx="3" fill="#00d4ff" opacity="0.2"/>
                <rect x="3" y="3" width="18" height="18" rx="3" stroke="#00d4ff" stroke-width="2"/>
                <circle cx="12" cy="10" r="3" fill="#00d4ff"/>
                <path d="M7 17c0-2 2-3 5-3s5 1 5 3" stroke="#00d4ff" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="card-right">
              <div class="name-row">
                <h3 class="label-big">Premium Accounts</h3>
                <span class="price">ab 19,99€</span>
              </div>
              <span class="category">Accounts</span>
              <div class="description">
                Fertig aufgebaute Premium-Accounts mit hohen Levels und exklusiven Items. Sofort spielbereit.
              </div>
              <div class="download-row">
                <button class="dl-btn" onclick="window.location.href='/accounts/'">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z" fill="currentColor"/>
                  </svg>
                  Mehr erfahren
                </button>
              </div>
            </div>
          </div>

          <!-- CARD 4: Sticker -->
          <div class="card">
            <div class="card-left">
              <svg class="icon-main" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="3" width="18" height="18" rx="3" fill="#00d4ff" opacity="0.2"/>
                <rect x="3" y="3" width="18" height="18" rx="3" stroke="#00d4ff" stroke-width="2"/>
                <circle cx="9" cy="9" r="1.5" fill="#00d4ff"/>
                <circle cx="15" cy="9" r="1.5" fill="#00d4ff"/>
                <path d="M8 15c1 1 2 1.5 4 1.5s3-.5 4-1.5" stroke="#00d4ff" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="card-right">
              <div class="name-row">
                <h3 class="label-big">Sticker Pakete</h3>
                <span class="price">ab 2,99€</span>
              </div>
              <span class="category">Sammelitems</span>
              <div class="description">
                Vervollständige deine Sticker-Sammlung mit unseren exklusiven Paketen. Alle Seltenheitsstufen verfügbar.
              </div>
              <div class="download-row">
                <button class="dl-btn" onclick="window.location.href='/sticker/'">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z" fill="currentColor"/>
                  </svg>
                  Mehr erfahren
                </button>
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- CARD 2: Services -->
      <section class="services-section">
        <div class="section-header">
          <h2><img src="/shared/assets/material-symbols/star.svg" class="icon icon-service" alt="" width="48" height="48">Unsere Services</h2>
        </div>

        <!-- Content Card: Würfel -->
        <div class="content-card">
          <div class="content-card-inner">
            <div class="content-card-icon">
              <img src="/shared/assets/icons/wuerfel.svg" alt="" width="64" height="64" loading="lazy">
            </div>
            <div class="content-card-content">
              <div class="content-card-header">
                <div class="content-card-title">
                  <h3>Würfel</h3>
                </div>
                <a href="/wuerfel/" class="btn btn-link">Mehr Infos</a>
              </div>
              <p class="content-card-description">
                Würfel für dein Monopoly GO Abenteuer – schnell und zuverlässig geliefert.
              </p>
              <div class="info-line">
                <span class="info-line-label">Preis</span>
                <span class="info-line-value">ab 15 €</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Card: Partnerevents -->
        <div class="content-card">
          <div class="content-card-inner">
            <div class="content-card-icon">
              <img src="/shared/assets/icons/partner.svg" alt="" width="64" height="64" loading="lazy">
            </div>
            <div class="content-card-content">
              <div class="content-card-header">
                <div class="content-card-title">
                  <h3>Partnerevent</h3>
                </div>
                <a href="/partnerevents/" class="btn btn-link">Mehr Infos</a>
              </div>
              <p class="content-card-description">
                Sichere dir einen unserer zuverlässigen Partner.
              </p>
              <div class="info-line">
                <span class="info-line-label">Je Spot</span>
                <span class="info-line-value">8 €</span>
              </div>
              <div class="info-line">
                <span class="info-line-label">4 Spots</span>
                <span class="info-line-value">28 €</span>
              </div>
              <div class="info-line">
                <span class="info-line-label">Mehr Slots</span>
                <span class="info-line-value">auf Anfrage</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Card: Accounts -->
        <div class="content-card">
          <div class="content-card-inner">
            <div class="content-card-icon">
              <img src="/shared/assets/icons/account.svg" alt="" width="64" height="64" loading="lazy">
            </div>
            <div class="content-card-content">
              <div class="content-card-header">
                <div class="content-card-title">
                  <h3>Accounts</h3>
                </div>
                <a href="/accounts/" class="btn btn-link">Mehr Infos</a>
              </div>
              <p class="content-card-description">
                Monopoly Go Accounts in diversen Ausführungen. Immer mit dabei: Sehr, sehr viele Würfel.
              </p>
              <div class="info-line">
                <span class="info-line-label">Beispielpreis</span>
                <span class="info-line-value">ab 50 €</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Card: Tycoon Racers -->
        <div class="content-card">
          <div class="content-card-inner">
            <div class="content-card-icon">
              <img src="/shared/assets/icons/racers-flagge.svg" alt="" width="64" height="64" loading="lazy">
            </div>
            <div class="content-card-content">
              <div class="content-card-header">
                <div class="content-card-title">
                  <h3>Tycoon Racers</h3>
                </div>
                <a href="/tycoon-racers/" class="btn btn-link">Mehr Infos</a>
              </div>
              <p class="content-card-description">
                Tritt' unserem Team bei und sicher dir alle Rundenbelohnungen.
              </p>
              <div class="info-line">
                <span class="info-line-label">Je Platz</span>
                <span class="info-line-value">45 €</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Card: Freundschaftsbalken -->
        <div class="content-card">
          <div class="content-card-inner">
            <div class="content-card-icon">
              <img src="/shared/assets/icons/freundschaft.svg" alt="" width="64" height="64" loading="lazy">
            </div>
            <div class="content-card-content">
              <div class="content-card-header">
                <div class="content-card-title">
                  <h3>Freundschaftsbalken</h3>
                </div>
                <a href="/anleitungen/freundschaftsbalken-fuellen/" class="btn btn-link">Mehr Infos</a>
              </div>
              <p class="content-card-description">
                Alle Balken komplett gefüllt. Jetzt mit gratis Anleitung zum selber füllen.
              </p>
              <div class="info-line">
                <span class="info-line-label">Komplett gefüllt (für Eilige)</span>
                <span class="info-line-value">3 €</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Card: Sticker -->
        <div class="content-card">
          <div class="content-card-inner">
            <div class="content-card-icon">
              <img src="/shared/assets/icons/sticker.svg" alt="" width="64" height="64" loading="lazy">
            </div>
            <div class="content-card-content">
              <div class="content-card-header">
                <div class="content-card-title">
                  <h3>Sticker</h3>
                </div>
                <a href="/sticker/" class="btn btn-link">Mehr Infos</a>
              </div>
              <p class="content-card-description">
                Vervollständige deine Alben mit fehlenden Stickern – alle Sticker verfügbar.
              </p>
              <div class="info-line">
                <span class="info-line-label">1–3 Sterne Sticker</span>
                <span class="info-line-value">2 €</span>
              </div>
              <div class="info-line">
                <span class="info-line-label">4 Sterne Sticker</span>
                <span class="info-line-value">3 €</span>
              </div>
              <div class="info-line">
                <span class="info-line-label">5 Sterne Sticker</span>
                <span class="info-line-value">4 €</span>
              </div>
              <div class="info-line">
                <span class="info-line-label">Gold Sticker</span>
                <span class="info-line-value">+1 € Aufpreis</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- CARD 3: Contact & Support -->
      <section class="contact-section">
        <div class="section-header">
          <h2><img src="/shared/assets/material-symbols/mail.svg" class="icon icon-service" alt="" width="48" height="48">Kontakt</h2>
        </div>

        <div class="content-card">
          <div class="contact-subsection">
            <h3>Social Dienste</h3>
            <p class="content-card-description">
              Am schnellsten erreichst du uns über unsere Social Media Kanäle:
            </p>
            <div class="contact-buttons-horizontal">
              <a href="https://wa.me/4915223842897" target="_blank" rel="noopener" class="contact-button contact-button--whatsapp">
                <img src="/shared/assets/icons/whatsapp_schriftzug.svg" alt="WhatsApp" width="150" height="35" loading="lazy">
              </a>
              <a href="https://www.facebook.com/share/1DC2snqois/" target="_blank" rel="noopener" class="contact-button contact-button--facebook">
                <img src="/shared/assets/icons/facebook_schriftzug.svg" alt="Facebook" width="125" height="24" loading="lazy">
              </a>
            </div>
          </div>
<div> </div>
          <div class="contact-subsection">
            <h3>Weitere Möglichkeiten</h3>
            <p class="content-card-description">
              Alternativ kannst du uns über diese Wege erreichen:
            </p>
            <div class="contact-buttons-horizontal">
              <a href="mailto:info@babixgo.de" class="contact-button">
                <img src="/shared/assets/icons/mail_schriftzug.svg" alt="E-Mail" width="100" height="30" loading="lazy">
              </a>
              <a href="/kontakt/" class="contact-button">
                <img src="/shared/assets/icons/formular_schriftzug.svg" alt="Kontaktformular" width="150" height="45" loading="lazy">
              </a>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main>

  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/footer.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/footer-scripts.php'; ?>

</body>
</html>
