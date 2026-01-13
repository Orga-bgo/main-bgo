# GitHub Copilot Instructions for babixGO.de

This repository contains the babixGO.de website - a static HTML/CSS/JavaScript project with server-side PHP partials.

## Critical Documents

Before making any changes, **read these files**:

- **Agents.md** - Mandatory rules, structure, and workflows for this project
- **DESIGN_SYSTEM.md** - Brand guide, design tokens, component styles, and governance
- **README.md** - Project overview and orientation

## Project Overview

- **Technology**: Pure HTML, CSS, JavaScript with server-side PHP partials
- **No Build Tools**: No npm, webpack, bundlers, or compilation steps
- **Deployment**: Direct FTP/SFTP upload to Strato webhosting
- **Architecture**: Static website with reusable content via PHP partials

## Core Principles

1. **No Duplicates** - Use central locations for shared content
2. **Maintain Structure** - Respect existing folder organization
3. **Simple Over Clever** - Prefer straightforward, maintainable solutions
4. **Central Management** - Changes to navigation, tracking, or meta happen in one place

## File Structure Rules

### Production Files
- Production pages are `.php` files in root or content folders
- Templates in `/templates/` are for copying only (not for linking or production use)

### Non-Production Folders (DO NOT MODIFY)
- `/weg/` - Archive of old files (read-only, no references, no migrations)
- `/add/` - Future potential files (no production references; move to correct location when used, then remove from `/add/`)
- `/examples/` - Reference and examples only
- `/to-do/` - Ideas, tasks, planning only

### Assets Structure
- **CSS**: `assets/css/style.css` (single source of truth)
- **JS**: `assets/js/main.js` (global scripts)
- **Icons**: `assets/icons/` (all SVG icons)
- **No additional global CSS or JS files allowed**

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

## HTML Standards

- **Valid, semantic HTML**
- **Exactly ONE H1 per page**
- **Images always have `alt` attributes**
- **Required meta per page**: title, description, canonical
- **Proper use of links vs buttons** (semantic correctness)

### Heading Hierarchy Rules

| Element | Location | Icon | Wrapper Class |
|---------|----------|------|---------------|
| **H1** | Hero section (first section-card) | No | `.welcome-title` |
| **H2** | Section titles (outside content box) | Yes (always) | `.section-header` |
| **H3** | Inside box/card | No (gradient underline via `::after`) | In `.content-card` or `.section-card` |

**H2 Structure Pattern:**
```html
<div class="section-header">
  <h2><img src="/assets/icons/[icon].svg" class="icon" alt="[Description]">[Title]</h2>
</div>
```

**Exceptions:**
- 404.php uses `.error-message` instead of `.welcome-title`
- Legal pages (impressum, datenschutz) may have H2 without icons

## Design System

- **Single Source of Truth**: `assets/css/style.css`
- **NO inline styles** in production templates (only if technically mandatory)
- **Use tokens instead of hardcoded values** (colors, spacing, typography)
- **Design basis**: Material Design 3 Dark Medium Contrast
- **Fonts**: Inter (400, 500, 600) for body, Montserrat (700) for headings

### CSS Variables (Examples)

**Typography:**
```css
--font-size-h1: 2rem;
--font-size-h2: 1.5rem;
--font-size-h3: 1.2rem;
--font-size-body: 1rem;
--font-size-small: 0.9rem;
--font-size-xs: 0.8rem;
```

**Colors:**
- Use Material Design tokens like `var(--md-primary)`, `var(--md-secondary)`, `var(--text)`, `var(--muted)`
- Background: `var(--md-background)`, `var(--md-surface)`
- Surface containers: `var(--md-surface-container-low)`, `var(--md-surface-container)`, `var(--md-surface-container-high)`

## Accessibility Requirements

- Do not remove focus styles
- Maintain logical heading hierarchy
- Forms must have labels
- Keyboard navigation must work

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

## Development Workflow

1. Read **Agents.md** before making changes
2. Respect the mandatory partial inclusion order
3. Use existing partials - do not duplicate content
4. Test with local PHP server: `php -S localhost:8000`
5. Validate HTML, check mobile view, test in browser
6. Ensure no console errors before deployment

## Important Notes

- This is a **static website** - no backend framework, no build process
- Deployment is manual via FTP/SFTP
- All tracking must go through consent management
- Database credentials (if needed) come from environment variables
- Never commit secrets or sensitive data

## Design Tokens and Components

Refer to **DESIGN_SYSTEM.md** for:
- Complete color token system
- Typography scales and usage
- Component patterns (buttons, cards, forms, etc.)
- Spacing and layout tokens
- Shadow and elevation system
- Icon usage guidelines

## Recent Major Changes (Current as of 2026-01-12)

- Global zoom scale system introduced (`--zoom-scale`)
- Mobile menu changed to push-down behavior
- Icons moved from inline SVG to `assets/icons/` directory
- Inline scripts removed from production templates (moved to `assets/js/main.js`)
- Material Symbols icon system for H2 headings (30+ icons, 7 color categories)
- FAQ Schema.org markup added
- Critical CSS inline implementation
- Resource hints (dns-prefetch, preconnect) added

---

**Remember**: Central locations. No duplicates. Respect structure. Read Agents.md first.
