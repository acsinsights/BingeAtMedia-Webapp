<?php
use Livewire\Volt\Component;
use Livewire\Attributes\{Layout};
use App\Models\Testimonial;
use Livewire\WithPagination;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;

new class extends Component {
    use WithPagination;
    #[Title('All Testimonials')]
    public $headers;
    #[Url]
    public string $search = '';

    public $sortBy = ['column' => 'name', 'direction' => 'asc'];
    // boot
    public function boot(): void
    {
        $this->headers = [['key' => 'id', 'label' => '#', 'class' => 'w-1'], ['key' => 'name', 'label' => 'Name'], ['key' => 'created_at', 'label' => 'Date']];
    }

    public function rendering(View $view): void
    {
        $view->testimonials = Testimonial::orderBy(...array_values($this->sortBy))
            ->where('name', 'like', "%$this->search%")
            ->paginate(20);
        $view->title('All Testimonials');
    }
};
?>

<div>
    <div class="flex justify-between items-start lg:items-center flex-col lg:flex-row mt-3 mb-5 gap-2">
        <div>
            <h1 class="text-2xl font-bold">
                All Testimonials
            </h1>
            <div class="breadcrumbs text-sm">
                <ul class="flex">
                    <li>
                        <a href="{{ route('admin.index') }}" wire:navigate>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        All Testimonials
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex gap-3">
            <x-input placeholder="Search ..." icon="o-magnifying-glass" wire:model.live.debounce="search" />
            <x-button label="Add Testimonial" icon="o-plus" class="btn-primary inline-flex" responsive
                link="{{ route('admin.testimonial.create') }}" />
        </div>
    </div>
    <hr class="mb-5">
    <x-table :headers="$headers" :rows="$testimonials" with-pagination :sort-by="$sortBy">
        @scope('cell_name', $testimonial)
            <span class="badge badge-xs {{ $testimonial->is_published === 1 ? 'badge-success' : 'badge-error' }}">
            </span>
            {{ $testimonial->name }}
        @endscope
        @scope('cell_image', $testimonial)
            @if ($testimonial->image)
                <div class="avatar select-none">
                    <div class="w-12 rounded-full">
                        <img src="{{ $testimonial->image }}" alt="{{ $testimonial->name }}" />
                    </div>
                </div>
            @else
                <div class="select-none avatar avatar-placeholder">
                    <div class="w-12 rounded-md bg-neutral text-neutral-content">
                        <span class="text-xl">{{ substr($testimonial->name, 0, 1) }}</span>
                    </div>
                </div>
            @endif
        @endscope
        @scope('cell_created_at', $testimonial)
            {{ $testimonial->created_at->format('d M Y') }}
        @endscope
        @scope('actions', $testimonial)
            <div class="flex">
                <x-button icon="o-eye" link="{{ route('admin.testimonial.show', $testimonial->id) }}" class="btn-xs" />
                <x-button icon="o-pencil" link="{{ route('admin.testimonial.edit', $testimonial->id) }}" class="btn-xs" />
            </div>
        @endscope
        <x-slot:empty>
            <x-empty icon="o-no-symbol" message="No Testimonial found" />
        </x-slot>
    </x-table>
</div>
