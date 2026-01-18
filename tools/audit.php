<?php
/**
 * babixGO Website Audit Script
 * Prüft alle produktiven Seiten auf SEO, Accessibility, PWA und strukturelle Integrität
 * 
 * Usage: php tools/audit.php > docs/audits/audit-report-YYYY-MM-DD.md
 */

// Set DOCUMENT_ROOT for CLI execution
if (!isset($_SERVER['DOCUMENT_ROOT']) || empty($_SERVER['DOCUMENT_ROOT'])) {
    // Get the project root (parent of tools directory)
    $_SERVER['DOCUMENT_ROOT'] = dirname(__DIR__);
}

// Define all productive pages
$pages = [
    // Root Level
    '/' => [
        'title' => 'Startseite',
        'file' => '/index.php',
        'category' => 'Root'
    ],
    '/404.php' => [
        'title' => 'Error Page',
        'file' => '/404.php',
        'category' => 'Root'
    ],
    
    // Pages
    '/pages/anleitungen/' => [
        'title' => 'Anleitungen Übersicht',
        'file' => '/pages/anleitungen/index.php',
        'category' => 'Pages'
    ],
    '/pages/kontakt/' => [
        'title' => 'Kontakt',
        'file' => '/pages/kontakt/index.php',
        'category' => 'Pages'
    ],
    '/pages/rechtliches/impressum/' => [
        'title' => 'Impressum',
        'file' => '/pages/rechtliches/impressum/index.php',
        'category' => 'Pages'
    ],
    '/pages/rechtliches/datenschutz/' => [
        'title' => 'Datenschutz',
        'file' => '/pages/rechtliches/datenschutz/index.php',
        'category' => 'Pages'
    ],
    
    // Mogo - Ingame
    '/mogo/ingame/sticker/' => [
        'title' => 'Sticker Service',
        'file' => '/mogo/ingame/sticker/index.php',
        'category' => 'Mogo - Ingame'
    ],
    '/mogo/ingame/wuerfel/' => [
        'title' => 'Würfel Service',
        'file' => '/mogo/ingame/wuerfel/index.php',
        'category' => 'Mogo - Ingame'
    ],
    
    // Mogo - Events
    '/mogo/events/partnerevents/' => [
        'title' => 'Partner Events',
        'file' => '/mogo/events/partnerevents/index.php',
        'category' => 'Mogo - Events'
    ],
    '/mogo/events/tycoon-racers/' => [
        'title' => 'Tycoon Racers',
        'file' => '/mogo/events/tycoon-racers/index.php',
        'category' => 'Mogo - Events'
    ],
    
    // Mogo - Guides
    '/mogo/guides/freundschaftsbalken-fuellen/' => [
        'title' => 'Freundschaftsbalken füllen Anleitung',
        'file' => '/mogo/guides/freundschaftsbalken-fuellen/index.php',
        'category' => 'Mogo - Guides'
    ],
    
    // Shared
    '/shared/assets/downloads/' => [
        'title' => 'Downloads',
        'file' => '/shared/assets/downloads/index.php',
        'category' => 'Shared'
    ],
];

// Check if accounts page exists
$accountsFile = $_SERVER['DOCUMENT_ROOT'] . '/mogo/ingame/accounts/index.php';
if (file_exists($accountsFile)) {
    $pages['/mogo/ingame/accounts/'] = [
        'title' => 'Accounts Service',
        'file' => '/mogo/ingame/accounts/index.php',
        'category' => 'Mogo - Ingame'
    ];
}

$results = [];
$totalPassed = 0;
$totalWarnings = 0;
$totalErrors = 0;
$criticalIssues = [];
$highPriorityIssues = [];
$mediumPriorityIssues = [];
$lowPriorityIssues = [];

/**
 * Check if file exists and is readable
 */
function checkFileExists($filepath) {
    if (!file_exists($filepath)) {
        return ['status' => 'ERROR', 'message' => 'File not found: ' . $filepath];
    }
    if (!is_readable($filepath)) {
        return ['status' => 'ERROR', 'message' => 'File not readable: ' . $filepath];
    }
    return ['status' => 'OK'];
}

/**
 * Get content of a file
 */
function getFileContent($filepath) {
    return file_get_contents($filepath);
}

/**
 * Check Meta Title
 */
function checkMetaTitle($content, $url) {
    global $totalPassed, $totalWarnings, $totalErrors;
    
    if (preg_match('/<title>(.*?)<\/title>/is', $content, $matches)) {
        $title = trim($matches[1]);
        // Decode HTML entities for accurate length
        $titleDecoded = html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $titleLength = mb_strlen($titleDecoded);
        
        $issues = [];
        
        if ($titleLength === 0) {
            $totalErrors++;
            return [
                'status' => 'ERROR',
                'value' => 'Empty title',
                'length' => 0,
                'recommendation' => 'Add a meaningful title (50-60 characters)'
            ];
        }
        
        // Check for babixGO brand
        if (stripos($titleDecoded, 'babixGO') === false && stripos($titleDecoded, 'babix') === false) {
            $issues[] = 'Brand name missing';
        }
        
        if ($titleLength < 30) {
            $totalWarnings++;
            return [
                'status' => 'WARNING',
                'value' => $titleDecoded,
                'length' => $titleLength,
                'issues' => array_merge(['Too short (< 30 chars)'], $issues),
                'recommendation' => 'Increase to 50-60 characters for better SEO'
            ];
        } elseif ($titleLength > 70) {
            $totalWarnings++;
            return [
                'status' => 'WARNING',
                'value' => $titleDecoded,
                'length' => $titleLength,
                'issues' => array_merge(['Too long (> 70 chars)'], $issues),
                'recommendation' => 'Shorten to 50-60 characters to avoid truncation'
            ];
        } elseif ($titleLength >= 50 && $titleLength <= 60 && empty($issues)) {
            $totalPassed++;
            return [
                'status' => 'PASS',
                'value' => $titleDecoded,
                'length' => $titleLength
            ];
        } else {
            if (!empty($issues)) {
                $totalWarnings++;
                return [
                    'status' => 'WARNING',
                    'value' => $titleDecoded,
                    'length' => $titleLength,
                    'issues' => $issues
                ];
            }
            $totalPassed++;
            return [
                'status' => 'PASS',
                'value' => $titleDecoded,
                'length' => $titleLength
            ];
        }
    } else {
        $totalErrors++;
        return [
            'status' => 'ERROR',
            'message' => 'No title tag found',
            'recommendation' => 'Add <title> tag in <head>'
        ];
    }
}

/**
 * Check Meta Description
 */
function checkMetaDescription($content) {
    global $totalPassed, $totalWarnings, $totalErrors;
    
    if (preg_match('/<meta\s+name=["\']description["\']\s+content=["\'](.*?)["\']/is', $content, $matches)) {
        $description = trim($matches[1]);
        $descDecoded = html_entity_decode($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $descLength = mb_strlen($descDecoded);
        
        $issues = [];
        
        if ($descLength === 0) {
            $totalErrors++;
            return [
                'status' => 'ERROR',
                'value' => 'Empty description',
                'length' => 0,
                'recommendation' => 'Add meaningful description (150-160 characters)'
            ];
        }
        
        // Check for CTA indicators
        $ctaKeywords = ['jetzt', 'hier', 'mehr', 'erfahren', 'kontaktieren', 'entdecken', 'nutzen', 'starten'];
        $hasCTA = false;
        foreach ($ctaKeywords as $keyword) {
            if (stripos($descDecoded, $keyword) !== false) {
                $hasCTA = true;
                break;
            }
        }
        
        if (!$hasCTA) {
            $issues[] = 'No clear CTA (call-to-action)';
        }
        
        if ($descLength < 120) {
            $totalWarnings++;
            return [
                'status' => 'WARNING',
                'value' => $descDecoded,
                'length' => $descLength,
                'issues' => array_merge(['Too short (< 120 chars)'], $issues),
                'recommendation' => 'Expand to 150-160 characters with CTA'
            ];
        } elseif ($descLength > 170) {
            $totalWarnings++;
            return [
                'status' => 'WARNING',
                'value' => $descDecoded,
                'length' => $descLength,
                'issues' => array_merge(['Too long (> 170 chars)'], $issues),
                'recommendation' => 'Shorten to 150-160 characters'
            ];
        } elseif ($descLength >= 150 && $descLength <= 160 && $hasCTA) {
            $totalPassed++;
            return [
                'status' => 'PASS',
                'value' => $descDecoded,
                'length' => $descLength
            ];
        } else {
            if (!empty($issues)) {
                $totalWarnings++;
                return [
                    'status' => 'WARNING',
                    'value' => $descDecoded,
                    'length' => $descLength,
                    'issues' => $issues
                ];
            }
            $totalPassed++;
            return [
                'status' => 'PASS',
                'value' => $descDecoded,
                'length' => $descLength
            ];
        }
    } else {
        $totalErrors++;
        return [
            'status' => 'ERROR',
            'message' => 'No meta description found',
            'recommendation' => 'Add <meta name="description" content="..."> in <head>'
        ];
    }
}

/**
 * Check Canonical URL
 */
function checkCanonicalUrl($content, $url) {
    global $totalPassed, $totalWarnings, $totalErrors;
    
    if (preg_match('/<link\s+rel=["\']canonical["\']\s+href=["\'](.*?)["\']/is', $content, $matches)) {
        $canonical = trim($matches[1]);
        
        // Build expected canonical
        $expectedCanonical = 'https://babixgo.de' . $url;
        
        if ($canonical === $expectedCanonical) {
            $totalPassed++;
            return [
                'status' => 'PASS',
                'value' => $canonical
            ];
        } else {
            $issues = [];
            
            if (!str_starts_with($canonical, 'https://')) {
                $issues[] = 'Not using HTTPS';
            }
            
            if ($url !== '/' && !str_ends_with($canonical, '/')) {
                $issues[] = 'Missing trailing slash';
            }
            
            if ($canonical !== $expectedCanonical) {
                $issues[] = 'URL mismatch';
            }
            
            $totalWarnings++;
            return [
                'status' => 'WARNING',
                'value' => $canonical,
                'expected' => $expectedCanonical,
                'issues' => $issues,
                'recommendation' => 'Update to: ' . $expectedCanonical
            ];
        }
    } else {
        $totalErrors++;
        return [
            'status' => 'ERROR',
            'message' => 'No canonical URL found',
            'recommendation' => 'Add <link rel="canonical" href="https://babixgo.de' . $url . '">'
        ];
    }
}

/**
 * Check H1 Heading
 */
function checkH1($content, $url) {
    global $totalPassed, $totalWarnings, $totalErrors;
    
    preg_match_all('/<h1[^>]*>(.*?)<\/h1>/is', $content, $matches);
    $h1Count = count($matches[0]);
    
    if ($h1Count === 0) {
        $totalErrors++;
        return [
            'status' => 'ERROR',
            'message' => 'No H1 found',
            'recommendation' => 'Add exactly one <h1> tag (preferably with class="welcome-title")'
        ];
    } elseif ($h1Count === 1) {
        $h1Text = strip_tags($matches[1][0]);
        $h1Text = html_entity_decode($h1Text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $h1Text = trim($h1Text);
        
        // Check if H1 has welcome-title class or similar
        $h1Tag = $matches[0][0];
        $hasProperClass = (stripos($h1Tag, 'welcome-title') !== false || 
                          stripos($h1Tag, 'error-message') !== false);
        
        if (!$hasProperClass && $url !== '/404.php') {
            $totalWarnings++;
            return [
                'status' => 'WARNING',
                'value' => $h1Text,
                'issues' => ['Missing welcome-title class'],
                'recommendation' => 'Add class="welcome-title" to H1'
            ];
        }
        
        $totalPassed++;
        return [
            'status' => 'PASS',
            'value' => $h1Text,
            'count' => 1
        ];
    } else {
        $totalWarnings++;
        return [
            'status' => 'WARNING',
            'count' => $h1Count,
            'message' => 'Multiple H1 tags found (' . $h1Count . ')',
            'recommendation' => 'Use only one H1 per page'
        ];
    }
}

/**
 * Check Alt Attributes on Images
 */
function checkAltAttributes($content) {
    global $totalPassed, $totalWarnings;
    
    preg_match_all('/<img[^>]*>/is', $content, $imgMatches);
    $totalImages = count($imgMatches[0]);
    
    if ($totalImages === 0) {
        return [
            'status' => 'N/A',
            'message' => 'No images found'
        ];
    }
    
    $imagesWithoutAlt = [];
    $imagesWithEmptyAlt = 0;
    $imagesWithAlt = 0;
    
    foreach ($imgMatches[0] as $index => $img) {
        if (preg_match('/alt=["\']([^"\']*)["\']/', $img, $altMatch)) {
            if (trim($altMatch[1]) === '') {
                $imagesWithEmptyAlt++;
            } else {
                $imagesWithAlt++;
            }
        } else {
            $imagesWithoutAlt[] = [
                'index' => $index + 1,
                'snippet' => substr($img, 0, 100) . '...'
            ];
        }
    }
    
    if (count($imagesWithoutAlt) === 0) {
        $totalPassed++;
        return [
            'status' => 'PASS',
            'total' => $totalImages,
            'with_alt' => $imagesWithAlt,
            'with_empty_alt' => $imagesWithEmptyAlt
        ];
    } else {
        $totalWarnings++;
        return [
            'status' => 'WARNING',
            'total' => $totalImages,
            'with_alt' => $imagesWithAlt,
            'with_empty_alt' => $imagesWithEmptyAlt,
            'without_alt' => count($imagesWithoutAlt),
            'missing' => $imagesWithoutAlt,
            'recommendation' => 'Add alt attributes to all images'
        ];
    }
}

/**
 * Check Open Graph Tags
 */
function checkOpenGraph($content) {
    global $totalPassed, $totalWarnings;
    
    $ogTags = [
        'og:title' => false,
        'og:description' => false,
        'og:url' => false,
        'og:image' => false,
        'og:type' => false
    ];
    
    $found = [];
    
    foreach ($ogTags as $tag => $value) {
        if (preg_match('/<meta\s+property=["\']' . preg_quote($tag, '/') . '["\']\s+content=["\'](.*?)["\']/is', $content, $matches)) {
            $ogTags[$tag] = true;
            $found[$tag] = trim($matches[1]);
        }
    }
    
    $missing = array_keys(array_filter($ogTags, function($v) { return $v === false; }));
    
    if (empty($missing)) {
        $totalPassed++;
        return [
            'status' => 'PASS',
            'tags' => $found
        ];
    } else {
        $totalWarnings++;
        return [
            'status' => 'WARNING',
            'found' => array_keys($found),
            'missing' => $missing,
            'recommendation' => 'Add missing OG tags: ' . implode(', ', $missing)
        ];
    }
}

/**
 * Check Twitter Card Tags
 */
function checkTwitterCard($content) {
    global $totalPassed, $totalWarnings;
    
    $twitterTags = [
        'twitter:card' => false,
        'twitter:title' => false,
        'twitter:description' => false,
        'twitter:image' => false
    ];
    
    $found = [];
    
    foreach ($twitterTags as $tag => $value) {
        if (preg_match('/<meta\s+name=["\']' . preg_quote($tag, '/') . '["\']\s+content=["\'](.*?)["\']/is', $content, $matches)) {
            $twitterTags[$tag] = true;
            $found[$tag] = trim($matches[1]);
        }
    }
    
    $missing = array_keys(array_filter($twitterTags, function($v) { return $v === false; }));
    
    if (empty($missing)) {
        $totalPassed++;
        return [
            'status' => 'PASS',
            'tags' => $found
        ];
    } else {
        $totalWarnings++;
        return [
            'status' => 'WARNING',
            'found' => array_keys($found),
            'missing' => $missing,
            'recommendation' => 'Add missing Twitter tags: ' . implode(', ', $missing)
        ];
    }
}

/**
 * Check Heading Hierarchy
 */
function checkHeadingHierarchy($content) {
    global $totalPassed, $totalWarnings;
    
    $headings = [];
    for ($i = 1; $i <= 6; $i++) {
        preg_match_all('/<h' . $i . '[^>]*>(.*?)<\/h' . $i . '>/is', $content, $matches);
        if (!empty($matches[0])) {
            foreach ($matches[0] as $heading) {
                $headings[] = [
                    'level' => $i,
                    'text' => trim(strip_tags($heading))
                ];
            }
        }
    }
    
    if (empty($headings)) {
        return [
            'status' => 'N/A',
            'message' => 'No headings found'
        ];
    }
    
    // Check for skipped levels
    $issues = [];
    $prevLevel = 0;
    foreach ($headings as $heading) {
        if ($prevLevel > 0 && $heading['level'] > $prevLevel + 1) {
            $issues[] = 'Skipped from H' . $prevLevel . ' to H' . $heading['level'];
        }
        $prevLevel = $heading['level'];
    }
    
    if (empty($issues)) {
        $totalPassed++;
        return [
            'status' => 'PASS',
            'hierarchy' => array_map(function($h) { return 'H' . $h['level']; }, $headings)
        ];
    } else {
        $totalWarnings++;
        return [
            'status' => 'WARNING',
            'issues' => $issues,
            'hierarchy' => array_map(function($h) { return 'H' . $h['level'] . ': ' . $h['text']; }, $headings),
            'recommendation' => 'Fix heading hierarchy - do not skip levels'
        ];
    }
}

/**
 * Check PHP Partials Inclusion
 */
function checkPartials($content, $filepath) {
    global $totalPassed, $totalWarnings;
    
    $requiredPartials = [
        'head-meta.php',
        'head-links.php',
        'tracking.php',
        'cookie-banner.php',
        'header.php',
        'footer.php',
        'footer-scripts.php'
    ];
    
    $found = [];
    $incorrectInclusions = [];
    
    foreach ($requiredPartials as $partial) {
        // Check for correct inclusion pattern
        $pattern = '/\$_SERVER\[[\'"]DOCUMENT_ROOT[\'"]\]\s*\.\s*[\'"]\/shared\/partials\/' . preg_quote($partial, '/') . '[\'"]/';
        if (preg_match($pattern, $content)) {
            $found[] = $partial;
        } else {
            // Check if partial is included with wrong pattern
            if (stripos($content, $partial) !== false) {
                $incorrectInclusions[] = $partial;
            }
        }
    }
    
    $missing = array_diff($requiredPartials, $found);
    $missing = array_diff($missing, $incorrectInclusions);
    
    $issues = [];
    if (!empty($incorrectInclusions)) {
        $issues[] = 'Incorrect inclusion pattern for: ' . implode(', ', $incorrectInclusions);
    }
    if (!empty($missing)) {
        $issues[] = 'Missing partials: ' . implode(', ', $missing);
    }
    
    if (empty($issues)) {
        $totalPassed++;
        return [
            'status' => 'PASS',
            'found' => $found
        ];
    } else {
        $totalWarnings++;
        return [
            'status' => 'WARNING',
            'found' => $found,
            'issues' => $issues,
            'recommendation' => 'Use correct pattern: $_SERVER[\'DOCUMENT_ROOT\'] . \'/shared/partials/FILE.php\''
        ];
    }
}

/**
 * Check External Links
 */
function checkExternalLinks($content) {
    global $totalPassed, $totalWarnings;
    
    // Find all external links (http/https not to babixgo.de)
    preg_match_all('/<a\s+[^>]*href=["\']https?:\/\/(?!babixgo\.de)([^"\']*)["\'][^>]*>/is', $content, $matches);
    
    if (empty($matches[0])) {
        return [
            'status' => 'N/A',
            'message' => 'No external links found'
        ];
    }
    
    $totalLinks = count($matches[0]);
    $linksWithoutNoopener = [];
    
    foreach ($matches[0] as $link) {
        $hasTargetBlank = (stripos($link, 'target="_blank"') !== false || stripos($link, "target='_blank'") !== false);
        $hasNoopener = (stripos($link, 'noopener') !== false);
        
        if ($hasTargetBlank && !$hasNoopener) {
            $linksWithoutNoopener[] = substr($link, 0, 100) . '...';
        }
    }
    
    if (empty($linksWithoutNoopener)) {
        $totalPassed++;
        return [
            'status' => 'PASS',
            'total' => $totalLinks
        ];
    } else {
        $totalWarnings++;
        return [
            'status' => 'WARNING',
            'total' => $totalLinks,
            'without_noopener' => count($linksWithoutNoopener),
            'recommendation' => 'Add rel="noopener" to all target="_blank" links'
        ];
    }
}

// Run audit for each page
foreach ($pages as $url => $pageInfo) {
    $filepath = $_SERVER['DOCUMENT_ROOT'] . $pageInfo['file'];
    
    $fileCheck = checkFileExists($filepath);
    if ($fileCheck['status'] !== 'OK') {
        $results[$url] = [
            'info' => $pageInfo,
            'file_status' => $fileCheck,
            'checks' => []
        ];
        $totalErrors++;
        continue;
    }
    
    $content = getFileContent($filepath);
    
    $checks = [
        'meta_title' => checkMetaTitle($content, $url),
        'meta_description' => checkMetaDescription($content),
        'canonical' => checkCanonicalUrl($content, $url),
        'h1' => checkH1($content, $url),
        'alt_attributes' => checkAltAttributes($content),
        'open_graph' => checkOpenGraph($content),
        'twitter_card' => checkTwitterCard($content),
        'heading_hierarchy' => checkHeadingHierarchy($content),
        'partials' => checkPartials($content, $filepath),
        'external_links' => checkExternalLinks($content)
    ];
    
    $results[$url] = [
        'info' => $pageInfo,
        'file_status' => $fileCheck,
        'checks' => $checks
    ];
    
    // Categorize issues
    foreach ($checks as $checkName => $checkResult) {
        if ($checkResult['status'] === 'ERROR') {
            $issue = [
                'page' => $url,
                'title' => $pageInfo['title'],
                'check' => $checkName,
                'details' => $checkResult
            ];
            
            // Critical issues
            if (in_array($checkName, ['h1', 'meta_title', 'canonical'])) {
                $criticalIssues[] = $issue;
            } else {
                $highPriorityIssues[] = $issue;
            }
        } elseif ($checkResult['status'] === 'WARNING') {
            $issue = [
                'page' => $url,
                'title' => $pageInfo['title'],
                'check' => $checkName,
                'details' => $checkResult
            ];
            
            // High priority warnings
            if (in_array($checkName, ['meta_description', 'alt_attributes', 'partials'])) {
                $highPriorityIssues[] = $issue;
            } elseif (in_array($checkName, ['open_graph', 'twitter_card'])) {
                $mediumPriorityIssues[] = $issue;
            } else {
                $lowPriorityIssues[] = $issue;
            }
        }
    }
}

// PWA Checks
$pwaChecks = [
    'manifest' => file_exists($_SERVER['DOCUMENT_ROOT'] . '/shared/assets/public/manifest.json'),
    'service_worker' => file_exists($_SERVER['DOCUMENT_ROOT'] . '/shared/assets/public/sw.js'),
    'offline_page' => file_exists($_SERVER['DOCUMENT_ROOT'] . '/offline.html')
];

// Check SW registration in main.js
$mainJsPath = $_SERVER['DOCUMENT_ROOT'] . '/shared/assets/js/main.js';
if (file_exists($mainJsPath)) {
    $mainJsContent = file_get_contents($mainJsPath);
    $pwaChecks['sw_registered'] = (stripos($mainJsContent, 'serviceWorker.register') !== false);
} else {
    $pwaChecks['sw_registered'] = false;
}

// Check manifest link in head-links.php
$headLinksPath = $_SERVER['DOCUMENT_ROOT'] . '/shared/partials/head-links.php';
if (file_exists($headLinksPath)) {
    $headLinksContent = file_get_contents($headLinksPath);
    $pwaChecks['manifest_linked'] = (stripos($headLinksContent, 'manifest.json') !== false);
} else {
    $pwaChecks['manifest_linked'] = false;
}

// Generate Report
echo "# babixGO Website Audit Report\n\n";
echo "**Generated:** " . date('Y-m-d H:i:s') . "\n\n";
echo "**Pages Audited:** " . count($pages) . "\n\n";

echo "---\n\n";

echo "## Executive Summary\n\n";
echo "- ✅ **Passed:** " . $totalPassed . " checks\n";
echo "- ⚠️ **Warnings:** " . $totalWarnings . " checks\n";
echo "- ❌ **Errors:** " . $totalErrors . " checks\n\n";

echo "---\n\n";

echo "## Critical Issues (Priority 1)\n\n";
if (empty($criticalIssues)) {
    echo "✅ No critical issues found!\n\n";
} else {
    foreach ($criticalIssues as $issue) {
        echo "### ❌ " . $issue['title'] . " - `" . $issue['page'] . "`\n\n";
        echo "**Check:** " . ucfirst(str_replace('_', ' ', $issue['check'])) . "\n\n";
        if (isset($issue['details']['message'])) {
            echo "**Issue:** " . $issue['details']['message'] . "\n\n";
        }
        if (isset($issue['details']['recommendation'])) {
            echo "**Fix:** " . $issue['details']['recommendation'] . "\n\n";
        }
    }
}

echo "---\n\n";

echo "## High Priority Issues (Priority 2)\n\n";
if (empty($highPriorityIssues)) {
    echo "✅ No high priority issues found!\n\n";
} else {
    $grouped = [];
    foreach ($highPriorityIssues as $issue) {
        $check = $issue['check'];
        if (!isset($grouped[$check])) {
            $grouped[$check] = [];
        }
        $grouped[$check][] = $issue;
    }
    
    foreach ($grouped as $checkName => $issues) {
        echo "### ⚠️ " . ucfirst(str_replace('_', ' ', $checkName)) . " (" . count($issues) . " pages)\n\n";
        foreach ($issues as $issue) {
            echo "- **" . $issue['title'] . "** (`" . $issue['page'] . "`)\n";
            if (isset($issue['details']['issues']) && is_array($issue['details']['issues'])) {
                foreach ($issue['details']['issues'] as $detail) {
                    echo "  - " . $detail . "\n";
                }
            }
            if (isset($issue['details']['recommendation'])) {
                echo "  - **Fix:** " . $issue['details']['recommendation'] . "\n";
            }
        }
        echo "\n";
    }
}

echo "---\n\n";

echo "## Medium Priority Issues (Priority 3)\n\n";
if (empty($mediumPriorityIssues)) {
    echo "✅ No medium priority issues found!\n\n";
} else {
    $grouped = [];
    foreach ($mediumPriorityIssues as $issue) {
        $check = $issue['check'];
        if (!isset($grouped[$check])) {
            $grouped[$check] = [];
        }
        $grouped[$check][] = $issue;
    }
    
    foreach ($grouped as $checkName => $issues) {
        echo "### ⚠️ " . ucfirst(str_replace('_', ' ', $checkName)) . " (" . count($issues) . " pages)\n\n";
        echo count($issues) . " page(s) affected. Consider adding these tags for better social media sharing.\n\n";
    }
}

echo "---\n\n";

echo "## Low Priority Issues (Priority 4)\n\n";
if (empty($lowPriorityIssues)) {
    echo "✅ No low priority issues found!\n\n";
} else {
    echo count($lowPriorityIssues) . " minor issues found (heading hierarchy, link attributes, etc.)\n\n";
}

echo "---\n\n";

echo "## PWA Status\n\n";
echo "- " . ($pwaChecks['manifest'] ? '✅' : '❌') . " **Manifest:** " . ($pwaChecks['manifest'] ? 'Found at `/shared/assets/public/manifest.json`' : 'Missing') . "\n";
echo "- " . ($pwaChecks['service_worker'] ? '✅' : '❌') . " **Service Worker:** " . ($pwaChecks['service_worker'] ? 'Found at `/shared/assets/public/sw.js`' : 'Missing') . "\n";
echo "- " . ($pwaChecks['sw_registered'] ? '✅' : '⚠️') . " **SW Registration:** " . ($pwaChecks['sw_registered'] ? 'Registered in main.js' : 'Not found in main.js') . "\n";
echo "- " . ($pwaChecks['manifest_linked'] ? '✅' : '⚠️') . " **Manifest Link:** " . ($pwaChecks['manifest_linked'] ? 'Linked in head-links.php' : 'Not found in head-links.php') . "\n";
echo "- " . ($pwaChecks['offline_page'] ? '✅' : '⚠️') . " **Offline Fallback:** " . ($pwaChecks['offline_page'] ? 'Found at `/offline.html`' : 'Missing') . "\n\n";

echo "---\n\n";

echo "## Detailed Results by Page\n\n";

$categories = array_unique(array_column($pages, 'category'));
foreach ($categories as $category) {
    echo "### " . $category . "\n\n";
    
    foreach ($pages as $url => $pageInfo) {
        if ($pageInfo['category'] !== $category) continue;
        
        echo "#### " . $pageInfo['title'] . " - `" . $url . "`\n\n";
        
        if ($results[$url]['file_status']['status'] !== 'OK') {
            echo "❌ **File Error:** " . $results[$url]['file_status']['message'] . "\n\n";
            continue;
        }
        
        $checks = $results[$url]['checks'];
        
        // Passed checks
        $passed = array_filter($checks, function($c) { return $c['status'] === 'PASS'; });
        if (!empty($passed)) {
            echo "**✅ Passed (" . count($passed) . "):**\n";
            foreach ($passed as $checkName => $check) {
                $name = ucfirst(str_replace('_', ' ', $checkName));
                echo "- " . $name;
                if (isset($check['length'])) {
                    echo " (" . $check['length'] . " chars)";
                }
                if (isset($check['count'])) {
                    echo " (" . $check['count'] . ")";
                }
                if (isset($check['total'])) {
                    echo " (" . $check['total'] . " items)";
                }
                echo "\n";
            }
            echo "\n";
        }
        
        // Warnings
        $warnings = array_filter($checks, function($c) { return $c['status'] === 'WARNING'; });
        if (!empty($warnings)) {
            echo "**⚠️ Warnings (" . count($warnings) . "):**\n";
            foreach ($warnings as $checkName => $check) {
                $name = ucfirst(str_replace('_', ' ', $checkName));
                echo "- " . $name . ": ";
                if (isset($check['issues']) && is_array($check['issues'])) {
                    echo implode(', ', $check['issues']);
                } elseif (isset($check['message'])) {
                    echo $check['message'];
                } else {
                    echo "Review needed";
                }
                echo "\n";
            }
            echo "\n";
        }
        
        // Errors
        $errors = array_filter($checks, function($c) { return $c['status'] === 'ERROR'; });
        if (!empty($errors)) {
            echo "**❌ Errors (" . count($errors) . "):**\n";
            foreach ($errors as $checkName => $check) {
                $name = ucfirst(str_replace('_', ' ', $checkName));
                echo "- " . $name . ": " . ($check['message'] ?? 'Error') . "\n";
                if (isset($check['recommendation'])) {
                    echo "  - **Fix:** " . $check['recommendation'] . "\n";
                }
            }
            echo "\n";
        }
    }
}

echo "---\n\n";

echo "## Next Steps\n\n";
echo "1. **Critical Issues:** Fix immediately (H1 tags, titles, canonical URLs)\n";
echo "2. **High Priority:** Address within 1 week (meta descriptions, alt texts, partials)\n";
echo "3. **Medium Priority:** Address within 2 weeks (Open Graph, Twitter Cards)\n";
echo "4. **Low Priority:** Address when time permits (minor optimizations)\n";
echo "5. **PWA:** Ensure all PWA components are properly configured\n\n";

echo "---\n\n";
echo "*Report generated by babixGO Audit Tool v1.0*\n";
