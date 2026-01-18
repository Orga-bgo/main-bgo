<!DOCTYPE html>
<html lang="de">
<head>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/head-meta.php'; ?>

  <title>Tycoon Racers - Monopoly GO | babixGO</title>
  <meta name="description" content="Monopoly GO Tycoon Racers bei babixGO: Beende das Event auf den vorderen Plätzen mit garantierten Belohnungen. Wir stellen dein Team zusammen – du kassierst." />
  <link rel="canonical" href="https://babixgo.de/tycoon-racers/" />

  <meta property="og:title" content="Tycoon Racers - Monopoly GO | babixGO" />
  <meta property="og:description" content="Monopoly GO Tycoon Racers bei babixGO: Beende das Event auf den vorderen Plätzen. Wir stellen dein Team zusammen – du kassierst." />
  <meta property="og:url" content="https://babixgo.de/tycoon-racers/" />

  <meta name="twitter:title" content="Tycoon Racers - Monopoly GO | babixGO" />
  <meta name="twitter:description" content="Monopoly GO Tycoon Racers bei babixGO: Beende das Event auf den vorderen Plätzen. Wir stellen dein Team zusammen – du kassierst." />

  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/head-links.php'; ?>

  <!-- Structured Data -->
  <?php
    $structured_data_files = ['organization.json', 'service-tycoon-racers.json'];
    require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/structured-data.php';
  ?>
</head>

<body>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/tracking.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/cookie-banner.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/header.php'; ?>

  <main id="main-content">
    <div class="box">

      <div class="section-card fade-in-scroll">
        <h1 class="welcome-title text-gradient">Tycoon Racers</h1>
        <p class="intro-text">
          Preis gilt für einen Platz im Team. Die 3 weiteren Teammitglieder sind Accounts von uns.
          Sie sorgen dafür, dass du alle möglichen Rundenbelohnungen / Kisten erhältst.
        </p>

        <p class="text-muted u-mt-16">
          Weitere Infos zu Tycoon Racers folgen in Kürze!
        </p>
        <a href="https://wa.me/4915223842897" target="_blank" rel="noopener" class="btn btn-whatsapp-glow u-mt-16">
          <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/icon-whatsapp.php'; ?>
          WhatsApp Kontakt
        </a>
      </div>

      <div class="section-header">
        <h2><img src="/shared/assets/material-symbols/info.svg" class="icon icon-bounce" alt="" width="48" height="48"><span aria-hidden="true">ℹ️ </span>Details & Garantie</h2>
      </div>
      <div class="section-card card-lift fade-in-scroll" style="transition-delay: 0.1s;">
        <div class="info-line">
          <span class="info-line-label">Preis je Platz</span>
          <span class="info-line-value">45 €</span>
        </div>
        <p class="u-mt-element text-muted text-small">
          Keine Garantie auf Platz 1 – auch wenn wir diesen in über 90% der Rennen erreichen.
        </p>
        <p class="desc-small u-mt-10">
          <strong>Bitte beachten:</strong> In ungefähr einem von 25 Rennen kann es vorkommen, dass wir nicht alle Belohnungen erspielen können. In diesem Fall erhaltet ihr 15€ zurück.
        </p>
      </div>

      <div class="section-header">
        <h2><img src="/shared/assets/material-symbols/groups.svg" class="icon icon-glow" alt="" width="48" height="48"><span aria-hidden="true">👥 </span>Jetzt beitreten</h2>
      </div>
      <div class="section-card glass-gradient glow-subtle fade-in-scroll" style="transition-delay: 0.2s;">
        <h3>Bereit loszulegen?</h3>
        <p>Du möchtest einen Platz in unserem Team? Kontaktiere uns direkt!</p>
        <div class="info-box-actions u-mt-16">
          <a href="https://wa.me/4915223842897" target="_blank" rel="noopener" class="btn btn-premium">
            Jetzt Team beitreten
          </a>
        </div>
      </div>

    </div>
  </main>

  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/footer.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/footer-scripts.php'; ?>
</body>
</html>
