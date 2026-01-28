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
        <h1 class="welcome-title text-gradient">Monopoly GO Sticker & Events – Schnell & Zuverlässig</h1>
        <p class="intro-text">
          Dein zuverlässiger Partner für Monopoly Go Würfel, Sticker und mehr.
        </p>
        <a href="https://wa.me/4915223842897" target="_blank" rel="noopener" class="btn btn-whatsapp-glow btn-whatsapp-hero">
          <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/icon-whatsapp.php'; ?>
          Jetzt per WhatsApp kontaktieren
        </a>
      </div>

      <!-- CARD 2: Services -->
      <section class="services-section">
        <div class="section-header">
          <h2><img src="/shared/assets/material-symbols/star.svg" class="icon icon-service icon-bounce" alt="" width="48" height="48">Unsere Services</h2>
        </div>

        <!-- Grid für Service Cards -->
        <div class="services-grid">
          
          <!-- Service Card: Würfel -->
          <div class="content-card card-interactive fade-in-scroll">
            <div class="content-card-inner">
              <div class="content-card-icon">
                <img src="/shared/assets/icons/wuerfel.svg" alt="" width="64" height="64" loading="lazy">
              </div>
              <div class="content-card-content">
                <div class="content-card-header">
                  <div class="content-card-title">
                    <h3>Würfel</h3>
                  </div>
                  <a href="/wuerfel/" class="btn btn-link btn-shimmer">Mehr Infos</a>
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

          <!-- Service Card: Partnerevents -->
          <div class="content-card card-interactive fade-in-scroll delay-100">
            <div class="content-card-inner">
              <div class="content-card-icon">
                <img src="/shared/assets/icons/partner.svg" alt="" width="64" height="64" loading="lazy">
              </div>
              <div class="content-card-content">
                <div class="content-card-header">
                  <div class="content-card-title">
                    <h3>Partnerevent</h3>
                  </div>
                  <a href="/partnerevents/" class="btn btn-link btn-shimmer">Mehr Infos</a>
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

          <!-- Service Card: Accounts -->
          <div class="content-card card-interactive fade-in-scroll delay-200">
            <div class="content-card-inner">
              <div class="content-card-icon">
                <img src="/shared/assets/icons/account.svg" alt="" width="64" height="64" loading="lazy">
              </div>
              <div class="content-card-content">
                <div class="content-card-header">
                  <div class="content-card-title">
                    <h3>Accounts</h3>
                  </div>
                  <a href="/accounts/" class="btn btn-link btn-shimmer">Mehr Infos</a>
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

          <!-- Service Card: Tycoon Racers -->
          <div class="content-card card-interactive fade-in-scroll delay-300">
            <div class="content-card-inner">
              <div class="content-card-icon">
                <img src="/shared/assets/icons/racers-flagge.svg" alt="" width="64" height="64" loading="lazy">
              </div>
              <div class="content-card-content">
                <div class="content-card-header">
                  <div class="content-card-title">
                    <h3>Tycoon Racers</h3>
                  </div>
                  <a href="/tycoon-racers/" class="btn btn-link btn-shimmer">Mehr Infos</a>
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

          <!-- Service Card: Freundschaftsbalken -->
          <div class="content-card card-interactive fade-in-scroll delay-400">
            <div class="content-card-inner">
              <div class="content-card-icon">
                <img src="/shared/assets/icons/freundschaft.svg" alt="" width="64" height="64" loading="lazy">
              </div>
              <div class="content-card-content">
                <div class="content-card-header">
                  <div class="content-card-title">
                    <h3>Freundschaftsbalken</h3>
                  </div>
                  <a href="/anleitungen/freundschaftsbalken-fuellen/" class="btn btn-link btn-shimmer">Mehr Infos</a>
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

          <!-- Service Card: Sticker -->
          <div class="content-card card-interactive fade-in-scroll delay-500">
            <div class="content-card-inner">
              <div class="content-card-icon">
                <img src="/shared/assets/icons/sticker.svg" alt="" width="64" height="64" loading="lazy">
              </div>
              <div class="content-card-content">
                <div class="content-card-header">
                  <div class="content-card-title">
                    <h3>Sticker</h3>
                  </div>
                  <a href="/sticker/" class="btn btn-link btn-shimmer">Mehr Infos</a>
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

        </div>
      </section>

      <!-- CARD 3: Contact & Support -->
      <section class="contact-section">
        <div class="section-header">
          <h2><img src="/shared/assets/material-symbols/mail.svg" class="icon icon-service icon-glow" alt="" width="48" height="48">Kontakt</h2>
        </div>

        <div class="content-card glass-gradient glow-subtle">
          <div class="contact-subsection">
            <h3>Direkt per WhatsApp erreichbar</h3>
            <p class="content-card-description">
              Du hast Fragen oder möchtest einen unserer Services nutzen? Schreib uns einfach!
            </p>
            <div class="contact-button-group">
              <a href="https://wa.me/4915223842897" target="_blank" rel="noopener" class="btn btn-whatsapp-glow">
                <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/icon-whatsapp.php'; ?>
                WhatsApp öffnen
              </a>
              <a href="mailto:info@babixgo.de" class="btn btn-ghost">
                E-Mail senden
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
              <a href="https://www.facebook.com/share/1DC2snqois/" target="_blank" rel="noopener" class="contact-button contact-button--facebook">
                <img src="/shared/assets/icons/facebook_schriftzug.svg" alt="Facebook" width="125" height="24" loading="lazy">
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
