<?php

use Livewire\Volt\Component;
use App\Models\Testimonial;
use Livewire\Attributes\Title;

new class extends Component {
    #[Title('Testimonial Details')]
    public $testimonial;

    public function mount($id)
    {
        $this->testimonial = Testimonial::findOrFail($id);
    }
};
?>

<div>
    <div class="breadcrumbs mb-4 text-sm">
        <h1 class="text-2xl font-bold mb-2">
            Testimonial Details
        </h1>
        <ul>
            <li>
                <a href="{{ route('admin.index') }}" wire:navigate>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.testimonial.index') }}" wire:navigate>
                    All Testimonials
                </a>
            </li>
            <li>
                Testimonial Details
            </li>
        </ul>
    </div>
    <x-card class="mt-5" shadow>
        <div class="grid gap-8 lg:grid-cols-2">
            <div class="p-5 pt-0 rounded-lg card bg-base-100">
                <div class="grid gap-5">
                    <div class="rounded-lg card bg-base-100">
                        <div>
                            <div class="my-3">
                                <span class="mt-3 text-lg font-bold">Name - </span>
                                {{ $testimonial->name }}
                            </div>
                            {{-- <div class="my-3">
                                <span class="mt-3 text-lg font-bold">Role - </span>
                                {{ $testimonial->position }}
                            </div> --}}
                            <div class="my-3">
                                <span class="mt-3 text-lg font-bold">Review - </span>
                                {{ $testimonial->review }}
                            </div>
                            <div class="my-3">
                                <span class="mt-3 text-lg font-bold">Rating - </span>
                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                    <x-icon name="o-star" class="text-warning " />
                                @endfor
                            </div>
                            {{-- <div class="my-3">
                                <span class="mt-3 text-lg font-bold">Image - </span>
                                @if ($testimonial->image)
                                    <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}"
                                        class="w-32 h-32 mt-3 rounded-lg">
                                @else
                                    No image
                                @endif
                            </div> --}}
                            <div>
                                <span class="mt-3 text-lg font-bold">Date - </span>
                                {{ $testimonial->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</div>
