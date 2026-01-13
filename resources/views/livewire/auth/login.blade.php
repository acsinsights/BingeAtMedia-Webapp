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

<div class="min-h-screen flex items-center justify-center"
    style="background: linear-gradient(to left, #8400c7, #6f00ff);">
    <div class="w-full max-w-md mx-4">
        <div class="bg-white rounded-lg shadow-lg p-8">

            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="inline-block p-4 rounded-lg mb-4"
                    style="background: linear-gradient(to left, #8400c7, #6f00ff);">
                    <img src="{{ asset('frontend/img/logo/bingeAt_media.svg') }}" class="h-12" alt="BingeAt Media">
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Admin Login</h2>
                <p class="text-gray-600 text-sm">
                    Welcome back! Please login to your account.
                </p>
            </div>

            <!-- Login Form -->
            <x-form wire:submit="login">
                <x-input label="E-mail" type="email" wire:model="email" icon="o-envelope"
                    placeholder="admin@gmail.com" />

                <x-password label="Password" wire:model="password" icon="o-lock-closed" placeholder="••••••••" right />

                <x-slot:actions class="mt-6">
                    <x-button label="Login" type="submit" icon="o-paper-airplane" class="w-full" spinner="login"
                        style="background: linear-gradient(to left, #8400c7, #6f00ff); color: white; font-weight: 600; padding: 0.75rem; border-radius: 0.5rem;" />
                </x-slot:actions>
            </x-form>

            <!-- Footer -->
            <div class="mt-6 text-center">
                <p class="text-xs text-gray-500">
                    © 2025 BingeAt Media. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</div>
