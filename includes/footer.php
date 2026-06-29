<!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 via-gray-900 to-primary text-white mt-20 relative overflow-hidden">
        <!-- Decorative element -->
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
        
        <div class="container mx-auto px-4 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8">
                <!-- Brand Column -->
                <div class="lg:col-span-1">
                    <img src="images/logo.png" alt="Essafir Residence" class="h-16 mb-6 brightness-0 invert opacity-90">
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        <?php echo SITE_NAME; ?> - Your comfort is our priority. Experience luxury and tranquility.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-accent rounded-lg flex items-center justify-center transition-all hover:scale-110">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-accent rounded-lg flex items-center justify-center transition-all hover:scale-110">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>" target="_blank" class="w-10 h-10 bg-white/10 hover:bg-green-500 rounded-lg flex items-center justify-center transition-all hover:scale-110">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-display text-lg font-semibold mb-6 relative inline-block">
                        <?php echo t('footer.menu_title'); ?>
                        <span class="absolute bottom-0 start-0 w-12 h-0.5 bg-accent"></span>
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="index.php" class="text-gray-400 hover:text-white text-sm transition-colors flex items-center group">
                                <i class="fas fa-chevron-<?php echo $lang === 'ar' ? 'left' : 'right'; ?> text-xs me-2 text-accent opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                <?php echo t('nav.home'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="about.php" class="text-gray-400 hover:text-white text-sm transition-colors flex items-center group">
                                <i class="fas fa-chevron-<?php echo $lang === 'ar' ? 'left' : 'right'; ?> text-xs me-2 text-accent opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                <?php echo t('nav.about'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="room.php" class="text-gray-400 hover:text-white text-sm transition-colors flex items-center group">
                                <i class="fas fa-chevron-<?php echo $lang === 'ar' ? 'left' : 'right'; ?> text-xs me-2 text-accent opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                <?php echo t('nav.rooms'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="price.php" class="text-gray-400 hover:text-white text-sm transition-colors flex items-center group">
                                <i class="fas fa-chevron-<?php echo $lang === 'ar' ? 'left' : 'right'; ?> text-xs me-2 text-accent opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                <?php echo t('nav.price'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="contact.php" class="text-gray-400 hover:text-white text-sm transition-colors flex items-center group">
                                <i class="fas fa-chevron-<?php echo $lang === 'ar' ? 'left' : 'right'; ?> text-xs me-2 text-accent opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                <?php echo t('nav.contact'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-white font-display text-lg font-semibold mb-6 relative inline-block">
                        <?php echo t('footer.contact_title'); ?>
                        <span class="absolute bottom-0 start-0 w-12 h-0.5 bg-accent"></span>
                    </h3>
                    <ul class="space-y-4">
                        <li class="flex items-start text-sm text-gray-400">
                            <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 me-3">
                                <i class="fas fa-map-marker-alt text-accent text-xs"></i>
                            </div>
                            <span class="leading-relaxed"><?php echo t('contact.address'); ?></span>
                        </li>
                        <li class="flex items-center text-sm">
                            <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 me-3">
                                <i class="fas fa-phone text-accent text-xs"></i>
                            </div>
                            <a href="tel:<?php echo WHATSAPP_PHONE; ?>" class="text-gray-400 hover:text-white transition-colors">
                                <?php echo WHATSAPP_PHONE; ?>
                            </a>
                        </li>
                        <li class="flex items-center text-sm">
                            <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0 me-3">
                                <i class="fab fa-whatsapp text-accent text-xs"></i>
                            </div>
                            <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>" 
                               target="_blank"
                               class="text-gray-400 hover:text-white transition-colors">
                                WhatsApp
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Newsletter/CTA -->
                <div>
                    <h3 class="text-white font-display text-lg font-semibold mb-6 relative inline-block">
                        Quick Booking
                        <span class="absolute bottom-0 start-0 w-12 h-0.5 bg-accent"></span>
                    </h3>
                    <p class="text-gray-400 text-sm mb-6 leading-relaxed">
                        Book your stay now via WhatsApp for instant confirmation.
                    </p>
                    <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>?text=<?php echo urlencode("Hello, I'm interested in reserving a room at Résidence Essafir."); ?>" 
                       target="_blank"
                       class="btn-primary gradient-accent text-white px-6 py-3 rounded-lg font-semibold text-sm inline-flex items-center space-x-2 relative">
                        <i class="fab fa-whatsapp text-base"></i>
                        <span>Book Now</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="border-t border-white/10">
            <div class="container mx-auto px-4 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                    <p class="text-sm text-gray-400">
                        <?php echo t('footer.copyright'); ?>
                    </p>
                    <div class="flex items-center space-x-6 text-sm text-gray-400">
                        <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                        <span class="text-gray-700">•</span>
                        <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>