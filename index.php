<?php
require_once 'includes/config.php';
$page_title = t('nav.home');
$page_description = t('home.about_description');
require_once 'includes/header.php';
?>

<main class="flex-grow">
<!-- Hero Slider -->
<section id="hero-slider" class="relative hero-slider overflow-hidden bg-black">
    <!-- Slide 1 -->
    <div class="slide absolute inset-0 w-full h-full transition-all duration-1000 ease-in-out opacity-100 pointer-events-auto">
        <img src="images/banner1.webp" alt="Essafir Residence View" class="w-full h-full object-cover" loading="eager">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
    </div>
    <!-- Slide 2 -->
    <div class="slide absolute inset-0 w-full h-full transition-all duration-1000 ease-in-out opacity-0 pointer-events-none">
        <img src="images/banner2.webp" alt="Essafir Residence Deluxe Room" class="w-full h-full object-cover" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
    </div>
    <!-- Slide 3 -->
    <div class="slide absolute inset-0 w-full h-full transition-all duration-1000 ease-in-out opacity-0 pointer-events-none">
        <img src="images/banner3.webp" alt="Essafir Residence Premium Suite" class="w-full h-full object-cover" loading="lazy">
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
    </div>
    
    <!-- Navigation Arrows -->
    <button id="prev-slide" class="absolute left-6 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 backdrop-blur-md hover:bg-white/20 rounded-full shadow-2xl transition-all hover:scale-110 flex items-center justify-center group z-20" aria-label="Previous Slide">
        <i class="fas fa-chevron-left text-white text-lg group-hover:-translate-x-0.5 transition-transform"></i>
    </button>
    <button id="next-slide" class="absolute right-6 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 backdrop-blur-md hover:bg-white/20 rounded-full shadow-2xl transition-all hover:scale-110 flex items-center justify-center group z-20" aria-label="Next Slide">
        <i class="fas fa-chevron-right text-white text-lg group-hover:translate-x-0.5 transition-transform"></i>
    </button>
    
    <!-- Hero Content -->
    <div class="absolute inset-0 flex items-center z-10">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-2xl">
                <div class="inline-flex items-center px-4 py-2 bg-[#C41E3A]/20 backdrop-blur-md rounded-full text-white text-sm font-medium mb-6 border border-white/10">
                    <i class="fas fa-star text-[#D4AF37] mr-2"></i>
                    Premium Residence
                </div>
                <h1 class="font-display text-white text-4xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6">
                    <?php echo t('home.book_title'); ?>
                </h1>
                <p class="text-white/90 text-lg md:text-xl mb-8 leading-relaxed max-w-xl">
                    Experience comfort, security, and modern amenities in the heart of Sidi Bouzid.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button onclick="bookNow()" class="btn-primary gradient-accent text-white px-8 py-4 rounded-xl font-semibold text-base inline-flex items-center justify-center space-x-3 shadow-lg border border-[#D4AF37]/20 hover:scale-[1.02] transition-transform">
                        <i class="fab fa-whatsapp text-xl"></i>
                        <span><?php echo t('home.book_button'); ?></span>
                    </button>
                    <a href="room.php" class="px-8 py-4 rounded-xl font-semibold text-base inline-flex items-center justify-center space-x-3 bg-white/10 backdrop-blur-md text-white hover:bg-white/20 transition-all border border-white/10 hover:scale-[1.02]">
                        <span>View Rooms</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Slider Indicators -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-2.5 z-20">
        <button class="w-6 h-2 rounded-full bg-white transition-all duration-300 slide-indicator" data-slide="0" aria-label="Slide 1"></button>
        <button class="w-2 h-2 rounded-full bg-white/40 hover:bg-white transition-all duration-300 slide-indicator" data-slide="1" aria-label="Slide 2"></button>
        <button class="w-2 h-2 rounded-full bg-white/40 hover:bg-white transition-all duration-300 slide-indicator" data-slide="2" aria-label="Slide 3"></button>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Content -->
            <div>
                <div class="inline-block px-4 py-2 bg-red-50 rounded-full text-[#C41E3A] text-sm font-semibold mb-4">
                    About Us
                </div>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    <?php echo t('home.about_title'); ?>
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-8">
                    <?php echo t('home.about_description'); ?>
                </p>
                
                <!-- Quick Stats -->
                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#C41E3A] mb-1">24/7</div>
                        <div class="text-sm text-gray-600">Security</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#C41E3A] mb-1">50+</div>
                        <div class="text-sm text-gray-600">Happy Guests</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#C41E3A] mb-1">100%</div>
                        <div class="text-sm text-gray-600">Comfort</div>
                    </div>
                </div>
                
                <a href="about.php" class="inline-flex items-center space-x-2 text-[#C41E3A] font-semibold hover:space-x-3 transition-all">
                    <span>Learn More About Us</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <!-- Image Grid -->
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <img src="images/about.webp" alt="Room" class="rounded-2xl shadow-refined-lg w-full h-56 object-cover hover-lift" loading="lazy">
                    <img src="images/about2.webp" alt="Facility" class="rounded-2xl shadow-refined-lg w-full h-72 object-cover hover-lift" loading="lazy">
                </div>
                <div class="space-y-4 pt-8">
                    <img src="images/about1.webp" alt="Interior" class="rounded-2xl shadow-refined-lg w-full h-72 object-cover hover-lift" loading="lazy">
                    <img src="images/banner1.webp" alt="Amenity" class="rounded-2xl shadow-refined-lg w-full h-56 object-cover hover-lift" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-red-50/20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-block px-4 py-2 bg-white rounded-full text-[#C41E3A] text-sm font-semibold mb-4 shadow-refined">
                Our Amenities
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Everything You Need
            </h2>
            <p class="text-gray-600 text-lg">
                Modern amenities designed for your comfort and convenience
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature Cards with Red Gradients -->
            <div class="card-interactive bg-white p-8 rounded-2xl shadow-refined-lg group">
                <div class="w-16 h-16 bg-gradient-to-br from-[#C41E3A] to-[#8B0000] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">24/7 Security</h3>
                <p class="text-gray-600 leading-relaxed">Round-the-clock security service for complete peace of mind</p>
            </div>
            
            <div class="card-interactive bg-white p-8 rounded-2xl shadow-refined-lg group">
                <div class="w-16 h-16 bg-gradient-to-br from-[#D4AF37] to-[#C5A028] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-wifi text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Fast WiFi</h3>
                <p class="text-gray-600 leading-relaxed">High-speed internet throughout the residence</p>
            </div>
            
            <div class="card-interactive bg-white p-8 rounded-2xl shadow-refined-lg group">
                <div class="w-16 h-16 bg-gradient-to-br from-[#C41E3A] to-[#8B0000] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-broom text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Daily Cleaning</h3>
                <p class="text-gray-600 leading-relaxed">Professional cleaning service to keep everything spotless</p>
            </div>
            
            <div class="card-interactive bg-white p-8 rounded-2xl shadow-refined-lg group">
                <div class="w-16 h-16 bg-gradient-to-br from-[#D4AF37] to-[#C5A028] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-parking text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Free Parking</h3>
                <p class="text-gray-600 leading-relaxed">Complimentary parking space for your convenience</p>
            </div>
            
            <div class="card-interactive bg-white p-8 rounded-2xl shadow-refined-lg group">
                <div class="w-16 h-16 bg-gradient-to-br from-[#C41E3A] to-[#8B0000] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-concierge-bell text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Reception Service</h3>
                <p class="text-gray-600 leading-relaxed">Friendly staff available to assist you anytime</p>
            </div>
            
            <div class="card-interactive bg-white p-8 rounded-2xl shadow-refined-lg group">
                <div class="w-16 h-16 bg-gradient-to-br from-[#D4AF37] to-[#C5A028] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-couch text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Modern Comfort</h3>
                <p class="text-gray-600 leading-relaxed">Stylish rooms with contemporary furniture</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 gradient-accent text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
    </div>
    <div class="container mx-auto px-4 lg:px-8 text-center relative z-10">
        <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">
            Ready to Book Your Stay?
        </h2>
        <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
            Experience comfort, security, and modern amenities. Book now via WhatsApp for instant confirmation.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button onclick="bookNow()" class="btn-primary bg-white text-[#C41E3A] hover:bg-gray-50 px-8 py-4 rounded-xl font-semibold text-lg inline-flex items-center justify-center space-x-3 shadow-2xl">
                <i class="fab fa-whatsapp text-2xl"></i>
                <span><?php echo t('home.book_button'); ?></span>
            </button>
            <a href="price.php" class="px-8 py-4 rounded-xl font-semibold text-lg inline-flex items-center justify-center space-x-3 bg-white/10 backdrop-blur-sm text-white hover:bg-white/20 transition-all border-2 border-white/20">
                <span>View Pricing</span>
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
</main>

<?php require_once 'includes/footer.php'; ?>