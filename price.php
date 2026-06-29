<?php
require_once 'includes/config.php';
$page_title = t('price.page_title');
$page_description = t('price.title') . ' for standard, deluxe, and family rooms at Essafir Residence in Sidi Bouzid. Affordable rates starting from 50 TND.';
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
            <?php echo t('nav.price'); ?>
        </div>
        <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">
            <?php echo t('price.page_title'); ?>
        </h1>
        <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed">
            <?php echo t('price.title'); ?>
        </p>
    </div>
</section>

<!-- Pricing Cards -->
<section class="py-20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            
            <!-- Standard Room -->
            <div class="card-interactive bg-white rounded-3xl shadow-refined-lg overflow-hidden group">
                <div class="gradient-accent text-white p-8 text-center relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full blur-2xl"></div>
                    </div>
                    <div class="relative z-10">
                        <h3 class="font-display text-3xl font-bold mb-3">Standard Room</h3>
                        <div class="text-5xl font-bold mb-2">50 TND</div>
                        <p class="text-white/80 text-lg">per night</p>
                    </div>
                </div>
                <div class="p-8">
                    <img src="images/gallery1.webp" alt="Standard Room" class="w-full h-56 object-cover rounded-2xl mb-6 group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Single or Double Bed
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Free WiFi
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Air Conditioning
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Private Bathroom
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Daily Cleaning
                        </li>
                    </ul>
                    <button onclick="bookNow()" class="btn-primary w-full gradient-accent text-white py-4 rounded-xl font-semibold relative border border-[#D4AF37]/20">
                        <?php echo t('home.book_button'); ?>
                    </button>
                </div>
            </div>
            
            <!-- Deluxe Room - Featured -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-[#C41E3A] transform lg:scale-105 relative">
                <div class="absolute top-6 right-6 z-20">
                    <div class="bg-[#D4AF37] text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg flex items-center space-x-2">
                        <i class="fas fa-star"></i>
                        <span>POPULAR</span>
                    </div>
                </div>
                <div class="gradient-accent text-white p-8 text-center relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 right-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                        <div class="absolute bottom-0 left-0 w-40 h-40 bg-[#D4AF37] rounded-full blur-2xl"></div>
                    </div>
                    <div class="relative z-10">
                        <h3 class="font-display text-3xl font-bold mb-3">Deluxe Room</h3>
                        <div class="text-5xl font-bold mb-2">75 TND</div>
                        <p class="text-white/80 text-lg">per night</p>
                    </div>
                </div>
                <div class="p-8">
                    <img src="images/gallery2.webp" alt="Deluxe Room" class="w-full h-56 object-cover rounded-2xl mb-6 hover:scale-105 transition-transform duration-500" loading="lazy">
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Queen or King Bed
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Free WiFi
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Air Conditioning
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Smart TV
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Premium Bathroom
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Workspace Desk
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Daily Cleaning
                        </li>
                    </ul>
                    <button onclick="bookNow()" class="btn-primary w-full gradient-accent text-white py-4 rounded-xl font-semibold relative border border-[#D4AF37]/20">
                        <?php echo t('home.book_button'); ?>
                    </button>
                </div>
            </div>
            
            <!-- Family Suite -->
            <div class="card-interactive bg-white rounded-3xl shadow-refined-lg overflow-hidden group">
                <div class="gradient-accent text-white p-8 text-center relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 left-0 w-32 h-32 bg-white rounded-full blur-2xl"></div>
                    </div>
                    <div class="relative z-10">
                        <h3 class="font-display text-3xl font-bold mb-3">Family Suite</h3>
                        <div class="text-5xl font-bold mb-2">120 TND</div>
                        <p class="text-white/80 text-lg">per night</p>
                    </div>
                </div>
                <div class="p-8">
                    <img src="images/gallery3.webp" alt="Family Suite" class="w-full h-56 object-cover rounded-2xl mb-6 group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            2 Separate Bedrooms
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Free WiFi
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Air Conditioning
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Living Room
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Kitchenette
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            2 Bathrooms
                        </li>
                        <li class="flex items-center text-gray-700">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                                <i class="fas fa-check text-green-600 text-sm"></i>
                            </div>
                            Daily Cleaning
                        </li>
                    </ul>
                    <button onclick="bookNow()" class="btn-primary w-full gradient-accent text-white py-4 rounded-xl font-semibold relative border border-[#D4AF37]/20">
                        <?php echo t('home.book_button'); ?>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Additional Info -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-red-50/20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-3xl shadow-refined-lg p-10 md:p-12">
                <div class="text-center mb-12">
                    <div class="inline-block px-4 py-2 bg-red-50 rounded-full text-[#C41E3A] text-sm font-semibold mb-4">
                        Booking Details
                    </div>
                    <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900">What's Included</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="font-bold text-xl mb-6 text-gray-900 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-[#C41E3A] to-[#8B0000] rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            All Rooms Include
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-center text-gray-700">
                                <div class="w-2 h-2 bg-[#C41E3A] rounded-full mr-3"></div>
                                24/7 Security
                            </li>
                            <li class="flex items-center text-gray-700">
                                <div class="w-2 h-2 bg-[#C41E3A] rounded-full mr-3"></div>
                                Free WiFi
                            </li>
                            <li class="flex items-center text-gray-700">
                                <div class="w-2 h-2 bg-[#C41E3A] rounded-full mr-3"></div>
                                Free Parking
                            </li>
                            <li class="flex items-center text-gray-700">
                                <div class="w-2 h-2 bg-[#C41E3A] rounded-full mr-3"></div>
                                Daily Cleaning
                            </li>
                            <li class="flex items-center text-gray-700">
                                <div class="w-2 h-2 bg-[#C41E3A] rounded-full mr-3"></div>
                                Reception Service
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl mb-6 text-gray-900 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-[#D4AF37] to-[#C5A028] rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-info-circle text-white"></i>
                            </div>
                            Booking Information
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-center text-gray-700">
                                <div class="w-2 h-2 bg-[#C41E3A] rounded-full mr-3"></div>
                                Flexible cancellation
                            </li>
                            <li class="flex items-center text-gray-700">
                                <div class="w-2 h-2 bg-[#C41E3A] rounded-full mr-3"></div>
                                Check-in: 2:00 PM
                            </li>
                            <li class="flex items-center text-gray-700">
                                <div class="w-2 h-2 bg-[#C41E3A] rounded-full mr-3"></div>
                                Check-out: 12:00 PM
                            </li>
                            <li class="flex items-center text-gray-700">
                                <div class="w-2 h-2 bg-[#C41E3A] rounded-full mr-3"></div>
                                Weekly discounts available
                            </li>
                            <li class="flex items-center text-gray-700">
                                <div class="w-2 h-2 bg-[#C41E3A] rounded-full mr-3"></div>
                                Monthly rates on request
                            </li>
                        </ul>
                    </div>
                </div>
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
            Ready to Book?
        </h2>
        <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
            Contact us now to reserve your room at the best rates
        </p>
        <button onclick="bookNow()" class="btn-primary bg-white text-[#C41E3A] hover:bg-gray-50 px-8 py-4 rounded-xl font-semibold text-lg inline-flex items-center space-x-3 shadow-2xl">
            <i class="fab fa-whatsapp text-2xl"></i>
            <span><?php echo t('home.book_button'); ?></span>
        </button>
    </div>
</section>
</main>

<?php require_once 'includes/footer.php'; ?>