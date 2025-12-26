<!DOCTYPE html>
<html lang="en">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Gramentheme">
    <meta name="description" content="@yield('meta_description', 'BingeAt Media - Creative Digital Marketing & Branding Agency')">
    <!-- ======== Page title ============ -->
    <title>@yield('title', 'BingeAt Media | Creative Digital Marketing & Branding Agency')</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="{{ asset('frontend/img/FAB-ICON.png') }}">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.css') }}">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <!-- animation card section -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    @stack('styles')

    <!-- GSAP Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.2/vanilla-tilt.min.js"></script>

    <style>
        /* Enquiry Modal Critical Styles */
        .enquiry-modal {
            display: none !important;
            position: fixed !important;
            z-index: 99999 !important;
            left: 0 !important;
            top: 0 !important;
            width: 100% !important;
            height: 100% !important;
            background-color: rgba(0, 0, 0, 0.5) !important;
            animation: fadeIn 0.3s ease-in-out !important;
        }

        .enquiry-modal.active {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
        }

        body.modal-open {
            overflow: hidden !important;
            padding-right: 0 !important;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .enquiry-modal-content {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%) !important;
            border-radius: 15px !important;
            width: 90% !important;
            max-width: 500px !important;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2) !important;
            animation: slideIn 0.3s ease-in-out !important;
            max-height: 90vh !important;
            overflow-y: auto !important;
            position: relative !important;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .enquiry-modal-header {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            padding: 30px 30px 20px !important;
            border-bottom: 2px solid #e0e0e0 !important;
            background: linear-gradient(135deg, #6B41FF 0%, #7444FD 100%) !important;
            /* border-radius: 15px 15px 0 0 !important; */
        }

        .enquiry-modal-header h3 {
            color: white !important;
            font-size: 24px !important;
            font-weight: 700 !important;
            margin: 0 !important;
            font-family: sans-serif;
        }

        .enquiry-close-btn {
            background: none !important;
            border: none !important;
            color: white !important;
            font-size: 32px !important;
            cursor: pointer !important;
            width: 40px !important;
            height: 40px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: transform 0.2s ease !important;
            padding: 0 !important;
        }

        .enquiry-close-btn:hover {
            transform: rotate(90deg) !important;
        }

        .enquiry-form {
            padding: 30px !important;
        }

        .form-group {
            margin-bottom: 20px !important;
        }

        .form-group label {
            display: block !important;
            margin-bottom: 8px !important;
            font-weight: 600 !important;
            color: #333 !important;
            font-size: 14px !important;
            text-transform: capitalize !important;
        }

        .form-group input,
        .form-group textarea {
            width: 100% !important;
            padding: 12px 15px !important;
            border: 2px solid #e0e0e0 !important;
            border-radius: 8px !important;
            font-size: 14px !important;
            font-family: 'DM Sans', sans-serif !important;
            transition: all 0.3s ease !important;
            background-color: #f8f9fa !important;
            box-sizing: border-box !important;
            color: black !important;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none !important;
            border-color: #6B41FF !important;
            background-color: #fff !important;
            box-shadow: 0 0 0 3px rgba(107, 65, 255, 0.1) !important;
        }

        .form-group input[readonly] {
            background-color: #e8e8e8 !important;
            cursor: not-allowed !important;
            color: #555 !important;
        }

        .form-group textarea {
            resize: vertical !important;
            min-height: 100px !important;
        }

        .form-buttons {
            display: flex !important;
            justify-content: center !important;
            margin-top: 30px !important;
        }

        .submit-btn,
        .cancel-btn {
            padding: 14px 40px !important;
            border: none !important;
            border-radius: 8px !important;
            font-size: 14px !important;
            font-weight: 700 !important;
            cursor: pointer !important;
            text-transform: uppercase !important;
            transition: all 0.3s ease !important;
        }

        .submit-btn {
            background: linear-gradient(135deg, #6B41FF 0%, #7444FD 100%) !important;
            color: white !important;
        }

        .submit-btn:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 8px 20px rgba(107, 65, 255, 0.3) !important;
        }

        .submit-btn:active {
            transform: translateY(-1px) !important;
        }



        @media (max-width: 768px) {
            .enquiry-modal-content {
                width: 95% !important;
                max-width: 450px !important;
            }

            .enquiry-modal-header {
                padding: 20px !important;
            }

            .enquiry-modal-header h3 {
                font-size: 20px !important;
            }

            .enquiry-form {
                padding: 20px !important;
            }

            .form-group {
                margin-bottom: 15px !important;
            }

            .form-buttons {
                justify-content: center !important;
            }

            .submit-btn {
                width: auto !important;
            }
        }
    </style>

</head>

<body>

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')

    <!--<< All JS Plugins >>-->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <!--<< Viewport Js >>-->
    <script src="{{ asset('frontend/js/viewport.jquery.js') }}"></script>
    <!--<< Bootstrap Js >>-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--<< Nice Select Js >>-->
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <!--<< Waypoints Js >>-->
    <script src="{{ asset('frontend/js/jquery.waypoints.js') }}"></script>
    <!--<< Counterup Js >>-->
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <!--<< MeanMenu Js >>-->
    <script src="{{ asset('frontend/js/jquery.meanmenu.min.js') }}"></script>
    <!--<< Parallaxie Js >>-->
    <script src="{{ asset('frontend/js/parallaxie.js') }}"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <!--<< Wow Animation Js >>-->
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <!--<< Main.js >>-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <!-- Contact Form JavaScript - DISABLED (using page-specific handler) -->
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            const messageDiv = document.getElementById('form-message');
            const messageText = document.getElementById('message-text');

            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Show loading state
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalText = submitBtn.textContent;
                    submitBtn.textContent = 'Sending...';
                    submitBtn.disabled = true;

                    // Hide previous messages
                    messageDiv.style.display = 'none';

                    // Get form data
                    const formData = new FormData(form);

                    // Send AJAX request
                    fetch('sendmail.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            // Show message
                            messageDiv.style.display = 'block';
                            messageText.textContent = data.message;

                            if (data.success) {
                                // Success message styling
                                messageDiv.style.backgroundColor = '#d4edda';
                                messageDiv.style.color = '#155724';
                                messageDiv.style.border = '1px solid #c3e6cb';

                                // Clear form
                                form.reset();
                            } else {
                                // Error message styling
                                messageDiv.style.backgroundColor = '#f8d7da';
                                messageDiv.style.color = '#721c24';
                                messageDiv.style.border = '1px solid #f5c6cb';
                            }

                            // Scroll to message
                            messageDiv.scrollIntoView({
                                behavior: 'smooth',
                                block: 'nearest'
                            });
                        })
                        .catch(error => {
                            // Show error message
                            messageDiv.style.display = 'block';
                            messageDiv.style.backgroundColor = '#f8d7da';
                            messageDiv.style.color = '#721c24';
                            messageDiv.style.border = '1px solid #f5c6cb';
                            messageText.textContent =
                                'Sorry, there was an error sending your message. Please try again later.';
                            messageDiv.scrollIntoView({
                                behavior: 'smooth',
                                block: 'nearest'
                            });
                        })
                        .finally(() => {
                            // Reset button
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });
                });
            }
        });
    </script> --}}

    <!-- Enquiry Modal Start -->
    <div id="enquiryModal" class="enquiry-modal">
        <div class="enquiry-modal-content">
            <div class="enquiry-modal-header">
                <h3>Service Enquiry Form</h3>
                <button class="enquiry-close-btn" onclick="closeEnquiryModal()">&times;</button>
            </div>
            <form id="enquiryForm" class="enquiry-form">
                <div class="form-group">
                    <label for="serviceName">Service</label>
                    <input type="text" id="serviceName" name="serviceName" readonly required>
                </div>
                <div class="form-group">
                    <label for="clientName">Full Name</label>
                    <input type="text" id="clientName" name="clientName" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="clientEmail">Email Address</label>
                    <input type="email" id="clientEmail" name="clientEmail" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="clientPhone">Phone Number</label>
                    <input type="tel" id="clientPhone" name="clientPhone" placeholder="Enter your phone number"
                        required>
                </div>
                <div class="form-group">
                    <label for="clientMessage">Message</label>
                    <textarea id="clientMessage" name="clientMessage" placeholder="Tell us about your project" rows="4"></textarea>
                </div>
                <div class="form-group form-buttons">
                    <button type="submit" class="submit-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Enquiry Modal End -->

    <!-- animation card section -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        // Service Enquiry Modal Functions
        const services = [
            "Social & Digital Marketing",
            "Graphic Design",
            "Reel Shooting & Promos",
            "Audio-Video Production",
            "Podcast Studio",
            "Lead Gen-Ads"
        ];

        function openEnquiryModal(serviceName) {
            const modal = document.getElementById('enquiryModal');
            document.getElementById('serviceName').value = serviceName;
            modal.classList.add('active');
            document.body.classList.add('modal-open');
        }

        function closeEnquiryModal() {
            const modal = document.getElementById('enquiryModal');
            modal.classList.remove('active');
            document.body.classList.remove('modal-open');
            document.getElementById('enquiryForm').reset();
            document.getElementById('serviceName').value = '';
        }

        // Add click handlers to arrow buttons
        document.addEventListener('DOMContentLoaded', function() {
            const arrowBtns = document.querySelectorAll('.arrow-btn');
            arrowBtns.forEach((btn, index) => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const serviceIndex = index % services.length;
                    openEnquiryModal(services[serviceIndex]);
                });
            });

            // Handle form submission
            const enquiryForm = document.getElementById('enquiryForm');
            if (enquiryForm) {
                enquiryForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Get CSRF token
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute(
                        'content');

                    // Create FormData object to send to Laravel
                    const formData = new FormData();
                    formData.append('serviceName', document.getElementById('serviceName').value);
                    formData.append('clientName', document.getElementById('clientName').value);
                    formData.append('clientEmail', document.getElementById('clientEmail').value);
                    formData.append('clientPhone', document.getElementById('clientPhone').value);
                    formData.append('clientMessage', document.getElementById('clientMessage').value);

                    // Send to Laravel endpoint
                    fetch('{{ route('frontend.enquiry.submit') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Show success message
                                const modal = document.getElementById('enquiryModal');
                                const modalContent = modal.querySelector('.enquiry-modal-content');
                                const successMsg = document.createElement('div');
                                successMsg.style.cssText =
                                    'background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin: 20px; text-align: center; border: 1px solid #c3e6cb;';
                                successMsg.textContent = data.message;
                                modalContent.insertBefore(successMsg, modalContent.firstChild);

                                document.getElementById('enquiryForm').reset();

                                // Close modal after 2 seconds
                                setTimeout(() => {
                                    closeEnquiryModal();
                                    successMsg.remove();
                                }, 2000);
                            } else {
                                alert('Error: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while submitting the form. Please try again.');
                        });
                });
            }

            // Close modal when clicking outside
            window.addEventListener('click', function(e) {
                const modal = document.getElementById('enquiryModal');
                if (e.target === modal) {
                    closeEnquiryModal();
                }
            });
        });
    </script>

    <!-- Contact Form JavaScript - DISABLED (duplicate, using page-specific handler) -->
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            const messageDiv = document.getElementById('form-message');
            const messageText = document.getElementById('message-text');

            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalText = submitBtn.textContent;
                    submitBtn.textContent = 'Sending...';
                    submitBtn.disabled = true;

                    messageDiv.style.display = 'none';

                    const formData = new FormData(form);

                    fetch('sendmail.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            messageDiv.style.display = 'block';
                            messageText.textContent = data.message;

                            if (data.success) {
                                messageDiv.style.backgroundColor = '#d4edda';
                                messageDiv.style.color = '#155724';
                                messageDiv.style.border = '1px solid #c3e6cb';
                                form.reset();
                            } else {
                                messageDiv.style.backgroundColor = '#f8d7da';
                                messageDiv.style.color = '#721c24';
                                messageDiv.style.border = '1px solid #f5c6cb';
                            }

                            messageDiv.scrollIntoView({
                                behavior: 'smooth',
                                block: 'nearest'
                            });
                        })
                        .catch(error => {
                            messageDiv.style.display = 'block';
                            messageDiv.style.backgroundColor = '#f8d7da';
                            messageDiv.style.color = '#721c24';
                            messageDiv.style.border = '1px solid #f5c6cb';
                            messageText.textContent =
                                'Sorry, there was an error sending your message. Please try again later.';
                            messageDiv.scrollIntoView({
                                behavior: 'smooth',
                                block: 'nearest'
                            });
                        })
                        .finally(() => {
                            submitBtn.textContent = originalText;
                            submitBtn.disabled = false;
                        });
                });
            }
        });
    </script> --}}

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/918484935227?text=Hi,%20I%20am%20interested%20in%20your%20services" class="whatsapp-button"
        target="_blank" title="Chat with us on WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <script>
        // Show/hide WhatsApp button
        window.addEventListener('scroll', function() {
            const whatsappBtn = document.querySelector('.whatsapp-button');
            if (whatsappBtn) {
                if (window.scrollY > 300) {
                    whatsappBtn.classList.add('show');
                } else {
                    whatsappBtn.classList.remove('show');
                }
            }
        });
    </script>

    @stack('scripts')

</body>

</html>
