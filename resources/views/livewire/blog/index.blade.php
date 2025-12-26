<?php
use Livewire\Volt\Component;
use App\Models\Blog;
use Illuminate\View\View;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

new class extends Component {
    use Toast, WithPagination, WithFileUploads;
    #[Title('All Blogs')]
    public $headers;
    #[Url]
    public bool $createBlog = false;
    public string $search = '';
    public $blog_title;
    public $sortBy = ['column' => 'title', 'direction' => 'asc'];
    // boot
    public function boot(): void
    {
        $this->headers = [['key' => 'id', 'label' => '#', 'class' => 'w-1'], ['key' => 'image', 'label' => 'Image', 'class' => 'w-1'], ['key' => 'title', 'label' => 'Title']];
    }

    public function save()
    {
        $this->validate([
            'blog_title' => 'required',
        ]);
        $blog = new Blog();
        $blog->title = $this->blog_title;
        $blog->slug = \Str::slug($this->blog_title);
        $i = 1;
        while (Blog::where('slug', $blog->slug)->exists()) {
            $blog->slug = $blog->slug . '-' . $i++;
        }
        $blog->save();
        $this->success('Blog created.', redirectTo: route('admin.blog.edit', $blog->id));
    }

    public function rendering(View $view): void
    {
        $view->blogs = Blog::orderBy(...array_values($this->sortBy))
            ->where('title', 'like', "%$this->search%")
            ->latest()
            ->paginate(20);
    }
};
?>

<div>
    <div class="flex justify-between items-start lg:items-center flex-col lg:flex-row mt-3 mb-5 gap-2">
        <div>
            <h1 class="text-2xl font-bold">
                All Blogs
            </h1>
            <div class="breadcrumbs text-sm">
                <ul class="flex">
                    <li>
                        <a href="{{ route('admin.index') }}" wire:navigate>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        All Blogs
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex gap-3">
            <x-input placeholder="Search ..." icon="o-magnifying-glass" wire:model.live.debounce="search" />
            <x-button label="Create Blog" icon="o-plus" class="btn-primary inline-flex"
                @click="$wire.createBlog = true" />
            <x-modal wire:model="createBlog" class="backdrop-blur">
                <x-form wire:submit="save">
                    <x-input label="Title" placeholder="Enter blog title here" wire:model="blog_title" />
                    <x-slot:actions>
                        <x-button label="Cancel" @click="$wire.createBlog = false" />
                        <x-button label="Submit" class="btn-primary" type="submit" spinner="save" />
                    </x-slot:actions>
                </x-form>
            </x-modal>
        </div>
    </div>
    <hr class="mb-5">
    <x-table :headers="$headers" :rows="$blogs" with-pagination :sort-by="$sortBy">
        @scope('cell_title', $blog)
            <span class="badge badge-xs {{ $blog->is_published === 1 ? 'badge-success' : 'badge-error' }}">
            </span>
            {{ $blog->title }}
        @endscope
        @scope('cell_image', $blog)
            @if ($blog->image)
                <div class="avatar select-none">
                    <div class="w-8 rounded-md">
                        <img src="{{ $blog->image }}" alt="{{ $blog->title }}" />
                    </div>
                </div>
            @else
                <div class="select-none avatar avatar-placeholder">
                    <div class="w-10 rounded-md bg-neutral text-neutral-content">
                        <span class="text-lg">{{ substr($blog->title, 0, 1) }}</span>
                    </div>
                </div>
            @endif
        @endscope
        @scope('actions', $blog)
            <div class="flex">
                <x-button icon="o-pencil" link="{{ route('admin.blog.edit', $blog->id) }}" class="btn-xs" />
            </div>
        @endscope
        <x-slot:empty>
            <x-empty icon="o-no-symbol" message="No blogs found" />
        </x-slot>
    </x-table>
</div>
