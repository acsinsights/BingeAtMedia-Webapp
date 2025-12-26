<?php

use App\Models\User;
use Mary\Traits\Toast;
use Livewire\Volt\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    use Toast;
    #[Layout('components.layouts.auth')]
    #[Title('Login')]
    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public function mount()
    {
        // It is logged in
        if (auth()->user()) {
            $this->success('You are already logged in.', redirectTo: route('admin.index'));
        }
    }

    public function login()
    {
        $credentials = $this->validate(
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ],
            [
                'email.exists' => 'The provided credentials do not match our records.',
            ],
        );

        // Check if user exists and is active
        $user = User::where('email', $this->email)->first();

        if (auth()->attempt($credentials)) {
            request()->session()->regenerate();
            $intended = session('url.intended', route('admin.index'));
            $this->success('Login successful! Welcome back, ' . $user->name . '.', redirectTo: $intended);
            return;
        }

        $this->addError('email', 'The provided credentials do not match our records.');
    }
};
?>

<div class="min-h-screen relative overflow-hidden" style="background: linear-gradient(135deg, #8400c7 0%, #6f00ff 100%);">
    <!-- Animated Background Circles -->
    <div class="absolute inset-0 overflow-hidden">
        <div
            class="absolute top-10 left-10 w-72 h-72 bg-yellow-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute top-20 right-20 w-72 h-72 bg-white rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute bottom-20 left-40 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000">
        </div>
    </div>

    <style>
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>

    <div class="flex items-center justify-center min-h-screen p-4 relative z-10">
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden max-w-5xl w-full grid md:grid-cols-2">

            <!-- Left Side - Purple Background -->
            <div class="hidden md:flex flex-col items-center justify-center p-12"
                style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));">

                <div class="text-center">
                    <h1 class="text-4xl font-bold mb-4"
                        style="background: linear-gradient(135deg, #8400c7, #6f00ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: 0.02em; word-spacing: 0.1em;">
                        Binge<span style="letter-spacing: 0;">At</span> Media
                    </h1>
                    <p class="text-gray-700 text-lg mb-8">
                        Creative Digital Marketing & Branding Agency
                    </p>

                    <div class="space-y-3">
                        <button class="px-6 py-3 rounded-full text-white font-semibold"
                            style="background: linear-gradient(135deg, #8400c7, #6f00ff);">
                            🎨 Creative Design
                        </button>
                        <button class="px-6 py-3 rounded-full text-white font-semibold ml-3"
                            style="background: linear-gradient(135deg, #8400c7, #6f00ff);">
                            📱 Digital Marketing
                        </button>
                        <div class="mt-3">
                            <button class="px-6 py-3 rounded-full text-white font-semibold"
                                style="background: linear-gradient(135deg, #8400c7, #6f00ff);">
                                📈 Brand Growth
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-12 p-6 rounded-xl" style="background: linear-gradient(to left, #8400c7, #6f00ff);">
                    <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" class="w-32 mx-auto" alt="Auth Image">
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="p-8 md:p-12 flex flex-col justify-center">

                <!-- Logo -->
                <div class="text-center mb-8">
                    <div class="inline-block p-4 rounded-xl mb-6"
                        style="background: linear-gradient(to left, #8400c7, #6f00ff);">
                        <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" class="h-12"
                            alt="BingeAt Media">
                    </div>

                    <h2 class="text-3xl font-bold mb-2"
                        style="background: linear-gradient(135deg, #8400c7, #6f00ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        Admin Login
                    </h2>
                    <p class="text-gray-600 text-sm">
                        Seamless Access, Secure Connection.<br>
                        Your Way to a Personalized Experience.
                    </p>
                </div>

                <!-- Login Form -->
                <x-form wire:submit="login">
                    <x-input label="E-mail" type="email" wire:model="email" icon="o-envelope"
                        placeholder="admin@gmail.com" />

                    <x-password label="Password" wire:model="password" icon="o-lock-closed" placeholder="••••••••"
                        right />

                    <x-slot:actions class="mt-6">
                        <x-button label="Login" type="submit" icon="o-paper-airplane" class="w-full" spinner="login"
                            style="background: linear-gradient(135deg, #8400c7 0%, #6f00ff 100%); color: white; font-weight: 600; padding: 0.75rem; border-radius: 0.5rem;" />
                    </x-slot:actions>
                </x-form>

                <!-- Footer -->
                <div class="mt-8 text-center">
                    <p class="text-xs text-gray-500">
                        © 2025 BingeAt Media. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
