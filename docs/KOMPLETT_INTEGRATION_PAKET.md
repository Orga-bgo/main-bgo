# 🎯 KOMPLETTES INTEGRATIONS-PAKET FÜR GITHUB COPILOT

## 📦 Übersicht

Dieses Paket enthält alle notwendigen Dateien und Anweisungen für die Integration von:
1. **Header + Slide-Down-Menü** (von rechts)
2. **Service Cards für Startseite** (immer horizontal)

---

## 📂 DATEI 1: header-optimized.php

**Verwendung:** Ersetzt die bestehende `header.php`

```php
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
```

---

## 📂 DATEI 2: style-header-optimized.css

**Verwendung:** Füge diesen CSS-Code in `style.css` ein (ersetze alte Header-Styles Zeile 370-620)

```css
/* ===== HEADER ===== */
.site-header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  background: linear-gradient(135deg, var(--md-surface-container) 0%, var(--md-surface-container-low) 100%);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  z-index: 1000;
  padding: 1rem clamp(1rem, 5vw, 2rem);
  display: flex;
  justify-content: space-between;
  align-items: center;
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.header-brand {
  display: flex;
  flex-direction: column;
  gap: 0.25rem;
}

.header-logo {
  font-size: clamp(1.5rem, 4vw, 2rem);
  font-weight: 800;
  text-decoration: none;
  display: inline-block;
  transition: transform 0.2s;
}

.header-logo:hover {
  transform: scale(1.05);
}

.logo-babix {
  color: var(--md-on-surface);
  letter-spacing: -0.02em;
}

.logo-go {
  color: var(--primary);
  letter-spacing: -0.02em;
}

.header-tagline {
  font-size: clamp(0.75rem, 2vw, 0.875rem);
  color: var(--md-on-surface-variant);
  font-weight: 500;
  letter-spacing: 0.01em;
}

/* ===== MENU TOGGLE (HAMBURGER) ===== */
.menu-toggle {
  background: transparent;
  border: none;
  cursor: pointer;
  padding: 0.75rem;
  display: flex;
  flex-direction: column;
  gap: 6px;
  justify-content: center;
  align-items: center;
  width: 48px;
  height: 48px;
  border-radius: 12px;
  transition: background-color 0.2s;
  position: relative;
  z-index: 1002;
}

.menu-toggle:hover {
  background-color: var(--md-surface-container-high);
}

.menu-toggle:focus-visible {
  outline: 2px solid var(--primary);
  outline-offset: 2px;
}

.menu-toggle span {
  display: block;
  width: 24px;
  height: 3px;
  background: var(--md-on-surface);
  border-radius: 3px;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Hamburger → X Animation */
.menu-toggle.active span:nth-child(1) {
  transform: translateY(9px) rotate(45deg);
}

.menu-toggle.active span:nth-child(2) {
  opacity: 0;
  transform: translateX(-10px);
}

.menu-toggle.active span:nth-child(3) {
  transform: translateY(-9px) rotate(-45deg);
}

/* ===== BACKDROP OVERLAY ===== */
.menu-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(4px);
  -webkit-backdrop-filter: blur(4px);
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1),
              visibility 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  z-index: 999;
}

.menu-backdrop.active {
  opacity: 1;
  visibility: visible;
}

/* ===== MOBILE MENU (SLIDE FROM RIGHT) ===== */
.mobile-menu {
  position: fixed;
  top: 0;
  right: 0;
  width: 340px;
  max-width: 85vw;
  height: 100vh;
  background: linear-gradient(165deg, var(--md-surface-container) 0%, var(--md-surface-container-high) 100%);
  box-shadow: -4px 0 24px rgba(0, 0, 0, 0.2);
  transform: translateX(100%);
  transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  z-index: 1001;
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.mobile-menu.active {
  transform: translateX(0);
}

/* ===== MENU HEADER ===== */
.mobile-menu-header {
  background: linear-gradient(135deg, var(--md-primary-container) 0%, var(--md-tertiary-container) 100%);
  padding: 28px 24px 20px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.menu-header-brand {
  font-size: 1.75rem;
  font-weight: 800;
  margin-bottom: 4px;
}

.menu-header-subtitle {
  font-size: 0.875rem;
  color: var(--md-on-primary-container);
  opacity: 0.9;
  font-weight: 500;
  margin: 0;
}

/* ===== MENU INNER (SCROLLABLE) ===== */
.mobile-menu-inner {
  flex: 1;
  overflow-y: auto;
  padding: 16px 12px 24px;
  display: flex;
  flex-direction: column;
  gap: 6px;
}

/* Custom Scrollbar */
.mobile-menu-inner::-webkit-scrollbar {
  width: 6px;
}

.mobile-menu-inner::-webkit-scrollbar-track {
  background: transparent;
}

.mobile-menu-inner::-webkit-scrollbar-thumb {
  background: var(--md-on-surface-variant);
  border-radius: 3px;
  opacity: 0.4;
}

.mobile-menu-inner::-webkit-scrollbar-thumb:hover {
  background: var(--md-on-surface);
}

/* ===== MENU ITEMS ===== */
.menu-item {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 14px 16px;
  color: var(--md-on-surface);
  text-decoration: none;
  font-size: 1rem;
  font-weight: 500;
  border-radius: 12px;
  transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
  overflow: hidden;
  min-height: 48px;
  opacity: 0;
  transform: translateX(20px);
}

/* Staggered Animation */
.mobile-menu.active .menu-item {
  opacity: 1;
  transform: translateX(0);
}

.mobile-menu.active .menu-item:nth-child(1) { transition-delay: 0.1s; }
.mobile-menu.active .menu-item:nth-child(2) { transition-delay: 0.15s; }
.mobile-menu.active .menu-item:nth-child(3) { transition-delay: 0.2s; }
.mobile-menu.active .menu-item:nth-child(4) { transition-delay: 0.25s; }
.mobile-menu.active .menu-item:nth-child(5) { transition-delay: 0.3s; }
.mobile-menu.active .menu-item:nth-child(6) { transition-delay: 0.35s; }
.mobile-menu.active .menu-item:nth-child(7) { transition-delay: 0.4s; }

/* Hover Accent */
.menu-item::before {
  content: '';
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 4px;
  height: 0;
  background: var(--primary);
  border-radius: 0 2px 2px 0;
  transition: height 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}

.menu-item:hover,
.menu-item:focus-visible {
  background: var(--md-surface-container-highest);
  transform: translateX(4px);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.menu-item:hover::before,
.menu-item:focus-visible::before {
  height: 60%;
}

.menu-item.active {
  background: var(--md-primary-container);
  color: var(--md-on-primary-container);
}

.menu-item.active::before {
  height: 80%;
}

/* Menu Icons */
.menu-icon {
  width: 24px;
  height: 24px;
  flex-shrink: 0;
  stroke: currentColor;
  transition: transform 0.2s;
}

.menu-item:hover .menu-icon {
  transform: scale(1.1);
}

/* ===== DROPDOWN MENU ===== */
.menu-dropdown {
  display: flex;
  flex-direction: column;
  opacity: 0;
  transform: translateX(20px);
}

.mobile-menu.active .menu-dropdown {
  opacity: 1;
  transform: translateX(0);
  transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1) 0.15s,
              transform 0.3s cubic-bezier(0.4, 0, 0.2, 1) 0.15s;
}

.menu-dropdown-toggle {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  padding: 14px 16px;
  background: transparent;
  border: none;
  color: var(--md-on-surface);
  font-size: 1rem;
  font-weight: 500;
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
  min-height: 48px;
  text-align: left;
  width: 100%;
}

.dropdown-toggle-content {
  display: flex;
  align-items: center;
  gap: 16px;
  flex: 1;
}

.menu-dropdown-toggle::before {
  content: '';
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 4px;
  height: 0;
  background: var(--primary);
  border-radius: 0 2px 2px 0;
  transition: height 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}

.menu-dropdown-toggle:hover,
.menu-dropdown-toggle:focus-visible {
  background: var(--md-surface-container-highest);
  transform: translateX(4px);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.menu-dropdown-toggle:hover::before {
  height: 60%;
}

.dropdown-arrow {
  flex-shrink: 0;
  transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  stroke: currentColor;
}

.menu-dropdown-toggle[aria-expanded="true"] .dropdown-arrow {
  transform: rotate(180deg);
}

/* Dropdown Content */
.menu-dropdown-content {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s cubic-bezier(0.4, 0, 0.2, 1),
              opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  opacity: 0;
  display: flex;
  flex-direction: column;
  gap: 4px;
  padding: 0 12px;
}

.menu-dropdown-toggle[aria-expanded="true"] + .menu-dropdown-content {
  max-height: 500px;
  opacity: 1;
  margin-top: 6px;
  margin-bottom: 6px;
}

/* Submenu Items */
.menu-subitem {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 16px 12px 20px;
  color: var(--md-on-surface-variant);
  text-decoration: none;
  font-size: 0.9375rem;
  font-weight: 500;
  border-radius: 10px;
  transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
  min-height: 44px;
  position: relative;
}

.menu-subitem::before {
  content: '';
  position: absolute;
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 3px;
  height: 0;
  background: var(--primary);
  border-radius: 0 2px 2px 0;
  transition: height 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}

.menu-subitem:hover,
.menu-subitem:focus-visible {
  background: var(--md-surface-container-high);
  color: var(--md-on-surface);
  transform: translateX(4px);
}

.menu-subitem:hover::before {
  height: 50%;
}

.menu-subitem.active {
  background: var(--md-secondary-container);
  color: var(--md-on-secondary-container);
}

.submenu-icon {
  width: 20px;
  height: 20px;
  flex-shrink: 0;
  fill: currentColor;
  opacity: 0.8;
  transition: opacity 0.2s, transform 0.2s;
}

.menu-subitem:hover .submenu-icon {
  opacity: 1;
  transform: scale(1.1);
}

/* ===== BODY SCROLL LOCK ===== */
body.menu-open {
  overflow: hidden;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 480px) {
  .mobile-menu {
    width: 100%;
    max-width: 100%;
  }
  
  .header-tagline {
    display: none;
  }
}

@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
```

---

## 📂 DATEI 3: main-header-optimized.js

**Verwendung:** Ersetze den alten Menu-Code in `main.js` (ca. Zeile 341-424)

```javascript
// ===== ENHANCED MOBILE MENU =====
(() => {
  const menuToggle = document.getElementById('menuToggle');
  const mobileMenu = document.getElementById('mobileMenu');
  const menuBackdrop = document.getElementById('menuBackdrop');
  const body = document.body;
  
  if (!menuToggle || !mobileMenu || !menuBackdrop) return;

  // Detect current page and mark as active
  const currentPath = window.location.pathname;
  const menuItems = mobileMenu.querySelectorAll('.menu-item, .menu-subitem');
  
  menuItems.forEach(item => {
    const href = item.getAttribute('href');
    if (href && (currentPath === href || currentPath.startsWith(href + '/'))) {
      item.classList.add('active');
    }
  });

  // Toggle Menu
  function toggleMenu() {
    const isActive = mobileMenu.classList.contains('active');
    
    menuToggle.classList.toggle('active');
    mobileMenu.classList.toggle('active');
    menuBackdrop.classList.toggle('active');
    body.classList.toggle('menu-open');
    
    menuToggle.setAttribute('aria-expanded', !isActive);
    mobileMenu.setAttribute('aria-hidden', isActive);
    
    if (!isActive) {
      // Focus first menu item when opening
      setTimeout(() => {
        const firstItem = mobileMenu.querySelector('.menu-item, .menu-dropdown-toggle');
        firstItem?.focus();
      }, 100);
    }
  }

  // Event Listeners
  menuToggle.addEventListener('click', toggleMenu);
  menuBackdrop.addEventListener('click', toggleMenu);

  // ESC key closes menu
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
      toggleMenu();
      menuToggle.focus();
    }
  });

  // Auto-close on window resize
  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      if (mobileMenu.classList.contains('active')) {
        toggleMenu();
      }
    }, 250);
  });

  // Dropdown Toggle
  const dropdownToggles = mobileMenu.querySelectorAll('.menu-dropdown-toggle');
  
  dropdownToggles.forEach(toggle => {
    toggle.addEventListener('click', (e) => {
      e.preventDefault();
      const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
      
      // Close other dropdowns
      dropdownToggles.forEach(other => {
        if (other !== toggle) {
          other.setAttribute('aria-expanded', 'false');
        }
      });
      
      toggle.setAttribute('aria-expanded', !isExpanded);
    });
  });

  // Touch Swipe to Close (swipe right)
  let touchStartX = 0;
  let touchEndX = 0;

  mobileMenu.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
  }, { passive: true });

  mobileMenu.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
  }, { passive: true });

  function handleSwipe() {
    const swipeDistance = touchEndX - touchStartX;
    // If swiped right more than 100px, close menu
    if (swipeDistance > 100 && mobileMenu.classList.contains('active')) {
      toggleMenu();
    }
  }

  // Keyboard Navigation (Tab Trapping)
  mobileMenu.addEventListener('keydown', (e) => {
    if (e.key === 'Tab' && mobileMenu.classList.contains('active')) {
      const focusableElements = mobileMenu.querySelectorAll(
        'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])'
      );
      const firstElement = focusableElements[0];
      const lastElement = focusableElements[focusableElements.length - 1];

      if (e.shiftKey && document.activeElement === firstElement) {
        e.preventDefault();
        lastElement.focus();
      } else if (!e.shiftKey && document.activeElement === lastElement) {
        e.preventDefault();
        firstElement.focus();
      }
    }
  });
})();
```

---

## 📂 DATEI 4: Service Cards HTML Template

**Verwendung:** Füge dies in `index.php` oder Homepage nach der Hero-Section ein

```html
<!-- ===== SERVICE CARDS SECTION ===== -->
<section class="services-section" id="services">
  <div class="section-header">
    <h2>Unsere Premium Services</h2>
    <p>Alles für dein perfektes Monopoly Go Erlebnis</p>
  </div>

  <div class="service-cards-grid">
    
    <!-- CARD 1: Würfel -->
    <div class="card">
      <div class="card-left">
        <svg class="icon-main" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <!-- Würfel Icon - TODO: Finales Icon erstellen -->
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
          <!-- Event Icon - TODO: Finales Icon erstellen -->
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
          <!-- Account Icon - TODO: Finales Icon erstellen -->
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
          <!-- Sticker Icon - TODO: Finales Icon erstellen -->
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
```

---

## 📂 DATEI 5: Service Cards CSS

**Verwendung:** Füge dies in `style.css` ein (am Ende oder separater Abschnitt)

```css
/* ===== SERVICE CARDS SECTION ===== */

.services-section {
  max-width: 1200px;
  margin: 0 auto;
  padding: 4rem 2rem;
}

.section-header {
  text-align: center;
  margin-bottom: 3rem;
}

.section-header h2 {
  color: #fff;
  font-size: 2.5rem;
  margin-bottom: 1rem;
  font-weight: 700;
}

.section-header p {
  color: #a0a0a0;
  font-size: 1.1rem;
  max-width: 600px;
  margin: 0 auto;
}

/* Grid Layout - kontrolliert nur Spaltenanzahl */
.service-cards-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
  gap: 2rem;
  margin-top: 2rem;
}

/* ⚠️ HINWEIS: Grid kontrolliert nur ob Cards in 1 oder 2 Spalten angezeigt werden */
/* Der Inhalt INNERHALB jeder Card bleibt IMMER horizontal (Icon links | Text rechts)! */

/* ===== CARD LAYOUT - IMMER HORIZONTAL ===== */
.services-section .card {
  display: flex;
  flex-direction: row !important; /* ⚠️ KRITISCH: IMMER horizontal - NIEMALS column! */
  gap: 20px;
  align-items: flex-start;
  background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
  border: 1px solid rgba(0, 212, 255, 0.2);
  border-radius: 12px;
  padding: 24px;
  transition: box-shadow .3s, transform .3s, border-color .3s;
  width: 100%;
}

.services-section .card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 40px rgba(0, 212, 255, 0.2);
  border-color: rgba(0, 212, 255, 0.4);
}

/* Links: Icon Container (25-30% Breite) */
.services-section .card-left {
  flex: 0 0 25%; /* Desktop: 25% Breite - FEST */
  display: flex;
  align-items: center;
  justify-content: center;
  min-width: 80px;
}

.services-section svg.icon-main {
  width: 100%;
  height: auto;
  display: block;
}

/* Rechts: Content Container (70-75% Breite) */
.services-section .card-right {
  flex: 1; /* Nimmt restliche Breite */
  display: flex;
  flex-direction: column;
  gap: 16px;
  justify-content: center;
}

/* Zeile 1: Title + Preis nebeneinander */
.services-section .name-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 12px;
}

/* Title (H3) */
.services-section .label-big {
  font-size: 20px;
  font-weight: 600;
  color: #E3E8EA;
  margin: 0 0 0.5rem 0;
  font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, sans-serif;
  position: relative;
  padding-bottom: 0.4rem;
  flex: 1; /* Title nimmt verfügbaren Platz */
}

/* Title Underline Gradient */
.services-section .label-big::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 2px;
  background: linear-gradient(
    to right,
    #00d4ff,
    transparent
  );
}

/* Preis */
.services-section .price {
  font-size: 20px;
  font-weight: 700;
  color: #00d4ff;
  white-space: nowrap;
}

/* Kategorie Badge */
.services-section .category {
  font-size: 13px;
  color: #8B95A0;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  font-weight: 600;
}

/* Beschreibung */
.services-section .description {
  font-size: 14px;
  color: #8B95A0;
  line-height: 1.6;
  margin-top: 4px;
}

/* Button Container */
.services-section .download-row {
  display: flex;
  gap: 8px;
  margin-top: 8px;
}

/* Mehr Info Button */
.services-section .dl-btn {
  padding: 12px 24px;
  border-radius: 8px;
  border: none;
  background: #00d4ff;
  color: #0f0f1e;
  cursor: pointer;
  font-weight: 700;
  font-size: 14px;
  transition: background .2s, transform .1s;
  display: flex;
  align-items: center;
  gap: 8px;
  width: 100%;
  justify-content: center;
}

.services-section .dl-btn:hover {
  background: #00b8e6;
  transform: translateY(-2px);
}

.services-section .dl-btn:active {
  transform: scale(0.98);
}

.services-section .dl-btn svg {
  width: 18px;
  height: 18px;
}

/* ===== RESPONSIVE ===== */

/* Tablets - Grid wird 1-spaltig */
@media (max-width: 1024px) {
  .service-cards-grid {
    grid-template-columns: 1fr;
  }
}

/* Mobile - IMMER HORIZONTAL (Icon links, Text rechts) */
@media (max-width: 780px) {
  .services-section .card {
    flex-direction: row !important; /* KRITISCH: IMMER horizontal */
    gap: 16px;
    padding: 20px;
  }

  .services-section .card-left {
    flex: 0 0 30%; /* Mobile: 30% Breite für Icon */
    min-width: 70px; /* Mindestbreite für Icon */
  }

  .services-section .label-big {
    font-size: 18px;
  }

  .services-section .category {
    font-size: 13px;
  }

  .services-section .description {
    font-size: 13px;
  }

  .services-section .dl-btn {
    padding: 10px 20px;
    font-size: 13px;
  }

  .section-header h2 {
    font-size: 2rem;
  }
}

/* Extra Small Mobile - Noch kleinere Screens */
@media (max-width: 480px) {
  .services-section .card {
    flex-direction: row !important; /* KRITISCH: IMMER horizontal */
    gap: 12px;
    padding: 16px;
  }

  .services-section .card-left {
    flex: 0 0 28%; /* Etwas schmaler auf sehr kleinen Screens */
    min-width: 60px;
  }

  .services-section .label-big {
    font-size: 16px;
  }

  .services-section .price {
    font-size: 18px;
  }

  .services-section .description {
    font-size: 12px;
    line-height: 1.5;
  }

  .services-section .dl-btn {
    padding: 8px 16px;
    font-size: 12px;
  }
}
```

---

## 🎯 INTEGRATIONS-ANWEISUNGEN FÜR GITHUB COPILOT

### Schritt 1: Header Integration
1. **header.php ersetzen:**
   - Kompletten Inhalt von `header-optimized.php` verwenden
   - IDs NICHT ändern: `menuToggle`, `mobileMenu`, `menuBackdrop`

2. **style.css aktualisieren:**
   - Alte Header-Styles löschen (ca. Zeile 370-620)
   - Suche und entferne: `.site-header`, `.menu-toggle`, `.mobile-menu`, `.menu-dropdown`
   - Füge kompletten Inhalt von `style-header-optimized.css` ein

3. **main.js aktualisieren:**
   - Alte Menü-Logik löschen (ca. Zeile 341-424)
   - Füge kompletten Inhalt von `main-header-optimized.js` ein
   - Behalte IIFE-Struktur `(() => { ... })();` bei wenn vorhanden

### Schritt 2: Service Cards Integration
1. **index.php (Homepage):**
   - Füge Service Cards HTML NACH der Hero/Banner-Section ein
   - Benutze `<section class="services-section">` Container

2. **style.css:**
   - Füge Service Cards CSS am Ende ein
   - ALLE Selektoren müssen `.services-section` als Parent haben
   - Layout ist IMMER horizontal (flex-direction: row !important)

### Schritt 3: Icons
- SVG-Platzhalter sind bereits vorhanden
- Finale Icons müssen noch erstellt werden
- Icon-Container ist 25-30% Breite
- Icons müssen zentriert sein

## ⚠️ KRITISCHE REGELN

### Layout-Regeln (Service Cards):
```
✅ IMMER: flex-direction: row (Icon links | Text rechts)
❌ NIEMALS: flex-direction: column
✅ Desktop: Icon 25% | Text 75%
✅ Mobile: Icon 30% | Text 70%
✅ Grid: 2 Spalten → 1 Spalte (responsive)
```

### CSS-Isolation:
```css
/* ✅ RICHTIG - Mit Parent-Scoping */
.services-section .card { }
.services-section .dl-btn { }

/* ❌ FALSCH - Zu generisch */
.card { }
.dl-btn { }
```

### JavaScript:
```javascript
// ✅ RICHTIG - Event Listener Management
menuToggle.removeEventListener('click', toggleMenu);
menuToggle.addEventListener('click', toggleMenu);

// ❌ FALSCH - Mehrfache Listener
menuToggle.addEventListener('click', toggleMenu); // mehrfach = Problem
```

### Z-Index Hierarchie:
```
Header: 1000
Backdrop: 999
Mobile Menu: 1001
```

## ✅ Validierung nach Integration

- [ ] Header-Menü öffnet/schließt von rechts
- [ ] Backdrop mit Blur-Effekt funktioniert
- [ ] Hamburger → X Animation funktioniert
- [ ] ESC-Taste schließt Menü
- [ ] Click Outside schließt Menü
- [ ] Swipe-Geste funktioniert auf Mobile
- [ ] Service Cards Grid: 2 Spalten Desktop → 1 Spalte Mobile
- [ ] Card-Layout IMMER horizontal (Icon | Text)
- [ ] Hover-Effekte funktionieren
- [ ] Keine CSS-Konflikte mit anderen Elementen
- [ ] Keine JavaScript-Fehler in Console

---

**🎉 Nach erfolgreicher Integration sollte alles nahtlos funktionieren ohne andere Website-Elemente zu beeinflussen!**
