<?php
require_once 'includes/config.php';

$page_title = t('site_title');
$page_description = t('hero.sub');

require_once 'includes/header.php';

$rooms = [
    [
        'id' => 'standard',
        'title' => t('rooms.standard_title'),
        'price' => '30',
        'price_note' => $lang === 'ar' ? 'حسب التوفر' : ($lang === 'fr' ? 'sous réserve de disponibilité' : 'subject to availability'),
        'image' => 'images/one_bed.jpeg',
        'features' => [
            $lang === 'ar' ? 'سرير فردي أو مزدوج' : ($lang === 'fr' ? 'Lit simple ou double' : 'Single or Double Bed'),
            t('amenities.wifi'),
            t('amenities.ac'),
            t('amenities.bathroom'),
            t('amenities.cleaning')
        ],
        'featured' => false
    ],
    [
        'id' => 'deluxe',
        'title' => t('rooms.deluxe_title'),
        'price' => '60',
        'price_note' => $lang === 'ar' ? 'حسب التوفر' : ($lang === 'fr' ? 'sous réserve de disponibilité' : 'subject to availability'),
        'image' => 'images/gallery4.webp',
        'features' => [
            $lang === 'ar' ? 'سرير كوين أو كينغ' : ($lang === 'fr' ? 'Lit Queen ou King' : 'Queen or King Bed'),
            t('amenities.wifi'),
            t('amenities.ac'),
            t('amenities.tv'),
            t('amenities.bathroom'),
            t('amenities.cleaning')
        ],
        'featured' => true
    ],
    [
        'id' => 'family',
        'title' => t('rooms.family_title'),
        'price' => '140',
        'price_note' => '',
        'image' => 'images/gallery9.webp',
        'features' => [
            $lang === 'ar' ? 'غرفتا نوم منفصلتان' : ($lang === 'fr' ? '2 chambres séparées' : '2 Separate Bedrooms'),
            t('amenities.wifi'),
            t('amenities.ac'),
            $lang === 'ar' ? 'غرفة معيشة خاصة' : ($lang === 'fr' ? 'Salon Privé' : 'Private Living Room'),
            $lang === 'ar' ? 'مطبخ صغير' : ($lang === 'fr' ? 'Kitchenette' : 'Kitchenette'),
            t('amenities.bathroom'),
            t('amenities.cleaning')
        ],
        'featured' => false
    ]
];

$amenities_list = [
    ['icon' => 'fa-shield-halved', 'name' => t('amenities.security'), 'desc' => t('amenities.security_desc')],
    ['icon' => 'fa-wifi',          'name' => t('amenities.wifi'),     'desc' => t('amenities.wifi_desc')],
    ['icon' => 'fa-snowflake',     'name' => t('amenities.ac'),       'desc' => t('amenities.ac_desc')],
    ['icon' => 'fa-tv',            'name' => t('amenities.tv'),       'desc' => t('amenities.tv_desc')],
    ['icon' => 'fa-bath',          'name' => t('amenities.bathroom'), 'desc' => t('amenities.bathroom_desc')],
    ['icon' => 'fa-broom',         'name' => t('amenities.cleaning'), 'desc' => t('amenities.cleaning_desc')],
    ['icon' => 'fa-square-parking','name' => t('amenities.parking'),  'desc' => t('amenities.parking_desc')],
];

$gallery_items = [
    ['src' => 'images/gallery1.webp', 'alt' => t('gallery.img1'), 'class' => 'sm:col-span-2 sm:row-span-2'],
    ['src' => 'images/gallery2.webp', 'alt' => t('gallery.img2'), 'class' => 'col-span-1'],
    ['src' => 'images/gallery3.webp', 'alt' => t('gallery.img3'), 'class' => 'col-span-1'],
    ['src' => 'images/gallery4.webp', 'alt' => t('gallery.img4'), 'class' => 'col-span-1'],
    ['src' => 'images/gallery5.webp', 'alt' => t('gallery.img5'), 'class' => 'col-span-1'],
    ['src' => 'images/gallery6.webp', 'alt' => t('gallery.img6'), 'class' => 'sm:col-span-2'],
    ['src' => 'images/gallery7.webp', 'alt' => t('gallery.img7'), 'class' => 'col-span-1'],
    ['src' => 'images/gallery8.webp', 'alt' => t('gallery.img8'), 'class' => 'col-span-1'],
    ['src' => 'images/gallery9.webp', 'alt' => t('gallery.img9'), 'class' => 'col-span-1'],
];

$hero_banners = [
    'images/banner1.webp',
    'images/banner_2.webp',
    'images/banner_3.webp',
    'images/banner33.jpeg',
];
?>

<main>

<!-- ══════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════ -->
<section id="home" class="relative bg-sandstone overflow-hidden min-h-[calc(100vh-68px)]">

    <!-- Subtle background texture line -->
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle at 20% 80%, rgba(179,30,43,0.05) 0%, transparent 60%), radial-gradient(circle at 80% 20%, rgba(74,14,20,0.04) 0%, transparent 50%);"></div>

    <div class="container mx-auto px-5 lg:px-8 flex flex-col lg:flex-row items-center min-h-[calc(100vh-68px)] gap-10 lg:gap-0">

        <!-- Left: Typography -->
        <div class="flex-1 flex flex-col justify-center py-14 lg:py-0 <?php echo $is_rtl ? 'lg:pl-12' : 'lg:pr-12'; ?> z-10 order-2 lg:order-1">

            <!-- Location chip -->
            <div class="inline-flex items-center gap-2 mb-5 self-start">
                <span class="w-5 h-px bg-terra"></span>
                <span class="text-[11px] font-bold tracking-[0.18em] uppercase text-terra">
                    <?php echo $lang === 'ar' ? 'سيدي بوزيد، تونس' : ($lang === 'fr' ? 'Sidi Bouzid, Tunisie' : 'Sidi Bouzid, Tunisia'); ?>
                </span>
            </div>

            <h1 class="text-[48px] lg:text-[64px] xl:text-[72px] font-serif text-olive leading-[1.05] tracking-[-0.01em] mb-6 max-w-[560px]">
                <?php echo t('hero.title'); ?>
            </h1>

            <p class="text-[16px] lg:text-[17px] text-clay-muted mb-10 max-w-[440px] leading-[1.7] font-light">
                <?php echo t('hero.sub'); ?>
            </p>

            <!-- Stats row -->
            <div class="flex items-center gap-8 mb-10 pb-10 border-b border-sand-border">
                <div>
                    <div class="text-[28px] font-serif text-olive leading-none">3</div>
                    <div class="text-[11px] text-clay-muted mt-1 uppercase tracking-wider font-medium">
                        <?php echo $lang === 'ar' ? 'أنواع الغرف' : ($lang === 'fr' ? 'Types de chambre' : 'Room Types'); ?>
                    </div>
                </div>
                <div class="w-px h-8 bg-sand-border"></div>
                <div>
                    <div class="text-[28px] font-serif text-olive leading-none">24/7</div>
                    <div class="text-[11px] text-clay-muted mt-1 uppercase tracking-wider font-medium">
                        <?php echo $lang === 'ar' ? 'حماية وأمان' : ($lang === 'fr' ? 'Sécurité' : 'Security'); ?>
                    </div>
                </div>
                <div class="w-px h-8 bg-sand-border"></div>
                <div>
                    <div class="text-[28px] font-serif text-olive leading-none">30<span class="text-[16px] text-terra">+</span></div>
                    <div class="text-[11px] text-clay-muted mt-1 uppercase tracking-wider font-medium">
                        <?php echo $lang === 'ar' ? 'دينار / ليلة' : ($lang === 'fr' ? 'TND / nuit' : 'TND / night'); ?>
                    </div>
                </div>
            </div>

            <!-- CTAs -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="flex flex-wrap items-center gap-3">
                    <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>?text=<?php echo urlencode('Hello, I am interested in reserving a room at Essafir Residence.'); ?>"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2.5 px-7 py-3.5 text-[12px] font-bold uppercase tracking-wider bg-olive text-white rounded-[3px] hover:bg-olive-mid transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(74,14,20,0.25)]">
                        <i class="fa-brands fa-whatsapp text-whatsapp text-[15px]"></i>
                        <?php echo t('hero.cta_whatsapp'); ?>
                    </a>
                    <a href="#rooms"
                       class="inline-flex items-center gap-2.5 px-7 py-3.5 text-[12px] font-bold uppercase tracking-wider bg-transparent border border-sand-dark text-clay-muted rounded-[3px] hover:border-olive hover:text-olive transition-all duration-200">
                        <?php echo t('hero.cta_explore'); ?>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
                <div class="inline-flex items-center gap-1.5 text-[11px] text-clay-muted font-medium bg-white/60 px-3 py-1.5 rounded-full border border-sand-border">
                    <span class="w-2 h-2 rounded-full bg-whatsapp animate-pulse"></span>
                    <?php echo t('contact.response_time'); ?>
                </div>
            </div>
        </div>

        <!-- Right: Arch image slider -->
        <div class="flex-1 flex items-center justify-center py-10 lg:py-16 order-1 lg:order-2">
            <div class="relative">
                <!-- Brass flourish ornaments, echoing the logo's scrollwork -->
                <svg class="absolute -top-6 <?php echo $is_rtl ? '-right-6' : '-left-6'; ?> w-16 h-16 pointer-events-none z-10" viewBox="0 0 64 64" aria-hidden="true">
                    <g fill="none" stroke="#B8935A" stroke-width="1.6">
                        <path d="M6 34 C 6 18, 18 6, 34 6"/>
                        <path d="M14 34 C 14 22, 22 14, 34 14"/>
                        <circle cx="34" cy="6" r="2.4" fill="#B8935A"/>
                    </g>
                </svg>
                <svg class="absolute -bottom-6 <?php echo $is_rtl ? '-left-6' : '-right-6'; ?> w-16 h-16 pointer-events-none z-10" viewBox="0 0 64 64" aria-hidden="true" style="transform: rotate(180deg);">
                    <g fill="none" stroke="#B8935A" stroke-width="1.6">
                        <path d="M6 34 C 6 18, 18 6, 34 6"/>
                        <path d="M14 34 C 14 22, 22 14, 34 14"/>
                        <circle cx="34" cy="6" r="2.4" fill="#B8935A"/>
                    </g>
                </svg>
                <div class="w-[320px] sm:w-[380px] lg:w-[420px] aspect-[3/4] rounded-arch overflow-hidden shadow-2xl shadow-olive/20 relative bg-olive">
                    <?php foreach ($hero_banners as $i => $banner): ?>
                        <div class="hero-slide absolute inset-0 <?php echo $i === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo $banner; ?>"
                                 alt="Essafir Residence Sidi Bouzid Tunisia — Room & Accommodation View <?php echo $i + 1; ?>"
                                 class="w-full h-full object-cover"
                                 width="420" height="560"
                                 <?php echo $i === 0 ? 'fetchpriority="high"' : 'loading="lazy"'; ?>>
                            <div class="absolute inset-0 bg-gradient-to-t from-olive/50 via-transparent to-transparent"></div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Slide counter badge -->
                    <div class="absolute top-5 <?php echo $is_rtl ? 'left-5' : 'right-5'; ?> bg-white/15 backdrop-blur-sm px-3 py-1.5 rounded-full">
                        <span id="slide-counter" class="text-white text-[11px] font-semibold">1 / <?php echo count($hero_banners); ?></span>
                    </div>

                    <!-- Dot nav -->
                    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-1.5 z-10">
                        <?php foreach ($hero_banners as $i => $banner): ?>
                            <button class="slider-dot w-2 h-2 rounded-full bg-white/40 border-0 cursor-pointer <?php echo $i === 0 ? 'active' : ''; ?>"
                                    aria-label="Slide <?php echo $i + 1; ?>"></button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Floating feature chip -->
                <div class="absolute -bottom-4 <?php echo $is_rtl ? 'right-[-24px]' : 'left-[-24px]'; ?> bg-white border border-sand-border rounded-[6px] px-5 py-3.5 shadow-lg shadow-olive/8">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-sandstone rounded-full flex items-center justify-center text-terra text-sm">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                            <div class="text-[11px] font-bold text-olive">
                                <?php echo $lang === 'ar' ? 'حماية على مدار الساعة' : ($lang === 'fr' ? 'Sécurité 24/7' : '24/7 Security'); ?>
                            </div>
                            <div class="text-[10px] text-clay-muted">
                                <?php echo $lang === 'ar' ? 'حارس + مراقبة' : ($lang === 'fr' ? 'Gardien + surveillance' : 'Guardian + CCTV'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════
     TRUST TICKER
══════════════════════════════════════════════════ -->
<div class="bg-olive py-3.5 overflow-hidden" aria-hidden="true">
    <div class="ticker-track flex items-center gap-0 whitespace-nowrap">
        <?php
        $ticker_items = [
            ['icon' => 'fa-wifi',            'text' => $lang === 'ar' ? 'واي فاي مجاني' : ($lang === 'fr' ? 'WiFi Gratuit' : 'Free High-Speed WiFi')],
            ['icon' => 'fa-shield-halved',   'text' => $lang === 'ar' ? 'أمان 24/7' : ($lang === 'fr' ? 'Sécurité 24/7' : '24/7 Security')],
            ['icon' => 'fa-square-parking',  'text' => $lang === 'ar' ? 'موقف مجاني' : ($lang === 'fr' ? 'Parking Gratuit' : 'Free Parking')],
            ['icon' => 'fa-snowflake',       'text' => $lang === 'ar' ? 'تكييف' : ($lang === 'fr' ? 'Climatisation' : 'Air Conditioning')],
            ['icon' => 'fa-broom',           'text' => $lang === 'ar' ? 'تنظيف يومي' : ($lang === 'fr' ? 'Nettoyage Quotidien' : 'Daily Cleaning')],
            ['icon' => 'fa-bath',            'text' => $lang === 'ar' ? 'حمام خاص' : ($lang === 'fr' ? 'Salle de Bain Privée' : 'Private Bathroom')],
            ['icon' => 'fa-tv',              'text' => $lang === 'ar' ? 'تلفزيون ذكي' : ($lang === 'fr' ? 'TV Intelligente' : 'Smart TV')],
        ];
        // Duplicate for seamless loop
        $ticker_all = array_merge($ticker_items, $ticker_items);
        foreach ($ticker_all as $t_item): ?>
            <span class="inline-flex items-center gap-2 px-7 text-[11px] font-semibold tracking-wider uppercase text-white/50">
                <i class="fa-solid <?php echo $t_item['icon']; ?> text-terra text-[10px]"></i>
                <?php echo $t_item['text']; ?>
                <span class="mx-3 text-white/15">✦</span>
            </span>
        <?php endforeach; ?>
    </div>
</div>

<!-- ══════════════════════════════════════════════════
     THE RESIDENCE
══════════════════════════════════════════════════ -->
<section id="residence" class="py-24 lg:py-32 bg-white">
    <div class="container mx-auto px-5 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">

            <!-- Text -->
            <div>
                <span class="section-eyebrow"><?php echo t('nav.residence'); ?></span>
                <h2 class="text-[38px] lg:text-[50px] font-serif text-olive leading-[1.1] mb-6 tracking-[-0.01em]">
                    <?php echo t('residence.title'); ?>
                </h2>
                <p class="text-[16px] text-clay-muted leading-[1.75] mb-8 max-w-[480px]">
                    <?php echo t('residence.desc'); ?>
                </p>

                <!-- Inline trust marks -->
                <div class="flex flex-wrap gap-3 mt-2">
                    <?php
                    $trust = [
                        $lang === 'ar' ? 'محترفون' : ($lang === 'fr' ? 'Professionnels' : 'Professionals'),
                        $lang === 'ar' ? 'طلاب' : ($lang === 'fr' ? 'Étudiants' : 'Students'),
                        $lang === 'ar' ? 'زوار قصير المدى' : ($lang === 'fr' ? 'Courte durée' : 'Short Stays'),
                    ];
                    foreach ($trust as $item): ?>
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-[11px] font-bold uppercase tracking-wider border border-sand-border text-clay-muted rounded-full">
                            <i class="fa-solid fa-check text-terra text-[9px]"></i>
                            <?php echo $item; ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Pillars -->
            <div class="flex flex-col gap-4">
                <?php
                $pillars = [
                    ['icon' => 'fa-shield-halved', 'title' => t('residence.feat_security_title'), 'desc' => t('residence.feat_security_desc')],
                    ['icon' => 'fa-wifi',           'title' => t('residence.feat_wifi_title'),     'desc' => t('residence.feat_wifi_desc')],
                    ['icon' => 'fa-square-parking', 'title' => t('residence.feat_parking_title'),  'desc' => t('residence.feat_parking_desc')],
                ];
                foreach ($pillars as $p): ?>
                    <div class="pillar-card group flex gap-5 p-6 bg-sandstone border border-sand-border rounded-[6px]
                                <?php echo $is_rtl ? 'border-r-[3px] border-r-terra/60' : 'border-l-[3px] border-l-terra/60'; ?>">
                        <div class="w-10 h-10 shrink-0 bg-white border border-sand-border rounded-[4px] flex items-center justify-center text-terra group-hover:bg-terra group-hover:text-white group-hover:border-terra transition-all duration-300">
                            <i class="fa-solid <?php echo $p['icon']; ?> text-[14px]"></i>
                        </div>
                        <div>
                            <h3 class="text-[15px] font-bold text-olive mb-1"><?php echo $p['title']; ?></h3>
                            <p class="text-[13px] text-clay-muted leading-relaxed"><?php echo $p['desc']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════
     REVIEWS / SOCIAL PROOF
══════════════════════════════════════════════════ -->
<section id="reviews" class="py-20 bg-sandstone/60 border-y border-sand-border">
    <div class="container mx-auto px-5 lg:px-8">

        <div class="max-w-[560px] mx-auto text-center mb-14">
            <span class="section-eyebrow justify-center"><?php echo t('reviews.eyebrow'); ?></span>
            <h2 class="text-[34px] lg:text-[44px] font-serif text-olive tracking-[-0.01em] mb-3">
                <?php echo t('reviews.title'); ?>
            </h2>
            <p class="text-[14px] text-clay-muted leading-relaxed"><?php echo t('reviews.sub'); ?></p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <?php
            $reviews = [
                ['text' => t('reviews.item1_text'), 'author' => t('reviews.item1_author'), 'role' => t('reviews.item1_role'), 'rating' => 5],
                ['text' => t('reviews.item2_text'), 'author' => t('reviews.item2_author'), 'role' => t('reviews.item2_role'), 'rating' => 5],
                ['text' => t('reviews.item3_text'), 'author' => t('reviews.item3_author'), 'role' => t('reviews.item3_role'), 'rating' => 5],
            ];
            foreach ($reviews as $rev): ?>
                <div class="bg-white border border-sand-border rounded-[8px] p-7 flex flex-col justify-between shadow-sm hover:border-terra/60 transition-colors">
                    <div>
                        <!-- Stars -->
                        <div class="flex items-center gap-1 text-amber-500 text-[13px] mb-4" aria-label="5 stars rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-[14px] text-olive italic leading-relaxed mb-6">"<?php echo $rev['text']; ?>"</p>
                    </div>
                    <div class="flex items-center gap-3 pt-4 border-t border-sand-border/70">
                        <div class="w-9 h-9 rounded-full bg-sandstone border border-sand-border flex items-center justify-center font-bold text-terra text-sm">
                            <?php echo mb_substr($rev['author'], 0, 1); ?>
                        </div>
                        <div>
                            <div class="text-[13px] font-bold text-olive leading-tight"><?php echo $rev['author']; ?></div>
                            <div class="text-[11px] text-clay-muted mt-0.5"><?php echo $rev['role']; ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center">
            <a href="https://maps.app.goo.gl/RHHgLRhDdyErYBFQA" target="_blank" rel="noopener"
               class="inline-flex items-center gap-2 text-[12px] font-bold uppercase tracking-wider text-olive hover:text-terra transition-colors">
                <i class="fa-brands fa-google text-terra"></i>
                <?php echo t('reviews.google_maps'); ?>
                <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
            </a>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════
     ROOMS & RATES
══════════════════════════════════════════════════ -->
<section id="rooms" class="py-24 lg:py-32 bg-sandstone">
    <div class="container mx-auto px-5 lg:px-8">

        <!-- Section header -->
        <div class="max-w-[520px] mx-auto text-center mb-16">
            <span class="section-eyebrow justify-center"><?php echo t('nav.rooms'); ?></span>
            <h2 class="text-[38px] lg:text-[50px] font-serif text-olive tracking-[-0.01em] mb-4">
                <?php echo t('rooms.title'); ?>
            </h2>
            <p class="text-[14px] text-clay-muted leading-relaxed"><?php echo t('rooms.sub'); ?></p>
        </div>

        <!-- Rooms grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            <?php foreach ($rooms as $room): ?>
                <article class="room-card relative bg-white border <?php echo $room['featured'] ? 'border-terra' : 'border-sand-border'; ?> rounded-[8px] overflow-hidden flex flex-col">

                    <?php if ($room['featured']): ?>
                        <div class="absolute top-4 <?php echo $is_rtl ? 'left-4 right-auto' : 'right-4'; ?> z-10">
                            <span class="inline-flex items-center gap-1 px-3 py-1.5 text-[10px] font-bold uppercase tracking-wider bg-terra text-white rounded-full">
                                <i class="fa-solid fa-star text-[8px]"></i>
                                <?php echo t('rooms.popular'); ?>
                            </span>
                        </div>
                    <?php endif; ?>

                    <!-- Image with arch top -->
                    <div class="mx-4 mt-4 rounded-[80px_80px_0_0] overflow-hidden aspect-[4/3] bg-sandstone shrink-0">
                        <img src="<?php echo $room['image']; ?>"
                             alt="Essafir Residence Sidi Bouzid — <?php echo htmlspecialchars($room['title']); ?>"
                             class="room-img w-full h-full object-cover"
                             width="400" height="300"
                             loading="lazy">
                    </div>

                    <!-- Details -->
                    <div class="p-6 pt-5 flex flex-col flex-grow">
                        <div class="flex items-start justify-between gap-4 mb-4 pb-4 border-b border-sand-border">
                            <h3 class="text-[22px] font-serif text-olive leading-tight"><?php echo $room['title']; ?></h3>
                            <div class="text-right <?php echo $is_rtl ? 'text-left' : 'text-right'; ?> shrink-0">
                                <span class="text-[26px] font-serif text-terra leading-none"><?php echo $room['price']; ?></span>
                                <span class="block text-[10px] text-clay-muted mt-0.5 uppercase tracking-wider">TND / <?php echo t('rooms.night'); ?></span>
                                <?php if (!empty($room['price_note'])): ?>
                                    <span class="block text-[10px] text-terra/90 font-medium normal-case mt-0.5 leading-tight"><?php echo $room['price_note']; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <ul class="flex flex-col gap-2.5 mb-6 flex-grow">
                            <?php foreach ($room['features'] as $feat): ?>
                                <li class="flex items-center gap-2.5 text-[12.5px] text-clay-muted">
                                    <span class="w-4 h-4 rounded-full bg-sandstone flex items-center justify-center shrink-0">
                                        <i class="fa-solid fa-check text-terra text-[8px]"></i>
                                    </span>
                                    <?php echo $feat; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>?text=<?php echo urlencode(sprintf(
                            $lang === 'ar' ? 'مرحباً، أود حجز %s (بسعر %s د.ت لليلة).' : ($lang === 'fr' ? 'Bonjour, je souhaite réserver une %s (%s TND par nuit).' : 'Hello, I would like to book a %s (%s TND per night).'),
                            $room['title'], $room['price'] . (!empty($room['price_note']) ? ' (' . $room['price_note'] . ')' : '')
                        )); ?>"
                           target="_blank" rel="noopener"
                           class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 text-[11px] font-bold uppercase tracking-wider rounded-[4px] transition-all duration-200
                                  <?php echo $room['featured']
                                      ? 'bg-terra text-white hover:bg-terra-dark hover:shadow-[0_4px_16px_rgba(179,30,43,0.3)]'
                                      : 'bg-sandstone border border-sand-border text-olive hover:border-olive hover:bg-white'; ?>">
                            <i class="fa-brands fa-whatsapp <?php echo $room['featured'] ? 'text-white' : 'text-whatsapp'; ?>"></i>
                            <?php echo t('hero.cta_whatsapp'); ?>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Stay Estimator -->
        <div class="max-w-[760px] mx-auto bg-white border border-sand-border rounded-[8px] overflow-hidden shadow-sm">
            <div class="px-8 py-5 border-b border-sand-border flex items-center gap-3 bg-sandstone">
                <div class="w-8 h-8 rounded-full bg-white border border-sand-border flex items-center justify-center text-terra">
                    <i class="fa-solid fa-calculator text-[13px]"></i>
                </div>
                <h3 class="text-[17px] font-serif text-olive"><?php echo t('calculator.title'); ?></h3>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                    <div class="flex flex-col gap-1.5 sm:col-span-3">
                        <label for="calc-room" class="text-[10px] font-bold uppercase tracking-widest text-clay-muted">
                            <?php echo t('calculator.select_room'); ?>
                        </label>
                        <select id="calc-room" class="w-full px-4 py-3 bg-sandstone border border-sand-border rounded-[4px] text-[14px] text-charcoal focus:border-terra focus:bg-white focus:outline-none focus:ring-0 transition-colors cursor-pointer">
                            <?php foreach ($rooms as $room): ?>
                                <option value="<?php echo $room['id']; ?>" <?php echo $room['id'] === 'deluxe' ? 'selected' : ''; ?>>
                                    <?php 
                                    $option_text = $room['title'] . ' — ' . $room['price'] . ' TND';
                                    if (!empty($room['price_note'])) {
                                        $option_text .= ' (' . $room['price_note'] . ')';
                                    }
                                    echo $option_text;
                                    ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="calc-checkin" class="text-[10px] font-bold uppercase tracking-widest text-clay-muted">
                            <?php echo t('calculator.checkin'); ?>
                        </label>
                        <input type="date" id="calc-checkin"
                               class="w-full px-3.5 py-2.5 bg-sandstone border border-sand-border rounded-[4px] text-[13px] text-charcoal focus:border-terra focus:bg-white focus:outline-none focus:ring-0 transition-colors">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="calc-checkout" class="text-[10px] font-bold uppercase tracking-widest text-clay-muted">
                            <?php echo t('calculator.checkout'); ?>
                        </label>
                        <input type="date" id="calc-checkout"
                               class="w-full px-3.5 py-2.5 bg-sandstone border border-sand-border rounded-[4px] text-[13px] text-charcoal focus:border-terra focus:bg-white focus:outline-none focus:ring-0 transition-colors">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="calc-nights" class="text-[10px] font-bold uppercase tracking-widest text-clay-muted">
                            <?php echo t('calculator.nights'); ?>
                        </label>
                        <input type="number" id="calc-nights" min="1" max="90" value="3"
                               class="w-full px-3.5 py-2.5 bg-sandstone border border-sand-border rounded-[4px] text-[13px] text-charcoal focus:border-terra focus:bg-white focus:outline-none focus:ring-0 transition-colors">
                    </div>
                </div>

                <!-- Result row -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-5 px-6 py-5 bg-olive rounded-[6px]">
                    <div>
                        <div class="text-[11px] font-semibold uppercase tracking-wider text-white/50 mb-1">
                            <?php echo t('calculator.estimate'); ?>
                        </div>
                        <div id="total-val" class="text-[32px] font-serif text-white leading-none">180 TND</div>
                    </div>
                    <a id="calc-book-btn" href="#" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 px-6 py-3 text-[11px] font-bold uppercase tracking-wider bg-whatsapp text-white rounded-[4px] hover:bg-whatsapp-hover transition-colors whitespace-nowrap">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                        <?php echo t('calculator.book_calc'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════
     GALLERY
══════════════════════════════════════════════════ -->
<section id="gallery" class="py-24 lg:py-32 bg-white">
    <div class="container mx-auto px-5 lg:px-8">

        <div class="max-w-[520px] mx-auto text-center mb-14">
            <span class="section-eyebrow justify-center">
                <?php echo $lang === 'ar' ? 'المعرض' : ($lang === 'fr' ? 'Galerie' : 'Gallery'); ?>
            </span>
            <h2 class="text-[38px] lg:text-[50px] font-serif text-olive tracking-[-0.01em] mb-4">
                <?php echo t('gallery.title'); ?>
            </h2>
            <p class="text-[14px] text-clay-muted"><?php echo t('gallery.sub'); ?></p>
        </div>

        <!-- Bento grid -->
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 auto-rows-[200px]">
            <?php foreach ($gallery_items as $i => $item): ?>
                <div class="gallery-item relative rounded-[6px] overflow-hidden bg-sandstone <?php echo $item['class']; ?>">
                    <img src="<?php echo $item['src']; ?>"
                         alt="Essafir Residence Sidi Bouzid — <?php echo htmlspecialchars($item['alt']); ?>"
                         class="gallery-img w-full h-full object-cover"
                         width="600" height="400"
                         loading="lazy">
                    <!-- Overlay -->
                    <div class="gallery-overlay absolute inset-0 bg-olive/80 flex flex-col items-start justify-end p-5">
                        <span class="font-serif text-white text-[18px] leading-tight mb-2"><?php echo $item['alt']; ?></span>
                        <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>?text=<?php echo urlencode(sprintf(
                            $lang === 'ar' ? 'مرحباً، أود الاستفسار عن: %s' : ($lang === 'fr' ? 'Bonjour, je me renseigne sur : %s' : "Hello, I'd like to inquire about: %s"),
                            $item['alt']
                        )); ?>"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-wider text-whatsapp hover:text-white transition-colors">
                            <i class="fa-brands fa-whatsapp"></i>
                            <?php echo t('hero.cta_whatsapp'); ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════
     AMENITIES
══════════════════════════════════════════════════ -->
<section id="amenities" class="py-24 lg:py-32 bg-sandstone">
    <div class="container mx-auto px-5 lg:px-8">

        <div class="max-w-[520px] mx-auto text-center mb-14">
            <span class="section-eyebrow justify-center"><?php echo t('nav.amenities'); ?></span>
            <h2 class="text-[38px] lg:text-[50px] font-serif text-olive tracking-[-0.01em] mb-4">
                <?php echo t('amenities.title'); ?>
            </h2>
            <p class="text-[14px] text-clay-muted"><?php echo t('amenities.sub'); ?></p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <?php foreach ($amenities_list as $amenity): ?>
                <div class="amenity-card group bg-white border border-sand-border rounded-[8px] p-6 flex flex-col gap-4">
                    <div class="amenity-icon w-12 h-12 bg-sandstone border border-sand-border rounded-[6px] flex items-center justify-center text-terra text-lg">
                        <i class="fa-solid <?php echo $amenity['icon']; ?>"></i>
                    </div>
                    <div>
                        <h3 class="text-[15px] font-bold text-olive mb-1.5"><?php echo $amenity['name']; ?></h3>
                        <p class="text-[12.5px] text-clay-muted leading-relaxed"><?php echo $amenity['desc']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════
     LOCATION
══════════════════════════════════════════════════ -->
<section id="location" class="py-24 lg:py-32 bg-white">
    <div class="container mx-auto px-5 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 lg:gap-20 items-center">

            <!-- Info -->
            <div>
                <span class="section-eyebrow"><?php echo t('nav.location'); ?></span>
                <h2 class="text-[38px] lg:text-[50px] font-serif text-olive leading-[1.1] tracking-[-0.01em] mb-6">
                    <?php echo t('location.title'); ?>
                </h2>
                <p class="text-[15px] text-clay-muted leading-[1.75] mb-10 max-w-[440px]">
                    <?php echo t('location.sub'); ?>
                </p>

                <div class="flex flex-col gap-5">
                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 shrink-0 bg-sandstone border border-sand-border rounded-[4px] flex items-center justify-center text-terra text-[14px]">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-widest text-clay-muted mb-1">
                                <?php echo t('location.address_label'); ?>
                            </p>
                            <p class="text-[14px] text-olive leading-relaxed"><?php echo t('location.address_value'); ?></p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 shrink-0 bg-sandstone border border-sand-border rounded-[4px] flex items-center justify-center text-terra text-[14px]">
                            <i class="fa-solid fa-route"></i>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-widest text-clay-muted mb-1">
                                <?php echo t('location.proximity_title'); ?>
                            </p>
                            <p class="text-[14px] text-olive leading-relaxed"><?php echo t('location.proximity_desc'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="w-full h-[420px] lg:h-[460px] rounded-[12px] overflow-hidden border border-sand-border shadow-lg shadow-olive/6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3267.3136224328574!2d9.47546202452296!3d35.02388352548577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12f93bc5c3fcbfcb%3A0xe54e609756b5a3ab!2zRXNzYWZpciBSZXNpZGVuY2U!5e0!3m2!1sen!2sus!4v1766583609686!5m2!1sen!2sus"
                    width="100%" height="100%" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Essafir Residence Google Maps Location"
                    class="border-0 w-full h-full">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════
     CONTACT
══════════════════════════════════════════════════ -->
<section id="contact" class="py-24 lg:py-32 bg-sandstone">
    <div class="container mx-auto px-5 lg:px-8">

        <div class="max-w-[520px] mx-auto text-center mb-14">
            <span class="section-eyebrow justify-center"><?php echo t('nav.contact'); ?></span>
            <h2 class="text-[38px] lg:text-[50px] font-serif text-olive tracking-[-0.01em] mb-4">
                <?php echo t('contact.title'); ?>
            </h2>
            <p class="text-[14px] text-clay-muted"><?php echo t('contact.sub'); ?></p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[1.3fr_1fr] gap-8 items-start max-w-[980px] mx-auto">

            <!-- Form -->
            <div class="bg-white border border-sand-border rounded-[8px] p-8 lg:p-10">
                <form id="contact-form" action="submit.php" method="POST" novalidate>
                    <!-- Honeypot & anti-bot fields -->
                    <input type="text" name="website_url" id="website_url" class="hidden" tabindex="-1" autocomplete="off">
                    <input type="hidden" name="form_time" id="form_time" value="<?php echo time(); ?>">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                        <div class="form-field flex flex-col gap-1.5">
                            <label for="name" class="text-[10px] font-bold uppercase tracking-widest text-clay-muted">
                                <?php echo t('contact.name'); ?>
                            </label>
                            <input type="text" id="name" name="name"
                                   class="w-full px-4 py-3 bg-sandstone border border-sand-border rounded-[4px] text-[14px] text-charcoal"
                                   placeholder="<?php echo $lang === 'ar' ? 'مثال: محمد علي' : ($lang === 'fr' ? 'Ex. Mohamed Ali' : 'E.g. Mohamed Ali'); ?>">
                        </div>

                        <div class="form-field flex flex-col gap-1.5">
                            <label for="phone" class="text-[10px] font-bold uppercase tracking-widest text-clay-muted">
                                <?php echo t('contact.phone'); ?>
                            </label>
                            <input type="tel" id="phone" name="phone"
                                   class="w-full px-4 py-3 bg-sandstone border border-sand-border rounded-[4px] text-[14px] text-charcoal"
                                   placeholder="+216 50 123 456">
                        </div>
                    </div>

                    <div class="form-field flex flex-col gap-1.5 mb-5">
                        <label for="email" class="text-[10px] font-bold uppercase tracking-widest text-clay-muted">
                            <?php echo t('contact.email'); ?>
                        </label>
                        <input type="email" id="email" name="email"
                               class="w-full px-4 py-3 bg-sandstone border border-sand-border rounded-[4px] text-[14px] text-charcoal"
                               placeholder="<?php echo $lang === 'ar' ? 'بريدك الإلكتروني' : ($lang === 'fr' ? 'votre@email.com' : 'your@email.com'); ?>">
                    </div>

                    <div class="form-field flex flex-col gap-1.5 mb-7">
                        <label for="message" class="text-[10px] font-bold uppercase tracking-widest text-clay-muted">
                            <?php echo t('contact.message'); ?> <span class="text-terra">*</span>
                        </label>
                        <textarea id="message" name="message" rows="5" required
                                  class="w-full px-4 py-3 bg-sandstone border border-sand-border rounded-[4px] text-[14px] text-charcoal resize-none"
                                  placeholder="<?php echo $lang === 'ar' ? 'اكتب رسالتك هنا...' : ($lang === 'fr' ? 'Écrivez votre message ici...' : 'Write your message here...'); ?>"></textarea>
                    </div>

                    <button type="submit" id="submit-btn"
                            class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 text-[11px] font-bold uppercase tracking-wider bg-olive text-white rounded-[4px] hover:bg-olive-mid transition-all duration-200 hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(74,14,20,0.2)]">
                        <i class="fa-solid fa-paper-plane text-[10px]"></i>
                        <?php echo t('contact.send'); ?>
                    </button>
                </form>
            </div>

            <!-- Contact info sidebar -->
            <div class="flex flex-col gap-4">

                <!-- Address pill -->
                <div class="contact-pill flex gap-4 items-start bg-white border border-sand-border rounded-[8px] p-5">
                    <div class="w-9 h-9 shrink-0 bg-sandstone rounded-[4px] flex items-center justify-center text-terra text-[13px]">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-clay-muted mb-1">
                            <?php echo t('location.address_label'); ?>
                        </p>
                        <p class="text-[13.5px] text-olive leading-relaxed"><?php echo t('location.address_value'); ?></p>
                    </div>
                </div>

                <!-- Phone pill -->
                <a href="tel:<?php echo WHATSAPP_PHONE; ?>"
                   class="contact-pill flex gap-4 items-center bg-white border border-sand-border rounded-[8px] p-5">
                    <div class="w-9 h-9 shrink-0 bg-sandstone rounded-[4px] flex items-center justify-center text-terra text-[13px]">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-widest text-clay-muted mb-1">
                            <?php echo $lang === 'ar' ? 'رقم الهاتف' : ($lang === 'fr' ? 'Téléphone' : 'Phone'); ?>
                        </p>
                        <p class="text-[14px] text-terra font-semibold"><?php echo WHATSAPP_PHONE; ?></p>
                    </div>
                </a>

                <!-- WhatsApp promo card -->
                <div class="bg-olive rounded-[8px] p-7 flex flex-col gap-4 mt-2">
                    <div class="w-10 h-10 rounded-full bg-whatsapp/15 flex items-center justify-center">
                        <i class="fa-brands fa-whatsapp text-whatsapp text-xl"></i>
                    </div>
                    <h3 class="font-serif text-[20px] text-white leading-tight"><?php echo t('contact.wa_title'); ?></h3>
                    <p class="text-[13px] text-white/55 leading-relaxed"><?php echo t('contact.wa_desc'); ?></p>
                    <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>?text=<?php echo urlencode('Hello, I am interested in booking a room at Essafir Residence Sidi Bouzid.'); ?>"
                       target="_blank" rel="noopener"
                       class="self-start inline-flex items-center gap-2 px-5 py-2.5 text-[11px] font-bold uppercase tracking-wider bg-whatsapp text-white rounded-[4px] hover:bg-whatsapp-hover transition-colors">
                        <i class="fa-brands fa-whatsapp"></i>
                        <?php echo t('hero.cta_whatsapp'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<?php require_once 'includes/footer.php'; ?>