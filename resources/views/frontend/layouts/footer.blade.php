<section class="footer-section-5 footer-bg fix">
    <div class="container">
        <div class="footer-widgets-wrapper-5">
            <div class="row text-center text-md-start">

                <!-- Logo + About -->
                <div class="col-md-5 wow fadeInUp mb-4 mb-md-0" data-wow-delay=".2s">
                    <div class="pe-lg-5 single-footer-widget">
                        <div class="widget-head">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" alt="img"
                                    style="height: 80px;width: 150px;">
                            </a>
                        </div>
                        <div class="footer-content">
                            <p>
                                BingeAt Media
                                delivers creative digital solutions that help your brand grow, engage, and
                                shine online.
                            </p>


                            <div
                                class="social-icon d-flex justify-content-center justify-content-md-start align-items-center">
                                @if (isset($socialLinks) && $socialLinks->get('social-facebook')?->value)
                                    <a href="{{ $socialLinks->get('social-facebook')->value }}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                @endif
                                @if (isset($socialLinks) && $socialLinks->get('social-twitter')?->value)
                                    <a href="{{ $socialLinks->get('social-twitter')->value }}" target="_blank"><i
                                            class="fab fa-twitter"></i></a>
                                @endif
                                @if (isset($socialLinks) && $socialLinks->get('social-instagram')?->value)
                                    <a href="{{ $socialLinks->get('social-instagram')->value }}" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                @endif
                                @if (isset($socialLinks) && $socialLinks->get('social-whatsapp')?->value)
                                    <a href="{{ $socialLinks->get('social-whatsapp')->value }}" target="_blank"><i
                                            class="fab fa-whatsapp"></i></a>
                                @endif
                                @if (isset($socialLinks) && $socialLinks->get('social-linkedin')?->value)
                                    <a href="{{ $socialLinks->get('social-linkedin')->value }}" target="_blank"><i
                                            class="fab fa-linkedin-in"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-3 wow fadeInUp mb-4 mb-md-0" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Quick Links</h3>
                        </div>
                        <ul class="list-area">
                            <li><a href="{{ route('frontend.home') }}"><i class="fa-solid fa-chevrons-right"></i>
                                    Home</a></li>
                            <li><a href="{{ route('frontend.home') }}#about"><i class="fa-solid fa-chevrons-right"></i>
                                    About Us</a>
                            </li>
                            <li><a href="{{ route('frontend.home') }}#service"><i
                                        class="fa-solid fa-chevrons-right"></i> Services</a>
                            </li>
                            <li><a href="{{ route('frontend.contact') }}"><i class="fa-solid fa-chevrons-right"></i>
                                    Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-md-3 wow fadeInUp mb-4 mb-md-0" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Contact Us</h3>
                        </div>
                        <div class="footer-content">
                            <ul class="contact-info">
                                <li>
                                    <i class="fa-regular fa-envelope"></i>
                                    <a href="mailto:hello@bingeatmedia.com">hello@bingeatmedia.com</a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-phone-volume"></i>
                                    <a href="tel:+91 80878 35227">+91 80878 35227</a> |
                                    <a href="tel:+91 721 933 5227">+91 721 933 5227</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom-5">
        <div class="container">
            <div
                class="footer-wrapper d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-start">
                <p class="wow fadeInLeft color-2 mb-2 mb-md-0" data-wow-delay=".3s">
                    © All Copyright 2025 by BingeAt Media
                </p>
                <ul class="footer-menu wow fadeInRight d-flex flex-column flex-md-row gap-2 gap-md-4"
                    data-wow-delay=".5s">
                    <li><a href="{{ url('/terms') }}">Terms & Condition</a></li>
                    <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
