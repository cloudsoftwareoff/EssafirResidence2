<?php
require_once 'includes/config.php';
$page_title = t('contact.page_title');
$page_description = t('contact.title') . ' with Essafir Residence. Find our location in Sidi Bouzid, call us, or send a message via our contact form.';
require_once 'includes/header.php';
?>

<main class="flex-grow">

<!-- Page Header -->
<section class="relative py-24 bg-gradient-to-br from-[#C41E3A] via-[#A01729] to-[#8B0000] text-white overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-white rounded-full blur-3xl"></div>
    </div>
    <div class="container mx-auto px-4 lg:px-8 text-center relative z-10">
        <div class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm font-semibold mb-6">
            <?php echo t('nav.contact'); ?>
        </div>
        <h1 class="font-display text-5xl md:text-6xl font-bold mb-6">
            <?php echo t('contact.page_title'); ?>
        </h1>
        <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed">
            <?php echo t('contact.title'); ?>
        </p>
    </div>
</section>

<!-- Contact Content -->
<section class="py-20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
            
            <!-- Contact Form -->
            <div class="bg-white rounded-3xl shadow-refined-lg p-10 md:p-12">
                <h2 class="font-display text-3xl md:text-4xl font-bold text-gray-900 mb-6">Send Us a Message</h2>
                <form id="contact-form" onsubmit="event.preventDefault(); validateAndSendMessage();">
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">
                            <?php echo t('contact.form.name'); ?>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               class="w-full px-5 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-accent focus:border-transparent transition-all"
                               placeholder="<?php echo t('contact.form.name'); ?>">
                    </div>
                    
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-semibold mb-2">
                            <?php echo t('contact.form.email'); ?>
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="w-full px-5 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-accent focus:border-transparent transition-all"
                               placeholder="<?php echo t('contact.form.email'); ?>">
                    </div>
                    
                    <div class="mb-6">
                        <label for="phone" class="block text-gray-700 font-semibold mb-2">
                            <?php echo t('contact.form.phone'); ?>
                        </label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               class="w-full px-5 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-accent focus:border-transparent transition-all"
                               placeholder="<?php echo t('contact.form.phone'); ?>">
                    </div>
                    
                    <div class="mb-8">
                        <label for="message" class="block text-gray-700 font-semibold mb-2">
                            <?php echo t('contact.form.message'); ?> *
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="5" 
                                  required
                                  class="w-full px-5 py-4 border border-gray-200 rounded-xl focus:ring-2 focus:ring-accent focus:border-transparent transition-all resize-none"
                                  placeholder="<?php echo t('contact.form.message'); ?>"></textarea>
                    </div>
                    
                    <button type="submit" 
                            id="submit-btn"
                            class="btn-primary w-full gradient-accent text-white py-4 rounded-xl font-semibold text-base relative">
                        <?php echo t('contact.form.send'); ?>
                    </button>
                </form>
            </div>
            
            <!-- Contact Info -->
            <div class="space-y-6">
                <div class="bg-white rounded-3xl shadow-refined-lg p-10">
                    <h2 class="font-display text-3xl font-bold text-gray-900 mb-8">Contact Information</h2>
                    <div class="space-y-6">
                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-refined group-hover:scale-110 transition-transform">
                                    <i class="fas fa-map-marker-alt text-white text-xl"></i>
                                </div>
                            </div>
                            <div class="ms-5">
                                <h3 class="font-semibold text-lg mb-2 text-gray-900">Address</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    <?php echo t('contact.address'); ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-refined group-hover:scale-110 transition-transform">
                                    <i class="fas fa-phone text-white text-xl"></i>
                                </div>
                            </div>
                            <div class="ms-5">
                                <h3 class="font-semibold text-lg mb-2 text-gray-900">Phone</h3>
                                <a href="tel:<?php echo WHATSAPP_PHONE; ?>" class="text-accent hover:text-blue-700 transition-colors text-lg">
                                    <?php echo WHATSAPP_PHONE; ?>
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-refined group-hover:scale-110 transition-transform">
                                    <i class="fab fa-whatsapp text-white text-xl"></i>
                                </div>
                            </div>
                            <div class="ms-5">
                                <h3 class="font-semibold text-lg mb-2 text-gray-900">WhatsApp</h3>
                                <a href="https://wa.me/<?php echo str_replace('+', '', WHATSAPP_PHONE); ?>" 
                                   target="_blank"
                                   class="text-accent hover:text-blue-700 transition-colors text-lg">
                                    Send Message
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Booking -->
                <div class="gradient-accent text-white rounded-3xl shadow-refined-lg p-10 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 left-1/4 w-64 h-64 bg-white rounded-full blur-3xl"></div>
                    </div>
                    <div class="relative z-10">
                        <h3 class="font-display text-3xl font-bold mb-4">Book Directly</h3>
                        <p class="text-white/90 mb-6 text-lg leading-relaxed">Contact us via WhatsApp for instant booking and confirmation</p>
                        <button onclick="bookNow()" class="btn-primary w-full bg-white text-accent hover:bg-gray-50 py-4 rounded-xl font-semibold text-base inline-flex items-center justify-center space-x-3 relative">
                            <i class="fab fa-whatsapp text-xl"></i>
                            <span><?php echo t('home.book_button'); ?></span>
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50/30">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-block px-4 py-2 bg-white rounded-full text-accent text-sm font-semibold mb-4 shadow-refined">
                Location
            </div>
            <h2 class="font-display text-4xl md:text-5xl font-bold text-gray-900">Find Us</h2>
        </div>
        <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-refined-lg overflow-hidden" style="height: 500px;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d408.41420142093835!2d9.478036949079808!3d35.02388352548577!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1766583609686!5m2!1sen!2sus"
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
</main>

<?php require_once 'includes/footer.php'; ?>