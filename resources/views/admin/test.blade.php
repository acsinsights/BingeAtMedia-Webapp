<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BingeAt Media</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-200">
    <div class="container mx-auto p-8">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h1 class="card-title text-3xl">🎉 Mary UI Installed Successfully!</h1>
                <p class="text-lg">Welcome to BingeAt Media Admin Panel</p>
                
                <div class="stats shadow mt-6">
                    <div class="stat">
                        <div class="stat-title">Total Projects</div>
                        <div class="stat-value text-primary">156</div>
                        <div class="stat-desc">All time</div>
                    </div>
                    
                    <div class="stat">
                        <div class="stat-title">Active Clients</div>
                        <div class="stat-value text-secondary">42</div>
                        <div class="stat-desc">This month</div>
                    </div>
                </div>

                <div class="mt-6">
                    <button class="btn btn-primary">Primary Button</button>
                    <button class="btn btn-secondary">Secondary Button</button>
                    <button class="btn btn-accent">Accent Button</button>
                </div>

                <div class="alert alert-success mt-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>Mary UI with DaisyUI is working perfectly!</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
