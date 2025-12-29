@extends('frontend.layouts.app')

@section('title', $pageMeta->meta_title ?? 'Our Blogs - BingeAt Media')
@section('meta_description',
    $pageMeta->meta_description ??
    'Read expert insights on digital marketing, content
    creation, and branding from BingeAt Media.')

    @push('styles')
        <style>
            * {
                font-family: "Plus Jakarta Sans", sans-serif;
            }

            .blog-breadcrumb {
                background: linear-gradient(135deg, #8400c7 0%, #6f00ff 100%);
                padding: 125px 0 100px;
                position: relative;
                overflow: hidden;
            }

            .blog-breadcrumb::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(to left, #8400c7, #6f00ff);
                background-size: cover;
                background-position: bottom;
            }

            /* Mobile Search Bar Fixes */
            @media (max-width: 768px) {
                .blog-breadcrumb {
                    padding: 100px 0 80px;
                }

                .blog-breadcrumb h1 {
                    font-size: 2rem !important;
                }

                .search-container {
                    position: relative !important;
                }

                .search-icon-wrapper {
                    display: none !important;
                }

                .search-input {
                    padding: 0.75rem 1rem !important;
                    font-size: 0.875rem !important;
                }

                .search-input::placeholder {
                    font-size: 0.875rem;
                }

                .search-buttons-container {
                    position: static !important;
                    transform: none !important;
                    margin-top: 0.75rem !important;
                    flex-direction: row !important;
                    justify-content: center !important;
                    gap: 0.5rem !important;
                    width: 100% !important;
                }

                .search-btn {
                    padding: 0.625rem 1.25rem !important;
                    font-size: 0.813rem !important;
                    flex: 1 !important;
                }

                .clear-btn {
                    padding: 0.625rem 1rem !important;
                    font-size: 0.813rem !important;
                    flex: 1 !important;
                }
            }

            @media (max-width: 480px) {
                .blog-breadcrumb h1 {
                    font-size: 1.75rem !important;
                }

                .search-input {
                    padding: 0.688rem 0.875rem !important;
                    font-size: 0.813rem !important;
                }

                .search-btn {
                    padding: 0.563rem 1rem !important;
                    font-size: 0.75rem !important;
                }

                .clear-btn {
                    padding: 0.563rem 0.875rem !important;
                    font-size: 0.75rem !important;
                }
            }
        </style>
    @endpush

@section('content')
    <!-- Breadcrumb Section -->
    <div class="blog-breadcrumb">
        <div class="container mx-auto px-4">
            <div class="text-center position-relative">
                <h1 class="text-white mb-4"
                    style="font-size: 3.5rem;font-family:sans-serif; font-weight: 500; letter-spacing: -0.02em;">Our Blogs
                </h1>
                <p class="text-white text-lg mb-6 max-w-2xl mx-auto" style="opacity: 0.9;">Discover insights, tips, and
                    stories about digital marketing, branding, and creative solutions</p>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}" class="text-white"
                                style="transition: color 0.3s;">Home</a></li>
                        <li class="breadcrumb-item active" style="color: #ffca06;" aria-current="page">Blogs</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Blog Grid Section -->
    <div class="py-20" style="background: linear-gradient(to bottom, #f8f9ff 0%, #ffffff 100%);">
        <div class="container mx-auto px-4" style="max-width: 1280px;">
            <!-- Search Form -->

            <div class="mb-16" style="margin-bottom: 4rem;padding-top:2rem;">
                <form method="GET" action="{{ route('frontend.blog') }}"
                    style="max-width: 48rem; margin: 0 auto; padding: 0 1rem;">
                    <div class="search-container" style="position: relative;">
                        <div class="search-icon-wrapper"
                            style="position: absolute; top: 50%; left: 1.5rem; transform: translateY(-50%); pointer-events: none; z-index: 10;">
                            <svg class="search-icon" style="width: 1.25rem; height: 1.25rem; color: #9ca3af;" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search blogs..."
                            class="search-input"
                            style="width: 100%; padding: 1rem 11rem 1rem 3rem; font-size: 1rem; border: 2px solid #e5e7eb; border-radius: 1rem; outline: none; background: white; box-shadow: 0 10px 25px rgba(0,0,0,0.1); transition: all 0.3s; color: #1a1a1a;"
                            onfocus="this.style.borderColor='#8400c7'; this.style.boxShadow='0 0 0 4px rgba(132,0,199,0.1)'"
                            onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.1)'">
                        <div class="search-buttons-container"
                            style="position: absolute; top: 50%; right: 0.5rem; transform: translateY(-50%); display: flex; gap: 0.5rem; align-items: center;">
                            @if (request('search'))
                                <a href="{{ route('frontend.blog') }}" class="clear-btn"
                                    style="padding: 0.625rem 1rem; background: #ff0000; color: #374151; border-radius: 0.5rem; font-weight: 600; transition: all 0.3s; text-decoration: none; font-size: 0.875rem; display: inline-flex; align-items: center;"
                                    onmouseover="this.style.background='#ff0000'"
                                    onmouseout="this.style.background='#ff0000'">
                                    Reset
                                </a>
                            @endif
                            <button type="submit" class="search-btn"
                                style="padding: 0.625rem 1.25rem; background: linear-gradient(135deg, #8400c7, #6f00ff); color: white; border: none; border-radius: 0.5rem; font-weight: 600; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 6px rgba(132,0,199,0.3); font-size: 0.875rem;"
                                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 12px rgba(132,0,199,0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(132,0,199,0.3)'">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
                @if (request('search'))
                    <div style="text-center; margin-top: 1.5rem;">
                        <p style="color: #6b7280; font-size: 1rem;">Showing results for: <span
                                style="font-weight: 700; color: #8400c7;">"{{ request('search') }}"</span></p>
                    </div>
                @endif
            </div>

            <div class="row g-4" style="margin-bottom:100px">
                @if ($blogs->count() > 0)
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="blog-card"
                                style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); height: 100%;"
                                onmouseover="this.style.transform='translateY(-12px)'; this.style.boxShadow='0 20px 50px rgba(132,0,199,0.25)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.08)'">

                                <!-- Image Container -->
                                <div
                                    style="position: relative; overflow: hidden; background: linear-gradient(135deg, #8400c7, #6f00ff); height: 280px;">
                                    <a href="{{ route('frontend.blog.show', $blog->slug) }}">
                                        @php
                                            $imageUrl = $blog->image ?? '';
                                            if ($imageUrl && file_exists(public_path($imageUrl))) {
                                                $imageUrl = asset($imageUrl);
                                            } elseif ($imageUrl) {
                                                $imageUrl = asset($imageUrl);
                                            } else {
                                                $imageUrl =
                                                    'https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?w=800&h=600&fit=crop';
                                            }
                                        @endphp
                                        <img src="{{ $imageUrl }}" alt="{{ $blog->title }}"
                                            style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease;"
                                            onmouseover="this.style.transform='scale(1.15) rotate(2deg)'"
                                            onmouseout="this.style.transform='scale(1) rotate(0deg)'"
                                            onerror="this.src='https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?w=800&h=600&fit=crop'" />
                                    </a>

                                    <!-- Date Badge -->
                                    @if ($blog->date)
                                        <div
                                            style="position: absolute; bottom: 20px; right: 20px; background: #ffca06; color: #000; padding: 12px 16px; border-radius: 15px; box-shadow: 0 8px 20px rgba(255,202,6,0.4); text-align: center; min-width: 70px;">
                                            <div style="font-size: 28px; font-weight: 800; line-height: 1;">
                                                {{ date('d', strtotime($blog->date)) }}</div>
                                            <div
                                                style="font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 2px;">
                                                {{ date('M', strtotime($blog->date)) }}</div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div style="padding: 30px;">
                                    <a href="{{ route('frontend.blog.show', $blog->slug) }}"
                                        style="text-decoration: none;">
                                        <h3 style="font-size: 22px; font-weight: 800; color: #1a1a1a; margin-bottom: 15px; line-height: 1.3; min-height: 60px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; transition: all 0.3s;"
                                            onmouseover="this.style.color='#8400c7'; this.style.transform='translateX(5px)'"
                                            onmouseout="this.style.color='#1a1a1a'; this.style.transform='translateX(0)'">
                                            {{ $blog->title }}
                                        </h3>
                                    </a>

                                    @if ($blog->description)
                                        <p
                                            style="color: #6b7280; line-height: 1.8; font-size: 15px; margin-bottom: 25px; min-height: 75px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{ Str::limit($blog->description, 130) }}
                                        </p>
                                    @else
                                        <p
                                            style="color: #6b7280; line-height: 1.8; font-size: 15px; margin-bottom: 25px; min-height: 75px;">
                                            &nbsp;</p>
                                    @endif

                                    <a href="{{ route('frontend.blog.show', $blog->slug) }}"
                                        style="display: inline-flex; align-items: center; gap: 10px; background: linear-gradient(135deg, #8400c7, #6f00ff); color: white; padding: 14px 28px; border-radius: 50px; font-weight: 700; font-size: 14px; text-decoration: none; transition: all 0.3s; box-shadow: 0 4px 15px rgba(132,0,199,0.3);"
                                        onmouseover="this.style.gap='15px'; this.style.boxShadow='0 6px 25px rgba(132,0,199,0.45)'; this.style.transform='translateY(-2px)'"
                                        onmouseout="this.style.gap='10px'; this.style.boxShadow='0 4px 15px rgba(132,0,199,0.3)'; this.style.transform='translateY(0)'">
                                        Read Full Article
                                        <svg style="width: 16px; height: 16px; transition: transform 0.3s;" fill="none"
                                            stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    @if ($blogs->hasPages())
                        <div class="col-12">
                            <div
                                style="display: flex; justify-content: center; align-items: center; gap: 10px; margin-top: 60px; flex-wrap: wrap;">
                                @if (!$blogs->onFirstPage())
                                    <a href="{{ $blogs->previousPageUrl() }}"
                                        style="padding: 0.75rem 1rem; background: white; color: #374151; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-weight: 600; transition: all 0.3s; text-decoration: none;"
                                        onmouseover="this.style.background='#8400c7'; this.style.color='white'; this.style.borderColor='#8400c7'"
                                        onmouseout="this.style.background='white'; this.style.color='#374151'; this.style.borderColor='#e5e7eb'">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                @endif

                                @php
                                    $start = max(1, $blogs->currentPage() - 2);
                                    $end = min($blogs->lastPage(), $blogs->currentPage() + 2);
                                @endphp

                                @if ($start > 1)
                                    <a href="{{ $blogs->url(1) }}"
                                        style="padding: 0.75rem 1.25rem; background: white; color: #374151; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-weight: 600; transition: all 0.3s; text-decoration: none;"
                                        onmouseover="this.style.background='#8400c7'; this.style.color='white'; this.style.borderColor='#8400c7'"
                                        onmouseout="this.style.background='white'; this.style.color='#374151'; this.style.borderColor='#e5e7eb'">
                                        01
                                    </a>
                                    @if ($start > 2)
                                        <span style="padding: 0 0.5rem; color: #9ca3af;">...</span>
                                    @endif
                                @endif

                                @for ($page = $start; $page <= $end; $page++)
                                    @if ($page == $blogs->currentPage())
                                        <span
                                            style="padding: 0.75rem 1.25rem; background: linear-gradient(135deg, #8400c7, #6f00ff); color: white; border: 2px solid #8400c7; border-radius: 0.5rem; font-weight: 700; box-shadow: 0 4px 6px rgba(132,0,199,0.3);">
                                            {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                                        </span>
                                    @else
                                        <a href="{{ $blogs->url($page) }}"
                                            style="padding: 0.75rem 1.25rem; background: white; color: #374151; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-weight: 600; transition: all 0.3s; text-decoration: none;"
                                            onmouseover="this.style.background='#8400c7'; this.style.color='white'; this.style.borderColor='#8400c7'"
                                            onmouseout="this.style.background='white'; this.style.color='#374151'; this.style.borderColor='#e5e7eb'">
                                            {{ str_pad($page, 2, '0', STR_PAD_LEFT) }}
                                        </a>
                                    @endif
                                @endfor

                                @if ($end < $blogs->lastPage())
                                    @if ($end < $blogs->lastPage() - 1)
                                        <span style="padding: 0 0.5rem; color: #9ca3af;">...</span>
                                    @endif
                                    <a href="{{ $blogs->url($blogs->lastPage()) }}"
                                        style="padding: 0.75rem 1.25rem; background: white; color: #374151; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-weight: 600; transition: all 0.3s; text-decoration: none;"
                                        onmouseover="this.style.background='#8400c7'; this.style.color='white'; this.style.borderColor='#8400c7'"
                                        onmouseout="this.style.background='white'; this.style.color='#374151'; this.style.borderColor='#e5e7eb'">
                                        {{ str_pad($blogs->lastPage(), 2, '0', STR_PAD_LEFT) }}
                                    </a>
                                @endif

                                @if ($blogs->hasMorePages())
                                    <a href="{{ $blogs->nextPageUrl() }}"
                                        style="padding: 0.75rem 1rem; background: white; color: #374151; border: 2px solid #e5e7eb; border-radius: 0.5rem; font-weight: 600; transition: all 0.3s; text-decoration: none;"
                                        onmouseover="this.style.background='#8400c7'; this.style.color='white'; this.style.borderColor='#8400c7'"
                                        onmouseout="this.style.background='white'; this.style.color='#374151'; this.style.borderColor='#e5e7eb'">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                @else
                    <div class="col-12">
                        <div
                            style="text-align: center; padding: 80px 40px; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                            <div
                                style="width: 100px; height: 100px; margin: 0 auto 30px; background: linear-gradient(135deg, #f3e8ff, #faf5ff); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fa fa-inbox" style="font-size: 3rem; color: #a855f7;"></i>
                            </div>
                            <h3 style="font-size: 28px; font-weight: 800; color: #1a1a1a; margin-bottom: 15px;">No blogs
                                found</h3>
                            @if (request('search'))
                                <p
                                    style="color: #6b7280; font-size: 16px; line-height: 1.6; margin-bottom: 30px; max-width: 500px; margin-left: auto; margin-right: auto;">
                                    We couldn't find any blogs matching your search. Try different keywords.</p>
                                <a href="{{ route('frontend.blog') }}"
                                    style="display: inline-flex; align-items: center; gap: 10px; padding: 14px 32px; background: linear-gradient(135deg, #8400c7, #6f00ff); color: white; border-radius: 50px; font-weight: 700; font-size: 15px; text-decoration: none; box-shadow: 0 4px 15px rgba(132,0,199,0.3); transition: all 0.3s;"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 25px rgba(132,0,199,0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(132,0,199,0.3)'">
                                    View All Blogs
                                </a>
                            @else
                                <p style="color: #6b7280; font-size: 16px; line-height: 1.6;">No published blogs available
                                    at the moment. Check back soon!</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
