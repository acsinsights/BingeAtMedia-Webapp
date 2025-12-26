<?php

use Livewire\Volt\Component;
use App\Models\User;
use Mary\Traits\Toast;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    use WithFileUploads, Toast;

    #[Title('Edit Profile')]
    #[Url]
    public $name;
    public $email;
    public $phone_no;
    public $password;
    public $image;
    public $user;
    public $config = ['aspectRatio' => 1];

    public function mount()
    {
        $this->user = User::findOrFail(auth()->id());
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone_no = $this->user->phone_no;
    }

    public function save(): void
    {
        $this->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'phone_no' => 'nullable',
            'password' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->phone_no = $this->phone_no;

        if ($this->password) {
            $this->user->password = \Hash::make($this->password);
        }

        if ($this->image) {
            if ($this->user->image) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $this->user->image));
            }

            $url = $this->image->store('users', 'public');
            $this->user->image = "/storage/$url";
        }

        $this->user->save();
        $this->success('Profile updated.', redirectTo: route('admin.profile'));
    }

    public function delete()
    {
        if ($this->user->image) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $this->user->image));
        }
        $this->user->delete();
        $this->success('Profile deleted.', redirectTo: route('admin.profile'));
    }
};
?>

@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
@endsection

<div>
    <div class="mb-6 text-sm breadcrumbs">
        <h1 class="mb-2 text-3xl font-bold text-base-content">
            Edit Profile
        </h1>
        <ul>
            <li>
                <a href="{{ route('admin.index') }}" wire:navigate>
                    Dashboard
                </a>
            </li>
            <li>
                Edit Profile
            </li>
        </ul>
    </div>
    <hr class="mb-6 border-base-300">

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Avatar Section --}}
        <div class="lg:col-span-1">
            <div class="card bg-base-100 shadow-lg border border-base-300">
                <div class="card-body">
                    <h2 class="card-title text-lg font-semibold mb-4">
                        <x-icon name="o-photo" class="w-5 h-5" />
                        Profile Picture
                    </h2>
                    <div class="flex flex-col items-center justify-center p-4">
                        <div class="relative mb-4">
                            <div class="avatar">
                                <div
                                    class="w-32 h-32 rounded-full ring ring-primary ring-offset-2 ring-offset-base-100">
                                    <img id="imagePreview"
                                        src="{{ $user->image ? asset($user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=128&background=random' }}"
                                        alt="Avatar" class="rounded-full object-cover w-full h-full">
                                </div>
                            </div>
                            @if ($user->image)
                                <div class="absolute bottom-0 right-0 p-1 bg-primary rounded-full">
                                    <x-icon name="o-check-circle" class="w-5 h-5 text-primary-content" />
                                </div>
                            @endif
                        </div>
                        <x-file wire:model="image" accept="image" crop-after-change :crop-config="$config" class="w-full">
                            <x-button label="Change Photo" icon="o-camera" class="btn-outline btn-sm" />
                        </x-file>
                        <p class="mt-2 text-xs text-base-content/60 text-center">
                            JPG, PNG or JPEG. Max size 1MB
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Section --}}
        <div class="lg:col-span-2">
            <div class="card bg-base-100 shadow-lg border border-base-300">
                <div class="card-body">
                    <h2 class="card-title text-lg font-semibold mb-6">
                        <x-icon name="o-user-circle" class="w-5 h-5" />
                        Personal Information
                    </h2>
                    <x-form wire:submit="save">
                        <div class="space-y-4">
                            <x-input label="Full Name" icon="o-user" wire:model="name"
                                placeholder="Enter your full name" class="input-bordered" />

                            <x-input label="Email Address" icon="o-envelope" wire:model="email" type="email"
                                placeholder="Enter your email address" class="input-bordered" />

                            <x-input label="Phone Number" icon="o-phone" wire:model="phone_no"
                                placeholder="Enter your phone number" class="input-bordered" />

                            <div class="divider my-6">
                                <span class="text-sm text-base-content/60">Change Password</span>
                            </div>

                            <x-password label="New Password" icon="o-lock-closed" wire:model="password" right
                                placeholder="Leave empty to keep current password" class="input-bordered" />

                            <div class="alert alert-info mt-4">
                                <x-icon name="o-information-circle" class="w-5 h-5" />
                                <span class="text-sm">Leave password field empty if you don't want to change it.</span>
                            </div>
                        </div>

                        <x-slot:actions>
                            <div class="flex justify-end gap-3 w-full pt-4 border-t border-base-300">
                                <a href="{{ route('admin.index') }}" wire:navigate>
                                    <x-button label="Cancel" class="btn-ghost" />
                                </a>
                                <x-button label="Update Profile" class="btn-primary" type="submit" spinner="save"
                                    icon="o-check-circle" />
                            </div>
                        </x-slot:actions>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</div>
