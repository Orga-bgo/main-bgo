<!-- ========== HEADER ========== -->
<header class="site-header">
  <div class="header-brand">
    <a href="/" class="header-logo">
      <span class="logo-babix">babix</span><span class="logo-go">GO</span>
    </a>
    <div class="header-tagline">Monopoly Go Würfel, Accounts und mehr!</div>
  </div>
  
  <button class="menu-toggle" aria-label="Menü öffnen" aria-controls="mobileMenu" aria-expanded="false" id="menuToggle" type="button">
    <span></span>
    <span></span>
    <span></span>
  </button>
</header>

<!-- ========== BACKDROP OVERLAY ========== -->
<div class="menu-backdrop" id="menuBackdrop"></div>

<!-- ========== MOBILE SLIDE MENU ========== -->
<nav class="mobile-menu" id="mobileMenu" aria-hidden="true">
  <div class="mobile-menu-header">
    <div class="menu-header-brand">
      <span class="logo-babix">babix</span><span class="logo-go">GO</span>
    </div>
    <p class="menu-header-subtitle">Monopoly Go Premium Shop</p>
  </div>
  
  <div class="mobile-menu-inner">
    <a href="/" class="menu-item">
      <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
        <polyline points="9 22 9 12 15 12 15 22"/>
      </svg>
      <span>Home</span>
    </a>
    
    <div class="menu-dropdown">
      <button class="menu-dropdown-toggle" aria-expanded="false" type="button">
        <div class="dropdown-toggle-content">
          <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 6v6l4 2"/>
          </svg>
          <span>Angebote</span>
        </div>
        <svg class="dropdown-arrow" width="12" height="12" viewBox="0 0 12 12" fill="none">
          <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
      <div class="menu-dropdown-content">
        <a href="/wuerfel/" class="menu-subitem">
          <svg class="submenu-icon" viewBox="0 0 24 24" fill="currentColor">
            <rect x="3" y="3" width="7" height="7" rx="1"/>
            <rect x="14" y="3" width="7" height="7" rx="1"/>
            <rect x="14" y="14" width="7" height="7" rx="1"/>
            <rect x="3" y="14" width="7" height="7" rx="1"/>
          </svg>
          Würfel
        </a>
        <a href="/partnerevents/" class="menu-subitem">
          <svg class="submenu-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
          </svg>
          Partnerevents
        </a>
        <a href="/accounts/" class="menu-subitem">
          <svg class="submenu-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
            <circle cx="12" cy="7" r="4"/>
          </svg>
          Accounts
        </a>
        <a href="/tycoon-racers/" class="menu-subitem">
          <svg class="submenu-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M18 18.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM6 18.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM18 6h2.5L23 11l-4 1V6ZM1 6h7l2 5H1V6Zm9 0h5v5h-5V6Z"/>
          </svg>
          Tycoon Racers
        </a>
        <a href="/anleitungen/freundschaftsbalken-fuellen/" class="menu-subitem">
          <svg class="submenu-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
          </svg>
          Freundschaftsbalken
        </a>
        <a href="/sticker/" class="menu-subitem">
          <svg class="submenu-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2a10 10 0 0 1 10 10 10 10 0 0 1-10 10C6.47 22 2 17.5 2 12A10 10 0 0 1 12 2m0 2a8 8 0 0 0-8 8 8 8 0 0 0 8 8 8 8 0 0 0 8-8 8 8 0 0 0-8-8m-5 7h2a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1m8 0h2a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1m-5.5 5h5c.8 0 1.5.7 1.5 1.5v.5H8v-.5c0-.8.7-1.5 1.5-1.5z"/>
          </svg>
          Sticker
        </a>
      </div>
    </div>
    
    <a href="/anleitungen/" class="menu-item">
      <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
      </svg>
      <span>Anleitungen</span>
    </a>
    
    <a href="/faq/" class="menu-item">
      <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/>
        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
        <line x1="12" y1="17" x2="12.01" y2="17"/>
      </svg>
      <span>FAQ</span>
    </a>
    
    <a href="/news/" class="menu-item">
      <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"/>
        <path d="M18 14h-8M15 18h-5M10 6h8v4h-8z"/>
      </svg>
      <span>News</span>
    </a>
    
    <a href="/kontakt/" class="menu-item">
      <svg class="menu-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
      </svg>
      <span>Kontakt</span>
    </a>
  </div>
</nav>
