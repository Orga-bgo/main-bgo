# Testing Guide for Security and SEO Improvements

This guide provides step-by-step instructions for testing all implemented security and SEO improvements.

## Prerequisites

- Admin account credentials for `/kontakt/admin/contacts.php`
- Browser with developer tools (Chrome, Firefox, or Edge recommended)
- Access to social media sharing debuggers (optional)

## 1. CSRF Protection Testing

### Test 1: Form Submission Without Token
**Goal**: Verify forms reject submissions without valid CSRF token

1. Navigate to `/kontakt/admin/contacts.php`
2. Log out if currently logged in
3. Open browser developer tools (F12)
4. Open the login form in the HTML inspector
5. Delete the hidden CSRF token field
6. Try to submit the form
7. **Expected**: Error message "Ungültige Anfrage. Bitte versuche es erneut."

### Test 2: Normal Form Submission
**Goal**: Verify forms work correctly with valid token

1. Refresh the login page
2. Enter valid credentials
3. Submit the form
4. **Expected**: Successful login and redirect to contacts page

### Test 3: Status Update with CSRF
**Goal**: Verify status updates work with CSRF protection

1. From the contacts admin page, select any contact
2. Change the status dropdown
3. Click "Status aktualisieren"
4. **Expected**: Status updates successfully and page refreshes

## 2. Brute-Force Protection Testing

### Test 1: Multiple Failed Login Attempts
**Goal**: Verify lockout after 5 failed attempts

1. Navigate to `/kontakt/admin/contacts.php`
2. Log out if currently logged in
3. Try to log in with **wrong password** 5 times
4. Note the decreasing "remaining attempts" message
5. On the 5th attempt, verify you see lockout message
6. **Expected**: "Zu viele fehlgeschlagene Anmeldeversuche. Konto gesperrt für X Minute(n)."

### Test 2: Lockout Duration
**Goal**: Verify lockout lasts for configured time (15 minutes)

1. After being locked out, wait a few seconds
2. Try to log in again (even with correct password)
3. **Expected**: Still see lockout message
4. **Note**: Full lockout is 15 minutes. For quick testing, you can clear the temp files:
   ```bash
   rm /tmp/login_attempts_*
   ```

### Test 3: Successful Login Resets Counter
**Goal**: Verify failed attempts clear on success

1. Clear lockout (wait 15 min or clear temp files)
2. Make 2 failed login attempts
3. Then log in with **correct credentials**
4. Log out
5. Make 1 failed attempt
6. **Expected**: Shows "Noch 4 Versuch(e) übrig" (counter was reset)

## 3. Duplicate Robots Meta Tags Testing

### Test 1: Check for Duplicates
**Goal**: Verify no pages have duplicate robots tags

1. Visit each of these pages:
   - `/` (index)
   - `/accounts/`
   - `/downloads/`
   - `/404.php`
   - `/sticker/`
   - `/partnerevents/`

2. For each page:
   - View page source (Ctrl+U or Cmd+U)
   - Search for "robots" (Ctrl+F or Cmd+F)
   - Count occurrences of `<meta name="robots"`

3. **Expected**: Exactly ONE robots meta tag per page

### Test 2: Verify Correct Values
**Goal**: Check robots tag values are appropriate

- **404 pages**: Should have `content="noindex, nofollow"`
- **All other pages**: Should have `content="index, follow"`

## 4. H1 Tags Testing

### Test 1: Check H1 Presence
**Goal**: Verify all pages have exactly one H1 tag

Visit each page and check for H1:
- `/anleitungen/` - Should have "Anleitungen" as H1
- `/datenschutz_page.php` - Should have "Datenschutzerklärung" as H1  
- `/impressum_page.php` - Should have "Impressum" as H1
- `/` - Should have "Willkommen bei babixGO" as H1

Use browser dev tools or view source to verify.

### Test 2: Heading Hierarchy
**Goal**: Verify proper heading order (H1 -> H2 -> H3)

1. Install browser extension like "HeadingsMap" or "Web Developer"
2. View heading structure for each page
3. **Expected**: H1 first, then H2, then H3 (no skipped levels)

## 5. Image Alt Text Testing

### Test 1: Manual Inspection
**Goal**: Verify all images have meaningful alt text

1. Visit main pages (index, accounts, downloads, kontakt)
2. Right-click on each icon/image
3. Select "Inspect" or "Inspect Element"
4. Check the `alt` attribute value
5. **Expected**: Descriptive text like "Würfel Icon", "Sticker Icon", etc.

### Test 2: Accessibility Check
**Goal**: Verify images are accessible

1. Use browser extension like "WAVE" or "axe DevTools"
2. Run accessibility scan on each page
3. Check for "Missing alternative text" warnings
4. **Expected**: No warnings about missing alt text

### Test 3: Screen Reader Test (Optional)
**Goal**: Experience how a screen reader announces images

1. Enable screen reader (NVDA on Windows, VoiceOver on Mac)
2. Navigate through the page
3. Listen to how icons are announced
4. **Expected**: Clear, descriptive announcements

## 6. CSS Caching Testing

### Test 1: Check Version Parameter
**Goal**: Verify CSS includes version parameter

1. Visit any page on the site
2. View page source
3. Find the CSS link tag for `style.css`
4. **Expected**: Link should be `/assets/css/style.css?v=1.0.0`

### Test 2: Verify Caching Behavior
**Goal**: Confirm browser caches CSS until version changes

1. Open browser developer tools
2. Go to Network tab
3. Visit a page for the first time
4. Note the CSS request (should be 200 status)
5. Refresh the page (Ctrl+R or Cmd+R)
6. **Expected**: CSS should be loaded from cache (304 or from cache)

### Test 3: Version Update Test
**Goal**: Verify new version forces browser to fetch new CSS

1. Edit `/partials/version.php` and change version to `1.0.1`
2. Hard refresh browser (Ctrl+Shift+R or Cmd+Shift+R)
3. Check Network tab
4. **Expected**: CSS fetched with new version parameter (200 status)

## 7. Open Graph Tags Testing

### Test 1: Verify OG Tags in Source
**Goal**: Check all pages have required OG tags

Visit each page and view source. Verify presence of:
- `og:title`
- `og:description`
- `og:url`
- `og:type`
- `og:site_name`
- `og:image`

Pages to check:
- `/datenschutz_page.php`
- `/impressum_page.php`
- All other pages (already had OG tags)

### Test 2: Facebook Sharing Debugger
**Goal**: Validate OG tags work for social sharing

1. Go to https://developers.facebook.com/tools/debug/
2. Enter URL: `https://babixgo.de/datenschutz/`
3. Click "Debug"
4. **Expected**: 
   - Title: "Datenschutzerklärung – babixGO"
   - Description: "Datenschutzerklärung von babixGO – Informationen zur Datenverarbeitung gemäß DSGVO."
   - Image: Default babixGO image

5. Repeat for `/impressum/`

### Test 3: Twitter Card Validator (Optional)
**Goal**: Check Twitter cards display correctly

1. Go to https://cards-dev.twitter.com/validator
2. Enter page URL
3. Click "Preview card"
4. **Expected**: Properly formatted Twitter card with title and description

## 8. Overall Page Quality Testing

### Test 1: Google Rich Results Test
**Goal**: Verify structured data and meta tags

1. Go to https://search.google.com/test/rich-results
2. Enter URL of each main page
3. Run test
4. **Expected**: No errors, valid structured data

### Test 2: Mobile-Friendly Test
**Goal**: Ensure improvements don't break mobile

1. Go to https://search.google.com/test/mobile-friendly
2. Enter page URLs
3. **Expected**: "Page is mobile-friendly"

### Test 3: PageSpeed Insights
**Goal**: Verify performance not degraded

1. Go to https://pagespeed.web.dev/
2. Enter page URL
3. Check performance score
4. **Expected**: Similar or better score than before changes

## Quick Validation Checklist

Use this checklist after deployment:

- [ ] Admin login works with correct credentials
- [ ] Admin login blocks after 5 failed attempts
- [ ] CSRF tokens present in all admin forms
- [ ] No duplicate robots meta tags on any page
- [ ] All pages have exactly one H1 tag
- [ ] No images with empty alt attributes
- [ ] CSS loaded with version parameter (v=1.0.0)
- [ ] All pages have og:title and og:description
- [ ] No PHP syntax errors in logs
- [ ] No JavaScript console errors

## Automated Testing Commands

Run these from repository root:

```bash
# Check PHP syntax in all files
find . -name "*.php" -exec php -l {} \; | grep -v "No syntax errors"

# Count robots meta tags (should be 1 per file)
grep -r '<meta name="robots"' --include="*.php" | wc -l

# Find images without alt text
grep -r '<img' --include="*.php" | grep 'alt=""'

# Check for CSRF token fields in admin forms
grep -r "csrf_field()" kontakt/admin/

# Verify version constant is defined
grep "BABIXGO_VERSION" partials/version.php

# Check H1 tags exist
grep -r "<h1" --include="*.php" | wc -l
```

## Troubleshooting

### CSRF Errors
- Clear browser cookies and sessions
- Ensure session_start() is called before CSRF functions
- Check that csrf.php file has correct permissions

### Brute-Force Not Working
- Check temp directory permissions: `ls -la /tmp/`
- Clear test lockout files: `rm /tmp/login_attempts_*`
- Verify system time is correct

### Missing Alt Text
- Clear browser cache (Ctrl+Shift+Delete)
- Hard refresh page (Ctrl+Shift+R)
- Check file was actually updated in repository

### CSS Not Caching
- Verify version.php is included in head-links.php
- Check browser dev tools Network tab
- Try incognito/private browsing mode

## Security Considerations

### DO NOT test in production:
- Brute-force protection (locks out real users)
- CSRF token manipulation (breaks real sessions)

### Always:
- Test on staging/development environment first
- Keep admin credentials secure
- Monitor error logs for unexpected issues
- Document any deviations from expected behavior

## Success Criteria

All improvements are working correctly when:

1. ✅ CSRF protection prevents unauthorized form submissions
2. ✅ Brute-force protection locks out after 5 failed attempts
3. ✅ No page has duplicate robots meta tags
4. ✅ All pages have proper H1 headings
5. ✅ All images have descriptive alt text
6. ✅ CSS caching works with version parameter
7. ✅ All pages have complete Open Graph tags
8. ✅ No new PHP errors in logs
9. ✅ All security features are documented
10. ✅ Site remains mobile-friendly and performant

---

**Last Updated**: Implementation completed on 2026-01-10  
**Tested By**: (Add name after testing)  
**Test Results**: (Add pass/fail status)
