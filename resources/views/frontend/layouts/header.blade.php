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
                        <a href="{{ url('/') }}"><img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}"
                                alt="logo-img"></a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <p class="text d-none d-xl-block">
                    Nullam dignissim, ante scelerisque the is euismod fermentum odio sem semper the is erat, a feugiat
                    leo urna eget eros. Duis Aenean a imperdiet risus.
                </p>
                <div class="mobile-menu style-2 fix mb-3"></div>
                <div class="offcanvas__contact pt-5">
                    <a href="{{ route('frontend.contact') }}" class="gt-theme-btn gt-theme-btn style-4">
                        contact us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>

<!-- Header Section Start -->
<header id="header-sticky" class="header-5">
    <div class="container">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="logo">
                    <a href="{{ url('/') }}" class="header-logo">
                        <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" alt="logo-img">
                    </a>
                    <a href="{{ url('/') }}" class="white-logo">
                        <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" alt="logo-img">
                    </a>
                </div>
                <div class="mean__menu-wrapper">
                    <div class="main-menu">
                        <nav id="mobile-menu">
                            <ul>
                                <li>
                                    <a href="{{ url('/') }}">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/portfolio') }}">Portfolio</a>
                                </li>
                                <li>
                                    <a href="#about">about us</a>
                                </li>
                                <li>
                                    <a href="#service">
                                        services
                                    </a>
                                    <!-- <ul class="submenu">
             <li><a href="service.html">Our service</a></li>
             <li><a href="service-details.html">service Details</a></li>
            </ul> -->
                                </li>

                                <!-- <li> pricing comment out
            <a href="#pricing">Pricing</a>
           </li>
           <li class="has-dropdown">
            <ul class="submenu">
             <li class="has-dropdown">
              <a href="team-details.html">
               Our Team
               <i class="fas fa-angle-right"></i>
              </a>
              <ul class="submenu">
               <li><a href="team.html">Our Team</a></li>
               <li><a href="team-details.html">Team Details</a></li>
              </ul>
             </li>
             <li class="has-dropdown">
              <a href="project-details.html">
              Case studies
               <i class="fas fa-angle-right"></i>
              </a>
              <ul class="submenu">
               <li><a href="project.html">Case studies</a></li>
               <li><a href="project-details.html">Case studies Details</a></li>
              </ul>
             </li>
             <li><a href="pricing.html">Pricing Plan</a></li>
             <li><a href="faq.html">Our Faq</a></li>
             <li><a href="sign-in.html">sign in</a></li>
             <li><a href="register.html">Register</a></li>
             <li><a href="404.html">404 Page</a></li>
            </ul>
           </li> -->

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <div class="header-button">
                        <a href="{{ route('frontend.contact') }}" class="gt-theme-btn style-4">Contact us</a>
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
