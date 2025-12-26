<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="BingeAt Media">
    <meta name="description"
        content="{{ $pageMeta->meta_description ?? 'Explore our creative portfolio - Digital marketing campaigns, branding, content creation and more by BingeAt Media' }}">
    <title>{{ $pageMeta->meta_title ?? 'Portfolio | BingeAt Media - Creative Digital Marketing Agency' }}</title>

    <link rel="shortcut icon" href="{{ asset('frontend/img/FAB-ICON.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
</head>

<body id="portfolio-page">

    <!-- GT Back To Top Start -->
    <button id="gt-back-top" class="gt-back-to-top color-5">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Offcanvas Area Start -->
    <div class="fix-area">
        <div class="offcanvas__info style-5">
            <div class="offcanvas__wrapper" style="background: linear-gradient(to left, #8400c7, #6f00ff);">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="{{ route('frontend.home') }}">
                                <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" alt="logo-img">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <p class="text d-none d-xl-block">
                        Nullam dignissim, ante scelerisque the is euismod fermentum odio sem semper the is erat, a
                        feugiat leo urna eget eros. Duis Aenean a imperdiet risus.
                    </p>
                    <div class="mobile-menu style-2 fix mb-3"></div>
                    <div class="offcanvas__contact pt-5">
                        <a href="{{ route('frontend.contact') }}" class="gt-theme-btn">
                            contact us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>

    <!-- Header Section Start -->
    <header id="header-sticky" class="header-5" style="background: linear-gradient(to left, #8400c7, #6f00ff);">
        <div class="container">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="logo">
                        <a href="{{ route('frontend.home') }}" class="header-logo">
                            <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" alt="logo-img">
                        </a>
                        <a href="{{ route('frontend.home') }}" class="white-logo">
                            <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" alt="logo-img">
                        </a>
                    </div>
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li>
                                        <a href="{{ route('frontend.home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.portfolio') }}">Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.home') }}#about">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('frontend.home') }}#service">Our Services</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <div class="header-button">
                            <a href="{{ route('frontend.contact') }}"
                                class="gt-theme-btn gt-theme-btn style-3 bg-theme">Contact Us</a>
                        </div>
                        <div class="header__hamburger d-xl-none my-auto">
                            <div class="sidebar__toggle">
                                <div class="header-bar">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Section -->
    <main id="portfolio" class="portfolio-section" role="main" style="color: black;">
        <div class="container">

            <!-- Section Header -->
            <div class="section-header">
                <h2 class="section-title">Our Portfolio</h2>
                <p class="section-description">Select a category to explore our work</p>
            </div>

            <!-- CATEGORY FILTERS -->
            <div class="filters" role="group" aria-label="Portfolio categories">
                <button class="filter-chip active" data-filter="posts">Posts</button>
                <button class="filter-chip" data-filter="reels">Reels</button>
                <button class="filter-chip" data-filter="commercial">Commercial Ads</button>
                <button class="filter-chip" data-filter="logos">Logos</button>
                <button class="filter-chip" data-filter="stationery">BC & Letterhead</button>
                <button class="filter-chip" data-filter="menus">Menus</button>
                <button class="filter-chip" data-filter="brochures">Brochures</button>
                <button class="filter-chip" data-filter="packaging">Packagings</button>
                <button class="filter-chip" data-filter="hoardings">Hoardings</button>
                <button class="filter-chip" data-filter="websites">Websites</button>
            </div>

            <!-- GALLERY -->
            <div class="gallery" data-tab="portfolio">

                <!-- 1. POSTS -->
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/education02.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Take Of Academy</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/education04.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Yenypoya</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/commercial ads/WhatsApp Image 2025-12-03 at 12.07.28_502089e6.jpg') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>The Green Sapphire</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/commercial ads/WhatsApp Image 2025-12-03 at 12.07.28_f9facf6d.jpg') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>The Green Sapphire</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/commercial ads/WhatsApp Image 2025-12-03 at 12.10.45_478bddc9.jpg') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>ScapeX</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-16.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Swiftly Techcrop</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-13.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Swiftly Techcrop</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-17.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Swiftly Techcrop</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-31.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>KIARAH TERRAZO</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-33.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>WellWisher Group</h4>
                        <p>Real Estate Ad</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/realestate-cultrealty.webp') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>City grace</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-49.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>BouleVard</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-45.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>BouleVard</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-42.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Rs Academy</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-47.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>BouleVard</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-40.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Saloon</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-02-10.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Travel Promotion</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/breverages/post-02-02.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Heaven's Elix</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/breverages/post-02-04.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Heaven's Elix</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/breverages/post-02-06.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Milky Ocean's</h4>
                        <p>Post</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="posts">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/social_media/post/post-02-19.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Hness</h4>
                        <p>Post</p>
                    </div>
                </div>

                <!-- 2. REELS -->
                <div class="gallery-card" data-category="reels" style="height: 500px;width: 350px;">
                    <div class="card-image">
                        <blockquote class="instagram-media"
                            data-instgrm-permalink="https://www.instagram.com/reel/DPIkBwEAr-_/?igsh=ZmJ5anB1b2R0Z25m"
                            data-instgrm-version="14"
                            style="background:#fff; border:0; margin:0; padding:0; width:100%; max-width:100%; border-radius:10px;">
                        </blockquote>
                    </div>
                    <div class="card-overlay">
                        <h4>AC Paavbhaji</h4>
                        <p>Reels</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="reels" style="height: 500px;width: 350px;">
                    <div class="card-image">
                        <blockquote class="instagram-media"
                            data-instgrm-permalink="https://www.instagram.com/reel/DRWE0QKgldU/"
                            data-instgrm-version="14"
                            style="background:#fff; border:0; margin:0 auto; max-width:100%; width:100%;">
                        </blockquote>
                    </div>
                    <div class="card-overlay">
                        <h4>Zorko</h4>
                        <p>Reels</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="reels" style="height: 500px;width: 350px;">
                    <div class="card-image">
                        <blockquote class="instagram-media"
                            data-instgrm-permalink="https://www.instagram.com/reel/DRO0ixgje7j/"
                            data-instgrm-version="14"
                            style="background:#fff; border:0; margin:0 auto; width:100%; max-width:100%;">
                        </blockquote>
                    </div>
                    <div class="card-overlay">
                        <h4>Anime</h4>
                        <p>Reels</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="reels" style="height: 500px;width: 350px;">
                    <div class="card-image">
                        <blockquote class="instagram-media"
                            data-instgrm-permalink="https://www.instagram.com/reel/DRGskTugoqJ/"
                            data-instgrm-version="14"
                            style="background:#fff; border:0; margin:0 auto; width:100%; max-width:100%;">
                        </blockquote>
                    </div>
                    <div class="card-overlay">
                        <h4>The Purple Vanity</h4>
                        <p>Reels</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="reels" style="height: 500px;width: 350px;">
                    <div class="card-image">
                        <blockquote class="instagram-media"
                            data-instgrm-permalink="https://www.instagram.com/reel/DPeJ6YWjWcY/"
                            data-instgrm-version="14"
                            style="background:#fff; border:0; margin:0 auto; width:100%; max-width:100%;">
                        </blockquote>
                    </div>
                    <div class="card-overlay">
                        <h4>Yuvika TVS Motors</h4>
                        <p>Reels</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="reels" style="height: 500px;width: 350px;">
                    <div class="card-image">
                        <blockquote class="instagram-media"
                            data-instgrm-permalink="https://www.instagram.com/reel/DPl5I20glBC/"
                            data-instgrm-version="14"
                            style="background:#fff; border:0; margin:0 auto; width:100%; max-width:100%;">
                        </blockquote>
                    </div>
                    <div class="card-overlay">
                        <h4>Rikala</h4>
                        <p>Reels</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="reels" style="height: 500px;width: 350px;">
                    <div class="card-image">
                        <blockquote class="instagram-media"
                            data-instgrm-permalink="https://www.instagram.com/reel/DRMJpJojZRu/"
                            data-instgrm-version="14"
                            style="background:#fff; border:0; margin:0 auto; width:100%; max-width:100%;">
                        </blockquote>
                    </div>
                    <div class="card-overlay">
                        <h4>Waffel Castel</h4>
                        <p>Reels</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="reels" style="height: 500px;width: 350px;">
                    <div class="card-image">
                        <blockquote class="instagram-media"
                            data-instgrm-permalink="https://www.instagram.com/reel/DQuBUUuDZUv/"
                            data-instgrm-version="14"
                            style="background:#fff; border:0; margin:0 auto; width:100%; max-width:100%;">
                        </blockquote>
                    </div>
                    <div class="card-overlay">
                        <h4>ShreeGurukrupaJewellers</h4>
                        <p>Reels</p>
                    </div>
                </div>

                <!-- 3. LOGOS -->
                <div class="gallery-card" data-category="logos">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/logo design/Artboard 1-100.jpg') }}"></div>
                    <div class="card-overlay">
                        <h4>Prammo Gardens</h4>
                        <p>Logo</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="logos">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/logo design/bash-up.webp') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>BASH UP</h4>
                        <p>Logo</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="logos">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/logo design/Artboard 2-100.jpg') }}"></div>
                    <div class="card-overlay">
                        <h4>Prammo Realty</h4>
                        <p>Logo</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="logos">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/logo design/Artboard 3-100.jpg') }}"></div>
                    <div class="card-overlay">
                        <h4>Rang Marathi</h4>
                        <p>Logo</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="logos">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/logo design/fasingo.png') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>Fasingo</h4>
                        <p>Logo</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="logos">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/logo design/Artboard 4-100.jpg') }}"></div>
                    <div class="card-overlay">
                        <h4>HealthCare Mediquip</h4>
                        <p>Logo</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="logos">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/logo design/Artboard 5-100.jpg') }}"></div>
                    <div class="card-overlay">
                        <h4>Medcom</h4>
                        <p>Logo</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="logos">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/logo design/apna amiritsarai.png') }}"></div>
                    <div class="card-overlay">
                        <h4>APNA AMIRITSARI</h4>
                        <p>Logo</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="logos">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/logo design/Artboard 6-100.jpg') }}"></div>
                    <div class="card-overlay">
                        <h4>Team Abhijeet</h4>
                        <p>Logo</p>
                    </div>
                </div>

                <!-- 4. STATIONERY -->
                <div class="gallery-card" data-category="stationery">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/cards-letterheads/letterhead-01.webp') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>KRAFX</h4>
                        <p>BC & Letterhead</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="stationery">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/cards-letterheads/busssiness-cards.webp') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>Garments Glamor</h4>
                        <p>BC & Letterhead</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="stationery">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/cards-letterheads/letterhead-02.webp') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>APNA AMIRITSARI</h4>
                        <p>BC & Letterhead</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="stationery">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/cards-letterheads/letterhead-03.webp') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>Garments Glamor</h4>
                        <p>BC & Letterhead</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="stationery">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/cards-letterheads/letterhead-06.webp') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>SHANVI</h4>
                        <p>BC & Letterhead</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="stationery">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/cards-letterheads/corporate-letterhead.webp') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>Corporate Letterhead</h4>
                        <p>BC & Letterhead</p>
                    </div>
                </div>

                <!-- 5. MENUS -->
                <div class="gallery-card" data-category="menus">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/menu-cards/menu-cards-01.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Dibba</h4>
                        <p>Menu</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="menus">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/menu-cards/menu-cards-02.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Chaupaal</h4>
                        <p>Menu</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="menus">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/menu-cards/menu-cards-03.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Chaupaal</h4>
                        <p>Menu</p>
                    </div>
                </div>

                <!-- 6. BROCHURES -->
                <div class="gallery-card" data-category="brochures">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/brochures/company.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Vaani</h4>
                        <p>Brochure</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="brochures">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/brochures/company1.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Heaven's Elix</h4>
                        <p>Brochure</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="brochures">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/brochures/real-estate.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>The Green Sapphire</h4>
                        <p>Brochure</p>
                    </div>
                </div>

                <!-- 7. PACKAGING -->
                <div class="gallery-card" data-category="packaging">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/breverages/front.jpg') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>Netri</h4>
                        <p>Packaging</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="packaging">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/breverages/back.jpg') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>Netri</h4>
                        <p>Packaging</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="packaging">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/breverages/front2.jpg') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>Netri</h4>
                        <p>Packaging</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="packaging">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/breverages/back2.jpg') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>Netri</h4>
                        <p>Packaging</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="packaging">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/breverages/front3.jpg') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>Netri</h4>
                        <p>Packaging</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="packaging">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/breverages/back3.jpg') }}">
                    </div>
                    <div class="card-overlay">
                        <h4>Netri</h4>
                        <p>Packaging</p>
                    </div>
                </div>

                <!-- 8. HOARDINGS -->
                <div class="gallery-card" data-category="hoardings">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/hoardings/ashapura-dev.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Ashapura Dev</h4>
                        <p>Hoarding</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="hoardings">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/hoardings/family-bazarr.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Family Bazaar</h4>
                        <p>Hoarding</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="hoardings">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/hoardings/hoarding-02.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Holi</h4>
                        <p>Hoarding</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="hoardings">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/hoardings/hoarding-05.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Weedeo</h4>
                        <p>Hoarding</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="hoardings">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/hoardings/yosh-hoarding.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>Yosh</h4>
                        <p>Hoarding</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="hoardings">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/graphics/hoardings/tgs-hoarding.webp') }}"></div>
                    <div class="card-overlay">
                        <h4>The Green Sapphire</h4>
                        <p>Hoarding</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="hoardings">
                    <div class="card-image" style="background: #000;"><img
                            src="{{ asset('frontend/img/services/graphics/hoardings/WhatsApp Image 2025-12-23 at 1.07.06 PM.jpeg') }}"
                            style="object-fit: contain; background: transparent;"></div>
                    <div class="card-overlay">
                        <h4>Bunny Bao</h4>
                        <p>Hoarding</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="hoardings">
                    <div class="card-image" style="background: #000;"><img
                            src="{{ asset('frontend/img/services/graphics/hoardings/WhatsApp Image 2025-12-23 at 1.07.06 PM (1).jpeg') }}"
                            style="object-fit: contain; background: transparent;"></div>
                    <div class="card-overlay">
                        <h4>Bingo Nation</h4>
                        <p>Hoarding</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="hoardings">
                    <div class="card-image" style="background: #000;"><img
                            src="{{ asset('frontend/img/services/graphics/hoardings/WhatsApp Image 2025-12-23 at 1.07.06 PM (2).jpeg') }}"
                            style="object-fit: contain; background: transparent;"></div>
                    <div class="card-overlay">
                        <h4>Bunny Bao</h4>
                        <p>Hoarding</p>
                    </div>
                </div>

                <!-- 9. WEBSITES -->
                <div class="gallery-card" data-category="websites" style="width: 100%;height:260px;">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/websites/avalon.webp') }}"
                            style="object-fit: fill;"></div>
                    <div class="card-overlay">
                        <h4>Avalon</h4>
                        <p>Web Design</p>
                    </div>
                </div>
                <div class="gallery-card gallery websites-active" data-category="websites"
                    style="width: 100%;height:260px;">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/websites/05.webp') }}"
                            style="object-fit: fill;"></div>
                    <div class="card-overlay">
                        <h4>BS photography</h4>
                        <p>Web Design</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="websites" style="width: 100%;height:260px;">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/websites/16.webp') }}"
                            style="object-fit: fill;"></div>
                    <div class="card-overlay">
                        <h4>YOSH Infratech</h4>
                        <p>Web Design</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="websites" style="width: 100%;height:260px;">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/websites/nutmeg-county.webp') }}"
                            style="object-fit: fill;"></div>
                    <div class="card-overlay">
                        <h4>Nutmeg County</h4>
                        <p>Web Design</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="websites" style="width: 100%;height:260px;">
                    <div class="card-image"><img
                            src="{{ asset('frontend/img/services/websites/prymacaretourismo.webp') }}"
                            style="object-fit: fill;"></div>
                    <div class="card-overlay">
                        <h4>Pryma Care Tourism</h4>
                        <p>Web Design</p>
                    </div>
                </div>
                <div class="gallery-card" data-category="websites" style="width: 100%;height:260px;">
                    <div class="card-image"><img src="{{ asset('frontend/img/services/websites/alyasmeenkw.webp') }}"
                            style="object-fit: fill;"></div>
                    <div class="card-overlay">
                        <h4>Agacas</h4>
                        <p>Web Design</p>
                    </div>
                </div>

                <!-- Commercial Ads -->
                <a href="https://youtu.be/7GxiDryYxEE?si=Lp0qu_EqQXGBA3iu" target="_blank">
                    <div class="gallery-card youtube-thumb" data-category="commercial">
                        <div class="card-image">
                            <img src="{{ asset('frontend/img/services/commercial ads/LUDO KAMAYI.jpg') }}"
                                alt="Commercial Ad">
                        </div>
                        <div class="card-overlay">
                            <h4>Ludo Kamayi – Commercial Ad</h4>
                            <p>YouTube Ad Production</p>
                        </div>
                    </div>
                </a>
                <a href="https://youtu.be/i7LPAgEvrQw?si=uQ3j02qYagjwU837" target="_blank">
                    <div class="gallery-card youtube-thumb" data-category="commercial">
                        <div class="card-image">
                            <img src="https://img.youtube.com/vi/i7LPAgEvrQw/maxresdefault.jpg" alt="Spoken Words Ad">
                        </div>
                        <div class="card-overlay">
                            <h4>Spoken Words Boulevard – Teaser Ad</h4>
                            <p>YouTube Ad Production</p>
                        </div>
                    </div>
                </a>

            </div>

            <div style="display: none; text-align: center; margin-top: 40px; width: 100%;" data-category="websites"
                class="portfolio-btn-wrapper-websites">
                <a href="https://acsinsights.com/website-apps" class="portfolio-btn"
                    style="font-weight: bold; font-family: sans-serif;">View All</a>
            </div>

        </div>
    </main>

    <!-- Image Lightbox Modal -->
    <div id="lightbox" class="lightbox" role="dialog" aria-hidden="true">
        <button class="lightbox-close" aria-label="Close lightbox" data-dismiss="modal">✕</button>
        <div class="lightbox-content">
            <img id="lightbox-image" src="/placeholder.svg" alt="Enlarged portfolio image">
            <div class="lightbox-caption">
                <h3 id="lightbox-title"></h3>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="cta-section">
        <div class="cta-box">
            <h2>Ready to Work Together?</h2>
            <p>Let's create something amazing for your brand. Get in touch with us today.</p>
            <a href="{{ route('frontend.home') }}#contact" class="cta-btn">Contact Us</a>
        </div>
    </section>

    <!-- Footer Section Start -->
    <section class="footer-section-5 footer-bg fix">
        <div class="container">
            <div class="footer-widgets-wrapper-5">
                <div class="row text-center text-md-start">
                    <div class="col-md-5 wow fadeInUp mb-4 mb-md-0" data-wow-delay=".2s">
                        <div class="pe-lg-5 single-footer-widget">
                            <div class="widget-head">
                                <a href="{{ route('frontend.home') }}">
                                    <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" alt="img"
                                        style="height: 80px;width: 150px;">
                                </a>
                            </div>
                            <div class="footer-content">
                                <p>BingeAt Media delivers creative digital solutions that help your brand grow, engage,
                                    and shine online.</p>
                                <div
                                    class="social-icon d-flex justify-content-center justify-content-md-start align-items-center">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 wow fadeInUp mb-4 mb-md-0" data-wow-delay=".4s">
                        <div class="single-footer-widget">
                            <div class="widget-head">
                                <h3>Quick Links</h3>
                            </div>
                            <ul class="list-area">
                                <li><a href="{{ route('frontend.home') }}"><i class="fa-solid fa-chevrons-right"></i>
                                        Home</a></li>
                                <li><a href="{{ route('frontend.home') }}#about"><i
                                            class="fa-solid fa-chevrons-right"></i> About Us</a></li>
                                <li><a href="{{ route('frontend.home') }}#service"><i
                                            class="fa-solid fa-chevrons-right"></i> Services</a></li>
                                <li><a href="{{ route('frontend.contact') }}"><i
                                            class="fa-solid fa-chevrons-right"></i> Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

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
                                        <a href="tel:+918087835227">+91 80878 35227</a> |
                                        <a href="tel:+917219335227">+91 721 933 5227</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom-5">
            <div class="container">
                <div
                    class="footer-wrapper d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-start">
                    <p class="wow fadeInLeft color-2 mb-2 mb-md-0" data-wow-delay=".3s">
                        © All Copyright 2025 by BingeAt Media
                    </p>
                    <ul class="footer-menu wow fadeInRight d-flex flex-column flex-md-row gap-2 gap-md-4"
                        data-wow-delay=".5s">
                        <li><a href="./terms.html">Terms & Condition</a></li>
                        <li><a href="./privacy.html">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/918484935227?text=Hi,%20I%20am%20interested%20in%20your%20services" class="whatsapp-button"
        target="_blank" title="Chat with us on WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('frontend/js/parallaxie.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.2/vanilla-tilt.min.js"></script>

    <script>
        // Portfolio filter functionality
        const filterChips = document.querySelectorAll(".filter-chip");
        const cards = document.querySelectorAll(".gallery-card");
        const viewAllButton = document.querySelector(".portfolio-btn-wrapper-websites");

        // DEFAULT: Show only POSTS on page load
        window.addEventListener("DOMContentLoaded", () => {
            showCategory("posts");
        });

        // Filter click listener
        filterChips.forEach((chip) => {
            chip.addEventListener("click", () => {
                const category = chip.getAttribute("data-filter");

                // remove active from all
                filterChips.forEach(c => c.classList.remove("active"));
                chip.classList.add("active");

                // show filtered items
                showCategory(category);
            });
        });

        // function to show selected category
        function showCategory(cat) {
            cards.forEach(card => {
                if (card.getAttribute("data-category") === cat) {
                    card.classList.remove("hidden");
                } else {
                    card.classList.add("hidden");
                }
            });

            // Show/hide button based on category
            if (cat === "websites" && viewAllButton) {
                viewAllButton.style.display = "block";
            } else if (viewAllButton) {
                viewAllButton.style.display = "none";
            }
        }
    </script>

    <!-- Instagram embed script -->
    <script async defer src="https://www.instagram.com/embed.js"></script>

    <!-- WhatsApp button animation -->
    <script>
        window.addEventListener('scroll', function() {
            const whatsappBtn = document.querySelector('.whatsapp-button');
            if (window.scrollY > 300) {
                whatsappBtn.classList.add('show');
            } else {
                whatsappBtn.classList.remove('show');
            }
        });
    </script>
</body>

</html>
