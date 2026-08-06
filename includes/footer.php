<!-- ═══════════════════ FOOTER ═══════════════════ -->
<footer class="bg-olive text-white/60 pt-16 pb-8">

    <!-- Top border accent -->
    <div class="h-[3px] bg-gradient-to-r from-terra/0 via-terra to-terra/0 mb-16"></div>

    <div class="container mx-auto px-5 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 mb-14">

            <!-- Brand column -->
            <div class="md:col-span-4 flex flex-col gap-5">
                <a href="index.php" class="inline-flex items-center gap-2.5" aria-label="Essafir Residence">
                    <img src="images/logo.png" alt="Essafir Residence" class="h-8 w-auto opacity-90">
                    <span class="font-serif text-[22px] text-white">Essafir <span class="text-terra">Residence</span></span>
                </a>
                <p class="text-[13.5px] text-white/45 leading-relaxed max-w-[280px]">
                    <?php echo t('footer.desc'); ?>
                </p>

                <!-- Social row -->
                <div class="flex items-center gap-2 mt-1">
                    <?php
                    $socials = [
                        ['icon' => 'fa-facebook-f', 'href' => '#', 'label' => 'Facebook'],
                        ['icon' => 'fa-instagram', 'href' => '#', 'label' => 'Instagram'],
                        ['icon' => 'fa-whatsapp', 'href' => 'https://wa.me/' . str_replace('+', '', WHATSAPP_PHONE), 'label' => 'WhatsApp'],
                    ];
                    foreach ($socials as $s): ?>
                        <a href="<?php echo $s['href']; ?>" target="_blank" rel="noopener"
                           class="w-8 h-8 rounded-[3px] border border-white/10 flex items-center justify-center text-white/40 hover:border-terra hover:text-terra hover:bg-white/5 transition-all duration-200"
                           aria-label="<?php echo $s['label']; ?>">
                            <i class="fa-brands <?php echo $s['icon']; ?> text-[12px]"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Quick links -->
            <div class="md:col-span-3 flex flex-col gap-4">
                <h4 class="font-serif text-[16px] text-white">
                    <?php echo $lang === 'ar' ? 'روابط سريعة' : ($lang === 'fr' ? 'Liens rapides' : 'Quick Links'); ?>
                </h4>
                <ul class="flex flex-col gap-2.5">
                    <?php
                    $footer_links = [
                        ['href' => 'index.php#home', 'label' => t('nav.home')],
                        ['href' => 'index.php#residence', 'label' => t('nav.residence')],
                        ['href' => 'index.php#rooms', 'label' => t('nav.rooms')],
                        ['href' => 'index.php#amenities', 'label' => t('nav.amenities')],
                        ['href' => 'index.php#location', 'label' => t('nav.location')],
                        ['href' => 'sidi_bouzid.pdf', 'label' => t('ebook.title') . ' (PDF)', 'target' => '_blank'],
                        ['href' => 'index.php#contact', 'label' => t('nav.contact')],
                    ];
                    foreach ($footer_links as $link): ?>
                        <li>
                            <a href="<?php echo $link['href']; ?>" <?php echo isset($link['target']) ? 'target="' . $link['target'] . '" rel="noopener"' : ''; ?>
                               class="text-[13px] text-white/45 hover:text-white transition-colors duration-200 flex items-center gap-2">
                                <span class="w-3 h-px bg-terra/50 inline-block shrink-0"></span>
                                <?php echo $link['label']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact info -->
            <div class="md:col-span-3 flex flex-col gap-4">
                <h4 class="font-serif text-[16px] text-white"><?php echo t('contact.title'); ?></h4>
                <ul class="flex flex-col gap-4">
                    <li class="flex items-start gap-3 text-[13px] text-white/45">
                        <i class="fa-solid fa-location-dot text-terra mt-0.5 shrink-0"></i>
                        <span class="leading-relaxed"><?php echo t('location.address_value'); ?></span>
                    </li>
                    <li class="flex items-center gap-3 text-[13px]">
                        <i class="fa-solid fa-phone text-terra shrink-0"></i>
                        <a href="tel:<?php echo WHATSAPP_PHONE; ?>"
                           class="text-white/45 hover:text-white transition-colors"><?php echo WHATSAPP_PHONE; ?></a>
                    </li>
                    <li class="flex items-center gap-3 text-[13px]">
                        <i class="fa-brands fa-whatsapp text-terra shrink-0"></i>
                        <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>"
                           target="_blank" rel="noopener"
                           class="text-white/45 hover:text-white transition-colors">WhatsApp Chat</a>
                    </li>
                </ul>
            </div>

            <!-- Book CTA column -->
            <div class="md:col-span-2 flex flex-col gap-4">
                <h4 class="font-serif text-[16px] text-white"><?php echo t('contact.wa_title'); ?></h4>
                <p class="text-[13px] text-white/40 leading-relaxed"><?php echo t('contact.wa_desc'); ?></p>
                <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>?text=<?php echo urlencode('Hello, I am interested in booking a room at Essafir Residence Sidi Bouzid.'); ?>"
                   target="_blank" rel="noopener"
                   class="inline-flex items-center justify-center gap-2 px-4 py-2.5 text-[11px] font-bold uppercase tracking-wider bg-terra text-white rounded-[3px] hover:bg-terra-dark transition-colors duration-200 whitespace-nowrap">
                    <i class="fa-brands fa-whatsapp"></i>
                    <?php echo t('hero.cta_whatsapp'); ?>
                </a>
            </div>

        </div>

        <!-- Bottom bar -->
        <div class="border-t border-white/8 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-[12px] text-white/30"><?php echo t('footer.copyright'); ?></p>
            <div class="flex items-center gap-5 text-[12px] text-white/30">
                <a href="#" class="hover:text-white/60 transition-colors">
                    <?php echo $lang === 'ar' ? 'سياسة الخصوصية' : ($lang === 'fr' ? 'Confidentialité' : 'Privacy Policy'); ?>
                </a>
                <span class="opacity-30">·</span>
                <a href="#" class="hover:text-white/60 transition-colors">
                    <?php echo $lang === 'ar' ? 'الشروط والأحكام' : ($lang === 'fr' ? 'Conditions' : 'Terms of Service'); ?>
                </a>
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp FAB -->
<a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>?text=<?php echo urlencode('Hello, I am interested in reserving a room at Essafir Residence.'); ?>"
   target="_blank" rel="noopener"
   class="whatsapp-fab fixed bottom-6 <?php echo $is_rtl ? 'left-6' : 'right-6'; ?> z-[99] w-14 h-14 bg-whatsapp text-white rounded-full flex items-center justify-center shadow-[0_4px_20px_rgba(37,211,102,0.4)]"
   aria-label="<?php echo t('hero.cta_whatsapp'); ?>">
    <i class="fa-brands fa-whatsapp text-2xl"></i>
</a>

<!-- Sticky Mobile Booking Bar -->
<div id="mobile-sticky-bar" class="fixed bottom-0 left-0 right-0 z-[98] bg-olive/95 backdrop-blur-md border-t border-white/10 px-4 py-3 sm:hidden flex items-center justify-between shadow-2xl transition-transform duration-300 translate-y-full">
    <div>
        <span class="text-white text-[12px] font-bold block">Essafir Residence</span>
        <span class="text-terra text-[11px] font-semibold">30+ TND / <?php echo t('rooms.night'); ?></span>
    </div>
    <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>?text=<?php echo urlencode('Hello, I am interested in reserving a room at Essafir Residence.'); ?>"
       target="_blank" rel="noopener"
       class="inline-flex items-center gap-2 px-4 py-2 bg-whatsapp text-white text-[11px] font-bold uppercase tracking-wider rounded-[4px]">
        <i class="fa-brands fa-whatsapp text-sm"></i>
        <?php echo t('hero.cta_whatsapp'); ?>
    </a>
</div>

<script src="assets/js/main.js"></script>
</body>
</html>