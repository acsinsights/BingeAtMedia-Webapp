@extends('frontend.layouts.app')

@section('title', $blog->meta_title ?? $blog->title . ' - BingeAt Media')
@section('meta_description', $blog->meta_description ?? Str::limit(strip_tags($blog->description), 155))

@push('styles')
    <style>
        * {
            font-family: "Plus Jakarta Sans", sans-serif;
        }

        .blog-breadcrumb {
            background: linear-gradient(135deg, #8400c7 0%, #6f00ff 100%);
            padding: 125px 0 80px;
            margin-bottom: 0;
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

        .blog-content {
            font-size: 1.0625rem;
            line-height: 1.8;
            color: #374151;
        }

        .blog-content h1,
        .blog-content h2,
        .blog-content h3,
        .blog-content h4 {
            color: #1a1a1a;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
            line-height: 1.3;
        }

        .blog-content h1 {
            font-size: 2.25rem;
        }

        .blog-content h2 {
            font-size: 1.875rem;
        }

        .blog-content h3 {
            font-size: 1.5rem;
        }

        .blog-content h4 {
            font-size: 1.25rem;
        }

        .blog-content p {
            margin-bottom: 1.5rem;
        }

        .blog-content img {
            max-width: 100%;
            height: auto;
            border-radius: 1rem;
            margin: 2rem 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .blog-content ul,
        .blog-content ol {
            margin-bottom: 1.5rem;
            padding-left: 2rem;
        }

        .blog-content li {
            margin-bottom: 0.75rem;
        }

        .blog-content blockquote {
            border-left: 4px solid #8400c7;
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: #6b7280;
        }

        .blog-content a {
            color: #8400c7;
            text-decoration: underline;
        }

        .blog-content a:hover {
            color: #6f00ff;
        }

        @media (max-width: 1023px) {
            .blog-layout {
                grid-template-columns: 1fr !important;
            }

            .cta-grid {
                grid-template-columns: 1fr !important;
                text-align: center !important;
            }

            .cta-button-wrapper {
                text-align: center !important;
            }
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .blog-breadcrumb {
                padding: 80px 0 50px !important;
                margin-bottom: 0 !important;
            }

            .blog-breadcrumb h1 {
                font-size: 1.875rem !important;
                padding: 0 1.5rem;
                line-height: 1.4 !important;
                word-spacing: 0.05em;
            }

            .blog-layout>div:first-child>div {
                padding: 1.5rem !important;
                margin-top: 0 !important;
            }

            .blog-content {
                font-size: 1rem !important;
                line-height: 1.7 !important;
            }

            .blog-content h1 {
                font-size: 1.75rem !important;
            }

            .blog-content h2 {
                font-size: 1.5rem !important;
            }

            .blog-content h3 {
                font-size: 1.25rem !important;
            }

            .blog-content h4 {
                font-size: 1.125rem !important;
            }

            .blog-content img {
                margin: 1.5rem 0 !important;
            }

            /* Meta info responsive */
            .blog-meta-info {
                flex-direction: column !important;
                gap: 1rem !important;
                padding: 1rem !important;
            }

            /* Tags responsive */
            .tags-section {
                padding: 1.25rem 1rem !important;
            }

            .tags-section strong {
                width: 100%;
                margin-bottom: 0.5rem;
            }

            /* Share buttons responsive */
            .share-section {
                padding: 1.5rem 1rem !important;
            }

            .share-buttons {
                justify-content: center !important;
            }

            .share-buttons a,
            .share-buttons button {
                width: 2.75rem !important;
                height: 2.75rem !important;
            }

            /* Sidebar responsive */
            .sidebar-card {
                padding: 1.5rem !important;
                margin-bottom: 1.5rem !important;
            }

            .recent-blog-item {
                flex-direction: column !important;
                gap: 1rem !important;
            }

            .recent-blog-item img {
                width: 100% !important;
                height: 200px !important;
            }

            /* CTA Section */
            .cta-section {
                padding: 3rem 0 !important;
            }

            .cta-section h2 {
                font-size: 1.875rem !important;
            }

            .cta-section p {
                font-size: 1rem !important;
            }
        }

        @media (max-width: 480px) {
            .blog-breadcrumb h1 {
                font-size: 1.5rem !important;
                line-height: 1.5 !important;
                padding: 0 1.25rem;
                word-spacing: 0.1em;
                letter-spacing: 0.01em !important;
            }

            .blog-layout>div:first-child>div {
                padding: 1.25rem !important;
            }

            .blog-content {
                font-size: 0.9375rem !important;
            }

            .blog-content h1 {
                font-size: 1.5rem !important;
            }

            .blog-content h2 {
                font-size: 1.375rem !important;
            }

            .breadcrumb {
                font-size: 0.875rem !important;
            }

            .sidebar-card h5 {
                font-size: 1.25rem !important;
            }

            .cta-section h2 {
                font-size: 1.625rem !important;
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
                    style="font-size: 3rem; font-weight:600;font-family:sans-serif; letter-spacing: -0.01em; max-width: 900px; margin-left: auto; margin-right: auto; line-height: 1.3; word-spacing: 0.05em;">
                    {{ $blog->title }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center" style="background: transparent;">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}" class="text-white"
                                style="transition: color 0.3s;">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend.blog') }}" class="text-white"
                                style="transition: color 0.3s;">Blogs</a></li>
                        <li class="breadcrumb-item active" style="color: #ffca06;" aria-current="page">
                            {{ Str::limit($blog->title, 40) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Blog Details Section -->
    <div class="py-20" style="background: linear-gradient(to bottom, #f8f9ff 0%, #ffffff 100%); padding-top: 0;">
        <div class="container mx-auto px-4" style="max-width: 1320px; margin-bottom: 100px; padding-top: 3rem;">
            <div class="blog-layout" style="display: grid; grid-template-columns: 1fr 380px; gap: 3rem;">
                <!-- Main Content -->
                <div>
                    <div
                        style="background: white; padding: 3.5rem; margin-top: 20px; border: none; border-radius: 1.5rem; box-shadow: 0 20px 60px rgba(132, 0, 199, 0.08);">
                        <!-- Featured Image -->
                        @if ($blog->image)
                            @php
                                $imageUrl = $blog->image;
                                if (strpos($imageUrl, '/storage/') === 0) {
                                    $imageUrl = asset($imageUrl);
                                } elseif (strpos($imageUrl, 'storage/') === 0) {
                                    $imageUrl = asset('/' . $imageUrl);
                                } else {
                                    $imageUrl = asset('storage/' . $imageUrl);
                                }
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $blog->title }}"
                                onerror="this.src='https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?w=1200&h=675&fit=crop'"
                                style="width: 100%; height: auto; aspect-ratio: 16 / 9; object-fit: cover; border-radius: 1.25rem; box-shadow: 0 15px 40px rgba(132, 0, 199, 0.15); margin-bottom: 3rem;" />
                        @endif

                        <!-- Meta Info -->
                        <div class="blog-meta-info"
                            style="display: flex; flex-wrap: wrap; gap: 2rem; margin-bottom: 3rem; padding: 1.5rem; background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%); border-radius: 1rem; border-left: 4px solid #8400c7;">
                            @if ($blog->date)
                                <div
                                    style="display: flex; align-items: center; gap: 0.625rem; color: #4b5563; font-size: 1rem; font-weight: 600;">
                                    <svg style="width: 1.375rem; height: 1.375rem; color: #8400c7;" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span>{{ date('F d, Y', strtotime($blog->date)) }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            @if ($blog->description)
                                <div
                                    style="font-size: 1.25rem; color: #374151; margin-bottom: 3rem; padding: 2rem; background: linear-gradient(135deg, #f3e8ff, #faf5ff); border-left: 5px solid #8400c7; border-radius: 0.75rem; line-height: 1.8; font-weight: 500; box-shadow: 0 4px 15px rgba(132, 0, 199, 0.08);">
                                    {!! nl2br(e($blog->description)) !!}
                                </div>
                            @endif

                            <div style="font-size: 1.0625rem; line-height: 2; color: #374151;">
                                {!! $blog->content !!}
                            </div>
                        </div>

                        <!-- Tags -->
                        @if ($blog->tags->count() > 0)
                            <div class="tags-section"
                                style="margin-top: 3.5rem; padding: 1.5rem; background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%); border-radius: 1rem; display: flex; flex-wrap: wrap; gap: 1rem; align-items: center;">
                                <strong
                                    style="color: #374151; margin-right: 0.5rem; font-size: 1.0625rem; font-weight: 700;">Tags:</strong>
                                @foreach ($blog->tags as $tag)
                                    <a href="{{ route('frontend.blog', ['search' => $tag->name]) }}"
                                        style="background: linear-gradient(135deg, #8400c7, #6f00ff); color: white; padding: 0.625rem 1.5rem; border-radius: 9999px; font-size: 0.9375rem; font-weight: 700; text-decoration: none; transition: all 0.3s; box-shadow: 0 3px 10px rgba(132,0,199,0.25);"
                                        onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 6px 20px rgba(132,0,199,0.35)'"
                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 10px rgba(132,0,199,0.25)'">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        <!-- Share Buttons -->
                        <div class="share-section"
                            style="margin-top: 3.5rem; padding: 2rem; background: linear-gradient(135deg, #f8f9ff 0%, #f0f1ff 100%); border-radius: 1rem;">
                            <h6 style="margin-bottom: 1.5rem; color: #1a1a1a; font-weight: 700; font-size: 1.1875rem;">Share
                                this article:</h6>
                            <div class="share-buttons" style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('frontend.blog.show', $blog->slug)) }}"
                                    target="_blank"
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 3.25rem; height: 3.25rem; border-radius: 9999px; background: #3b5998; color: white; text-decoration: none; transition: all 0.3s; box-shadow: 0 4px 12px rgba(59,89,152,0.35);"
                                    title="Share on Facebook"
                                    onmouseover="this.style.transform='translateY(-4px) scale(1.1)'; this.style.boxShadow='0 8px 20px rgba(59,89,152,0.45)'"
                                    onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 4px 12px rgba(59,89,152,0.35)'">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('frontend.blog.show', $blog->slug)) }}&text={{ urlencode($blog->title) }}"
                                    target="_blank"
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 3.25rem; height: 3.25rem; border-radius: 9999px; background: #1da1f2; color: white; text-decoration: none; transition: all 0.3s; box-shadow: 0 4px 12px rgba(29,161,242,0.35);"
                                    title="Share on Twitter"
                                    onmouseover="this.style.transform='translateY(-4px) scale(1.1)'; this.style.boxShadow='0 8px 20px rgba(29,161,242,0.45)'"
                                    onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 4px 12px rgba(29,161,242,0.35)'">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('frontend.blog.show', $blog->slug)) }}&title={{ urlencode($blog->title) }}"
                                    target="_blank"
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 3.25rem; height: 3.25rem; border-radius: 9999px; background: #0077b5; color: white; text-decoration: none; transition: all 0.3s; box-shadow: 0 4px 12px rgba(0,119,181,0.35);"
                                    title="Share on LinkedIn"
                                    onmouseover="this.style.transform='translateY(-4px) scale(1.1)'; this.style.boxShadow='0 8px 20px rgba(0,119,181,0.45)'"
                                    onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 4px 12px rgba(0,119,181,0.35)'">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . route('frontend.blog.show', $blog->slug)) }}"
                                    target="_blank"
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 3.25rem; height: 3.25rem; border-radius: 9999px; background: #25d366; color: white; text-decoration: none; transition: all 0.3s; box-shadow: 0 4px 12px rgba(37,211,102,0.35);"
                                    title="Share on WhatsApp"
                                    onmouseover="this.style.transform='translateY(-4px) scale(1.1)'; this.style.boxShadow='0 8px 20px rgba(37,211,102,0.45)'"
                                    onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 4px 12px rgba(37,211,102,0.35)'">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <button onclick="copyBlogUrl()"
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 3.25rem; height: 3.25rem; border-radius: 9999px; background: #6f00ff; color: white; border: none; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 12px rgba(111,0,255,0.35);"
                                    title="Copy URL"
                                    onmouseover="this.style.transform='translateY(-4px) scale(1.1)'; this.style.boxShadow='0 8px 20px rgba(111,0,255,0.45)'"
                                    onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 4px 12px rgba(111,0,255,0.35)'">
                                    <i class="fas fa-link"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div>
                    <!-- Tags Section -->
                    @if ($blog->tags && $blog->tags->count() > 0)
                        <div class="sidebar-card"
                            style="background: white; padding: 2.5rem; border: none; border-radius: 1.5rem; box-shadow: 0 20px 60px rgba(132, 0, 199, 0.08); margin-bottom: 2rem;">
                            <div style="margin-bottom: 1.5rem; padding-bottom: 1.25rem; border-bottom: 3px solid #8400c7;">
                                <h5
                                    style="color: #1a1a1a; font-weight: 800; font-size: 1.5rem; font-family:sans-serif; margin: 0; letter-spacing: -0.01em;">
                                    Tags</h5>
                            </div>
                            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                                @foreach ($blog->tags as $tag)
                                    <span
                                        style="display: inline-block; padding: 0.5rem 1.25rem; background: linear-gradient(135deg, #f8f9ff 0%, #f0f1ff 100%); color: #6f00ff; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; transition: all 0.3s; cursor: pointer; border: 2px solid transparent;"
                                        onmouseover="this.style.background='linear-gradient(135deg, #6f00ff, #8400c7)'; this.style.color='white'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(111,0,255,0.25)'"
                                        onmouseout="this.style.background='linear-gradient(135deg, #f8f9ff 0%, #f0f1ff 100%)'; this.style.color='#6f00ff'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                        #{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($recentBlogs->count() > 0)
                        <div class="sidebar-card"
                            style="background: white; padding: 2.5rem; border: none; border-radius: 1.5rem; box-shadow: 0 20px 60px rgba(132, 0, 199, 0.08); position: sticky; top: 2rem;margin-top: 20px;">
                            <div style="margin-bottom: 2rem; padding-bottom: 1.25rem; border-bottom: 3px solid #8400c7;">
                                <h5
                                    style="color: #1a1a1a; font-weight: 800; font-size: 1.5rem; font-family:sans-serif; margin: 0; letter-spacing: -0.01em;">
                                    Recent Posts</h5>
                            </div>
                            @foreach ($recentBlogs as $recentBlog)
                                <div class="recent-blog-item"
                                    style="display: flex; gap: 1.25rem; margin-bottom: {{ $loop->last ? '0' : '2rem' }}; padding-bottom: {{ $loop->last ? '0' : '2rem' }}; border-bottom: {{ $loop->last ? 'none' : '2px solid #f3f4f6' }}; transition: all 0.3s;"
                                    onmouseover="this.style.paddingLeft='0.75rem'"
                                    onmouseout="this.style.paddingLeft='0'">
                                    <a href="{{ route('frontend.blog.show', $recentBlog->slug) }}">
                                        @php
                                            $recentImageUrl = $recentBlog->image;
                                            if ($recentImageUrl) {
                                                if (strpos($recentImageUrl, '/storage/') === 0) {
                                                    $recentImageUrl = asset($recentImageUrl);
                                                } elseif (strpos($recentImageUrl, 'storage/') === 0) {
                                                    $recentImageUrl = asset('/' . $recentImageUrl);
                                                } else {
                                                    $recentImageUrl = asset('storage/' . $recentImageUrl);
                                                }
                                            } else {
                                                $recentImageUrl = 'https://placehold.co/96x96/8400c7/ffffff?text=Blog';
                                            }
                                        @endphp
                                        <img src="{{ $recentImageUrl }}" alt="{{ $recentBlog->title }}"
                                            onerror="this.src='https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?w=200&h=200&fit=crop'"
                                            style="width: 6rem; height: 6rem; border-radius: 0.875rem; object-fit: cover; flex-shrink: 0; transition: all 0.3s; box-shadow: 0 4px 12px rgba(132, 0, 199, 0.15);"
                                            onmouseover="this.style.transform='scale(1.08) rotate(2deg)'; this.style.boxShadow='0 8px 20px rgba(132, 0, 199, 0.25)'"
                                            onmouseout="this.style.transform='scale(1) rotate(0deg)'; this.style.boxShadow='0 4px 12px rgba(132, 0, 199, 0.15)'" />
                                    </a>
                                    <div style="flex: 1; min-width: 0;">
                                        <a href="{{ route('frontend.blog.show', $recentBlog->slug) }}"
                                            style="text-decoration: none;">
                                            <h6 style="font-size: 1rem; font-weight: 700; color: #1a1a1a; margin-bottom: 0.625rem; line-height: 1.5; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; transition: color 0.3s;"
                                                onmouseover="this.style.color='#8400c7'"
                                                onmouseout="this.style.color='#1a1a1a'">
                                                {{ Str::limit($recentBlog->title, 60) }}
                                            </h6>
                                        </a>
                                        @if ($recentBlog->date)
                                            <div
                                                style="font-size: 0.875rem; color: #6b7280; display: flex; align-items: center; gap: 0.5rem; font-weight: 500;">
                                                <svg style="width: 1rem; height: 1rem; color: #8400c7;"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                {{ date('M d, Y', strtotime($recentBlog->date)) }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section"
        style="background: linear-gradient(135deg, #8400c7 0%, #6f00ff 100%); padding: 5rem 0; position: relative; overflow: hidden;">
        <div class="container mx-auto px-4" style="position: relative;">
            <div class="cta-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; align-items: center;">
                <div style="color: white;">
                    <h2
                        style="font-size: 2.5rem; font-weight: 800;font-family:sans-serif; margin-bottom: 1rem; line-height: 1.2;">
                        Ready to
                        Elevate Your Brand?</h2>
                    <p style="font-size: 1.125rem; margin: 0; opacity: 0.95; line-height: 1.7;">Let's create something
                        amazing together. Our digital marketing experts are here to help you succeed.</p>
                </div>
                <div class="cta-button-wrapper" style="text-align: right;">
                    <a href="{{ route('frontend.contact') }}"
                        style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 1rem 2.5rem; background: #ffca06; color: #000; border-radius: 9999px; text-decoration: none; font-weight: 700; font-size: 1.0625rem; transition: all 0.3s; box-shadow: 0 4px 6px rgba(0,0,0,0.1);"
                        onmouseover="this.style.background='white'; this.style.color='#8400c7'; this.style.transform='translateY(-3px)'; this.style.boxShadow='0 10px 25px rgba(0,0,0,0.2)'"
                        onmouseout="this.style.background='#ffca06'; this.style.color='#000'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)'">
                        <i class="fa fa-paper-plane"></i>
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyBlogUrl() {
            const url = "{{ route('frontend.blog.show', $blog->slug) }}";
            navigator.clipboard.writeText(url).then(function() {
                // Success feedback
                const btn = event.target.closest('button');
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-check"></i>';
                btn.style.background = '#10b981';

                setTimeout(function() {
                    btn.innerHTML = originalHTML;
                    btn.style.background = '#6f00ff';
                }, 2000);
            }).catch(function(err) {
                console.error('Failed to copy URL: ', err);
                alert('Failed to copy URL. Please try again.');
            });
        }
    </script>
@endsection
