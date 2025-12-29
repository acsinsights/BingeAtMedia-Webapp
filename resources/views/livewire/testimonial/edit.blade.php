<?php
use Livewire\Volt\Component;
use Illuminate\View\View;
use App\Models\Testimonial;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

new class extends Component {
    use WithFileUploads, Toast;
    #[Title('Edit Testimonial')]
    public $testimonial_name;
    public $position;
    public $review;
    public $rating;
    public $is_published;
    public $image;
    public $config = ['aspectRatio' => 1];

    public bool $Delete = false;

    public $testimonial;
    public function mount($id)
    {
        $this->testimonial = Testimonial::findOrFail($id);
        $this->testimonial_name = $this->testimonial->name;
        $this->position = $this->testimonial->position;
        $this->review = $this->testimonial->review;
        $this->rating = $this->testimonial->rating;
        $this->is_published = $this->testimonial->is_published;
    }

    public function save()
    {
        $this->validate([
            'testimonial_name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'review' => 'required|string',
            'rating' => 'nullable|integer|min:0|max:5',
            'is_published' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $this->testimonial->name = $this->testimonial_name;
        $this->testimonial->position = $this->position;
        $this->testimonial->review = $this->review;
        $this->testimonial->rating = $this->rating;
        $this->testimonial->is_published = $this->is_published ?? false;

        if ($this->image) {
            if ($this->testimonial->image) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $this->testimonial->image));
            }

            $url = $this->image->store('testimonials', 'public');
            $this->testimonial->image = "/storage/$url";
        }

        $this->testimonial->save();
        $this->success('Testimonial updated.', redirectTo: route('admin.testimonial.index'));
    }
    public function delete()
    {
        if ($this->testimonial->image) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $this->testimonial->image));
        }
        $this->testimonial->delete();
        $this->success('Testimonial deleted.', redirectTo: route('admin.testimonial.index'));
    }
};
?>

@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
@endsection

<div>
    <div class="mb-4 text-sm breadcrumbs">
        <h1 class="mb-2 text-2xl font-bold">
            Edit Testimonial
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
                Edit Testimonial
            </li>
        </ul>
    </div>
    <hr class="mb-5">
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
        <x-form wire:submit="save">
            <x-input label="Name" wire:model="testimonial_name" />
            <x-input label="Position/Role" wire:model="position" placeholder="e.g., Founder at Company Name" />
            <x-textarea label="Review" wire:model="review" rows="4" />

            <div class="flex items-center space-x-3 gap-7">
                <div>
                    <label for="rating" class="font-semibold text-[0.875rem] mb-4">Rating</label>
                    <div class="flex items-center justify-start mt-2">
                        <button type="button" class="btn btn-sm btn-outline me-3"
                            wire:click="rating = 0">Clear</button>
                        <x-rating label="Rating" wire:model="rating" class="bg-warning" />
                    </div>
                </div>
                <div class="flex flex-col items-start justify-start gap-2">
                    <label for="is_published" class="font-semibold text-[0.875rem]">Visibility</label>
                    <x-toggle label="Publish" right wire:model="is_published" :checked="$is_published == 1" />
                </div>
            </div>

            <x-file label="Image (Optional)" wire:model="image" accept="image/png, image/jpeg, image/jpg"
                hint="Max 1MB">
                @if ($testimonial->image)
                    <div class="mt-2">
                        <img src="{{ $testimonial->image }}" class="h-40 rounded-lg" alt="Current Image">
                    </div>
                @endif
            </x-file>
            <x-slot:actions>
                <div class="flex justify-between w-full mb-5">
                    <x-button label="Delete" class="btn-error" @click="$wire.Delete = true" />
                    <x-button label="Update" class="btn-primary" type="submit" spinner="save" />
                </div>
            </x-slot:actions>
        </x-form>
    </div>

    <x-modal wire:model="Delete" class="backdrop-blur">
        <p class="text-lg">Are you sure you want to delete this testimonial?</p>
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.Delete = false" />
            <x-button label="Delete" class="btn-error" wire:click="delete" spinner="delete" />
        </x-slot:actions>
    </x-modal>
</div>
