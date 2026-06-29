// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const langBtn = document.getElementById('lang-btn');
    const langMenu = document.getElementById('lang-menu');
    
    // Mobile menu toggle
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
                // Force a reflow to trigger transition
                mobileMenu.offsetHeight;
                mobileMenu.classList.remove('opacity-0', 'max-h-0');
                mobileMenu.classList.add('opacity-100', 'max-h-[600px]');
            } else {
                mobileMenu.classList.remove('opacity-100', 'max-h-[600px]');
                mobileMenu.classList.add('opacity-0', 'max-h-0');
                
                // Add hidden class after transition ends
                mobileMenu.addEventListener('transitionend', function handler() {
                    if (mobileMenu.classList.contains('opacity-0')) {
                        mobileMenu.classList.add('hidden');
                    }
                    mobileMenu.removeEventListener('transitionend', handler);
                }, { once: true });
            }
        });
    }
    
    // Language dropdown toggle
    if (langBtn) {
        langBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            langMenu.classList.toggle('hidden');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!langBtn.contains(e.target) && !langMenu.contains(e.target)) {
                langMenu.classList.add('hidden');
            }
        });
    }
    
    // Image slider
    const slider = document.getElementById('hero-slider');
    if (slider) {
        let currentSlide = 0;
        const slides = slider.querySelectorAll('.slide');
        const indicators = slider.querySelectorAll('.slide-indicator');
        const totalSlides = slides.length;
        let slideInterval;
        
        function showSlide(index) {
            currentSlide = index;
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.remove('opacity-0', 'pointer-events-none');
                    slide.classList.add('opacity-100', 'pointer-events-auto');
                } else {
                    slide.classList.remove('opacity-100', 'pointer-events-auto');
                    slide.classList.add('opacity-0', 'pointer-events-none');
                }
            });
            
            // Update indicators
            indicators.forEach((indicator, i) => {
                if (i === index) {
                    indicator.classList.remove('bg-white/40', 'w-2');
                    indicator.classList.add('bg-white', 'w-6');
                } else {
                    indicator.classList.remove('bg-white', 'w-6');
                    indicator.classList.add('bg-white/40', 'w-2');
                }
            });
        }
        
        function nextSlide() {
            let next = (currentSlide + 1) % totalSlides;
            showSlide(next);
        }
        
        function startSlideShow() {
            stopSlideShow();
            slideInterval = setInterval(nextSlide, 5000);
        }
        
        function stopSlideShow() {
            if (slideInterval) clearInterval(slideInterval);
        }
        
        // Start slideshow initially
        startSlideShow();
        
        // Previous/Next buttons
        const prevBtn = document.getElementById('prev-slide');
        const nextBtn = document.getElementById('next-slide');
        
        if (prevBtn) {
            prevBtn.addEventListener('click', function() {
                let prev = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(prev);
                startSlideShow(); // reset timer on user interaction
            });
        }
        
        if (nextBtn) {
            nextBtn.addEventListener('click', function() {
                nextSlide();
                startSlideShow(); // reset timer on user interaction
            });
        }
        
        // Indicator clicks
        indicators.forEach((indicator, i) => {
            indicator.addEventListener('click', function() {
                showSlide(i);
                startSlideShow(); // reset timer on user interaction
            });
        });
    }
});

// WhatsApp Booking Function
function bookNow() {
    const phone = '+21650836840';
    const message = "Hello, I'm interested in reserving a room at Résidence Essafir.";
    const url = `https://wa.me/${phone.replace('+', '')}?text=${encodeURIComponent(message)}`;
    window.open(url, '_blank');
}

// Contact Form Validation and Submission
function validateAndSendMessage() {
    const name = document.getElementById('name')?.value.trim() || '';
    const email = document.getElementById('email')?.value.trim() || '';
    const phone = document.getElementById('phone')?.value.trim() || '';
    const message = document.getElementById('message')?.value.trim() || '';
    
    // Reset error borders
    ['email', 'phone', 'message'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.remove('border-red-500');
    });
    
    // Validation 1: Message is required
    if (!message) {
        alert("The 'Message' field is required.");
        const msgEl = document.getElementById('message');
        if (msgEl) {
            msgEl.classList.add('border-red-500');
            msgEl.focus();
        }
        return false;
    }
    
    // Validation 2: At least email or phone required
    if (!email && !phone) {
        alert("Please provide either an email or phone number.");
        ['email', 'phone'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.classList.add('border-red-500');
        });
        return false;
    }
    
    // Show loading state
    const submitBtn = document.getElementById('submit-btn');
    const originalText = submitBtn?.textContent;
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';
    }
    
    // Send data
    const data = { name, email, phone, message };
    
    fetch('submit.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(result => {
        console.log(result);
        alert('Message sent successfully!');
        
        // Reset form
        ['name', 'email', 'phone', 'message'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.value = '';
        });
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to send message. Please try again.');
    })
    .finally(() => {
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    });
    
    return false;
}

// Lazy loading for images
if ('IntersectionObserver' in window) {
    const images = document.querySelectorAll('img[loading="lazy"]');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}