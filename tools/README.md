# babixGO Website Audit Tool

Umfassendes Audit-Tool zur Überprüfung aller produktiven Seiten der babixGO Website auf SEO, Accessibility, PWA-Funktionalität und strukturelle Integrität.

## Features

Das Audit-Tool prüft:

### SEO Basics
- ✅ Meta Title (Länge, Unique, Brand)
- ✅ Meta Description (Länge, CTA, Unique)
- ✅ Canonical URL (Korrektheit, HTTPS, Trailing Slash)
- ✅ Open Graph Tags (og:title, og:description, og:url, og:image, og:type)
- ✅ Twitter Card Tags (twitter:card, twitter:title, twitter:description, twitter:image)

### Accessibility
- ✅ Alt-Attribute auf allen Bildern
- ✅ H1 Heading (genau eine pro Seite)
- ✅ Heading-Hierarchie (H1→H2→H3, keine übersprungenen Levels)
- ✅ ARIA Labels (geplant)

### Strukturelle Integrität
- ✅ PHP Partials-Einbindung (korrekte Pattern)
- ✅ Externe Links (rel="noopener" bei target="_blank")
- ✅ Interne Links (geplant)

### PWA Funktionalität
- ✅ Manifest Existenz
- ✅ Service Worker Existenz
- ✅ Service Worker Registrierung
- ✅ Manifest Link in head-links.php
- ✅ Offline Fallback Seite

## Verwendung

### Standard Audit
```bash
php tools/audit.php > docs/audits/audit-report-$(date +%Y-%m-%d).md
```

### Audit mit direkter Ausgabe
```bash
php tools/audit.php
```

### Im Browser (mit PHP Server)
```bash
# Server starten
php -S localhost:8000

# Browser öffnen
# http://localhost:8000/tools/audit.php
```

## Geprüfte Seiten

Das Tool prüft automatisch alle produktiven Seiten:

### Root (2 Seiten)
- `/` - Startseite
- `/404.php` - Error Page

### Pages (4 Seiten)
- `/pages/anleitungen/` - Anleitungen Übersicht
- `/pages/kontakt/` - Kontakt
- `/pages/rechtliches/impressum/` - Impressum
- `/pages/rechtliches/datenschutz/` - Datenschutz

### Mogo - Ingame (2-3 Seiten)
- `/mogo/ingame/sticker/` - Sticker Service
- `/mogo/ingame/wuerfel/` - Würfel Service
- `/mogo/ingame/accounts/` - Accounts Service (falls vorhanden)

### Mogo - Events (2 Seiten)
- `/mogo/events/partnerevents/` - Partner Events
- `/mogo/events/tycoon-racers/` - Tycoon Racers

### Mogo - Guides (1 Seite)
- `/mogo/guides/freundschaftsbalken-fuellen/` - Freundschaftsbalken Anleitung

### Shared (1 Seite)
- `/shared/assets/downloads/` - Downloads

**Gesamt: 12-13 Seiten**

## Report-Format

Der generierte Report enthält:

### Executive Summary
- Anzahl geprüfter Seiten
- Anzahl bestandener Checks (✅ Passed)
- Anzahl Warnungen (⚠️ Warnings)
- Anzahl Fehler (❌ Errors)

### Priorisierte Issues
1. **Critical Issues (Priorität 1)**: H1 Tags, Titles, Canonical URLs
2. **High Priority (Priorität 2)**: Meta Descriptions, Alt Texte, Partials
3. **Medium Priority (Priorität 3)**: Open Graph, Twitter Cards
4. **Low Priority (Priorität 4)**: Heading Hierarchy, Link Attributes

### PWA Status
- Manifest Verfügbarkeit
- Service Worker Verfügbarkeit
- Service Worker Registrierung
- Manifest Link
- Offline Fallback

### Detaillierte Ergebnisse pro Seite
Für jede Seite:
- ✅ Bestandene Checks
- ⚠️ Warnungen mit Details
- ❌ Fehler mit Empfehlungen

## Check-Details

### Meta Title Check
- **Optimal**: 50-60 Zeichen
- **Minimum**: 30 Zeichen
- **Maximum**: 70 Zeichen
- **Erforderlich**: babixGO/babix Brand Name
- **Status**:
  - ✅ PASS: 50-60 chars mit Brand
  - ⚠️ WARNING: Zu kurz/lang oder Brand fehlt
  - ❌ ERROR: Kein Title oder leer

### Meta Description Check
- **Optimal**: 150-160 Zeichen
- **Minimum**: 120 Zeichen
- **Maximum**: 170 Zeichen
- **Erforderlich**: Call-to-Action (jetzt, hier, mehr, erfahren, kontaktieren, etc.)
- **Status**:
  - ✅ PASS: 150-160 chars mit CTA
  - ⚠️ WARNING: Zu kurz/lang oder CTA fehlt
  - ❌ ERROR: Keine Description oder leer

### Canonical URL Check
- **Format**: `https://babixgo.de[PATH]/`
- **Erforderlich**: HTTPS, korrekte URL, trailing slash
- **Status**:
  - ✅ PASS: Exakte Übereinstimmung
  - ⚠️ WARNING: URL-Mismatch, fehlendes HTTPS/trailing slash
  - ❌ ERROR: Kein Canonical Tag

### H1 Check
- **Erforderlich**: Genau 1 H1 pro Seite
- **Empfohlen**: class="welcome-title" (außer 404.php: "error-message")
- **Status**:
  - ✅ PASS: Genau 1 H1 mit korrekter Class
  - ⚠️ WARNING: 1 H1 ohne Class oder mehrere H1s
  - ❌ ERROR: Keine H1

### Alt-Attribute Check
- **Erforderlich**: Alle `<img>` Tags müssen alt-Attribut haben
- **Erlaubt**: Leeres alt="" für dekorative Bilder
- **Status**:
  - ✅ PASS: Alle Bilder haben alt
  - ⚠️ WARNING: Einige Bilder ohne alt
  - N/A: Keine Bilder

### Open Graph Check
- **Erforderlich**: og:title, og:description, og:url, og:image, og:type
- **Status**:
  - ✅ PASS: Alle Tags vorhanden
  - ⚠️ WARNING: Einige Tags fehlen

### Twitter Card Check
- **Erforderlich**: twitter:card, twitter:title, twitter:description, twitter:image
- **Status**:
  - ✅ PASS: Alle Tags vorhanden
  - ⚠️ WARNING: Einige Tags fehlen

### Heading Hierarchy Check
- **Erforderlich**: Logische Hierarchie ohne übersprungene Levels
- **Beispiel**: ✅ H1→H2→H3→H2→H3 | ❌ H1→H3 (H2 übersprungen)
- **Status**:
  - ✅ PASS: Keine übersprungenen Levels
  - ⚠️ WARNING: Übersprungene Levels
  - N/A: Keine Headings

### Partials Check
- **Erforderlich**: Alle 7 Partials korrekt eingebunden
  - head-meta.php
  - head-links.php
  - tracking.php
  - cookie-banner.php
  - header.php
  - footer.php
  - footer-scripts.php
- **Pattern**: `$_SERVER['DOCUMENT_ROOT'] . '/shared/partials/FILE.php'`
- **Status**:
  - ✅ PASS: Alle Partials korrekt
  - ⚠️ WARNING: Fehlende oder falsche Pattern

### External Links Check
- **Erforderlich**: `rel="noopener"` bei allen `target="_blank"` Links
- **Status**:
  - ✅ PASS: Alle External Links korrekt
  - ⚠️ WARNING: Einige Links ohne noopener
  - N/A: Keine External Links

## Erweiterungen (geplant)

- [ ] Performance Checks (Bildgrößen, Lazy Loading)
- [ ] Critical CSS Prüfung
- [ ] Resource Hints Prüfung
- [ ] ARIA Labels Prüfung
- [ ] Interne Links 404 Check
- [ ] Robots.txt Prüfung
- [ ] Sitemap.xml Prüfung
- [ ] Schema.org Structured Data Prüfung
- [ ] Lighthouse Integration
- [ ] HTML Validation
- [ ] CSS Validation
- [ ] JavaScript Errors Check

## Technische Details

- **Sprache**: PHP 8.3+
- **Abhängigkeiten**: Keine (pure PHP)
- **Encoding**: UTF-8
- **Regex**: PCRE für HTML-Parsing
- **Output**: Markdown-Format

## Beispiel-Report

Siehe: `docs/audits/audit-report-2026-01-18.md`

## Entwicklung

### Neue Checks hinzufügen

1. Funktion erstellen (z.B. `checkMyFeature($content)`)
2. In `$checks` Array aufnehmen
3. Priorität für Issues festlegen
4. README aktualisieren

### Neue Seiten hinzufügen

Seiten im `$pages` Array ergänzen:

```php
$pages['/new/page/'] = [
    'title' => 'New Page Title',
    'file' => '/new/page/index.php',
    'category' => 'Category Name'
];
```

## Support

Bei Fragen oder Problemen:
- Issue erstellen im Repository
- Dokumentation in `docs/guides/Agents.md` prüfen
- Design-System in `docs/design/DESIGN_SYSTEM.md` prüfen

---

**Version**: 1.0
**Erstellt**: 2026-01-18
**Autor**: babixGO Team
