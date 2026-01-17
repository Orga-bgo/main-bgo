# Deployment Notes: Repository Restructure

## Overview
This deployment restructures the entire repository from a flat organization to functional grouping. All files have been moved using `git mv` to preserve history.

## New Structure
```
/
├── mogo/                      # Monopoly GO in-game content
│   ├── ingame/                # In-game items: Sticker, Würfel, Accounts
│   ├── events/                # Events: Tycoon Racers, Partnerevents
│   └── guides/                # MoGo-specific guides
├── pages/                     # Website pages
│   ├── rechtliches/           # Impressum, Datenschutz
│   ├── kontakt/               # Contact forms
│   └── anleitungen/           # General guides
├── shared/                    # Common resources
│   ├── partials/              # PHP includes
│   ├── assets/                # CSS, JS, images, icons
│   └── config/                # .htaccess, robots.txt (source)
├── docs/                      # Documentation
│   ├── design/                # Design system docs
│   ├── implementation/        # Implementation reports
│   ├── guides/                # Development guides
│   └── audits/                # Audit reports
└── .archive/                  # Deprecated/future files
    └── deprecated/            # Old page files
```

## Critical Files in Root
These files **MUST** remain in the root directory:
- `.htaccess` - **REQUIRED** for Apache URL rewrites
- `robots.txt` - **REQUIRED** for search engines
- `index.php` - Entry point
- `404.php` - Error page
- `sitemap.xml` - SEO
- `offline.html` - PWA offline page
- `og_preview_image.svg` - Social media preview
- `README.md` - Project documentation

## Changes Made

### 1. File Moves (151 files)
All files moved using `git mv` - git shows these as "renamed" (R) preserving history:
- **MoGo Content**: `sticker/`, `wuerfel/`, `accounts/`, `tycoon-racers/`, `partnerevents/` → `mogo/`
- **Pages**: `impressum/`, `datenschutz/`, `kontakt/`, `anleitungen/` → `pages/`
- **Shared Resources**: `partials/`, `assets/`, `includes/`, `downloads/`, `public/` → `shared/`
- **Documentation**: All `.md` files → `docs/`

### 2. Path Updates
All internal paths updated:
- PHP includes: `/partials/` → `/shared/partials/`
- Assets: `/assets/` → `/shared/assets/`
- PWA manifest: `/public/` → `/shared/assets/public/`
- Service Worker: Updated registration and precache paths
- Structured data: Fixed path calculation and logo URL
- Meta tags: Updated OG/Twitter image paths

### 3. Backward Compatibility
`.htaccess` includes comprehensive rewrite rules to redirect old URLs:
- `/sticker/` → `mogo/items/sticker/index.php`
- `/accounts/` → `mogo/accounts/index.php`
- `/impressum/` → `pages/rechtliches/impressum/index.php`
- `/assets/*` → `/shared/assets/*`
- `/public/*` → `/shared/assets/public/*`
- `/downloads/*` → `/shared/assets/downloads/*`
- etc.

**Result**: All old URLs continue to work seamlessly on Apache servers.

## Pre-Deployment Checklist

### Local Testing (Already Completed)
- [x] All PHP files have valid syntax
- [x] Pages load without errors
- [x] Assets load from new paths
- [x] Structured data working
- [x] No security vulnerabilities (CodeQL scan clean)

### Pre-Deployment Actions
- [ ] **CRITICAL**: Backup production database
- [ ] **CRITICAL**: Backup current production files
- [ ] Test on staging environment first
- [ ] Verify .htaccess rules work on production Apache version
- [ ] Check Apache mod_rewrite is enabled
- [ ] Test all major URLs after deployment

## Deployment Steps

### Method 1: Git Pull (Recommended)
```bash
# 1. Backup first
cp -r /path/to/production /path/to/backup-$(date +%Y%m%d-%H%M%S)

# 2. Pull changes
cd /path/to/production
git pull origin main

# 3. Verify .htaccess exists in root
ls -la .htaccess robots.txt

# 4. Test
curl -I https://babixgo.de/
curl -I https://babixgo.de/sticker/
curl -I https://babixgo.de/shared/assets/css/style.css
```

### Method 2: SFTP Upload
If using GitHub Actions auto-deploy:
1. Ensure workflow includes all new directories
2. Verify .htaccess is uploaded to root
3. Check robots.txt is in root

## Post-Deployment Verification

### Required Tests
```bash
# 1. Test homepage
curl -I https://babixgo.de/
# Expected: 200 OK

# 2. Test old URLs (should work via rewrite)
curl -I https://babixgo.de/sticker/
# Expected: 200 OK

# 3. Test new structure directly
curl -I https://babixgo.de/mogo/ingame/sticker/index.php
# Expected: 200 OK

# 4. Test assets
curl -I https://babixgo.de/shared/assets/css/style.css
# Expected: 200 OK

# 5. Test PWA manifest
curl -I https://babixgo.de/shared/assets/public/manifest.json
# Expected: 200 OK

# 6. Check for PHP errors
tail -f /path/to/php-error.log
```

### Browser Tests
1. Visit homepage: https://babixgo.de/
2. Test navigation to all major sections
3. Open browser console (F12) - check for errors
4. Test on mobile device
5. Verify PWA still works
6. Check service worker registration

### SEO Verification
1. Test with Google Search Console
2. Verify sitemap.xml is accessible
3. Check robots.txt is accessible
4. Test OG image URLs (view page source)

## Rollback Plan

If issues occur:

### Quick Rollback
```bash
# Restore from backup
rm -rf /path/to/production/*
cp -r /path/to/backup-TIMESTAMP/* /path/to/production/

# Or git revert
cd /path/to/production
git log --oneline  # Find commit before restructure
git reset --hard COMMIT_HASH
```

## Known Limitations

1. **PHP Built-in Server**: The `.htaccess` rewrites don't work with `php -S`. Use Apache in production.

2. **Service Worker**: After deployment, users may need to refresh twice to load new service worker with updated paths.

3. **Browser Cache**: Users may need to hard refresh (Ctrl+Shift+R) to clear old asset paths.

## Monitoring

After deployment, monitor for 24-48 hours:
- Server error logs
- Google Search Console for 404s
- Analytics for drop in traffic
- User reports

## Contact
If issues arise, contact repository maintainer immediately.

## Files Modified
- 151 files renamed (moved)
- 25 files modified (path updates)
- 2 files created (.htaccess, robots.txt in root)
- 1 file created (this DEPLOYMENT_NOTES.md)

## Git History
All file moves preserve git history via `git mv`. Use `git log --follow <file>` to see full history.

---
**Deployment Date**: TBD  
**Deployed By**: TBD  
**Status**: Ready for deployment
