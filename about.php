<?php
require_once 'includes/config.php';
$page_title = t('about.page_title');
$page_description = t('about.description');
require_once 'includes/header.php';
?>

<main class="flex-grow">

<!-- Page Header -->
<section class="relative py-24 bg-gradient-to-br from-[#C41E3A] via-[#A01729] to-[#8B0000] text-white overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-[#D4AF37] rounded-full blur-3xl"></div>
    </div>
    <div class="container mx-auto px-4 lg:px-8 text-center relative z-10">
        <div class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm font-semibold mb-6">
            <?php echo t('nav.about'); ?>
        </div>
        <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">
            <?php echo t('about.page_title'); ?>
        </h1>
        <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed">
            <?php echo t('about.title'); ?>
        </p>
    </div>
</section>

<!-- About Content -->
<section class="py-20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-3xl shadow-refined-lg p-10 md:p-12 mb-16">
                <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    <?php echo t('about.title'); ?>
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed">
                    <?php echo t('about.description'); ?>
                </p>
            </div>
            
            <!-- Image Gallery -->
            <div class="grid md:grid-cols-3 gap-6 mb-16">
                <img src="images/about.webp" alt="Essafir Residence" class="rounded-2xl shadow-refined-lg w-full h-80 object-cover hover-lift" loading="lazy">
                <img src="images/about1.webp" alt="Essafir Room" class="rounded-2xl shadow-refined-lg w-full h-80 object-cover hover-lift" loading="lazy">
                <img src="images/about2.webp" alt="Essafir Facility" class="rounded-2xl shadow-refined-lg w-full h-80 object-cover hover-lift" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-red-50/20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-2 bg-white rounded-full text-[#C41E3A] text-sm font-semibold mb-4 shadow-refined">
                What We Offer
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Premium Amenities
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Everything you need for a comfortable and secure stay
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <div class="card-interactive bg-white p-10 rounded-3xl shadow-refined-lg group">
                <div class="w-20 h-20 bg-gradient-to-br from-[#C41E3A] to-[#8B0000] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-shield-alt text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">24/7 Security</h3>
                <p class="text-gray-600 leading-relaxed">Round-the-clock security service for your peace of mind and safety throughout your stay</p>
            </div>
            
            <div class="card-interactive bg-white p-10 rounded-3xl shadow-refined-lg group">
                <div class="w-20 h-20 bg-gradient-to-br from-[#D4AF37] to-[#C5A028] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-wifi text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Fast WiFi</h3>
                <p class="text-gray-600 leading-relaxed">High-speed internet connectivity available throughout the entire residence</p>
            </div>
            
            <div class="card-interactive bg-white p-10 rounded-3xl shadow-refined-lg group">
                <div class="w-20 h-20 bg-gradient-to-br from-[#C41E3A] to-[#8B0000] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-broom text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Daily Cleaning</h3>
                <p class="text-gray-600 leading-relaxed">Professional cleaning service to maintain a spotless and comfortable environment</p>
            </div>
            
            <div class="card-interactive bg-white p-10 rounded-3xl shadow-refined-lg group">
                <div class="w-20 h-20 bg-gradient-to-br from-[#D4AF37] to-[#C5A028] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-parking text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Free Parking</h3>
                <p class="text-gray-600 leading-relaxed">Complimentary parking space available for all our valued guests</p>
            </div>
            
            <div class="card-interactive bg-white p-10 rounded-3xl shadow-refined-lg group">
                <div class="w-20 h-20 bg-gradient-to-br from-[#C41E3A] to-[#8B0000] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-concierge-bell text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Reception Service</h3>
                <p class="text-gray-600 leading-relaxed">Friendly and professional staff available to assist you with any needs</p>
            </div>
            
            <div class="card-interactive bg-white p-10 rounded-3xl shadow-refined-lg group">
                <div class="w-20 h-20 bg-gradient-to-br from-[#D4AF37] to-[#C5A028] rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-couch text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Modern Comfort</h3>
                <p class="text-gray-600 leading-relaxed">Stylish rooms furnished with contemporary furniture and modern amenities</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 gradient-accent text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#D4AF37] rounded-full blur-3xl"></div>
    </div>
    <div class="container mx-auto px-4 lg:px-8 text-center relative z-10">
        <h2 class="font-display text-4xl md:text-5xl font-bold mb-6">
            Experience the Difference
        </h2>
        <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
            Book your stay at Essafir Residence today and discover true comfort
        </p>
        <button onclick="bookNow()" class="btn-primary bg-white text-[#C41E3A] hover:bg-gray-50 px-8 py-4 rounded-xl font-semibold text-lg inline-flex items-center space-x-3 shadow-2xl">
            <i class="fab fa-whatsapp text-2xl"></i>
            <span><?php echo t('home.book_button'); ?></span>
        </button>
    </div>
</section>
</main>

<?php require_once 'includes/footer.php'; ?>