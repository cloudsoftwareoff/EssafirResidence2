<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$lang = getCurrentLanguage();
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>" dir="<?php echo $lang === 'ar' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : t('site_title'); ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : t('home.about_description'); ?>">
    <meta name="keywords" content="Essafir Residence, accommodation Sidi Bouzid, hotel Sidi Bouzid, rooms Sidi Bouzid, rent rooms Tunisia, premium residence, security, fast wifi">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : t('site_title'); ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? $page_description : t('home.about_description'); ?>">
    <meta property="og:image" content="images/logo.png">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="<?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : t('site_title'); ?>">
    <meta property="twitter:description" content="<?php echo isset($page_description) ? $page_description : t('home.about_description'); ?>">
    
    <!-- Structured Data (JSON-LD) for Local Business / LodgingBusiness -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LodgingBusiness",
      "name": "<?php echo SITE_NAME; ?>",
      "description": "<?php echo t('home.about_description'); ?>",
      "image": "images/logo.png",
      "telephone": "<?php echo WHATSAPP_PHONE; ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Al-Taqasim, Louiza Building, First Floor",
        "addressLocality": "Sidi Bouzid",
        "addressCountry": "TN"
      },
      "priceRange": "50 TND - 100 TND",
      "amenityFeature": [
        {
          "@type": "LocationFeatureSpecification",
          "name": "24/7 Security",
          "value": true
        },
        {
          "@type": "LocationFeatureSpecification",
          "name": "Fast WiFi",
          "value": true
        },
        {
          "@type": "LocationFeatureSpecification",
          "name": "Daily Cleaning",
          "value": true
        },
        {
          "@type": "LocationFeatureSpecification",
          "name": "Free Parking",
          "value": true
        }
      ]
    }
    </script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#C41E3A',
                        accent: '#C41E3A',
                        gold: '#D4AF37',
                        crimson: '#DC143C',
                    },
                    fontFamily: {
                        display: ['Playfair Display', 'serif'],
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" href="images/logo.png" type="image/png">
    
    <style>
        :root {
            --primary: #C41E3A;
            --accent: #C41E3A;
            --gold: #D4AF37;
            --crimson: #DC143C;
        }
        
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: #FAFAFA;
        }
        
        [dir="rtl"] { 
            font-family: 'Cairo', 'Segoe UI', Tahoma, sans-serif; 
        }
        
        .hero-slider { 
            height: 650px; 
            position: relative;
        }
        
        @media (max-width: 768px) { 
            .hero-slider { height: 450px; } 
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        /* Backdrop blur glass effect */
        .glass-effect {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.92);
        }
        
        /* Refined hover lift */
        .hover-lift {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), 
                        box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(196, 30, 58, 0.15);
        }
        
        /* Elegant shadows */
        .shadow-refined {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05), 
                        0 1px 2px rgba(0, 0, 0, 0.03);
        }
        
        .shadow-refined-lg {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08), 
                        0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* Navigation underline animation */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        /* Gradient accents - Red and Gold */
        .gradient-accent {
            background: linear-gradient(135deg, #C41E3A 0%, #8B0000 100%);
        }
        
        .gradient-gold {
            background: linear-gradient(135deg, #D4AF37 0%, #C5A028 100%);
        }
        
        /* Smooth image loading */
        img {
            image-rendering: -webkit-optimize-contrast;
        }
        
        /* Card hover effect */
        .card-interactive {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-interactive:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(196, 30, 58, 0.2);
        }
        
        /* Button animations */
        .btn-primary {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(196, 30, 58, 0.4);
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }
        
        /* Gold accent elements */
        .gold-accent {
            color: var(--gold);
        }
        
        .border-gold {
            border-color: var(--gold);
        }
        
        /* Red hover states */
        .hover-red:hover {
            color: var(--accent);
        }
        
        .hover-bg-red:hover {
            background-color: rgba(196, 30, 58, 0.05);
        }
    </style>
</head>
<body class="bg-gray-50">
    
    <header class="glass-effect shadow-refined sticky top-0 z-50 border-b border-gray-100/50">
        <nav class="container mx-auto px-4 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="index.php" class="block transition-transform hover:scale-105 duration-300">
                        <img src="images/logo.png" alt="Essafir Residence" class="h-14 md:h-16 w-auto">
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden text-gray-700 hover:text-[#C41E3A] focus:outline-none p-2 rounded-lg hover:bg-gray-50 transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-1 <?php echo $lang === 'ar' ? 'space-x-reverse' : ''; ?>">
                    <a href="index.php" class="nav-link px-4 py-2 text-sm font-medium <?php echo $current_page === 'index' ? 'text-[#C41E3A] active' : 'text-gray-700 hover:text-[#C41E3A]'; ?>">
                        <?php echo t('nav.home'); ?>
                    </a>
                    <a href="about.php" class="nav-link px-4 py-2 text-sm font-medium <?php echo $current_page === 'about' ? 'text-[#C41E3A] active' : 'text-gray-700 hover:text-[#C41E3A]'; ?>">
                        <?php echo t('nav.about'); ?>
                    </a>
                    <a href="room.php" class="nav-link px-4 py-2 text-sm font-medium <?php echo $current_page === 'room' ? 'text-[#C41E3A] active' : 'text-gray-700 hover:text-[#C41E3A]'; ?>">
                        <?php echo t('nav.rooms'); ?>
                    </a>
                    <a href="price.php" class="nav-link px-4 py-2 text-sm font-medium <?php echo $current_page === 'price' ? 'text-[#C41E3A] active' : 'text-gray-700 hover:text-[#C41E3A]'; ?>">
                        <?php echo t('nav.price'); ?>
                    </a>
                    <a href="contact.php" class="nav-link px-4 py-2 text-sm font-medium <?php echo $current_page === 'contact' ? 'text-[#C41E3A] active' : 'text-gray-700 hover:text-[#C41E3A]'; ?>">
                        <?php echo t('nav.contact'); ?>
                    </a>
                    
                    <!-- Language Dropdown -->
                    <div class="relative language-dropdown ms-4">
                        <button id="lang-btn" class="flex items-center space-x-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-[#C41E3A] hover:bg-gray-50 rounded-lg transition-all focus:outline-none <?php echo $lang === 'ar' ? 'space-x-reverse' : ''; ?>">
                            <i class="fas fa-globe text-base"></i>
                            <span class="hidden xl:inline"><?php echo strtoupper($lang); ?></span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="lang-menu" class="hidden absolute end-0 mt-2 w-44 bg-white rounded-xl shadow-refined-lg border border-gray-100/50 py-2 overflow-hidden">
                            <a href="?lang=en" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-red-50 hover:text-[#C41E3A] transition-colors">
                                <span class="me-3 text-lg">🇬🇧</span>
                                <span class="font-medium">English</span>
                            </a>
                            <a href="?lang=fr" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-red-50 hover:text-[#C41E3A] transition-colors">
                                <span class="me-3 text-lg">🇫🇷</span>
                                <span class="font-medium">Français</span>
                            </a>
                            <a href="?lang=ar" class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-red-50 hover:text-[#C41E3A] transition-colors">
                                <span class="me-3 text-lg">🇸🇦</span>
                                <span class="font-medium">عربي</span>
                            </a>
                        </div>
                    </div>
                    
                    <!-- CTA Button with Gold Accent -->
                    <a href="contact.php" class="btn-primary ms-4 gradient-accent text-white px-6 py-2.5 rounded-lg text-sm font-semibold relative z-10 border border-[#D4AF37]/20">
                        <?php echo t('home.book_button'); ?>
                    </a>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden lg:hidden mt-4 pb-4 border-t border-gray-100/50 pt-4 transition-all duration-300 ease-in-out opacity-0 max-h-0 overflow-hidden">
                <a href="index.php" class="block py-3 px-3 text-sm font-medium rounded-lg transition-colors <?php echo $current_page === 'index' ? 'text-[#C41E3A] bg-red-50' : 'text-gray-700 hover:bg-gray-50'; ?>">
                    <?php echo t('nav.home'); ?>
                </a>
                <a href="about.php" class="block py-3 px-3 text-sm font-medium rounded-lg transition-colors <?php echo $current_page === 'about' ? 'text-[#C41E3A] bg-red-50' : 'text-gray-700 hover:bg-gray-50'; ?>">
                    <?php echo t('nav.about'); ?>
                </a>
                <a href="room.php" class="block py-3 px-3 text-sm font-medium rounded-lg transition-colors <?php echo $current_page === 'room' ? 'text-[#C41E3A] bg-red-50' : 'text-gray-700 hover:bg-gray-50'; ?>">
                    <?php echo t('nav.rooms'); ?>
                </a>
                <a href="price.php" class="block py-3 px-3 text-sm font-medium rounded-lg transition-colors <?php echo $current_page === 'price' ? 'text-[#C41E3A] bg-red-50' : 'text-gray-700 hover:bg-gray-50'; ?>">
                    <?php echo t('nav.price'); ?>
                </a>
                <a href="contact.php" class="block py-3 px-3 text-sm font-medium rounded-lg transition-colors <?php echo $current_page === 'contact' ? 'text-[#C41E3A] bg-red-50' : 'text-gray-700 hover:bg-gray-50'; ?>">
                    <?php echo t('nav.contact'); ?>
                </a>
                <div class="mt-4 pt-4 border-t border-gray-100/50">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 px-3"><?php echo t('nav.language'); ?></p>
                    <a href="?lang=en" class="flex items-center py-2.5 px-3 rounded-lg hover:bg-gray-50 text-gray-700 transition-colors">
                        <span class="me-3 text-lg">🇬🇧</span>
                        <span class="font-medium">English</span>
                    </a>
                    <a href="?lang=fr" class="flex items-center py-2.5 px-3 rounded-lg hover:bg-gray-50 text-gray-700 transition-colors">
                        <span class="me-3 text-lg">🇫🇷</span>
                        <span class="font-medium">Français</span>
                    </a>
                    <a href="?lang=ar" class="flex items-center py-2.5 px-3 rounded-lg hover:bg-gray-50 text-gray-700 transition-colors">
                        <span class="me-3 text-lg">🇸🇦</span>
                        <span class="font-medium">عربي</span>
                    </a>
                </div>
                <a href="contact.php" class="btn-primary mt-4 block w-full text-center gradient-accent text-white px-6 py-3 rounded-lg font-semibold relative border border-[#D4AF37]/20">
                    <?php echo t('home.book_button'); ?>
                </a>
            </div>
        </nav>
    </header>