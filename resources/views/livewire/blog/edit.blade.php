<?php
use Livewire\Volt\Component;
use Illuminate\View\View;
use App\Models\Blog;
use App\Models\Tag;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Mary\Traits\Toast;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

new class extends Component {
    use WithFileUploads, Toast;

    #[Title('Edit Blog')]
    public Blog $blog;
    public $blog_title;
    public $is_published;
    public $content;
    public $date;
    public $description;
    public $image;
    public $config = ['aspectRatio' => 708 / 465, 'min_width' => 708, 'max_width' => 708, 'min_height' => 465, 'max_height' => 465];
    public bool $Delete = false;
    public bool $newTagModal = false;
    public $newTag;
    public Collection $tags;
    public array $selected_tags = [];

    public function mount($id)
    {
        $this->blog = Blog::findOrfail($id);
        $this->blog_title = $this->blog->title;
        $this->content = $this->blog->content;
        $this->date = $this->blog->date;
        $this->is_published = $this->blog->is_published;
        $this->description = $this->blog->description;
        $this->tags = Tag::select('id', 'name')->get();
        $this->selected_tags = $this->blog->tags->pluck('id')->toArray();
    }

    public function rules()
    {
        return [
            'blog_title' => 'nullable',
            'description' => 'nullable',
            'date' => 'nullable',
            'content' => 'nullable',
            'is_published' => 'nullable|boolean',
            'image' => 'nullable|image|max:3024',
        ];
    }

    public function save(): void
    {
        $this->validate();

        $this->blog->title = $this->blog_title;
        $this->blog->slug = \Str::slug($this->blog_title);
        $this->blog->content = $this->content;
        $this->blog->date = $this->date;
        $this->blog->is_published = $this->is_published ?? false;
        $this->blog->description = $this->description;

        if ($this->image) {
            if ($this->blog->image) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $this->blog->image));
            }

            $url = $this->image->store('blog', 'public');
            $this->blog->image = "/storage/$url";
        }

        $this->blog->tags()->sync($this->selected_tags);
        $this->blog->save();
        $this->success('Blog updated.', redirectTo: route('admin.blog.index'));
    }
    public function delete()
    {
        if ($this->blog->image) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $this->blog->image));
        }
        $this->blog->delete();
        $this->success('Blog deleted.', redirectTo: route('admin.blog.index'));
    }
    public function saveTag()
    {
        $this->validate([
            'newTag' => 'required|string',
        ]);

        $tag = Tag::firstOrCreate([
            'name' => $this->newTag,
            'slug' => \Str::slug($this->newTag),
        ]);
        // check if the tag is already in the collection
        if (!$this->tags->contains($tag)) {
            $this->tags->push($tag);
            $this->selected_tags[] = $tag->id;
        }
        $this->newTag = '';
        $this->newTagModal = false;
    }
};
?>
@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
@endsection
<div>
    <div class="mb-4 text-sm breadcrumbs">
        <h1 class="mb-2 text-2xl font-bold">
            Edit Blog
        </h1>
        <ul>
            <li>
                <a href="{{ route('admin.index') }}" wire:navigate>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.blog.index') }}" wire:navigate>
                    All Blogs
                </a>
            </li>
            <li>
                Edit Blog
            </li>
        </ul>
    </div>
    <hr class="mb-5">
    <x-form wire:submit="save">
        <div class="grid gap-8 mt-5 lg:grid-cols-2">
            <div class="p-5 rounded-lg card bg-base-100">
                <div class="pb-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="text-2xl font-bold ">
                                Details
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3">
                </div>
                <div class="grid gap-5 lg:px-3">
                    <div class="flex justify-between gap-8">
                        <div class="w-full">
                            <x-input label="Title" wire:model="blog_title" />
                        </div>
                        <div class="flex items-start gap-2 justify-start w-[8rem] flex-col">
                            <label for="is_published" class="font-semibold text-[0.875rem]">Visibility</label>
                            <x-toggle hint="Publish now?" wire:model="is_published" :checked="$is_published == 1" />
                        </div>
                    </div>

                    <x-input label="Date" wire:model="date" type="date" />

                    <x-textarea label="Meta Description" wire:model="description"
                        hint="The meta description for the blog" />

                    <div x-data="{ closeDropdown() { setTimeout(() => { const dropdown = this.$el.querySelector('.choices__list--dropdown'); if (dropdown) dropdown.style.display = 'none'; }, 100); } }">
                        <x-choices-offline label="Tags" wire:model="selected_tags" :options="$tags" searchable
                            icon="o-rectangle-group" @change="closeDropdown()">
                            <x-slot:append>
                                <x-button label="New" class="btn-primary rounded-s-none"
                                    @click="$wire.newTagModal = true" />
                            </x-slot:append>
                        </x-choices-offline>
                    </div>
                </div>
            </div>
            <div class="grid content-start w-full h-full gap-8">
                <div class="w-full h-full p-5 rounded-lg card bg-base-100">
                    <x-file label="Cover Image (708x465)" wire:model="image" accept="image" crop-after-change
                        :crop-config="$config">
                        <div class="mb-4 overflow-hidden rounded-lg" style="max-width: 100%; aspect-ratio: 708/465;">
                            <img id="imagePreview" src="{{ $blog->image ?: 'https://placehold.co/708x465' }}"
                                class="w-full h-full object-cover" alt="Image Preview">
                        </div>
                    </x-file>
                </div>
            </div>
        </div>
        <div class="grid content-start gap-8 mt-5">
            <div class="p-5 rounded-lg card bg-base-100">
                @php
                    $config = [
                        'plugins' => 'autoresize code lists',
                        'toolbar' =>
                            'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | code',
                        'min_height' => 250,
                        'max_height' => 500,
                        'statusbar' => false,
                        'lists_indent_on_tab' => true,
                        'list_class_list' => json_encode([
                            ['title' => 'Default', 'value' => ''],
                            ['title' => 'Circle', 'value' => 'circle'],
                            ['title' => 'Square', 'value' => 'square'],
                            ['title' => 'Disc', 'value' => 'disc'],
                        ]),
                        'content_style' =>
                            'ul { list-style-type: disc; } ul.circle { list-style-type: circle; } ul.square { list-style-type: square; }',
                    ];
                @endphp
                <x-editor label="Content" wire:model="content" :config="$config" disk="s3" />
            </div>
        </div>
        <x-slot:actions>
            <div class="flex justify-between w-full mb-5">
                <x-button label="Delete" class="btn-error" @click="$wire.Delete = true" />
                <x-button label="Update" class="btn-primary" type="submit" spinner="save" />
            </div>
        </x-slot:actions>
    </x-form>
    <x-modal wire:model="newTagModal" class="backdrop-blur">
        <x-slot:header>
            <h2 class="text-lg font-bold">New Tag</h2>
        </x-slot:header>
        <x-input label="Tag Name" wire:model="newTag" />
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.newTagModal = false" />
            <x-button label="Save" class="btn-primary" wire:click="saveTag" spinner="saveTag" />
        </x-slot:actions>
    </x-modal>
    <x-modal wire:model="Delete" class="backdrop-blur">
        <p class="text-lg">Are you sure you want to delete this blog?</p>
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.Delete = false" />
            <x-button label="Delete" class="btn-error" wire:click="delete" spinner="delete" />
        </x-slot:actions>
    </x-modal>
</div>
