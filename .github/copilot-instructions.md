# GitHub Copilot Instructions for babixGO.de

## Repository Overview

**babixGO.de** - Static website for Monopoly GO services (stickers, events, accounts). Pure HTML/CSS/JavaScript with PHP partials.

**Key Facts:**
- **Size:** ~255MB, 171 files (32 PHP files)
- **Languages:** PHP 8.3+, HTML, CSS (~3,850 lines), JavaScript (~835 lines)
- **Type:** Static website with server-side PHP includes
- **NO build process:** No npm, webpack, bundlers, or compilation
- **Runtime:** PHP 8.3+ (uses PHP 8.4 in Replit environment)

## Critical Documents (READ FIRST)

Before ANY changes, read in this order:
1. **Agents.md** - Binding rules, structure, workflows (MANDATORY - violations = PR rejection)
2. **DESIGN_SYSTEM.md** - Brand guide, design tokens, component styles
3. **README.md** - Project overview
4. **TESTING_GUIDE.md** - Manual testing procedures for security/SEO features

## Build, Test & Validation

### No Installation Required
**This project has ZERO dependencies.** No `npm install`, `composer install`, or build steps needed. Files are directly deployable.

### Local Development Server
```bash
# Always use PHP built-in server for testing
cd /home/runner/work/bgo/bgo
php -S localhost:8000

# Access in browser at: http://localhost:8000
# Test other ports if needed: php -S localhost:8001
```
**Expected:** Server starts immediately. Pages load with no errors. Stops with Ctrl+C or `kill <PID>`.

### PHP Syntax Validation (REQUIRED before commit)
```bash
# Check single file
php -l filename.php
# Expected output: "No syntax errors detected in filename.php"

# Check all PHP files in repository
find . -name "*.php" -exec php -l {} \; 2>&1 | grep -v "No syntax errors"
# Expected: Empty output (no syntax errors)
```
**ALWAYS run syntax check before committing PHP changes.**

### Manual Testing (Required)
1. **Start local PHP server** (see above)
2. **Navigate to changed pages** in browser
3. **Check browser console** - Must have NO JavaScript errors
4. **Test mobile view** - Resize browser or use dev tools
5. **Verify partials loaded** - View page source, check all required partials present
6. **Test functionality** - Click links, submit forms (if changed)

### GitHub Actions Deployment (Automated)
**Workflow:** `.github/workflows/main.yml`
- **Trigger:** Push to `main` branch or manual dispatch
- **Steps:** Checkout → Create .env from secrets → SFTP upload to Strato
- **Excludes:** `.git*`, `node_modules` (via rsync)
- **NO build steps** - Direct file deployment
- **Secrets required:** DB credentials, SMTP config, SFTP credentials

### Environment Variables (Contact Form Only)
```bash
BABIXGO_DB_HOST    # Database host
BABIXGO_DB_NAME    # Database name  
BABIXGO_DB_USER    # Database username
BABIXGO_DB_PASS    # Database password
```
Set via GitHub Secrets for deployment. Contact backend in `kontakt/contact.php` and `kontakt/admin/contacts.php` uses these.

## Core Principles

1. **No Duplicates** - Use central locations for shared content
2. **Maintain Structure** - Respect existing folder organization
3. **Simple Over Clever** - Prefer straightforward, maintainable solutions
4. **Central Management** - Changes to navigation, tracking, or meta happen in one place

## Project Structure & Architecture

```
/
├── .github/
│   └── workflows/main.yml    # SFTP deployment (triggered on push to main)
├── partials/                  # PHP partials (MUST use absolute paths)
│   ├── head-meta.php          # Common meta tags (charset, viewport, robots, OG base)
│   ├── head-links.php         # CSS, favicons, fonts (NO meta, NO scripts)
│   ├── critical-css.php       # Inline critical CSS for PageSpeed
│   ├── tracking.php           # ALL tracking code (Google/GA/FB Pixel)
│   ├── cookie-banner.php      # Consent management
│   ├── header.php             # Navigation
│   ├── footer.php             # Footer layout
│   ├── footer-scripts.php     # Global JS (assets/js/main.js with defer)
│   ├── csrf.php               # CSRF protection for admin forms
│   ├── brute-force-protection.php  # Login rate limiting
│   ├── structured-data.php    # Schema.org JSON-LD loader
│   └── version.php            # CSS cache busting version (BABIXGO_VERSION)
├── assets/
│   ├── css/style.css          # SINGLE source of truth (3,852 lines)
│   ├── js/main.js             # Global JavaScript (835 lines)
│   ├── js/structured-data/    # Schema.org JSON files (FAQ, HowTo, Organization)
│   ├── icons/                 # SVG icons (legacy social, notice-boxes, stats)
│   ├── material-symbols/      # Material Symbols for H2 headings (30+ icons, 48×48)
│   ├── img/                   # Images
│   └── fonts/                 # Web fonts
├── includes/                  # PHP helper functions
│   └── icon-helper.php        # h2_with_icon() function for Material Symbols
├── kontakt/
│   ├── index.php              # Contact form page
│   ├── contact.php            # Form backend (requires ENV vars)
│   ├── admin/contacts.php     # Admin panel (CSRF + brute-force protected)
│   └── setup.sql              # Database schema
├── templates/                 # Templates (NOT production, for copying only)
├── add/                       # Future/planned files (NOT production)
├── weg/                       # Archive (read-only, NO changes, NO references)
├── examples/                  # Reference only
├── to-do/                     # Planning/ideas only
├── .htaccess                  # Apache config (redirects, caching, security headers)
├── index.php                  # Main entry point
├── 404.php                    # Custom 404 page
├── robots.txt                 # SEO directives (blocks AI crawlers)
├── sitemap.xml                # SEO sitemap
└── *.php                      # Production pages in root and content folders
```

### Non-Production Folders (DO NOT MODIFY)
- **`/weg/`** - Archive of old files (read-only, no references, no migrations)
- **`/add/`** - Future files (no production references; move to correct location when used, then remove from `/add/`)
- **`/examples/`** - Reference and examples only
- **`/to-do/`** - Ideas, tasks, planning only

## PHP Partials (MANDATORY)

All partials are in `/partials/` and must be included using:

```php
<?php require $_SERVER['DOCUMENT_ROOT'] . '/partials/FILENAME.php'; ?>
```

**Never use**:
- Relative paths
- `__DIR__`
- Short tags

### Required Inclusion Order

**In `<head>`:**
1. `head-meta.php` (common meta basis)
2. Page-specific: `<title>`, `<meta name="description">`, `<link rel="canonical">`
3. `head-links.php` (CSS, favicons, fonts)

**After `<body>`:**
4. `tracking.php` (all Google/GA/FB Pixel)
5. `cookie-banner.php` (consent management)
6. `header.php` (navigation)

**Before `</body>`:**
7. `footer.php` (layout, links)
8. `footer-scripts.php` (global scripts)

### Partial-Specific Rules

- **head-meta.php**: Common meta tags only (charset, viewport, robots, OG/Twitter base) - NO page-specific content
- **head-links.php**: CSS, favicons, fonts, preload/preconnect - NO meta tags, NO scripts
- **tracking.php**: ALL tracking code (Google/GA/FB) - NO tracking elsewhere
- **cookie-banner.php**: Consent control for tracking
- **footer-scripts.php**: Global scripts only (`assets/js/main.js` with defer) - NO tracking
- **header.php / footer.php**: Layout and navigation only - NO meta, NO scripts, NO tracking

## HTML Standards & Accessibility

### Required Elements (Every Page)
```html
<!DOCTYPE html>
<html lang="de">
<head>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/partials/head-meta.php'; ?>
  
  <!-- Page-specific meta (REQUIRED) -->
  <title>Unique Page Title – babixGO</title>
  <meta name="description" content="150-160 character description" />
  <link rel="canonical" href="https://babixgo.de/page-url/" />
  
  <!-- Open Graph (recommended) -->
  <meta property="og:title" content="..." />
  <meta property="og:description" content="..." />
  <meta property="og:url" content="..." />
  
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/partials/head-links.php'; ?>
</head>
<body>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/partials/tracking.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/partials/cookie-banner.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>
  
  <main id="main-content">
    <!-- Page content with exactly ONE H1 -->
  </main>
  
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
  <?php require $_SERVER['DOCUMENT_ROOT'] . '/partials/footer-scripts.php'; ?>
</body>
</html>
```

### Heading Hierarchy (STRICT)

| Element | Location | Icon | Wrapper Class | Example |
|---------|----------|------|---------------|---------|
| **H1** | Hero section (first section-card) | No | `.welcome-title` | Main page title |
| **H2** | Section titles (outside content box) | Yes (always) | `.section-header` | Section headings |
| **H3** | Inside box/card | No (gradient underline) | In `.content-card` | Subsection headings |

**H2 Structure Pattern (with Material Symbols icon):**
```html
<div class="section-header">
  <h2><img src="/assets/material-symbols/[icon].svg" class="icon" alt="[Description]">[Title]</h2>
</div>
```
**Icons:** 48×48 SVG in `/assets/material-symbols/` (30+ icons available)

**H3 Gradient Underline (automatic via CSS):**
```html
<div class="content-card">
  <h3>Subsection Title</h3>
  <!-- Gradient underline added via h3::after pseudo-element -->
  <p>Content...</p>
</div>
```

**Exceptions:**
- `404.php` uses `.error-message` instead of `.welcome-title`
- Legal pages (impressum, datenschutz) may have H2 without icons

### Accessibility Requirements
- **Focus styles:** Never remove (required for keyboard navigation)
- **Alt text:** All images must have descriptive alt (never empty `alt=""`)
- **Form labels:** All inputs must have associated `<label>` elements
- **Heading hierarchy:** No skipped levels (H1 → H2 → H3, never H1 → H3)
- **Semantic HTML:** Use correct elements (`<button>` for actions, `<a>` for links)

### Image Optimization (CLS Prevention)
All images MUST have width and height attributes:
```html
<img src="/path/to/image.png" 
     alt="Descriptive text" 
     width="238" 
     height="70"
     loading="lazy">
```
Use `identify <image>` (ImageMagick) to get intrinsic dimensions.

## Design System & Coding Standards

### CSS - Single Source of Truth
- **File:** `assets/css/style.css` (3,852 lines)
- **NO additional global CSS files allowed**
- **NO inline styles** in production (only if technically mandatory)
- **Theme:** Material Design 3 Dark Medium Contrast

### Design Tokens (Always Use These)

**Typography Tokens:**
```css
--font-size-h1: 2rem;        /* Main page heading */
--font-size-h2: 1.5rem;      /* Section headings */
--font-size-h3: 1.2rem;      /* Subsection headings */
--font-size-body: 1rem;      /* Body text */
--font-size-small: 0.9rem;   /* Small text */
--font-size-xs: 0.8rem;      /* Extra small text */
```

**Color Tokens:**
```css
--md-primary: rgb(146 206 245);           /* Primary brand color */
--md-secondary: rgb(227 214 255);         /* Secondary brand color */
--md-background: rgb(16 20 23);           /* Page background */
--md-surface: rgb(16 20 23);              /* Surface background */
--md-surface-container: rgb(36 40 44);    /* Card background */
--text: rgb(255 255 255);                 /* Main text */
--muted: rgb(183 194 208);                /* Muted text */
```

**Spacing Tokens:**
```css
--zoom-scale: 0.92;                       /* Global scale factor */
--space-section: calc(32px * var(--zoom-scale));
--space-card: calc(16px * var(--zoom-scale));
--padding-card: calc(20px * var(--zoom-scale));
```

### Fonts
- **Body:** Inter (weights 400, 500, 600)
- **Headings:** Montserrat (weight 700)
- **Loaded in:** `partials/head-links.php`

## Security Features

### CSRF Protection (Admin Forms)
**Location:** `partials/csrf.php`
**Usage in forms:**
```php
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/partials/csrf.php'; ?>
<form method="POST">
    <?php csrf_field(); ?>  <!-- Generates hidden token field -->
    <!-- form fields -->
</form>
```
**Validation:**
```php
if (!csrf_validate_token($_POST['csrf_token'])) {
    die('Invalid CSRF token');
}
```
- Tokens expire after 1 hour
- Uses timing-safe comparison
- Required on all admin forms (`kontakt/admin/`)

### Brute-Force Protection (Admin Login)
**Location:** `partials/brute-force-protection.php`
**Configuration:**
- Max attempts: 5
- Lockout duration: 15 minutes
- IP-based tracking in `/tmp/login_attempts_*`

**Usage:**
```php
// Check rate limit
$rateCheck = login_check_rate_limit($identifier);
if (!$rateCheck['allowed']) {
    // Show lockout message
}

// Record failed attempt
login_record_failed_attempt($identifier);

// Clear on success
login_clear_attempts($identifier);
```

### Content Security Policy (CSP)
- **NO inline scripts** allowed (CSP violation)
- **NO inline styles** in production (except if technically mandatory)
- All JavaScript in `assets/js/main.js`
- All styles in `assets/css/style.css`

### Other Security Measures
- `.htaccess` security headers (X-Content-Type-Options, X-Frame-Options, Referrer-Policy)
- Database credentials from environment variables (never hardcoded)
- Session regeneration on login
- File locking for concurrent request handling

## Quality Assurance Before Deployment

- No broken links (404 errors)
- Test mobile view
- Browser console should have no errors
- Test tracking and consent functionality

## Coding Standards

- Follow existing code style and patterns
- Use PHP for server-side includes only
- Keep JavaScript in `assets/js/main.js` or structured data files
- No CSP violations (no inline scripts with `unsafe-inline` policy)
- Icons should be in `assets/icons/` directory, not inline SVG in templates

## Changes and Maintenance

- Structure or rule changes → **update Agents.md**
- Production adoption from `/add/` → remove file from `/add/`
- Old files → move to `/weg/` (do not delete)
- Visual/design changes → document in **DESIGN_SYSTEM.md**
- New styles → add to `assets/css/style.css` centrally

## Development Workflow & Validation

### Before Making Changes
1. **Read Agents.md** - Understand binding rules
2. **Identify files to change** - Use structure above to locate files
3. **Review existing patterns** - Follow established code style

### Making Changes
1. **Edit files** following existing patterns
2. **Use design tokens** from `style.css` (never hardcode values)
3. **Maintain partial order** if editing page structure
4. **Test PHP syntax:** `php -l filename.php` after each change

### Validation Checklist (REQUIRED before commit)
```bash
# 1. PHP Syntax (CRITICAL - must pass)
find . -name "*.php" -exec php -l {} \; 2>&1 | grep -v "No syntax errors"

# 2. Start local server
php -S localhost:8000 &
SERVER_PID=$!

# 3. Manual browser tests:
# - Navigate to changed pages
# - Check browser console (F12) - NO errors
# - Test mobile view (dev tools or resize)
# - Verify all partials loaded (view source)
# - Test links and functionality

# 4. Stop server
kill $SERVER_PID

# 5. Pre-commit checks:
# - NO inline styles in production PHP files (except if technically mandatory)
# - NO inline scripts (CSP violation)
# - Images have descriptive alt text (never empty)
# - Exactly ONE H1 per page
# - Meta tags complete (title, description, canonical)
# - Following partial inclusion order
```

### Common Validation Errors & Fixes

**PHP Syntax Error:**
```bash
# Error: Parse error: syntax error, unexpected...
# Fix: Check for missing semicolons, brackets, quotes
php -l filename.php  # Shows exact line number
```

**Page Not Loading (404):**
```bash
# Error: 404 when accessing page
# Fix: Check .htaccess rewrites, verify file exists
# Directory requests auto-serve index.php if present
```

**JavaScript Console Errors:**
```
# Error: Uncaught ReferenceError, TypeError, etc.
# Fix: Check assets/js/main.js, ensure script loads with defer
# Verify no inline scripts (CSP violation)
```

**Missing Partials:**
```
# Error: Warning: require... failed to open stream
# Fix: Verify path uses $_SERVER['DOCUMENT_ROOT'] absolute path
# Check partial exists in /partials/ directory
```

## Common Pitfalls & How to Avoid Them

### CRITICAL MISTAKES (Will Break Site/PR)

1. **Using relative paths for partials**
   ```php
   ❌ require '../partials/header.php';
   ❌ require __DIR__ . '/partials/header.php';
   ✅ require $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php';
   ```

2. **Wrong partial inclusion order**
   ```php
   ❌ footer-scripts.php before footer.php
   ❌ tracking.php in <head> instead of after <body>
   ✅ Follow strict order (see PHP Partials section)
   ```

3. **Inline styles/scripts in production**
   ```html
   ❌ <div style="color: red;">
   ❌ <script>console.log('test');</script>
   ✅ Use classes from style.css
   ✅ Put scripts in assets/js/main.js
   ```

4. **Modifying archived files**
   ```bash
   ❌ Editing files in /weg/
   ❌ Referencing /weg/ files in production
   ✅ Leave /weg/ untouched (read-only archive)
   ```

5. **Creating additional global CSS/JS**
   ```bash
   ❌ Creating new-styles.css
   ❌ Creating extra-scripts.js
   ✅ Add to existing style.css or main.js
   ```

6. **Missing or duplicate H1 tags**
   ```html
   ❌ <h2>Page Title</h2> <!-- No H1 -->
   ❌ <h1>Title 1</h1><h1>Title 2</h1> <!-- Two H1s -->
   ✅ Exactly ONE <h1> per page
   ```

7. **Empty alt attributes**
   ```html
   ❌ <img src="icon.svg" alt="">
   ✅ <img src="icon.svg" alt="Descriptive text">
   ```

8. **Hardcoded values instead of tokens**
   ```css
   ❌ color: #92cef5;
   ❌ font-size: 16px;
   ✅ color: var(--md-primary);
   ✅ font-size: var(--font-size-body);
   ```

### Files That Should Never Be Modified
- Any file in `/weg/` (archive)
- Files in `/add/` unless moving to production (then remove from `/add/`)
- `.git/` directory
- `node_modules/` (doesn't exist, but if created, ignore it)

### Before Committing - Final Check
```bash
# ALL of these must pass:
□ php -l on all changed PHP files shows "No syntax errors"
□ Local server starts without errors
□ Changed pages load in browser without console errors
□ Mobile view tested and works
□ No inline styles/scripts added
□ All images have alt text
□ Exactly one H1 per page
□ Partials included in correct order
□ No changes to /weg/, /add/, /examples/, /to-do/
```

## Key Files Reference

### Root Directory
```
.htaccess              # Apache: redirects, caching, compression, security headers
.gitignore             # Excludes: node_modules, dist, vendor, *.log, tmp/
.php-preview-router.php # PHP router for preview environments
404.php                # Custom 404 error page (uses .error-message for H1)
index.php              # Homepage/main entry point
robots.txt             # SEO directives (blocks AI crawlers: GPTBot, CCBot, etc.)
sitemap.xml            # SEO sitemap with lastmod dates
```

### Configuration Files
- **`.htaccess`:** URL rewrites (clean URLs), compression (gzip), browser caching, security headers
- **`partials/version.php`:** Defines `BABIXGO_VERSION` constant for CSS cache busting
- **`kontakt/setup.sql`:** Database schema for contact form (contacts, admin_users tables)

### Documentation Files (Read for Context)
```
Agents.md                      # Binding rules and structure (MANDATORY)
DESIGN_SYSTEM.md               # Brand guide, tokens, components (45KB)
README.md                      # Project overview
TESTING_GUIDE.md               # Manual testing procedures
IMPLEMENTATION_SUMMARY.md      # Recent changes summary
SECURITY_SEO_IMPROVEMENTS.md   # Security feature documentation
WEBSITE-AUDIT-REPORT.md        # Website audit findings
H2_UEBERSCHRIFTEN.md          # List of all H2 headings
website-analyse.md            # Website analysis (2026-01-04)
replit.md                     # Replit environment setup
```

### Assets
```
assets/css/style.css           # Main stylesheet (3,852 lines) - SINGLE SOURCE OF TRUTH
assets/js/main.js              # Global JavaScript (835 lines)
assets/js/structured-data/     # Schema.org JSON-LD files:
  - organization.json          # Organization schema
  - website.json               # Website schema  
  - faq-partnerevents.json     # FAQ schema for partner events
  - faq-wuerfel.json           # FAQ schema for dice
  - howto-freundschaftsbalken.json # HowTo schema
assets/icons/                  # Legacy SVG icons (social, notice-boxes, stats)
assets/material-symbols/       # Material Symbols for H2 headings (30+ icons, 48×48)
```

## Changes and Maintenance

### When to Update Documentation
- **Structure/rule changes** → Update `Agents.md`
- **Visual/design changes** → Update `DESIGN_SYSTEM.md`
- **New styles** → Add to `assets/css/style.css` centrally
- **Production adoption from `/add/`** → Remove file from `/add/` after moving
- **Old files** → Move to `/weg/` (do not delete)

### Version Control
- **CSS cache busting:** Update version in `partials/version.php` when changing `style.css`
- **Deployment:** Automatic via GitHub Actions on push to `main`
- **NO force push:** Avoid `git reset --hard` or `git rebase` (breaks deployment)

## Trust These Instructions

This file was created by:
1. Reading all documentation files
2. Testing PHP development server
3. Validating all 32 PHP files (syntax check passed)
4. Analyzing project structure and dependencies
5. Reviewing GitHub Actions workflow
6. Testing build and deployment process

**Only search for additional information if:**
- These instructions are incomplete for your specific task
- You discover an error in these instructions
- You need details about code not covered here

**For structural/architectural questions, always consult `Agents.md` first.**

---

**Last Updated:** 2026-01-14  
**Validated By:** Automated repository analysis and manual testing
