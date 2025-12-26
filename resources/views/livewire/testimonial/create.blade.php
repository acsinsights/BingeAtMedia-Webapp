<?php
use Livewire\Volt\Component;
use Illuminate\View\View;
use App\Models\Testimonial;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Mary\Traits\Toast;

new class extends Component {
    use WithFileUploads, Toast;
    #[Title('Add Testimonial')]
    public $testimonial_name;
    public $position;
    public $review;
    public $rating = 0;
    public $is_published;
    public $image;
    public $config = ['aspectRatio' => 1];
    public function save()
    {
        $this->validate([
            'testimonial_name' => 'required',
            // 'position' => 'nullable',
            'review' => 'required',
            'is_published' => 'nullable|boolean',
            'rating' => 'nullable',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ]);
        // Save the Testimonial
        $testimonial = new Testimonial();
        $testimonial->name = $this->testimonial_name;
        $testimonial->position = $this->position;
        $testimonial->review = $this->review;
        $testimonial->rating = $this->rating;
        $testimonial->is_published = $this->is_published ? 1 : 0;

        if ($this->image) {
            $url = $this->image->store('testimonials', 'public');
            $testimonial->image = "/storage/$url";
        }
        $testimonial->save();
        $this->success('Testimonial Created.', redirectTo: route('admin.testimonial.index'));
    }
};
?>

@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
@endsection

<div>
    <div class="breadcrumbs mb-4 text-sm">
        <h1 class="text-2xl font-bold mb-2">
            Add Testimonial
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
                Add Testimonial
            </li>
        </ul>
    </div>
    <hr class="mb-5">
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">
        <x-form wire:submit="save">
            <x-input label="Name" wire:model="testimonial_name" />
            {{-- <x-input label="Role" wire:model="position" /> --}}
            <x-textarea label="Review" wire:model="review" />
            <div class="flex items-center space-x-3 gap-7">
                <div>
                    <label for="rating" class="font-semibold text-[0.875rem] mb-4">Rating</label>
                    <div class="flex items-center justify-start mt-2">
                        <button type="button" class="btn btn-sm btn-outline me-3"
                            wire:click="rating = 0">Clear</button>
                        <x-rating label="Rating" wire:model="rating" class="bg-warning" />
                    </div>
                </div>
                <div class="flex items-start gap-2 justify-start flex-col">
                    <label for="is_publish" class="font-semibold text-[0.875rem]">Visibility</label>
                    <x-toggle label="Published" right wire:model="is_published" />
                </div>
            </div>

            {{-- <x-file label="Image" wire:model="image" accept="image" crop-after-change :crop-config="$config">
                <img id="imagePreview" src="https://placehold.co/300" class="h-40 rounded-lg" alt="Image Preview">
            </x-file> --}}
            <x-slot:actions>
                <x-button label="Submit" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>
    </div>

</div>
