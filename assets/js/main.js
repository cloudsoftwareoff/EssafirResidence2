/**
 * Essafir Residence — Site Interactions
 * Mobile drawer, language menu, scroll state, hero slider,
 * stay calculator, scroll reveal, and the contact form.
 */
document.addEventListener('DOMContentLoaded', () => {

    const lang = document.documentElement.lang || 'en';
    const isRTL = document.documentElement.dir === 'rtl';

    const i18n = {
        sending: { en: 'Sending...', fr: 'Envoi en cours...', ar: 'جاري الإرسال...' },
        success: {
            en: 'Message sent successfully!',
            fr: 'Message envoyé avec succès !',
            ar: 'تم إرسال رسالتك بنجاح!'
        },
        error_generic: {
            en: 'Something went wrong. Please try again or reach us on WhatsApp.',
            fr: 'Une erreur est survenue. Réessayez ou contactez-nous via WhatsApp.',
            ar: 'حدث خطأ ما. يرجى المحاولة مرة أخرى أو التواصل عبر واتساب.'
        },
        message_required: {
            en: 'Please write a message before sending.',
            fr: 'Veuillez écrire un message avant d\u2019envoyer.',
            ar: 'يرجى كتابة رسالة قبل الإرسال.'
        },
        contact_required: {
            en: 'Please provide either your email or phone number.',
            fr: 'Veuillez indiquer votre e-mail ou votre numéro de téléphone.',
            ar: 'يرجى إدخال بريدك الإلكتروني أو رقم هاتفك.'
        },
        invalid_email: {
            en: 'Please enter a valid email address.',
            fr: 'Veuillez saisir une adresse e-mail valide.',
            ar: 'يرجى إدخال بريد إلكتروني صحيح.'
        },
        rate_limited: {
            en: 'Please wait a few seconds before sending another message.',
            fr: 'Veuillez patienter quelques secondes avant de renvoyer un message.',
            ar: 'يرجى الانتظار قليلاً قبل إرسال رسالة أخرى.'
        }
    };
    const tr = (key) => (i18n[key] && (i18n[key][lang] || i18n[key].en)) || '';

    // ── 1. MOBILE NAVIGATION DRAWER ──
    const menuBtn = document.getElementById('menu-btn');
    const navClose = document.getElementById('nav-close');
    const mobileNav = document.getElementById('mobile-nav');
    const navOverlay = document.getElementById('nav-overlay');

    if (menuBtn && mobileNav && navOverlay && navClose) {
        const openMenu = () => {
            mobileNav.classList.add('open');
            navOverlay.classList.add('open');
            menuBtn.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        };

        const closeMenu = () => {
            mobileNav.classList.remove('open');
            navOverlay.classList.remove('open');
            menuBtn.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        };

        menuBtn.addEventListener('click', openMenu);
        navClose.addEventListener('click', closeMenu);
        navOverlay.addEventListener('click', closeMenu);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeMenu();
        });

        mobileNav.querySelectorAll('.drawer-item').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });
    }

    // ── 2. LANGUAGE DROPDOWN & HASH PRESERVATION ──
    const langBtn = document.getElementById('lang-btn');
    const langMenu = document.getElementById('lang-menu');

    if (langBtn && langMenu) {
        langBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = langMenu.classList.contains('open');
            langMenu.classList.toggle('open', !isOpen);
            langBtn.setAttribute('aria-expanded', String(!isOpen));
        });

        // Preserve current section anchor hash on language change redirect
        langMenu.querySelectorAll('a[href*="lang="]').forEach((link) => {
            link.addEventListener('click', (e) => {
                const currentHash = window.location.hash ? window.location.hash.substring(1) : '';
                if (currentHash) {
                    try {
                        const url = new URL(link.href, window.location.origin);
                        url.searchParams.set('hash', currentHash);
                        link.href = url.toString();
                    } catch (err) {
                        // Fallback
                    }
                }
            });
        });

        document.addEventListener('click', (e) => {
            if (!langBtn.contains(e.target) && !langMenu.contains(e.target)) {
                langMenu.classList.remove('open');
                langBtn.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // ── 3. STICKY HEADER SCROLL STATE + ANCHOR OFFSET ──
    const siteHeader = document.querySelector('.site-header');
    const mobileStickyBar = document.getElementById('mobile-sticky-bar');
    const headerHeight = () => (siteHeader ? siteHeader.offsetHeight : 0);

    if (siteHeader) {
        let ticking = false;
        const updateHeaderState = () => {
            const scrollY = window.scrollY;
            siteHeader.classList.toggle('scrolled', scrollY > 8);

            // Toggle mobile sticky booking bar after scrolling past hero
            if (mobileStickyBar) {
                const showStickyBar = scrollY > 450;
                mobileStickyBar.classList.toggle('translate-y-full', !showStickyBar);
                mobileStickyBar.classList.toggle('translate-y-0', showStickyBar);
            }

            ticking = false;
        };
        document.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(updateHeaderState);
                ticking = true;
            }
        }, { passive: true });
        updateHeaderState();
    }

    // Smooth-scroll same-page anchors with offset
    document.querySelectorAll('a[href*="#"]').forEach((link) => {
        const href = link.getAttribute('href') || '';
        const hashIndex = href.indexOf('#');
        if (hashIndex === -1) return;

        const targetId = href.slice(hashIndex + 1);
        if (!targetId) return;

        const pathPart = href.slice(0, hashIndex);
        const samePage = pathPart === '' || pathPart === window.location.pathname.split('/').pop();
        if (!samePage) return;

        link.addEventListener('click', (e) => {
            const target = document.getElementById(targetId);
            if (!target) return;
            e.preventDefault();

            const top = target.getBoundingClientRect().top + window.scrollY - (headerHeight() + 16);
            window.scrollTo({ top, behavior: 'smooth' });
            history.replaceState(null, '', `#${targetId}`);
        });
    });

    // Scrollspy: highlight active nav link
    const navLinks = Array.from(document.querySelectorAll('.nav-link'));
    const sections = navLinks
        .map((link) => {
            const href = link.getAttribute('href') || '';
            const id = href.split('#')[1];
            return id ? document.getElementById(id) : null;
        })
        .filter(Boolean);

    if (sections.length && 'IntersectionObserver' in window) {
        const setActive = (id) => {
            navLinks.forEach((link) => {
                link.classList.toggle('active', link.getAttribute('href').split('#')[1] === id);
            });
        };

        const spy = new IntersectionObserver((entries) => {
            const visible = entries
                .filter((entry) => entry.isIntersecting)
                .sort((a, b) => b.intersectionRatio - a.intersectionRatio)[0];
            if (visible) setActive(visible.target.id);
        }, { rootMargin: `-${headerHeight() + 20}px 0px -55% 0px`, threshold: [0.1, 0.25, 0.5] });

        sections.forEach((section) => spy.observe(section));
    }

    // ── 4. SCROLL REVEAL ──
    const revealTargets = Array.from(document.querySelectorAll('section[id]'))
        .filter((el) => el.id !== 'home');

    if (revealTargets.length && 'IntersectionObserver' in window) {
        revealTargets.forEach((el) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(18px)';
            el.style.transition = 'opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1)';
        });

        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        revealTargets.forEach((el) => revealObserver.observe(el));
    }

    // ── 5. HERO SLIDER ──
    const sliderRoot = document.querySelector('.hero-slide')?.parentElement;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slider-dot');
    let currentSlide = 0;
    let slideInterval;

    if (slides.length > 0) {
        const showSlide = (n) => {
            slides.forEach((slide) => slide.classList.remove('active'));
            dots.forEach((dot) => dot.classList.remove('active'));

            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            if (dots[currentSlide]) dots[currentSlide].classList.add('active');
        };

        const nextSlide = () => showSlide(currentSlide + 1);
        const prevSlide = () => showSlide(currentSlide - 1);

        const startSlider = () => {
            stopSlider();
            slideInterval = setInterval(nextSlide, 5500);
        };
        const stopSlider = () => {
            if (slideInterval) clearInterval(slideInterval);
        };

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
                startSlider();
            });
        });

        if (sliderRoot) {
            sliderRoot.addEventListener('mouseenter', stopSlider);
            sliderRoot.addEventListener('mouseleave', startSlider);
            sliderRoot.addEventListener('focusin', stopSlider);
            sliderRoot.addEventListener('focusout', startSlider);

            let touchStartX = 0;
            sliderRoot.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].clientX;
                stopSlider();
            }, { passive: true });
            sliderRoot.addEventListener('touchend', (e) => {
                const delta = e.changedTouches[0].clientX - touchStartX;
                if (Math.abs(delta) > 40) {
                    const rtlFlip = isRTL ? -1 : 1;
                    if (delta * rtlFlip < 0) nextSlide(); else prevSlide();
                }
                startSlider();
            }, { passive: true });
        }

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) stopSlider(); else startSlider();
        });

        showSlide(0);
        startSlider();
    }

    // ── 6. STAY ESTIMATOR WITH DATE PICKERS ──
    const roomSelect = document.getElementById('calc-room');
    const checkinInput = document.getElementById('calc-checkin');
    const checkoutInput = document.getElementById('calc-checkout');
    const nightsInput = document.getElementById('calc-nights');
    const totalVal = document.getElementById('total-val');
    const calcBookBtn = document.getElementById('calc-book-btn');

    // Default dates initialization
    const today = new Date();
    const defaultCheckin = new Date(today);
    defaultCheckin.setDate(today.getDate() + 1);
    const defaultCheckout = new Date(defaultCheckin);
    defaultCheckout.setDate(defaultCheckin.getDate() + 3);

    const formatDateStr = (dateObj) => dateObj.toISOString().split('T')[0];

    if (checkinInput && !checkinInput.value) {
        checkinInput.min = formatDateStr(today);
        checkinInput.value = formatDateStr(defaultCheckin);
    }
    if (checkoutInput && !checkoutInput.value) {
        checkoutInput.min = formatDateStr(defaultCheckin);
        checkoutInput.value = formatDateStr(defaultCheckout);
    }

    const updateEstimate = (changedSource) => {
        if (!roomSelect || !nightsInput || !totalVal || !calcBookBtn) return;

        const roomPrices = { standard: 30, deluxe: 60, family: 140 };
        const roomLabels = {
            en: { standard: 'Standard Room', deluxe: 'Deluxe Room', family: 'Family Suite' },
            fr: { standard: 'Chambre Standard', deluxe: 'Chambre Deluxe', family: 'Suite Familiale' },
            ar: { standard: 'غرفة عادية', deluxe: 'غرفة ديلوكس', family: 'جناح عائلي' }
        };

        const selectedRoom = roomSelect.value;

        let nights = 3;
        if (checkinInput && checkoutInput && (changedSource === 'date' || !changedSource)) {
            const cin = new Date(checkinInput.value);
            const cout = new Date(checkoutInput.value);
            if (!isNaN(cin.getTime()) && !isNaN(cout.getTime()) && cout > cin) {
                const diffTime = Math.abs(cout - cin);
                nights = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                nightsInput.value = nights;
            } else if (!isNaN(cin.getTime())) {
                const newCout = new Date(cin);
                newCout.setDate(cin.getDate() + parseInt(nightsInput.value || 3, 10));
                checkoutInput.value = formatDateStr(newCout);
                nights = parseInt(nightsInput.value || 3, 10);
            }
        } else {
            nights = parseInt(nightsInput.value, 10) || 1;
            if (nights < 1) nights = 1;
            if (nights > 90) nights = 90;
            nightsInput.value = nights;

            if (checkinInput && checkoutInput) {
                const cin = new Date(checkinInput.value || defaultCheckin);
                const cout = new Date(cin);
                cout.setDate(cin.getDate() + nights);
                checkoutInput.value = formatDateStr(cout);
            }
        }

        const pricePerNight = roomPrices[selectedRoom] ?? 50;
        const total = pricePerNight * nights;
        totalVal.textContent = `${total} TND`;

        const currentLang = document.documentElement.lang || 'en';
        const roomName = roomLabels[currentLang]?.[selectedRoom] ?? roomLabels.en[selectedRoom];
        const cinStr = checkinInput?.value || '';
        const coutStr = checkoutInput?.value || '';

        let bookingMsg;
        if (currentLang === 'ar') {
            bookingMsg = `مرحباً إقامة السفير، أود حجز ${roomName} لمدة ${nights} ليالٍ (من ${cinStr} إلى ${coutStr}). التكلفة التقديرية: ${total} دينار تونسي.`;
        } else if (currentLang === 'fr') {
            bookingMsg = `Bonjour Résidence Essafir, je souhaite réserver une ${roomName} pour ${nights} nuits (du ${cinStr} au ${coutStr}). Coût estimé : ${total} TND.`;
        } else {
            bookingMsg = `Hello Essafir Residence, I'd like to book a ${roomName} for ${nights} nights (Check-in: ${cinStr}, Check-out: ${coutStr}). Estimated total: ${total} TND.`;
        }

        const cleanPhone = '21650836840';
        calcBookBtn.href = `https://wa.me/${cleanPhone}?text=${encodeURIComponent(bookingMsg)}`;
    };

    if (roomSelect && nightsInput && totalVal && calcBookBtn) {
        roomSelect.addEventListener('change', () => updateEstimate('room'));
        if (checkinInput) checkinInput.addEventListener('change', () => updateEstimate('date'));
        if (checkoutInput) checkoutInput.addEventListener('change', () => updateEstimate('date'));
        nightsInput.addEventListener('input', () => updateEstimate('nights'));
        updateEstimate();
    }

    // ── 7. GALLERY LIGHTBOX MODAL ──
    const galleryItems = document.querySelectorAll('.gallery-item');
    if (galleryItems.length > 0) {
        const lightbox = document.createElement('div');
        lightbox.id = 'gallery-lightbox';
        lightbox.className = 'fixed inset-0 z-[300] bg-olive/95 backdrop-blur-md flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-300';
        lightbox.innerHTML = `
            <div class="relative max-w-4xl w-full flex flex-col items-center">
                <button type="button" id="lightbox-close" class="absolute -top-12 right-0 text-white/80 hover:text-white text-3xl p-2 cursor-pointer" aria-label="Close image lightbox">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <img id="lightbox-img" src="" alt="" class="max-h-[75vh] w-auto object-contain rounded-[6px] shadow-2xl mb-4">
                <div class="flex flex-col sm:flex-row items-center justify-between w-full gap-3 px-2">
                    <span id="lightbox-caption" class="font-serif text-white text-xl text-center sm:text-left"></span>
                    <a id="lightbox-wa-btn" href="#" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-5 py-2.5 bg-whatsapp text-white rounded-[4px] text-xs font-bold uppercase tracking-wider hover:bg-whatsapp-hover transition-colors">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                        WhatsApp
                    </a>
                </div>
            </div>
        `;
        document.body.appendChild(lightbox);

        const lightboxImg = lightbox.querySelector('#lightbox-img');
        const lightboxCaption = lightbox.querySelector('#lightbox-caption');
        const lightboxWaBtn = lightbox.querySelector('#lightbox-wa-btn');
        const lightboxClose = lightbox.querySelector('#lightbox-close');

        const openLightbox = (src, alt, waUrl) => {
            lightboxImg.src = src;
            lightboxImg.alt = alt;
            lightboxCaption.textContent = alt;
            lightboxWaBtn.href = waUrl;
            lightbox.classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden';
        };

        const closeLightbox = () => {
            lightbox.classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = '';
        };

        lightboxClose.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !lightbox.classList.contains('opacity-0')) closeLightbox();
        });

        galleryItems.forEach((item) => {
            const img = item.querySelector('img');
            const waLink = item.querySelector('a');
            if (img) {
                item.style.cursor = 'pointer';
                item.addEventListener('click', (e) => {
                    if (e.target.closest('a')) return;
                    e.preventDefault();
                    openLightbox(img.src, img.alt, waLink ? waLink.href : '#');
                });
            }
        });
    }

    // ── 8. TOAST NOTIFICATIONS ──
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.setAttribute('role', 'status');
        toastContainer.setAttribute('aria-live', 'polite');
        toastContainer.className = `fixed z-[200] bottom-6 ${isRTL ? 'right-6' : 'left-6'} flex flex-col gap-2.5 max-w-[340px] pointer-events-none`;
        document.body.appendChild(toastContainer);
    }

    function showToast(message, type = 'success') {
        if (!message) return;
        const toast = document.createElement('div');
        const accent = type === 'error' ? 'border-terra' : 'border-olive';
        const icon = type === 'error' ? 'fa-circle-exclamation text-terra' : 'fa-circle-check text-olive';

        toast.className = `pointer-events-auto flex items-start gap-3 bg-white border ${accent} border-l-[3px] rounded-[6px] shadow-[0_8px_30px_rgba(17,19,17,0.12)] px-4 py-3.5 text-[13.5px] text-charcoal opacity-0 -translate-y-1.5 transition-all duration-300`;
        toast.innerHTML = `<i class="fa-solid ${icon} mt-0.5 text-[13px]"></i><span class="leading-snug">${message}</span>`;
        toastContainer.appendChild(toast);

        requestAnimationFrame(() => {
            toast.classList.remove('opacity-0', '-translate-y-1.5');
        });

        setTimeout(() => {
            toast.classList.add('opacity-0');
            setTimeout(() => toast.remove(), 300);
        }, 4500);
    }

    // ── 9. CONTACT FORM ──
    const contactForm = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');

    if (contactForm && submitBtn) {
        const nameEl = document.getElementById('name');
        const emailEl = document.getElementById('email');
        const phoneEl = document.getElementById('phone');
        const messageEl = document.getElementById('message');

        const fieldErrorClass = 'border-terra ring-1 ring-terra/30';

        const setFieldError = (el, msg) => {
            if (!el) return;
            el.classList.add(...fieldErrorClass.split(' '));
            let hint = el.parentElement.querySelector('.field-error');
            if (!hint) {
                hint = document.createElement('p');
                hint.className = 'field-error text-[11.5px] text-terra mt-1';
                el.insertAdjacentElement('afterend', hint);
            }
            hint.textContent = msg;
        };

        const clearFieldError = (el) => {
            if (!el) return;
            el.classList.remove(...fieldErrorClass.split(' '));
            const hint = el.parentElement.querySelector('.field-error');
            if (hint) hint.remove();
        };

        const clearAllErrors = () => {
            [nameEl, emailEl, phoneEl, messageEl].forEach(clearFieldError);
        };

        [emailEl, phoneEl, messageEl].forEach((el) => {
            if (!el) return;
            el.addEventListener('input', () => clearFieldError(el));
        });

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            clearAllErrors();

            const name = nameEl ? nameEl.value.trim() : '';
            const email = emailEl ? emailEl.value.trim() : '';
            const phone = phoneEl ? phoneEl.value.trim() : '';
            const message = messageEl ? messageEl.value.trim() : '';

            // Anti-bot fields
            const website_url = document.getElementById('website_url')?.value || '';
            const form_time = document.getElementById('form_time')?.value || 0;

            if (!message) {
                setFieldError(messageEl, tr('message_required'));
                messageEl?.focus();
                return;
            }

            if (email && !emailPattern.test(email)) {
                setFieldError(emailEl, tr('invalid_email'));
                emailEl?.focus();
                return;
            }

            if (!email && !phone) {
                setFieldError(emailEl, tr('contact_required'));
                setFieldError(phoneEl, tr('contact_required'));
                emailEl?.focus();
                return;
            }

            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-80', 'cursor-not-allowed');
            submitBtn.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> ${tr('sending')}`;

            const controller = new AbortController();
            const timeout = setTimeout(() => controller.abort(), 15000);

            fetch('submit.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                body: JSON.stringify({ name, email, phone, message, website_url, form_time }),
                signal: controller.signal
            })
                .then((response) => response.json().then((data) => ({ ok: response.ok, data })))
                .then(({ ok, data }) => {
                    if (ok && data.success) {
                        showToast(tr('success'), 'success');
                        contactForm.reset();
                        clearAllErrors();
                    } else {
                        showToast(tr(data.error) || tr('error_generic'), 'error');
                    }
                })
                .catch(() => {
                    showToast(tr('error_generic'), 'error');
                })
                .finally(() => {
                    clearTimeout(timeout);
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-80', 'cursor-not-allowed');
                    submitBtn.innerHTML = originalBtnHtml;
                });
        });
    }

    // ── 10. BACK TO TOP ──
    const backToTop = document.createElement('button');
    backToTop.id = 'back-to-top';
    backToTop.type = 'button';
    backToTop.setAttribute('aria-label', isRTL ? 'العودة إلى الأعلى' : (lang === 'fr' ? 'Retour en haut' : 'Back to top'));
    backToTop.className = `fixed bottom-6 ${isRTL ? 'right-24' : 'left-24'} z-[99] w-11 h-11 bg-white border border-sand-border text-olive rounded-full flex items-center justify-center shadow-[0_4px_16px_rgba(17,19,17,0.12)] opacity-0 pointer-events-none translate-y-2 transition-all duration-300 hover:border-terra hover:text-terra`;
    backToTop.innerHTML = '<i class="fa-solid fa-arrow-up text-[14px]"></i>';
    document.body.appendChild(backToTop);

    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    let backToTopTicking = false;
    document.addEventListener('scroll', () => {
        if (backToTopTicking) return;
        backToTopTicking = true;
        window.requestAnimationFrame(() => {
            const show = window.scrollY > window.innerHeight * 0.6;
            backToTop.classList.toggle('opacity-0', !show);
            backToTop.classList.toggle('pointer-events-none', !show);
            backToTop.classList.toggle('translate-y-2', !show);
            backToTopTicking = false;
        });
    }, { passive: true });
});