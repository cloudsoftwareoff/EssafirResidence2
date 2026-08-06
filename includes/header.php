<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$lang = getCurrentLanguage();
$is_rtl = $lang === 'ar';

// Domain and Base URL calculation for canonical & open graph links
$http_host = $_SERVER['HTTP_HOST'] ?? 'essafir.tn';
$base_url = 'https://' . $http_host;

// Clean canonical URL without index.php or trailing query parameters
$request_uri = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
$clean_path = preg_replace('#/index\.php$#', '/', $request_uri);
$canonical_url = $base_url . $clean_path;

// Page meta strings
$meta_title = isset($page_title) ? $page_title : t('site_title');
$meta_desc = isset($page_description) ? $page_description : t('hero.sub');
$og_image_url = $base_url . '/images/banner1.webp';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $is_rtl ? 'rtl' : 'ltr'; ?>">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-87X48C4B0X"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-87X48C4B0X');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($meta_title, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($meta_desc, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="Essafir Residence, Résidence Essafir, إقامة السفير, Sidi Bouzid, Tunisia, hotel, residence, rooms, accommodation, short stay, rentals, professionals, students, سيدي بوزيد, تونس">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">

    <!-- Multilingual Hreflang Tags -->
    <link rel="alternate" hreflang="en" href="<?php echo $base_url; ?>/?lang=en" />
    <link rel="alternate" hreflang="fr" href="<?php echo $base_url; ?>/?lang=fr" />
    <link rel="alternate" hreflang="ar" href="<?php echo $base_url; ?>/?lang=ar" />
    <link rel="alternate" hreflang="x-default" href="<?php echo $base_url; ?>/" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Essafir Residence">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($meta_title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta_desc, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo $og_image_url; ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Essafir Residence Sidi Bouzid Tunisia">
    <meta property="og:locale" content="<?php echo $lang === 'ar' ? 'ar_TN' : ($lang === 'fr' ? 'fr_TN' : 'en_US'); ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($meta_title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($meta_desc, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo $og_image_url; ?>">

    <!-- Structured Data (JSON-LD) for Local Lodging Business -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "LodgingBusiness",
          "@id": "<?php echo $base_url; ?>/#identity",
          "name": "Essafir Residence",
          "alternateName": ["Résidence Essafir", "إقامة السفير"],
          "url": "<?php echo $base_url; ?>/",
          "logo": "<?php echo $base_url; ?>/images/logo.png",
          "image": "<?php echo $og_image_url; ?>",
          "description": "<?php echo addslashes($meta_desc); ?>",
          "telephone": "+21650836840",
          "priceRange": "30 - 140 TND",
          "currenciesAccepted": "TND",
          "paymentAccepted": "Cash",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "Immeuble Louiza, 1er Étage, Al-Taqasim",
            "addressLocality": "Sidi Bouzid",
            "addressRegion": "Sidi Bouzid",
            "postalCode": "9100",
            "addressCountry": "TN"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": 35.02388,
            "longitude": 9.47546
          },
          "hasMap": "https://maps.app.goo.gl/RHHgLRhDdyErYBFQA",
          "sameAs": [
            "https://www.facebook.com/profile.php?id=100088038486097"
          ],
          "amenityFeature": [
            { "@type": "LocationFeatureSpecification", "name": "Free High-Speed WiFi", "value": true },
            { "@type": "LocationFeatureSpecification", "name": "24/7 Security & CCTV", "value": true },
            { "@type": "LocationFeatureSpecification", "name": "Air Conditioning", "value": true },
            { "@type": "LocationFeatureSpecification", "name": "Private Parking", "value": true },
            { "@type": "LocationFeatureSpecification", "name": "Daily Cleaning", "value": true },
            { "@type": "LocationFeatureSpecification", "name": "Private Bathroom", "value": true }
          ]
        },
        {
          "@type": "WebSite",
          "@id": "<?php echo $base_url; ?>/#website",
          "url": "<?php echo $base_url; ?>/",
          "name": "Essafir Residence",
          "inLanguage": ["en", "fr", "ar"]
        }
      ]
    }
    </script>

    <!-- Critical Resource Preloads -->
    <link rel="preload" href="images/banner1.webp" as="image" type="image/webp" fetchpriority="high">

    <!-- Fonts & CDN Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>

    <!-- Asynchronous Non-blocking Google Fonts -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Cairo:wght@400;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,500;1,600&family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Cairo:wght@400;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,500;1,600&family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" media="print" onload="this.media='all'">

    <!-- Asynchronous Non-blocking Font Awesome -->
    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" media="print" onload="this.media='all'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400;1,700&family=Cairo:wght@400;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,500;1,600&family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </noscript>

    <!-- Production Tailwind CSS Build -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo @filemtime('assets/css/style.css'); ?>">
    <link rel="icon" href="images/logo.png" type="image/png">

    <style>
        /* ── Webfont display swap ── */
        @font-face { font-family: 'Font Awesome 6 Free'; font-display: swap; }
        @font-face { font-family: 'Font Awesome 6 Brands'; font-display: swap; }

        /* ── Base & Resets ── */
        *, *::before, *::after { box-sizing: border-box; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #FBF6EE; }
        ::-webkit-scrollbar-thumb { background: #D8B98F; border-radius: 8px; border: 2px solid #FBF6EE; }
        ::-webkit-scrollbar-thumb:hover { background: #6E524A; }

        html { scroll-behavior: smooth; }

        body { font-family: 'Jost', system-ui, sans-serif; }
        [dir="rtl"] body { font-family: 'Cairo', sans-serif; }

        h1, h2, h3, h4, h5, h6, .font-serif {
            font-family: 'Cormorant Garamond', Georgia, serif;
        }
        [dir="rtl"] h1, [dir="rtl"] h2, [dir="rtl"] h3,
        [dir="rtl"] h4, [dir="rtl"] h5, [dir="rtl"] h6,
        [dir="rtl"] .font-serif {
            font-family: 'Amiri', serif;
            font-weight: 700;
        }

        /* ── Header scroll state ── */
        .site-header {
            transition: background 0.3s ease, box-shadow 0.3s ease, padding 0.3s ease;
        }
        .site-header.scrolled {
            background: rgba(251,246,238,0.97) !important;
            box-shadow: 0 1px 0 #EAD9C3, 0 4px 24px rgba(74,14,20,0.06);
        }

        /* ── Nav underline hover ── */
        .nav-link {
            position: relative;
            padding-bottom: 4px;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 1.5px;
            background: #B31E2B;
            transition: width 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }
        [dir="rtl"] .nav-link::after { left: auto; right: 0; }
        .nav-link:hover::after { width: 100%; }
        .nav-link.active::after { width: 100%; }

        /* ── Mobile Drawer ── */
        .mobile-drawer {
            transition: transform 0.38s cubic-bezier(0.16, 1, 0.3, 1);
            transform: translateX(105%);
        }
        [dir="rtl"] .mobile-drawer { transform: translateX(-105%); }
        .mobile-drawer.open { transform: translateX(0); }

        .drawer-overlay {
            transition: opacity 0.3s ease, visibility 0.3s ease;
            opacity: 0;
            visibility: hidden;
        }
        .drawer-overlay.open { opacity: 1; visibility: visible; }

        /* ── Lang Dropdown ── */
        .lang-dropdown {
            opacity: 0;
            visibility: hidden;
            transform: translateY(6px);
            transition: opacity 0.2s ease, visibility 0.2s ease, transform 0.2s ease;
        }
        .lang-dropdown.open {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* ── Hero Slider ── */
        .hero-slide {
            transition: opacity 1.4s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
        }
        .hero-slide.active { opacity: 1; }

        .slider-dot {
            transition: all 0.3s ease;
        }
        .slider-dot.active {
            width: 24px !important;
            border-radius: 4px !important;
            background: white !important;
        }

        /* ── Section ticker tape ── */
        @keyframes ticker {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }
        .ticker-track { animation: ticker 28s linear infinite; }
        .ticker-track:hover { animation-play-state: paused; }

        /* ── Room card ── */
        .room-card {
            transition: transform 0.3s cubic-bezier(0.16,1,0.3,1), box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .room-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px rgba(74,14,20,0.1);
            border-color: #B31E2B;
        }
        .room-card:hover .room-img { transform: scale(1.04); }
        .room-img { transition: transform 0.6s cubic-bezier(0.16,1,0.3,1); }

        /* ── Gallery items ── */
        .gallery-item { overflow: hidden; }
        .gallery-img { transition: transform 0.6s cubic-bezier(0.16,1,0.3,1); }
        .gallery-item:hover .gallery-img { transform: scale(1.06); }
        .gallery-overlay {
            transition: opacity 0.3s ease;
            opacity: 0;
        }
        .gallery-item:hover .gallery-overlay { opacity: 1; }

        /* ── Amenity cards ── */
        .amenity-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }
        .amenity-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 28px rgba(74,14,20,0.08);
            border-color: #B31E2B;
        }
        .amenity-icon {
            transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }
        .amenity-card:hover .amenity-icon {
            background: #B31E2B;
            color: white;
            transform: scale(1.08);
        }

        /* ── Floating label form ── */
        .form-field {
            position: relative;
        }
        .form-field input,
        .form-field textarea {
            transition: border-color 0.2s ease, background 0.2s ease;
        }
        .form-field input:focus,
        .form-field textarea:focus {
            border-color: #B31E2B;
            background: white;
            outline: none;
            box-shadow: 0 0 0 3px rgba(179,30,43,0.1);
        }

        /* ── Contact pill info ── */
        .contact-pill {
            transition: border-color 0.2s ease, transform 0.2s ease;
        }
        .contact-pill:hover {
            border-color: #B31E2B;
            transform: translateX(3px);
        }
        [dir="rtl"] .contact-pill:hover { transform: translateX(-3px); }

        /* ── WhatsApp FAB ── */
        .whatsapp-fab {
            transition: transform 0.25s cubic-bezier(0.16,1,0.3,1), box-shadow 0.25s ease;
        }
        .whatsapp-fab:hover {
            transform: scale(1.12);
            box-shadow: 0 8px 30px rgba(37,211,102,0.35);
        }

        /* ── Pillar card ── */
        .pillar-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .pillar-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 28px rgba(74,14,20,0.06);
        }

        /* ── Utility ── */
        .section-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #B31E2B;
            margin-bottom: 12px;
        }
        .section-eyebrow::before {
            content: '';
            display: block;
            width: 34px;
            height: 10px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 34 10'%3E%3Cpath d='M0 5 H21' stroke='%23B8935A' stroke-width='1.2' fill='none'/%3E%3Ccircle cx='26' cy='5' r='2.2' fill='none' stroke='%23B8935A' stroke-width='1.2'/%3E%3Cpath d='M30.5 5c.6-1.4 1.6-1.4 2.2 0-.6 1.4-1.6 1.4-2.2 0z' fill='%23B8935A'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: left center;
            flex-shrink: 0;
        }
        [dir="rtl"] .section-eyebrow { flex-direction: row-reverse; }
        [dir="rtl"] .section-eyebrow::before { transform: scaleX(-1); }

        /* Focus rings */
        a:focus-visible, button:focus-visible {
            outline: 2px solid #B31E2B;
            outline-offset: 3px;
            border-radius: 2px;
        }

        /* Smooth image loading */
        img { display: block; }

        /* Calculator range styling */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            opacity: 1;
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { transition-duration: 0.01ms !important; animation-duration: 0.01ms !important; }
        }
    </style>
</head>
<body class="bg-white text-charcoal antialiased">

<!-- ═══════════════════ HEADER ═══════════════════ -->
<header class="site-header sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-sand-border">
    <div class="container mx-auto px-5 lg:px-8 h-[68px] flex items-center justify-between gap-6">

        <!-- Logo -->
        <a href="index.php" class="flex items-center gap-2.5 shrink-0" aria-label="Essafir Residence — Home">
            <img src="images/logo.png" alt="" class="h-8 w-auto" role="presentation">
            <span class="text-[19px] font-serif text-olive tracking-wide whitespace-nowrap">
                Essafir <span class="text-terra">Residence</span>
            </span>
        </a>

        <!-- Desktop Nav -->
        <nav class="hidden lg:flex items-center gap-7" aria-label="Primary">
            <?php
            $nav_items = [
                ['href' => 'index.php#home', 'label' => t('nav.home')],
                ['href' => 'index.php#residence', 'label' => t('nav.residence')],
                ['href' => 'index.php#rooms', 'label' => t('nav.rooms')],
                ['href' => 'index.php#gallery', 'label' => $lang === 'ar' ? 'المعرض' : ($lang === 'fr' ? 'Galerie' : 'Gallery')],
                ['href' => 'index.php#amenities', 'label' => t('nav.amenities')],
                ['href' => 'index.php#location', 'label' => t('nav.location')],
                ['href' => 'index.php#guide', 'label' => t('nav.guide')],
                ['href' => 'index.php#contact', 'label' => t('nav.contact')],
            ];
            foreach ($nav_items as $item): ?>
                <a href="<?php echo $item['href']; ?>"
                   class="nav-link text-[12.5px] font-semibold tracking-wider uppercase text-clay-muted hover:text-olive transition-colors duration-200">
                    <?php echo $item['label']; ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <!-- Actions -->
        <div class="flex items-center gap-3 shrink-0">

            <!-- eBook Guide Badge Button -->
            <a href="sidi_bouzid_2.pdf" target="_blank" rel="noopener" download
               class="hidden sm:inline-flex items-center gap-1.5 px-3 py-2 text-[11px] font-bold tracking-wider uppercase text-terra bg-terra/10 border border-terra/30 hover:bg-terra hover:text-white rounded-[3px] transition-all duration-200"
               title="Download Free Sidi Bouzid City & Travel Guide (PDF)">
                <i class="fa-solid fa-file-pdf text-[12px]"></i>
                <span><?php echo t('nav.guide'); ?></span>
            </a>

            <!-- Language picker -->
            <div class="relative">
                <button id="lang-btn"
                    class="flex items-center gap-1.5 px-3 py-2 text-[11px] font-bold tracking-wider uppercase text-clay-muted border border-sand-border hover:border-terra hover:text-terra rounded-[3px] transition-all duration-200 bg-transparent cursor-pointer"
                    aria-haspopup="true" aria-expanded="false" aria-label="<?php echo $lang === 'ar' ? 'اختر اللغة' : 'Select Language'; ?>">
                    <i class="fa-solid fa-globe text-[10px]"></i>
                    <span><?php echo strtoupper($lang); ?></span>
                    <i class="fa-solid fa-chevron-down text-[7px]"></i>
                </button>
                <div id="lang-menu"
                    class="lang-dropdown absolute <?php echo $is_rtl ? 'left-0' : 'right-0'; ?> top-[calc(100%+8px)] w-36 bg-white border border-sand-border shadow-lg rounded-[4px] overflow-hidden z-50 flex flex-col">
                    <?php
                    $langs = ['en' => '🇬🇧 English', 'fr' => '🇫🇷 Français', 'ar' => '🇸🇦 عربي'];
                    foreach ($langs as $code => $label): ?>
                        <a href="?lang=<?php echo $code; ?>"
                           class="px-4 py-2.5 text-[12.5px] font-medium text-clay-muted hover:bg-sandstone hover:text-terra transition-colors <?php echo $lang === $code ? 'bg-sandstone text-olive font-semibold' : ''; ?>">
                            <?php echo $label; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- WhatsApp CTA — desktop -->
            <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>?text=<?php echo urlencode('Hello, I am interested in booking a room at Essafir Residence Sidi Bouzid.'); ?>"
               target="_blank" rel="noopener"
               class="hidden lg:inline-flex items-center gap-2 px-4 py-2.5 text-[11px] font-bold uppercase tracking-wider bg-olive text-white rounded-[3px] hover:bg-olive-mid transition-all duration-200">
                <i class="fa-brands fa-whatsapp text-[13px] text-whatsapp"></i>
                <?php echo t('hero.cta_whatsapp'); ?>
            </a>

            <!-- Hamburger -->
            <button id="menu-btn"
                class="lg:hidden flex items-center justify-center w-9 h-9 text-olive rounded-[3px] border border-sand-border hover:border-terra transition-colors"
                aria-label="Open menu" aria-expanded="false" aria-controls="mobile-nav">
                <i class="fa-solid fa-bars text-sm"></i>
            </button>
        </div>
    </div>
</header>

<!-- ═══════════════════ MOBILE DRAWER ═══════════════════ -->
<div id="nav-overlay"
    class="drawer-overlay fixed inset-0 bg-charcoal/50 backdrop-blur-[2px] z-[110]"
    aria-hidden="true"></div>

<aside id="mobile-nav"
    class="mobile-drawer fixed top-0 bottom-0 <?php echo $is_rtl ? 'left-0' : 'right-0'; ?> w-[300px] bg-white z-[120] shadow-2xl flex flex-col"
    aria-label="Mobile navigation">

    <!-- Drawer header -->
    <div class="flex items-center justify-between px-7 py-5 border-b border-sand-border">
        <a href="index.php" class="font-serif text-[17px] text-olive">
            Essafir <span class="text-terra">Residence</span>
        </a>
        <button id="nav-close"
            class="w-8 h-8 flex items-center justify-center text-clay-muted hover:text-olive border border-sand-border rounded-[3px] transition-colors bg-transparent cursor-pointer"
            aria-label="Close menu">
            <i class="fa-solid fa-xmark text-sm"></i>
        </button>
    </div>

    <!-- Drawer nav links -->
    <nav class="flex flex-col px-7 py-6 gap-1" aria-label="Mobile navigation">
        <?php foreach ($nav_items as $item): ?>
            <a href="<?php echo $item['href']; ?>"
               class="drawer-item flex items-center gap-3 px-3 py-3 text-[15px] font-medium text-clay-muted hover:text-olive hover:bg-sandstone rounded-[4px] transition-all duration-200">
                <?php echo $item['label']; ?>
            </a>
        <?php endforeach; ?>
    </nav>

    <!-- Drawer footer -->
    <div class="mt-auto px-7 py-6 border-t border-sand-border flex flex-col gap-5">
        <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>?text=<?php echo urlencode('Hello, I am interested in booking a room at Essafir Residence.'); ?>"
           target="_blank" rel="noopener"
           class="flex items-center justify-center gap-2 px-5 py-3 text-[12px] font-bold uppercase tracking-wider bg-olive text-white rounded-[3px] hover:bg-olive-mid transition-colors">
            <i class="fa-brands fa-whatsapp text-whatsapp"></i>
            <?php echo t('hero.cta_whatsapp'); ?>
        </a>

        <div>
            <p class="text-[10px] font-bold uppercase tracking-widest text-clay-muted mb-2.5">
                <?php echo $is_rtl ? 'اللغة' : ($lang === 'fr' ? 'Langue' : 'Language'); ?>
            </p>
            <div class="flex gap-1.5">
                <?php foreach (['en' => 'EN', 'fr' => 'FR', 'ar' => 'عر'] as $code => $label): ?>
                    <a href="?lang=<?php echo $code; ?>"
                       class="flex-1 text-center py-2 text-[11px] font-bold border rounded-[3px] transition-all
                              <?php echo $lang === $code
                                  ? 'bg-olive text-white border-olive'
                                  : 'border-sand-border text-clay-muted hover:border-terra hover:text-terra'; ?>">
                        <?php echo $label; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</aside>