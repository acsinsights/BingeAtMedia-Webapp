@extends('frontend.layouts.app')

@section('content')
    <section class="hero-section-5 gt-hero-5 bg-cover" style="background: linear-gradient(to left, #8400c7, #6f00ff);">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="gt-hero-content">
                        <h6 class="wow fadeInUp">
                            Digital Marketing Agency
                        </h6>
                        <h1 class="char-animation">
                            Media That Gets Watched. <br>
                            <span style="color:#ffca06;">Marketing</span> That Gets Results.
                        </h1>
                        <p class="wow fadeInUp" data-wow-delay=".3s">
                            " At BingeAt Media, we craft compelling content and result-driven campaigns for
                            creators and businesses. From production to promotion, we make sure your story gets
                            seen and your brand grows." </p>
                        <div class="gt-hero-btn wow fadeInUp" data-wow-delay=".5s">
                            <a href="javascript:void(0)" class="gt-theme-btn style-4 ">know more</a>
                            <a href="#service" class="gt-theme-btn style-4 bg-white ">our service</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6"></div>
            </div>
        </div>
        <div class="mike-shape float-bob-y">
            <img src="{{ asset('frontend/img/mike-shape.png') }}" alt="img">
        </div>
        <div class="tophy-shape float-bob-y">
            <img src="{{ asset('frontend/img/tophy-shape.png') }}" alt="img">
        </div>
        <div class="power-shape float-bob-x">
            <img src="{{ asset('frontend/img/power-shape.png') }}" alt="img">
        </div>
        <div class="mike-shape2 float-bob-x">
            <img src="{{ asset('frontend/img/mike-2.png') }}" alt="img">
        </div>
        <div class="marketing-shape float-bob-x">
            <img src="{{ asset('frontend/img/marketing.png') }}" alt="img">
        </div>
    </section>

    <!-- Marque Section Start -->
    <div class="marquee-section-1">
        <div class="mycustom-marque style-2">
            <div class="scrolling-wrap">
                <div class="comm">
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">BingeAt Media
                    </div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Your
                        Full-Suite Media &
                        Marketing Team</div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Helping
                        Creators &
                        Businesses Grow</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">BingeAt Media
                    </div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Your
                        Full-Suite Media &
                        Marketing Team</div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Helping
                        Creators &
                        Businesses Grow</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">BingeAt Media
                    </div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Your
                        Full-Suite Media &
                        Marketing Team</div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Helping
                        Creators &
                        Businesses Grow</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">BingeAt Media
                    </div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Your
                        Full-Suite Media &
                        Marketing Team</div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Helping
                        Creators &
                        Businesses Grow</div>
                </div>
            </div>
        </div>
        <div class="mycustom-marque style-3">
            <div class="scrolling-wrap">
                <div class="comm">
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Helping
                        Creators &
                        Businesses Grow</div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">BingeAt Media
                    </div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Your
                        Full-Suite Media &
                        Marketing Team</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Helping
                        Creators &
                        Businesses Grow</div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">BingeAt Media
                    </div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Your
                        Full-Suite Media &
                        Marketing Team</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Helping
                        Creators &
                        Businesses Grow</div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">BingeAt
                        Media</div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Your
                        Full-Suite Media &
                        Marketing Team</div>
                </div>
                <div class="comm">
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Helping
                        Creators &
                        Businesses Grow</div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">BingeAt
                        Media</div>
                    <div class="cmn-textslide"><img src="{{ asset('frontend/img/star.png') }}" alt="img">Your
                        Full-Suite Media &
                        Marketing Team</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Section Start -->
    <section id="service" class="service-section fix section-padding">
        <div class="left-shape float-bob-y">
            <img src="{{ asset('frontend/img/service/left-shape.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="gt-section-title style-5 text-center">
                <h6 class="wow fadeInUp tt-capitalize">Our Services</h6>
                <h2 class="char-animation">
                    Grow Your Business with<br>
                    <span class="bingeat">BingeAt</span>
                    <span class="media">Media</span>
                    Digital Solutions
                </h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="service-box-items-5 ">
                        <div class="icon">
                            <img src="{{ asset('frontend/img/service/icon-1.png') }}" alt="img">
                        </div>
                        <div class="content">
                            <h4><a href="javascript:void(0)">Social & Digital Marketing</a></h4>
                            <p>"Boost your online presence with targeted strategies that connect your brand to
                                the right audience."</p>
                            <a href="javascript:void(0)" class="arrow-btn"
                                onclick="openEnquiryModal('Social & Digital Marketing')"><span
                                    style="font-size: 12px; font-weight: 700;">Enquire Now</span><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="service-box-items-5">
                        <div class="icon">
                            <img src="{{ asset('frontend/img/logo/reelshoot.png') }}" style="height:60px;width:60px;"
                                alt="img">
                        </div>
                        <div class="content">
                            <h4><a href="javascript:void(0)">Graphic Design</a></h4>
                            <p>"We design stunning visuals that define your brand identity and leave a lasting,
                                memorable impression across every digital platform."</p>
                            <a href="javascript:void(0)" class="arrow-btn"
                                onclick="openEnquiryModal('Graphic Design')"><span
                                    style="font-size: 12px; font-weight: 700;">Enquire Now</span><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="service-box-items-5 " id="graphic-box">
                        <div class="icon">
                            <img src="{{ asset('frontend/img/logo/graphic-design.png') }}"
                                style="height:60px;width:60px;" alt="img">
                        </div>
                        <div class="content">
                            <h4><a href=" javascript:void(0)">Reel Shooting & Promos</a></h4>
                            <p>"Engaging short-form videos that grab attention, spark conversations, and amplify
                                your reach."</p>
                            <a href="javascript:void(0)" class="arrow-btn"
                                onclick="openEnquiryModal('Reel Shooting & Promos')"><span
                                    style="font-size: 12px; font-weight: 700;">Enquire Now</span><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="service-box-items-5">
                        <div class="icon">
                            <img src="{{ asset('frontend/img/logo//audio and video.png') }}"
                                style="height:60px;width:60px;" alt="img">
                        </div>
                        <div class="content">
                            <h4><a href="javascript:void(0)"> Audio-Video Production</a></h4>
                            <p>"From concept to creation, we produce high-quality audio and video content that
                                tells your story with impact."</p>
                            <a href="javascript:void(0)" class="arrow-btn"
                                onclick="openEnquiryModal('Audio-Video Production')"><span
                                    style="font-size: 12px; font-weight: 700;">Enquire Now</span><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="service-box-items-5">
                        <div class="icon">
                            <img src="{{ asset('frontend/img/logo/podcast.png') }}" style="height:60px;width:60px;"
                                alt="img">
                        </div>
                        <div class="content">
                            <h4><a href="javascript:void(0)"> Podcast Studio</a></h4>
                            <p>"Professional podcast setup and production to help you share your voice, ideas,
                                and brand with the world more effectively and professionally."</p>
                            <a href="javascript:void(0)" class="arrow-btn"
                                onclick="openEnquiryModal('Podcast Studio')"><span
                                    style="font-size: 12px; font-weight: 700;">Enquire Now</span><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="service-box-items-5">
                        <div class="icon">
                            <img src="{{ asset('frontend/img/logo/ads and lead gen.png') }}"
                                style="height:60px;width:60px;" alt="img">
                        </div>
                        <div class="content">
                            <h4><a href="javascript:void(0)">Lead Gen-Ads</a></h4>
                            <p style="color: #686866;">"Smart ad campaigns designed to generate leads, drive
                                conversions, and grow your
                                business even faster today with confidence."</p>
                            <a href="javascript:void(0)" class="arrow-btn"
                                onclick="openEnquiryModal('Lead Gen-Ads')"><span
                                    style="font-size: 12px; font-weight: 700;">Enquire Now</span><i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section Start -->
    <section id="about" class="about-section-5 fix section-padding">
        <div class="left-shape float-bob-y">
            <img src="{{ asset('frontend/img/about/left-shape.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="brand-wrapper-5">
                <h4 class="brand-title">70+ Brands Trust Us</h4>
                <div class="swiper brand-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brand-img center">
                                <img src="{{ asset('frontend/img/brand/Tax-Seal-Logo.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-img center">
                                <img src="{{ asset('frontend/img/brand/prammo-realty1.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-img center">
                                <img src="{{ asset('frontend/img/brand/Book-My-Show (1).png') }}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-img center">
                                <img src="{{ asset('frontend/img/brand/lifeline-hospital-logo.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brand-img center">
                                <img style="border-radius: 24px; width: 200px;"
                                    src="{{ asset('frontend/img/brand/Lifeline-Logo (1).png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-wrapper-5">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="about-image">
                            <img src="{{ asset('frontend/img/about/01.png') }}" alt="img"
                                class="wow img-custom-anim-left" data-wow-duration="1.5s" data-wow-delay="0.3s">
                            <div class="bg-shape">
                                <img src="{{ asset('frontend/img/about/bg-shape.png') }}" alt="img">
                            </div>
                            <div class="grap-shape float-bob-x">
                                <img src="{{ asset('frontend/img/about/grap.png') }}" alt="img">
                            </div>
                            <div class="box-shape float-bob-y">
                                <img src="{{ asset('frontend/img/about/box-shape.png') }}" alt="img">
                            </div>
                            <div class="emoji-shape">
                                <img src="{{ asset('frontend/img/about/emoji.png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="gt-section-title style-5">
                                <div class="sub-title bg-color-2 wow fadeInUp">
                                    <h6 class="wow fadeInUp tt-capitalize ">
                                        About BingeAt Media</span></h6>
                                </div>
                                <h2 class="char-animation">
                                    Our Creative solutions that don't just look good — they work.
                                </h2>
                            </div>
                            <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                                Our Creative solutions that don't just look good — they work.
                                Description - At BingeAt Media, we blend creativity, strategy, and technology to
                                craft impactful media and marketing
                                solutions. From digital campaigns, reels, promos, and podcasts to full-scale
                                video production and branding, we help
                                creators and businesses grow their reach, define their identity, and achieve
                                measurable results. </p>
                            <div class="circle-progress-bar-wrapper">
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".3s">
                                    <div class="circle-bar" data-percent="99" data-duration="2000">
                                    </div>
                                    <div class="content">
                                        <h6>
                                            Digital <br> Marketing
                                        </h6>
                                    </div>
                                </div>
                                <div class="single-circle-bar wow fadeInUp" data-wow-delay=".5s">
                                    <div class="circle-bar" data-percent="95" data-duration="2000">
                                    </div>
                                    <div class="content">
                                        <h6>
                                            Graphic <br> Design
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript:void(0)" class="gt-theme-btn style-5 wow fadeInUp" data-wow-delay=".5s">
                                EXPLORE MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- cards section -->
    <section id="portfolio" class="portfolio-area">
        <div class="container">

            <h1 class="portfolio-heading" data-aos="fade-up" style="font-family: sans-serif">
                Our Creative Work
            </h1>

            <p class="portfolio-subtitle" data-aos="fade-up" data-aos-delay="100">
                A showcase of the brands we've elevated with design & strategy
            </p>

            <div class="portfolio-grid">

                <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('frontend/img/services/commercial ads/WhatsApp Image 2025-12-03 at 12.07.28_502089e6.jpg') }}"
                        alt="project">
                    <div class="portfolio-hover">
                        <h3>Posts</h3>
                    </div>
                </div>



                <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="100">
                    <img src="{{ asset('frontend/img/services/graphics/hoardings/Banner.jpg') }}" alt="project">
                    <div class="portfolio-hover">
                        <h3>Hoardings</h3>
                    </div>
                </div>

                <a href="https://www.instagram.com/reel/DPIkBwEAr-_/?igsh=MWZtNHJ4d3R6czkwYg==" target="_blank">
                    <div class="portfolio-card  reel-card" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ asset('frontend/img/services/reels/Screenshot 2025-11-29 135938.png') }}"
                            alt="project" style="object-fit: cover;">
                        <div class="portfolio-hover">
                            <h3>Reels</h3>
                        </div>
                    </div>
                </a>
                <div class="portfolio-card" data-aos="zoom-in">
                    <img src="{{ asset('frontend/img/services/logo design/Artboard 5-100.jpg') }}" alt="project">
                    <div class="portfolio-hover">

                        <h3>Logo</h3>
                    </div>
                </div>



                <div class="portfolio-card" data-aos="zoom-in">
                    <img src="{{ asset('frontend/img/services/websites/nutmeg-county.webp') }}" alt="project">
                    <div class="portfolio-hover">
                        <h3>Website UI Design</h3>
                    </div>
                </div>



                <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('frontend/img/services/graphics/brochures/company1.webp') }}" alt="project">
                    <div class="portfolio-hover">
                        <h3>Brochure</h3>
                    </div>
                </div>

                <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('frontend/img/services/graphics/cards-letterheads/busssiness-cards.webp') }}"
                        alt="project">
                    <div class="portfolio-hover">
                        <h3>BC & Letterhead</h3>
                    </div>
                </div>

                <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('frontend/img/services/breverages/front.jpg') }}" alt="project">
                    <div class="portfolio-hover">
                        <h3>Packagings</h3>
                    </div>
                </div>

                <a href="https://youtu.be/7GxiDryYxEE?si=Lp0qu_EqQXGBA3iu" target="_blank">
                    <div class="portfolio-card" data-aos="zoom-in" data-aos-delay="200">

                        <img src="{{ asset('frontend/img/services/commercial ads/LUDO KAMAYI.jpg') }}"
                            alt="Commercial Ad">

                        <div class="portfolio-hover">
                            <h3>Commercial Ads</h3>
                        </div>

                    </div>
                </a>


            </div>
            <div class="portfolio-btn-wrapper">
                <a href="{{ url('/portfolio') }}" class="portfolio-btn"
                    style="font-weight: bold; font-family: sans-serif;">View All</a>
            </div>


        </div>
    </section>

    <!-- Audience Section Start -->
    <section class="audience-section fix section-padding bg-cover"
        style="background: linear-gradient(to left, #8400c7, #6f00ff);">
        <div class="container">
            <div class="audience-wrapper">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="audience-content">
                            <div class="gt-section-title style-5">
                                <div class="sub-title bg-color-3 wow fadeInUp">
                                    <h6 class="text-white wow fadeInUp tt-capitalize">Our Success Stories</h6>
                                </div>
                                <h2 class="text-white char-animation">
                                    Brands Grow, Engage, Shine Online With Us
                                </h2>
                            </div>
                            <div class="client-items wow fadeInUp" data-wow-delay=".5s">
                                <div class="client-logo">
                                    <img src="{{ asset('frontend/img/logo.png') }}" alt="img">
                                </div>
                                <div class="client-img">
                                    <img src="{{ asset('frontend/img/client.png') }}" alt="img">
                                    <div class="star-icon">
                                        <div class="star">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                        <span>450+ reviews</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="audience-right">
                            <div class="audience-img wow fadeInUp" data-wow-delay=".3s">
                                <img src="{{ asset('frontend/img/audience-img.jpg') }}" alt="img">
                            </div>
                            <div class="counter-box-area">
                                <div class="row gx-2"> <!-- gx-2 = horizontal gap kam karta hai -->
                                    <!-- Counter 1 -->
                                    <div class="col-md-6 mb-4">
                                        <div class="counter-box wow fadeInUp" data-wow-delay=".5s">
                                            <h2><span class="gt-count">350</span>+</h2>
                                            <p>Projects Completed</p>
                                        </div>
                                    </div>

                                    <!-- Counter 2 -->
                                    <div class="col-md-6 mb-4">
                                        <div class="counter-box wow fadeInUp" data-wow-delay=".6s">
                                            <h2><span class="gt-count">100</span>%</h2>
                                            <p>Focused on Industries</p>
                                        </div>
                                    </div>

                                    <!-- Counter 3 -->
                                    <div class="col-md-6 mb-4">
                                        <div class="counter-box wow fadeInUp" data-wow-delay=".7s">
                                            <h2><span class="gt-count">05</span>+</h2>
                                            <p>Years of Industry Experience</p>
                                        </div>
                                    </div>

                                    <!-- Counter 4 -->
                                    <div class="col-md-6 mb-4">
                                        <div class="counter-box wow fadeInUp" data-wow-delay=".8s">
                                            <h2><span class="gt-count">150</span>+</h2>
                                            <p>Client Base</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section Start -->
    <section class="testimonial-section-5 fix section-padding">
        <div class="container">
            <div class="testimonial-wrapper-5">
                <div class="gt-section-title-area">
                    <div class="gt-section-title style-5">
                        <div class="sub-title wow fadeInUp">
                            <h6 class="tt-capitalize">Testimonials</h6>
                        </div>
                        <h2 class="char-animation">
                            What our awesome <br> customers say
                        </h2>
                    </div>
                    <p>
                        BingeAt Media
                        delivers creative digital solutions that help your brand grow, engage, and shine online.
                    </p>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-4">
                        <div class="testimonial-left-5 wow fadeInUp" data-wow-delay=".3s">
                            <div class="client-img">
                                <div class="content">

                                </div>
                            </div>
                            <div class="array-button style-5 wow fadeInUp" data-wow-delay=".5s">
                                <button class="array-prev"><i class="fa-regular fa-arrow-left-long"></i></button>
                                <button class="array-next"><i class="fa-regular fa-arrow-right-long"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-8">
                        <div class="swiper testimonial-slider-5">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-box-items-5">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/img/testimonial/icon.png') }}" alt="img">
                                        </div>
                                        <div class="testimonial-img">
                                            <img src="{{ asset('frontend/img/testimonial/user.png') }}" alt="img">
                                            <div class="shape-img">
                                                <img src="{{ asset('frontend/img/testimonial/shape.png') }}"
                                                    alt="img">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="client-info">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <h5>Parth Rajput</h5>
                                                <span>Founder at Accelerate Realty</span>
                                            </div>
                                            <p>

                                                "One of the best experiences I have had working with this
                                                company. They have a professional approach, their services are
                                                mind blowing, and the team is very supportive."
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-box-items-5">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/img/testimonial/icon.png') }}" alt="img">
                                        </div>
                                        <div class="testimonial-img">
                                            <img src="{{ asset('frontend/img/testimonial/user.png') }}" alt="img">
                                            <div class="shape-img">
                                                <img src="{{ asset('frontend/img/testimonial/shape.png') }}"
                                                    alt="img">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="client-info">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <h5>Nisheeth Srivastava</h5>
                                                <span>(Founder At SORJM Agency)</span>
                                            </div>
                                            <p>
                                                I have taken various digital marketing related services from
                                                like graphic and logo designing etc..
                                                They try to give you full satisfaction in their work. Addition
                                                to this their guidance is also.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-box-items-5">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/img/testimonial/icon.png') }}" alt="img">
                                        </div>
                                        <div class="testimonial-img">
                                            <img src="{{ asset('frontend/img/testimonial/user.png') }}" alt="img">
                                            <div class="shape-img">
                                                <img src="{{ asset('frontend/img/testimonial/shape.png') }}"
                                                    alt="img">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="client-info">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <h5>Sabir Shaikh</h5>
                                                <span>(Founder At The Mental talkies)</span>
                                            </div>
                                            <p>

                                                "Outstanding service! They boosted our visibility and engagement
                                                with smart strategies. Professional team, quick
                                                communication, and real results. Highly recommended!"

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-box-items-5">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/img/testimonial/icon.png') }}" alt="img">
                                        </div>
                                        <div class="testimonial-img">
                                            <img src="{{ asset('frontend/img/testimonial/user.png') }}" alt="img">
                                            <div class="shape-img">
                                                <img src="{{ asset('frontend/img/testimonial/shape.png') }}"
                                                    alt="img">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="client-info">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <h5>Sejal Bhobate</h5>
                                                <span>(Digatal Marketer)</span>
                                            </div>
                                            <p>

                                                "Team is very friendly and responsive, making them a valuable
                                                partner for any brand looking to elevate its digital
                                                marketing game. Looking forward to working again with the team

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-box-items-5">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/img/testimonial/icon.png') }}" alt="img">
                                        </div>
                                        <div class="testimonial-img">
                                            <img src="{{ asset('frontend/img/testimonial/user.png') }}" alt="img">
                                            <div class="shape-img">
                                                <img src="{{ asset('frontend/img/testimonial/shape.png') }}"
                                                    alt="img">
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="client-info">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <h5>Sakir Vanchesha</h5>
                                                <span>(TAX SEAL)</span>
                                            </div>
                                            <p>

                                                "We are extremely satisfied with the work and support we
                                                received. The end result exceeded our expectations and was
                                                delivered with great professionalism. Highly recommended!"

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section Start -->
    <section class="contact-section-5 fix section-padding " id="contact">
        <div class="container">
            <div class="gt-section-title-area">
                <div class="gt-section-title style-5">
                    <div class="sub-title text-white wow fadeInUp">
                        <h6 class="tt-capitalize text-white wow fadeInUp">Contact us</h6>
                    </div>
                    <h2 class="text-white char-animation">
                        Gave us your marketing monkey
                    </h2>
                </div>
                <p class="text-white wow fadeInUp" data-wow-delay=".5s">
                    "Have a question or project in mind? Our team is ready <br> to help your brand shine
                    digitally." </p>
            </div>
            <div class="contact-wrapper-5">
                <div class="row g-4">
                    <div class="col-xl-6">
                        <div class="contact-form-area">
                            <h3>Get in Touch</h3>

                            <!-- Success/Error Message Display -->
                            <div id="form-message" class="alert"
                                style="display: none; margin-bottom: 20px; padding: 15px; border-radius: 8px;">
                                <span id="message-text"></span>
                            </div>

                            <form id="contact-form" action="{{ route('frontend.contact.submit') }}" method="POST">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <input type="text" name="name" id="name" placeholder="Full Name"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <input type="tel" name="phone" id="phone"
                                                placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-clt">
                                            <input type="email" name="email" id="email"
                                                placeholder="Email Address" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-clt">
                                            <textarea name="message" id="message" placeholder="Messages" required></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="form_type" value="home_contact">
                                    <div class="col-12">
                                        <div class="form-check">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="theme-btn">
                                            Submit Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3753.9064146999917!2d72.7571502!3d19.8015649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be71f41c6206d39%3A0xfa1936032142c93d!2sArise%20Consultancy%20Services%20-%20Best%20Website%20%26%20App%20Development%20Company!5e0!3m2!1sen!2sin!4v1758617905325!5m2!1sen!2sin"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>



                            <div class="contact-info-wrapper">
                                <h2>Contact Info</h2>
                                <div class="shape-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="39"
                                        viewBox="0 0 29 39" fill="none">
                                        <path d="M0 0L29 39V0H0Z" fill="#6A47ED" />
                                    </svg>
                                </div>
                                <div class="shape-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="39"
                                        viewBox="0 0 29 39" fill="none">
                                        <path d="M29 0L0 39V0H29Z" fill="#6A47ED" />
                                    </svg>
                                </div>
                                <div class="contact-info style2">
                                    <div class="icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="content">
                                        <h3>
                                            Address: Flat No.102, White House Building, <br>
                                            Above AU Bank, Khodaram Baug, Boisar – 401501
                                        </h3>
                                    </div>
                                </div>
                                <div class="contact-info style2">
                                    <div class="icon">
                                        <i class="fa-regular fa-phone"></i>
                                    </div>
                                    <div class="content">
                                        <h3>
                                            <a href="tel:+91 721 933 5227">+91 721 933 5227</a> |
                                            <a href="tel:+91 80878 35227">+91 80878 35227</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="contact-info style2 border-none">
                                    <div class="icon">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                    <div class="content">
                                        <h3>
                                            <a href="mailto::hello@bingeatmedia.com">hello@bingeatmedia.com</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
