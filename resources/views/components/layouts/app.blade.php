<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('cdn')
</head>

<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    {{-- NAVBAR mobile only --}}
    <x-nav sticky class="lg:hidden">
        {{-- <x-slot:brand>
            <x-app-brand />
        </x-slot:brand> --}}

        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden me-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
            <a href="{{ route('admin.index') }}" wire:navigate="">
                <div class="p-5 pt-3 hidden-when-collapsed">
                    <div class="flex items-center justify-center p-3 rounded-xl"
                        style="background: linear-gradient(to left, #8400c7, #6f00ff);">
                        <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" width="130" alt="logo" />
                    </div>
                </div>

                <div class="display-when-collapsed hidden mt-4 lg:mb-4 w-full px-2">
                    <div class="flex items-center justify-center p-2 rounded-xl"
                        style="background: linear-gradient(to left, #8400c7, #6f00ff);">
                        <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" width="40" alt="logo" />
                    </div>
                </div>
            </a>

            {{-- MENU --}}
            <x-menu activate-by-route>
                <x-menu-item title="Dashboard" icon="o-home" link="{{ route('admin.index') }}" />
                <x-menu-item title="Blog" icon="o-newspaper" link="{{ route('admin.blog.index') }}" />
                <x-menu-item title="Contact" icon="o-envelope" link="{{ route('admin.contact.index') }}" />
                <x-menu-item title="Enquiry Leads" icon="o-document-text"
                    link="{{ route('admin.enquiry-leads.index') }}" />
                <x-menu-item title="Testimonial" icon="o-star" link="{{ route('admin.testimonial.index') }}" />
                <x-menu-item title="Page Meta" icon="o-tag" link="{{ route('admin.page-meta.index') }}" />
                <x-menu-item title="Website Settings" icon="o-cog" link="{{ route('admin.website-data') }}" />
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content class="lg:pt-0 bg-base-300">
            <div role="navigation" aria-label="Navbar" class="z-10 px-3 border-b navbar topbar-wrapper border-base-200">
                <div class="gap-3 navbar-start"></div>
                <div class="navbar-center"></div>
                <div class="gap-1.5 navbar-end">
                    <div class="tooltip tooltip-bottom" data-tip="Toggle Theme">
                        <x-theme-toggle class="w-12 h-12 btn-sm btn-ghost" lightTheme="light" darkTheme="dark" />
                    </div>

                    @auth
                        <div class="dropdown dropdown-bottom dropdown-end">
                            <label tabindex="0" class="btn btn-ghost rounded-btn px-1.5 hover:bg-base-content/20">
                                <div class="flex items-center gap-2">
                                    <div aria-label="Avatar photo" class="avatar placeholder">
                                        @if (auth()->user()->image)
                                            <div class="w-8 h-8 rounded-md bg-base-content/10">
                                                <img src="{{ asset(auth()->user()->image) }}"
                                                    alt="{{ auth()->user()->name }}">
                                            </div>
                                        @else
                                            <div class="select-none avatar avatar-placeholder">
                                                <div class="w-8 rounded-full bg-primary text-primary-content">
                                                    <span class="text-md">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex flex-col items-start">
                                        <p class="text-sm/none">
                                            {{ auth()->user()->name }}
                                        </p>
                                    </div>
                                </div>
                            </label>
                            <ul tabindex="0"
                                class="z-50 p-2 mt-4 shadow dropdown-content menu bg-base-100 rounded-box w-52"
                                role="menu">
                                <li>
                                    <a href="{{ route('admin.profile') }}" wire:navigate>
                                        My Profile
                                    </a>
                                </li>
                                <hr class="my-1 -mx-2 border-base-content/10" />
                                <li>
                                    <form method="POST" action="{{ route('admin.logout') }}" id="logout-form">
                                        @csrf
                                        <button type="submit" class="text-error w-full text-left"
                                            onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>

            <div class="dashboard-content">
                {{ $slot }}
            </div>

            <div class="flex justify-between pt-3 px-3 mt-3 border-t text-sm/relaxed text-base-content border-base-200">
                <div>
                    Copyright © 2025 BingeAt Media. All Rights Reserved.
                </div>
                <div>
                    <span class="text-primary">v{{ config('app.version') }}</span>
                </div>
            </div>
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />
</body>

</html>
