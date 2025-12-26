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
                background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.05)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
                background-size: cover;
                background-position: bottom;
            }
        </style>
    @endpush

@section('content')
    <!-- Breadcrumb Section -->
    <div class="blog-breadcrumb">
        <div class="container mx-auto px-4">
            <div class="text-center position-relative">
                <h1 class="text-white mb-4" style="font-size: 3.5rem;font-family:sans-serif; font-weight: 500; letter-spacing: -0.02em;">Our Blogs
                </h1>
                <p class="text-white/90 text-lg mb-6 max-w-2xl mx-auto" style="opacity: 0.9;">Discover insights, tips, and
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

            <div class="mb-16" style="margin-bottom: 4rem;">
                <form method="GET" action="{{ route('frontend.blog') }}" style="max-width: 48rem; margin: 0 auto;">
                    <div style="position: relative;">
                        <div
                            style="position: absolute; top: 50%; left: 1.5rem; transform: translateY(-50%); pointer-events: none;">
                            <svg style="width: 1.25rem; height: 1.25rem; color: #9ca3af;" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search blogs by title, description, or content..."
                            style="width: 100%; padding: 2rem 1rem 2rem 3.5rem;margin:1rem 0 1rem; font-size: 1rem; border: 2px solid #e5e7eb; border-radius: 1rem; outline: none; background: white; box-shadow: 0 10px 25px rgba(0,0,0,0.1); transition: all 0.3s;"
                            onfocus="this.style.borderColor='#8400c7'; this.style.boxShadow='0 0 0 4px rgba(132,0,199,0.1)'"
                            onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.1)'">
                        <div
                            style="position: absolute; top: 50%; right: 0.75rem; transform: translateY(-50%); display: flex; gap: 0.5rem;">
                            @if (request('search'))
                                <a href="{{ route('frontend.blog') }}"
                                    style="padding: 0.625rem 1.25rem; background: #f3f4f6; color: #374151; border-radius: 0.75rem; font-weight: 600; transition: all 0.3s; text-decoration: none;"
                                    onmouseover="this.style.background='#e5e7eb'"
                                    onmouseout="this.style.background='#f3f4f6'">
                                    Clear
                                </a>
                            @endif
                            <button type="submit"
                                style="padding: 0.625rem 1.5rem; background: linear-gradient(135deg, #8400c7, #6f00ff); color: white; border: none; border-radius: 0.75rem; font-weight: 600; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 6px rgba(132,0,199,0.3);"
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

                                    <!-- Tag Badge -->
                                    @if ($blog->tags->count() > 0)
                                        <div style="position: absolute; top: 20px; left: 20px; z-index: 10;">
                                            <span
                                                style="display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); color: #8400c7; padding: 8px 18px; border-radius: 50px; font-size: 13px; font-weight: 700; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
                                                <svg style="width: 14px; height: 14px;" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $blog->tags->first()->name }}
                                            </span>
                                        </div>
                                    @endif

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
                                {
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
