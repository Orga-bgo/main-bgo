<!DOCTYPE html>
<html lang="de">
<head>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/head-meta.php'; ?>

  <title>Anleitungen – babixGO</title>
  <meta name="description" content="Kostenlose Monopoly GO Anleitungen bei babixGO: Freundschaftsbalken automatisch füllen, Würfel verdienen und mehr. Schritt-für-Schritt erklärt für Einsteiger." />
  <link rel="canonical" href="https://babixgo.de/anleitungen/" />

  <meta property="og:title" content="Anleitungen – babixGO" />
  <meta property="og:description" content="Kostenlose Monopoly GO Anleitungen: Freundschaftsbalken füllen, Würfel verdienen. Schritt-für-Schritt erklärt für Einsteiger." />
  <meta property="og:url" content="https://babixgo.de/anleitungen/" />
  <meta property="og:image:alt" content="Schritt-für-Schritt Anleitungen für Monopoly GO: Freundschaftsbalken füllen und mehr." />

  <meta name="twitter:title" content="Anleitungen – babixGO" />
  <meta name="twitter:description" content="Kostenlose Monopoly GO Anleitungen: Freundschaftsbalken füllen, Würfel verdienen. Schritt-für-Schritt erklärt für Einsteiger." />

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
<section class="section-card u-mt-32 fade-in-scroll">
  <h1 class="welcome-title text-gradient">Anleitungen</h1>
  <p class="intro-text">
    Schritt-für-Schritt Guides für Monopoly GO.
  </p>
</section>

<section class="section-card fade-in-scroll" style="transition-delay: 0.1s;">
  <div class="section-header">
    <h2><img src="/shared/assets/material-symbols/menu-book.svg" class="icon icon-bounce" alt="" width="48" height="48">📚 Verfügbare Anleitungen</h2>
  </div>
  
  <div class="content-card card-interactive">
    <h3>Freundschaftsbalken selber füllen</h3>
    <p>Lerne, wie du deinen Freundschaftsbalken automatisch füllst – kostenlos und Schritt-für-Schritt erklärt.</p>
    <a href="/anleitungen/freundschaftsbalken-fuellen/" class="btn btn-primary btn-shimmer">
      Zur Anleitung
    </a>
  </div>
</section>


  </main>

  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/footer.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/footer-scripts.php'; ?>

</body>
</html>
