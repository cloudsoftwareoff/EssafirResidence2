<?php
require_once 'includes/config.php';
$page_title = t('rooms.page_title');
$page_description = t('rooms.title') . ' at Essafir Residence. Experience luxury, modern comfort, and premium amenities in Sidi Bouzid.';
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
            <?php echo t('nav.rooms'); ?>
        </div>
        <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">
            <?php echo t('rooms.page_title'); ?>
        </h1>
        <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed">
            <?php echo t('rooms.title'); ?>
        </p>
    </div>
</section>

<!-- Room Gallery -->
<section class="py-20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Room Cards -->
            <?php
            // Sample room images - using your original gallery images
            $rooms = [
                ['image' => 'images/gallery1.webp', 'title' => 'Deluxe Room'],
                ['image' => 'images/gallery2.webp', 'title' => 'Standard Room'],
                ['image' => 'images/gallery3.webp', 'title' => 'Family Suite'],
                ['image' => 'images/gallery4.webp', 'title' => 'Premium Room'],
                ['image' => 'images/gallery5.webp', 'title' => 'Executive Suite'],
                ['image' => 'images/gallery6.webp', 'title' => 'Luxury Room'],
                ['image' => 'images/gallery7.webp', 'title' => 'Comfort Room'],
                ['image' => 'images/gallery8.webp', 'title' => 'Modern Room'],
            ];
            
            foreach ($rooms as $index => $room):
            ?>
            <div class="card-interactive bg-white rounded-3xl shadow-refined-lg overflow-hidden group">
                <div class="relative overflow-hidden">
                    <img src="<?php echo $room['image']; ?>" 
                         alt="<?php echo $room['title']; ?>" 
                         class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-700"
                         loading="<?php echo $index < 3 ? 'eager' : 'lazy'; ?>">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-center pb-8">
                        <button onclick="bookNow()" class="btn-primary bg-white text-accent px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all transform translate-y-4 group-hover:translate-y-0">
                            <?php echo t('home.book_button'); ?>
                        </button>
                    </div>
                </div>
                <div class="p-8">
                    <h3 class="font-display text-2xl font-bold text-gray-900 mb-6">
                        <?php echo $room['title']; ?>
                    </h3>
                    <button onclick="bookNow()" class="btn-primary w-full gradient-accent text-white py-3 rounded-xl font-semibold relative">
                        <?php echo t('home.book_button'); ?>
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Room Features -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50/30">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-2 bg-white rounded-full text-accent text-sm font-semibold mb-4 shadow-refined">
                Premium Features
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Room Features
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Every room is equipped with modern amenities for your comfort
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
            <div class="card-interactive bg-white p-8 rounded-3xl shadow-refined-lg text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-tv text-white text-3xl"></i>
                </div>
                <h4 class="font-bold text-xl text-gray-900 mb-2">Smart TV</h4>
                <p class="text-gray-600">Modern entertainment system</p>
            </div>
            
            <div class="card-interactive bg-white p-8 rounded-3xl shadow-refined-lg text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-snowflake text-white text-3xl"></i>
                </div>
                <h4 class="font-bold text-xl text-gray-900 mb-2">Air Conditioning</h4>
                <p class="text-gray-600">Climate control system</p>
            </div>
            
            <div class="card-interactive bg-white p-8 rounded-3xl shadow-refined-lg text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-wifi text-white text-3xl"></i>
                </div>
                <h4 class="font-bold text-xl text-gray-900 mb-2">Free WiFi</h4>
                <p class="text-gray-600">High-speed internet</p>
            </div>
            
            <div class="card-interactive bg-white p-8 rounded-3xl shadow-refined-lg text-center group">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <i class="fas fa-bath text-white text-3xl"></i>
                </div>
                <h4 class="font-bold text-xl text-gray-900 mb-2">Private Bathroom</h4>
                <p class="text-gray-600">Modern bathroom facilities</p>
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
            Book Your Perfect Room
        </h2>
        <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
            Contact us today to reserve your ideal accommodation
        </p>
        <button onclick="bookNow()" class="btn-primary bg-white text-accent hover:bg-gray-50 px-8 py-4 rounded-xl font-semibold text-lg inline-flex items-center space-x-3 shadow-2xl">
            <i class="fab fa-whatsapp text-2xl"></i>
            <span><?php echo t('home.book_button'); ?></span>
        </button>
    </div>
</section>
</main>

<?php require_once 'includes/footer.php'; ?>