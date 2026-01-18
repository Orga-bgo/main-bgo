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
        <a href="https://wa.me/4915223842897" target="_blank" rel="noopener" class="btn btn-whatsapp-glow" style="margin-top: 1.5rem; display: inline-flex; align-items: center;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 0.5rem;">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
          </svg>
          Jetzt per WhatsApp kontaktieren
        </a>
      </div>

      <!-- CARD 2: Services -->
      <section class="services-section">
        <div class="section-header">
          <h2><img src="/shared/assets/material-symbols/star.svg" class="icon icon-service icon-bounce" alt="" width="48" height="48">Unsere Services</h2>
        </div>

        <!-- Grid für Service Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-top: var(--space-card);">
          
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
          <div class="content-card card-interactive fade-in-scroll" style="transition-delay: 0.1s;">
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
          <div class="content-card card-interactive fade-in-scroll" style="transition-delay: 0.2s;">
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
          <div class="content-card card-interactive fade-in-scroll" style="transition-delay: 0.3s;">
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
          <div class="content-card card-interactive fade-in-scroll" style="transition-delay: 0.4s;">
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
          <div class="content-card card-interactive fade-in-scroll" style="transition-delay: 0.5s;">
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
            <div style="display: flex; gap: 1rem; margin-top: 1.5rem; flex-wrap: wrap;">
              <a href="https://wa.me/4915223842897" target="_blank" rel="noopener" class="btn btn-whatsapp-glow" style="display: inline-flex; align-items: center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 0.5rem;">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
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
