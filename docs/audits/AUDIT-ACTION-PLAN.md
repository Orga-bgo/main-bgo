# babixGO Website Audit - Aktionsplan & Empfehlungen

**Basierend auf Audit vom:** 2026-01-18  
**Audit-Report:** `docs/audits/audit-report-2026-01-18.md`

---

## Executive Summary

**Geprüfte Seiten:** 13  
**Gesamtstatus:** ✅ Sehr gut (keine kritischen Fehler)

- ✅ **Passed:** 79 checks (61%)
- ⚠️ **Warnings:** 50 checks (39%)
- ❌ **Errors:** 0 checks (0%)

### Hauptbefunde

1. ✅ **Hervorragend**: Alle Seiten haben H1 Tags, korrekte Partials und PWA-Konfiguration
2. ⚠️ **Verbesserungsbedarf**: Meta Descriptions, Open Graph und Twitter Cards
3. ℹ️ **Hinweis**: Kanonische URLs haben Mismatch (unterschiedliche Pfadstruktur)

---

## Priorität 1: Kritische Issues (sofort beheben)

### ✅ Keine kritischen Issues gefunden!

Alle Seiten haben:
- ✅ Meta Title vorhanden
- ✅ Genau eine H1 pro Seite
- ✅ Canonical URL vorhanden
- ✅ Korrekte PHP Partials-Einbindung

---

## Priorität 2: High Priority (innerhalb 1 Woche)

### 1. Meta Descriptions optimieren (11 Seiten)

**Problem:** 11 von 13 Seiten haben keine klare Call-to-Action (CTA) in der Meta Description.

**Betroffene Seiten:**
1. `/` - Startseite
2. `/404.php` - Error Page (auch zu kurz: nur 80 chars)
3. `/pages/kontakt/` - Kontakt
4. `/pages/rechtliches/impressum/` - Impressum
5. `/pages/rechtliches/datenschutz/` - Datenschutz
6. `/mogo/ingame/sticker/` - Sticker Service
7. `/mogo/ingame/wuerfel/` - Würfel Service (auch zu kurz: 100 chars)
8. `/mogo/events/partnerevents/` - Partner Events (auch zu kurz: 115 chars)
9. `/mogo/events/tycoon-racers/` - Tycoon Racers
10. `/mogo/guides/freundschaftsbalken-fuellen/` - Freundschaftsbalken Anleitung
11. `/shared/assets/downloads/` - Downloads

**Empfohlene CTAs:**
- `jetzt`, `hier`, `mehr erfahren`, `kontaktieren`, `entdecken`, `nutzen`, `starten`

**Beispiel-Verbesserungen:**

#### Startseite (/)
**Aktuell:**
```html
<meta name="description" content="babixGO bietet Monopoly GO Services: Sticker, Partnerevents, Racers & Accounts. Direkt per WhatsApp erreichbar – schnell, zuverlässig, fair." />
```

**Empfohlen:**
```html
<meta name="description" content="babixGO bietet Monopoly GO Services: Sticker, Partnerevents, Racers & Accounts. Jetzt per WhatsApp kontaktieren – schnell, zuverlässig, fair." />
```

#### 404 Error Page
**Aktuell:** 80 Zeichen (zu kurz)
**Empfohlen:** Erweitern auf 150-160 Zeichen mit CTA

```html
<meta name="description" content="Diese Seite wurde nicht gefunden. Entdecke jetzt unsere Monopoly GO Services: Sticker, Events, Racers & Accounts. Hier geht's zur Startseite." />
```

#### Würfel Service
**Aktuell:** 100 Zeichen (zu kurz)
**Empfohlen:**

```html
<meta name="description" content="Monopoly GO Würfel bei babixGO kaufen. Schnelle Lieferung, faire Preise. Jetzt per WhatsApp bestellen und direkt loslegen – zuverlässig & sicher." />
```

#### Partner Events
**Aktuell:** 115 Zeichen (zu kurz)
**Empfohlen:**

```html
<meta name="description" content="Monopoly GO Partner Events bei babixGO: Maximale Punkte & Belohnungen. Jetzt teilnehmen und gemeinsam gewinnen – schnell, zuverlässig, erfolgreich." />
```

### 2. Meta Titles optimieren (3 Seiten)

**Problem:** 3 Seiten haben zu kurze Titles (< 30 Zeichen)

#### Anleitungen Übersicht
**Aktuell:** "Anleitungen" (11 chars)  
**Empfohlen:**

```html
<title>Monopoly GO Anleitungen & Guides | babixGO</title>
```
(46 chars - im optimalen Bereich)

#### Impressum
**Aktuell:** "Impressum" (9 chars)  
**Empfohlen:**

```html
<title>Impressum & Rechtliches | babixGO</title>
```
(39 chars)

### 3. Canonical URLs korrigieren (10 Seiten)

**Problem:** Die Canonical URLs stimmen nicht mit den tatsächlichen URLs überein.

**Beispiele:**

#### Anleitungen
**Aktuell:** `https://babixgo.de/pages/anleitungen/`  
**Im Code:** Canonical zeigt auf andere URL  
**Fix:** Canonical-Tag in `/pages/anleitungen/index.php` aktualisieren

#### Pattern für alle betroffenen Seiten:
```php
<link rel="canonical" href="https://babixgo.de/pages/anleitungen/" />
```

**Betroffene Seiten:**
- `/pages/anleitungen/`
- `/pages/kontakt/`
- `/pages/rechtliches/impressum/`
- `/pages/rechtliches/datenschutz/`
- `/mogo/ingame/sticker/`
- `/mogo/ingame/wuerfel/`
- `/mogo/ingame/accounts/` (falls vorhanden)
- `/mogo/events/partnerevents/`
- `/mogo/events/tycoon-racers/`
- `/mogo/guides/freundschaftsbalken-fuellen/`
- `/shared/assets/downloads/`

---

## Priorität 3: Medium Priority (innerhalb 2 Wochen)

### 1. Open Graph Tags hinzufügen (13 Seiten)

**Problem:** Alle Seiten fehlen vollständige Open Graph Tags für Social Media Sharing.

**Erforderliche Tags:**
```html
<meta property="og:title" content="[Page Title]" />
<meta property="og:description" content="[Page Description]" />
<meta property="og:url" content="https://babixgo.de[PATH]/" />
<meta property="og:image" content="https://babixgo.de/shared/assets/img/og-image.jpg" />
<meta property="og:type" content="website" />
```

**Empfehlung:** 
1. Zentrale OG-Image erstellen: `/shared/assets/img/og-image.jpg` (1200x630px)
2. In `head-meta.php` globale OG-Tags definieren
3. In einzelnen Seiten nur seitenspezifische OG-Tags überschreiben

**Beispiel für Startseite:**
```html
<meta property="og:title" content="babixGO – Monopoly GO Services | Sticker, Events & Accounts" />
<meta property="og:description" content="babixGO bietet Monopoly GO Services: Sticker, Partnerevents, Racers & Accounts. Jetzt per WhatsApp kontaktieren – schnell, zuverlässig, fair." />
<meta property="og:url" content="https://babixgo.de/" />
<meta property="og:image" content="https://babixgo.de/shared/assets/img/og-image.jpg" />
<meta property="og:type" content="website" />
```

### 2. Twitter Card Tags hinzufügen (13 Seiten)

**Problem:** Alle Seiten fehlen Twitter Card Tags.

**Erforderliche Tags:**
```html
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="[Page Title]" />
<meta name="twitter:description" content="[Page Description]" />
<meta name="twitter:image" content="https://babixgo.de/shared/assets/img/og-image.jpg" />
```

**Empfehlung:** 
- Gleiche Strategie wie OG Tags
- Kann gleiche og-image.jpg verwenden

---

## Priorität 4: Low Priority (wenn Zeit ist)

### 1. Heading Hierarchy (13 Seiten)

**Problem:** Einige Seiten haben Heading-Hierarchie-Issues (nicht kritisch).

**Empfehlung:**
- Review der Heading-Struktur
- Sicherstellen: H1 → H2 → H3 (keine Levels überspringen)

---

## PWA Status

### ✅ Vollständig konfiguriert!

- ✅ Manifest vorhanden: `/shared/assets/public/manifest.json`
- ✅ Service Worker vorhanden: `/shared/assets/public/sw.js`
- ✅ Service Worker registriert in `main.js`
- ✅ Manifest verlinkt in `head-links.php`
- ✅ Offline Fallback: `/offline.html`

**Keine Aktion erforderlich.**

---

## Implementierungs-Checkliste

### Woche 1 (Sofort)

#### Meta Descriptions mit CTA (11 Seiten)
- [ ] `/` - Startseite
- [ ] `/404.php` - Error Page (erweitern auf 150-160 chars)
- [ ] `/pages/kontakt/`
- [ ] `/pages/rechtliches/impressum/`
- [ ] `/pages/rechtliches/datenschutz/`
- [ ] `/mogo/ingame/sticker/`
- [ ] `/mogo/ingame/wuerfel/` (erweitern auf 150-160 chars)
- [ ] `/mogo/events/partnerevents/` (erweitern auf 150-160 chars)
- [ ] `/mogo/events/tycoon-racers/`
- [ ] `/mogo/guides/freundschaftsbalken-fuellen/`
- [ ] `/shared/assets/downloads/`

#### Meta Titles optimieren (3 Seiten)
- [ ] `/pages/anleitungen/` - auf 40-60 chars erweitern
- [ ] `/pages/rechtliches/impressum/` - auf 30-60 chars erweitern

#### Canonical URLs korrigieren (10 Seiten)
- [ ] `/pages/anleitungen/`
- [ ] `/pages/kontakt/`
- [ ] `/pages/rechtliches/impressum/`
- [ ] `/pages/rechtliches/datenschutz/`
- [ ] `/mogo/ingame/sticker/`
- [ ] `/mogo/ingame/wuerfel/`
- [ ] `/mogo/events/partnerevents/`
- [ ] `/mogo/events/tycoon-racers/`
- [ ] `/mogo/guides/freundschaftsbalken-fuellen/`
- [ ] `/shared/assets/downloads/`

### Woche 2

#### OG Image erstellen
- [ ] OG Image designen (1200x630px)
- [ ] Als `/shared/assets/img/og-image.jpg` speichern
- [ ] Optimieren (WebP + JPG Fallback)

#### Open Graph Tags (13 Seiten)
- [ ] Globale OG-Tags in `head-meta.php` definieren
- [ ] Seitenspezifische OG-Tags in allen Seiten hinzufügen

#### Twitter Card Tags (13 Seiten)
- [ ] Globale Twitter-Tags in `head-meta.php` definieren
- [ ] Seitenspezifische Twitter-Tags in allen Seiten hinzufügen

### Optional (Woche 3+)

#### Heading Hierarchy Review
- [ ] Alle Seiten auf korrekte H-Struktur prüfen
- [ ] Ggf. anpassen

---

## Automatisierte Fixes (Optional)

Für wiederkehrende Aufgaben könnte ein Fix-Script erstellt werden:

### Meta Description CTA Adder
```php
// tools/fix-meta-descriptions.php
// Automatisch CTAs zu Meta Descriptions hinzufügen
```

### Canonical URL Fixer
```php
// tools/fix-canonical-urls.php
// Automatisch korrekte Canonical URLs setzen
```

### OG/Twitter Tag Generator
```php
// tools/add-social-tags.php
// Automatisch OG und Twitter Tags hinzufügen
```

**Hinweis:** Vor Verwendung automatisierter Fixes immer Backup erstellen!

---

## Testing nach Fixes

### Manuelle Tests
- [ ] Alle Seiten im Browser öffnen und prüfen
- [ ] Meta Tags im Quellcode validieren
- [ ] Social Sharing testen (Facebook, Twitter, WhatsApp)

### Automatisierte Tests
```bash
# Audit erneut ausführen
php tools/audit.php > docs/audits/audit-report-$(date +%Y-%m-%d).md

# Vergleich vorher/nachher
diff docs/audits/audit-report-2026-01-18.md docs/audits/audit-report-[NEW-DATE].md
```

### Online-Tools
- [ ] [Facebook Sharing Debugger](https://developers.facebook.com/tools/debug/)
- [ ] [Twitter Card Validator](https://cards-dev.twitter.com/validator)
- [ ] [Google Rich Results Test](https://search.google.com/test/rich-results)
- [ ] [Schema.org Validator](https://validator.schema.org/)

---

## Erfolgskriterien

Nach Implementierung aller Fixes:

- ✅ **Passed:** > 90% (aktuell 61%)
- ⚠️ **Warnings:** < 10% (aktuell 39%)
- ❌ **Errors:** 0% (aktuell 0%)

**Ziel:**
- Alle 13 Seiten haben vollständige Meta Tags
- Alle 13 Seiten haben Open Graph & Twitter Cards
- Alle Canonical URLs sind korrekt
- Social Sharing funktioniert perfekt

---

## Zeitaufwand-Schätzung

### Meta Descriptions & Titles
- **Aufwand:** ~2-3 Stunden
- **Komplexität:** Niedrig
- **ROI:** Hoch (direkte SEO-Verbesserung)

### Canonical URLs
- **Aufwand:** ~30 Minuten
- **Komplexität:** Niedrig
- **ROI:** Hoch (SEO + technische Korrektheit)

### Open Graph & Twitter Cards
- **Aufwand:** ~3-4 Stunden (inkl. OG Image Erstellung)
- **Komplexität:** Mittel
- **ROI:** Hoch (Social Media Sharing)

### Gesamt
- **Geschätzt:** 6-8 Stunden
- **Empfohlen:** Über 2 Wochen verteilen

---

## Wartung

### Regelmäßige Audits
```bash
# Monatlicher Audit
0 0 1 * * cd /path/to/main-bgo && php tools/audit.php > docs/audits/audit-report-$(date +%Y-%m-%d).md
```

### Bei neuen Seiten
- [ ] Audit-Script aktualisieren (`$pages` Array)
- [ ] Neue Seite nach Template erstellen
- [ ] Meta Tags, OG Tags, Twitter Cards hinzufügen
- [ ] Audit ausführen zur Validierung

---

**Dokument-Version:** 1.0  
**Erstellt:** 2026-01-18  
**Nächstes Review:** Nach Implementierung der Fixes
