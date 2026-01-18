# Quick Start: babixGO Audit Tool

Schnelle Anleitung zur Verwendung des Website Audit Tools.

## 🚀 Audit ausführen

### Standard-Verwendung
```bash
cd /home/runner/work/main-bgo/main-bgo
php tools/audit.php > docs/audits/audit-report-$(date +%Y-%m-%d).md
```

### Ausgabe direkt ansehen
```bash
php tools/audit.php | less
```

### Als HTML (mit Markdown-Konverter)
```bash
php tools/audit.php | markdown > audit.html
```

## 📊 Report lesen

### Executive Summary
```
- ✅ Passed: Anzahl erfolgreicher Checks
- ⚠️ Warnings: Verbesserungsmöglichkeiten
- ❌ Errors: Kritische Probleme
```

### Prioritäten

| Icon | Priorität | Zeitrahmen | Beispiele |
|------|-----------|------------|-----------|
| ❌ P1 | Critical | Sofort | H1 fehlt, kein Title, kein Canonical |
| ⚠️ P2 | High | 1 Woche | Meta Description zu kurz, fehlende Alt-Texte |
| ⚠️ P3 | Medium | 2 Wochen | Open Graph Tags, Twitter Cards |
| ⚠️ P4 | Low | Bei Bedarf | Heading-Hierarchie, Link-Attribute |

## 🔍 Häufige Checks

### SEO
- **Meta Title**: 50-60 Zeichen, Brand enthalten
- **Meta Description**: 150-160 Zeichen, CTA enthalten
- **Canonical**: Korrekte URL mit HTTPS und trailing slash

### Accessibility
- **H1**: Genau eine pro Seite
- **Alt-Texte**: Bei allen Bildern vorhanden
- **Heading-Hierarchie**: H1→H2→H3 (keine Level überspringen)

### Social Media
- **Open Graph**: og:title, og:description, og:url, og:image, og:type
- **Twitter Card**: twitter:card, twitter:title, twitter:description, twitter:image

### Technisch
- **Partials**: Alle 7 korrekt eingebunden mit `$_SERVER['DOCUMENT_ROOT']`
- **External Links**: rel="noopener" bei target="_blank"

## ✅ Status-Icons verstehen

| Icon | Bedeutung | Aktion |
|------|-----------|--------|
| ✅ | PASS | Alles OK, nichts zu tun |
| ⚠️ | WARNING | Verbesserung empfohlen |
| ❌ | ERROR | Muss behoben werden |
| N/A | Not Applicable | Check nicht relevant |

## 🛠️ Schnelle Fixes

### Meta Description zu kurz
```html
<!-- Vorher (80 chars) -->
<meta name="description" content="Kurze Beschreibung ohne CTA" />

<!-- Nachher (155 chars) -->
<meta name="description" content="Ausführliche Beschreibung mit allen wichtigen Keywords. Jetzt mehr erfahren und direkt loslegen!" />
```

### Fehlender CTA
Gute CTAs: `jetzt`, `hier`, `mehr erfahren`, `kontaktieren`, `entdecken`, `nutzen`, `starten`

### Canonical URL Mismatch
```html
<!-- Korrekt -->
<link rel="canonical" href="https://babixgo.de/pages/kontakt/" />
```

### Alt-Texte fehlen
```html
<!-- Vorher -->
<img src="/icon.svg">

<!-- Nachher -->
<img src="/icon.svg" alt="Service Icon">
```

## 📈 Verbesserungen verfolgen

### Vorher/Nachher Vergleich
```bash
# Erstes Audit
php tools/audit.php > docs/audits/audit-before.md

# ... Fixes implementieren ...

# Zweites Audit
php tools/audit.php > docs/audits/audit-after.md

# Vergleich
diff docs/audits/audit-before.md docs/audits/audit-after.md
```

### Metriken im Auge behalten
- **Passed Rate**: Ziel > 90%
- **Warnings Rate**: Ziel < 10%
- **Errors**: Immer 0

## 🎯 Typischer Workflow

1. **Audit ausführen**
   ```bash
   php tools/audit.php > docs/audits/audit-$(date +%Y-%m-%d).md
   ```

2. **Report durchsehen**
   - Executive Summary prüfen
   - Critical Issues identifizieren
   - High Priority Issues notieren

3. **Fixes priorisieren**
   - P1 (Critical) → Sofort
   - P2 (High) → Diese Woche
   - P3 (Medium) → Nächste Woche
   - P4 (Low) → Backlog

4. **Fixes implementieren**
   - Eine Kategorie nach der anderen
   - Nach jedem Fix testen

5. **Re-Audit**
   ```bash
   php tools/audit.php > docs/audits/audit-after-fixes.md
   ```

6. **Vergleichen & Verifizieren**
   - Verbesserungen bestätigen
   - Neue Issues prüfen

## 📝 Report-Beispiel

```
## Executive Summary
- ✅ Passed: 79 checks (61%)
- ⚠️ Warnings: 50 checks (39%)
- ❌ Errors: 0 checks (0%)

## Critical Issues (Priority 1)
✅ No critical issues found!

## High Priority Issues (Priority 2)
### ⚠️ Meta description (11 pages)
- Startseite: No clear CTA
- Error Page: Too short (< 120 chars)
...
```

## 💡 Tipps

### Bei vielen Warnings
1. Nach Kategorie gruppieren (Meta, OG, Twitter)
2. Bulk-Fixes durchführen (z.B. alle Meta Descriptions auf einmal)
3. Template/Partial-Lösung überlegen

### Bei neuen Seiten
1. Seite zur `$pages` Array in `audit.php` hinzufügen
2. Audit ausführen
3. Alle Warnings sofort beheben (einfacher als später)

### Automatisierung
```bash
# Cron Job für monatliches Audit
0 0 1 * * cd /path/to/project && php tools/audit.php > docs/audits/monthly-$(date +%Y-%m).md
```

## 🔗 Weiterführende Docs

- **Vollständige Dokumentation**: `tools/README.md`
- **Aktionsplan**: `docs/audits/AUDIT-ACTION-PLAN.md`
- **Letzter Report**: `docs/audits/audit-report-2026-01-18.md`
- **Projekt-Regeln**: `docs/guides/Agents.md`
- **Design-System**: `docs/design/DESIGN_SYSTEM.md`

## ❓ FAQ

### Wo finde ich die geprüften Seiten?
`tools/audit.php` → `$pages` Array (Zeile ~15)

### Wie füge ich eine neue Seite hinzu?
```php
$pages['/new/page/'] = [
    'title' => 'Page Title',
    'file' => '/new/page/index.php',
    'category' => 'Category'
];
```

### Warum "N/A" bei manchen Checks?
Der Check ist nicht anwendbar (z.B. "No images" bei Alt-Text Check)

### Was ist ein "URL mismatch" bei Canonical?
Die Canonical URL im `<link>` Tag stimmt nicht mit der erwarteten URL überein.

### Wie behebe ich alle Warnings auf einmal?
Siehe `docs/audits/AUDIT-ACTION-PLAN.md` für Bulk-Fix Empfehlungen.

---

**Letzte Aktualisierung**: 2026-01-18  
**Tool Version**: 1.0
