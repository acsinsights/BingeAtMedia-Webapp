@extends('frontend.layouts.app')

@section('title', 'BingeAt Media | Contact Us - Digital Marketing & Branding Solutions')
@section('meta_description',
    'Contact BingeAt Media - Creative Digital Marketing & Branding Agency. Get in touch with
    our expert team.')

    @push('styles')
        <style>
            .contact-info-items {
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 360px;
                width: 100%;
                padding: 40px 30px;
                background: #f8f9ff;
                border-radius: 10px;
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .contact-info-items::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(126, 0, 214, 0.3), transparent);
                animation: shimmer 3s infinite;
                z-index: 1;
            }

            .contact-info-items::after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, #7e00d6 0%, #6f00ff 100%);
                border-radius: 10px;
                padding: 3px;
                -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
                -webkit-mask-composite: xor;
                mask-composite: exclude;
                opacity: 0;
                animation: borderGlow 3s ease-in-out infinite;
                z-index: 0;
            }

            @keyframes shimmer {
                0% {
                    left: -100%;
                }

                50% {
                    left: 100%;
                }

                100% {
                    left: 100%;
                }
            }

            @keyframes borderGlow {

                0%,
                100% {
                    opacity: 0;
                }

                50% {
                    opacity: 1;
                }
            }

            .contact-info-items:hover {
                transform: translateY(-8px);
                box-shadow: 0 15px 40px rgba(132, 0, 199, 0.2);
            }

            .contact-info-items>* {
                position: relative;
                z-index: 2;
            }

            .contact-info-items .icon {
                font-size: 48px;
                color: #ffca06;
                margin-bottom: 20px;
                animation: iconBounce 2s ease-in-out infinite;
            }

            @keyframes iconBounce {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            .contact-info-items .content {
                width: 100%;
            }

            .contact-info-items h3 {
                font-size: 1.5rem;
                font-weight: 600;
                color: #1a1a1a;
                margin: 15px 0;
            }

            .contact-info-items h3 a {
                color: #ffca06;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .contact-info-items h3 a:hover {
                color: #000000;
            }

            .contact-info-items p {
                font-size: 0.95rem;
                color: #666;
                line-height: 1.6;
                margin: 0;
            }

            @media (max-width: 768px) {
                .contact-info-items {
                    height: auto;
                    min-height: 320px;
                    padding: 30px 20px;
                }

                .contact-info-items h3 {
                    font-size: 1.3rem;
                }

                .contact-info-items .icon {
                    font-size: 42px;
                }

                .contact-info-items p {
                    font-size: 0.9rem;
                }
            }

            @media (max-width: 480px) {
                .contact-info-items {
                    height: auto;
                    min-height: 280px;
                    padding: 25px 15px;
                    margin-bottom: 15px;
                }

                .contact-info-items h3 {
                    font-size: 1.1rem;
                    margin: 12px 0;
                }

                .contact-info-items .icon {
                    font-size: 36px;
                    margin-bottom: 15px;
                }

                .contact-info-items p {
                    font-size: 0.85rem;
                    line-height: 1.5;
                }
            }

            @media (max-width: 380px) {
                .contact-info-items {
                    height: auto;
                    min-height: 250px;
                    padding: 20px 12px;
                    margin-bottom: 12px;
                }

                .contact-info-items h3 {
                    font-size: 1rem;
                    margin: 10px 0;
                }

                .contact-info-items .icon {
                    font-size: 32px;
                    margin-bottom: 12px;
                }

                .contact-info-items p {
                    font-size: 0.8rem;
                    line-height: 1.4;
                }
            }

            /* Remove hover color effect for specific buttons */
            .contact-form-items button.gt-theme-btn:hover {
                color: var(--gt-header3) !important;
            }

            .contact-form-items button.gt-theme-btn:hover::before {
                background: none !important;
                transform: scale(0, 0) !important;
            }

            .gt-cta-buttons a.gt-theme-btn:hover {
                border-color: #ffffff !important;
                background-color: transparent !important;
                color: #ffffff !important;
            }

            .gt-cta-buttons a.gt-theme-btn:first-child:hover {
                background-color: #ffffff !important;
                color: #8400c7 !important;
            }

            .gt-cta-buttons a.gt-theme-btn:hover::before {
                background: none !important;
                transform: scale(0, 0) !important;
            }
        </style>
    @endpush

@section('content')
    <!-- Gt Breadcrumb Section Start -->
    <div class="gt-breadcrumb-wrapper bg-cover" style="background: linear-gradient(to left, #8400c7, #6f00ff);">
        <div class="container">
            <div class="gt-page-heading">
                <div class="gt-breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">Contact Us</h1>
                </div>
                <ul class="gt-breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="{{ route('frontend.home') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        Contact Us
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Contact Info Section Start -->
    <section class="contact-info-section fix section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="contact-info-items text-center active">
                        <div class="icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="content">
                            <h3>Our Address</h3>
                            <p>
                                Address: Flat No.102, White House Building,
                                Above AU Bank, Khodaram Baug, Boisar – 401501.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="contact-info-items text-center">
                        <div class="icon">
                            <i class="fa-solid fa-envelopes"></i>
                        </div>
                        <div class="content">
                            <h3><a href="mailto:hello@bingeatmedia.com">
                                    hello@bingeatmedia.com</a></h3>
                            <p>
                                Reach out to BingeAT Media anytime for any assistance — we're committed to
                                supporting your creative needs.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="contact-info-items text-center">
                        <div class="icon">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>Hot:<a href="tel:+917219335227">+91 721 933 5227 </a></h3>
                            <h3>Hot:<a href="tel:+918087835227">+91 80878 35227 </a></h3>
                            <p>
                                Call us for any support — we're here for you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section Start -->
    <section class="contact-section-33 fix section-padding pt-0">
        <div class="container">
            <div class="contact-wrapper-2">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="map-items">
                            <div class="googpemap">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3753.9064146999917!2d72.7571502!3d19.8015649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be71f41c6206d39%3A0xfa1936032142c93d!2sArise%20Consultancy%20Services%20-%20Best%20Website%20%26%20App%20Development%20Company!5e0!3m2!1sen!2sin!4v1758617905325!5m2!1sen!2sin"
                                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-content">
                            <h2 class="inner-font fw-700 text-header-color">Ready to Get Started?</h2>
                            <p>
                                Bring your brand's story to life with BingeAT Media. From content creation to
                                full-scale digital campaigns, we're here to make every idea shine.
                            </p>

                            <!-- Success/Error Message -->
                            <div id="form-message"
                                style="display: none; margin-bottom: 20px; padding: 15px; border-radius: 8px;"></div>

                            <form action="{{ route('frontend.contact.submit') }}" id="contact-form" method="POST"
                                class="contact-form-items">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <span>Name*</span>
                                            <input type="text" name="name" id="name" placeholder="Your Name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <span>Phone Number*</span>
                                            <input type="tel" name="phone" id="phone" placeholder="Your Phone"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".6s">
                                        <div class="form-clt">
                                            <span>Email*</span>
                                            <input type="email" name="email" id="email" placeholder="Your Email"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".7s">
                                        <div class="form-clt">
                                            <span>Write Message*</span>
                                            <textarea name="message" id="message" placeholder="Write Message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 wow fadeInUp" data-wow-delay=".9s">
                                        <button type="submit" class="gt-theme-btn style-4">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section Start -->
    <section class="gt-cta-section fix section-padding"
        style="background: linear-gradient(135deg, #8400c7 0%, #6f00ff 100%);">
        <div class="container">
            <div class="gt-cta-content text-center">
                <h2 class="wow fadeInUp" data-wow-delay=".2s"
                    style="color: #ffffff; font-size: 2.5rem; margin-bottom: 20px; font-family: sans-serif;">
                    Ready to Transform Your Digital Presence?
                </h2>
                <p class="wow fadeInUp" data-wow-delay=".4s"
                    style="color: #ffffff; font-size: 1.1rem; margin-bottom: 40px; max-width: 700px; margin-left: auto; margin-right: auto;">
                    Let BingeAt Media help you create stunning digital experiences that engage your audience and
                    drive results. Get in touch with our team today!
                </p>
                <div class="gt-cta-buttons wow fadeInUp" data-wow-delay=".6s">
                    <a href="tel:+917219335227" class="gt-theme-btn"
                        style="background-color: transparent; border: 2px solid #ffffff; color: #ffffff;">
                        Call Us Now
                    </a>
                </div>
                <div class="cta-features wow fadeInUp" data-wow-delay=".8s"
                    style="margin-top: 40px; display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; color: #ffffff;">
                    <div>
                        <i class="fa-solid fa-rocket" style="font-size: 24px; margin-bottom: 10px;"></i>
                        <p style="margin: 0;">Fast Turnaround</p>
                    </div>
                    <div>
                        <i class="fa-solid fa-star" style="font-size: 24px; margin-bottom: 10px;"></i>
                        <p style="margin: 0;">Quality Assured</p>
                    </div>
                    <div>
                        <i class="fa-solid fa-headset" style="font-size: 24px; margin-bottom: 10px;"></i>
                        <p style="margin: 0;">24/7 Support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Contact Form AJAX -->
    <script>
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            const messageDiv = document.getElementById('form-message');

            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            messageDiv.style.display = 'none';

            const formData = new FormData(this);

            fetch('{{ route('frontend.contact.submit') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;

                    if (data.success) {
                        if (messageDiv) {
                            messageDiv.textContent = data.message || 'Form submitted successfully!';
                            messageDiv.style.display = 'block';
                            messageDiv.style.backgroundColor = '#d4edda';
                            messageDiv.style.color = '#155724';
                            messageDiv.style.border = '1px solid #c3e6cb';
                        }
                        document.getElementById('contact-form').reset();

                        // Hide message after 5 seconds
                        setTimeout(() => {
                            if (messageDiv) {
                                messageDiv.style.display = 'none';
                            }
                        }, 5000);
                    } else {
                        if (messageDiv) {
                            messageDiv.textContent = 'Error: ' + (data.message || 'Something went wrong!');
                            messageDiv.style.display = 'block';
                            messageDiv.style.backgroundColor = '#f8d7da';
                            messageDiv.style.color = '#721c24';
                            messageDiv.style.border = '1px solid #f5c6cb';
                        }
                    }
                })
                .catch(error => {
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    console.error('Error:', error);
                    if (messageDiv) {
                        messageDiv.textContent =
                            'An error occurred while submitting the form. Please try again.';
                        messageDiv.style.display = 'block';
                        messageDiv.style.backgroundColor = '#f8d7da';
                        messageDiv.style.color = '#721c24';
                        messageDiv.style.border = '1px solid #f5c6cb';
                    }
                });
        });
    </script>
@endpush
