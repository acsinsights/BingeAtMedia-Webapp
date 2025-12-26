<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }} - BingeAt Media</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-base-200">
    <x-mary-main full-width>
        <!-- Sidebar -->
        <x-slot:sidebar drawer="main-drawer" class="bg-base-100">
            <div class="px-5 pt-5 pb-3 border-b border-base-300">
                <h1 class="text-2xl font-bold text-primary">BingeAt Media</h1>
                <p class="text-sm text-base-content/60">Admin Panel</p>
            </div>
            
            <x-mary-menu activate-by-route>
                <x-mary-menu-item title="Dashboard" icon="o-home" link="/admin/dashboard" />
                <x-mary-menu-item title="Users" icon="o-users" link="/admin/users" />
                <x-mary-menu-item title="Projects" icon="o-briefcase" link="/admin/projects" />
                <x-mary-menu-separator />
                <x-mary-menu-item title="Settings" icon="o-cog-6-tooth" link="/admin/settings" />
            </x-mary-menu>
        </x-slot:sidebar>

        <!-- Main Content -->
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    <x-mary-toast />
</body>
</html>
