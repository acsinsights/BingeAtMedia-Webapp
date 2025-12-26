<?php

use Livewire\Volt\Component;
use App\Models\Page;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;
    #[Title('Edit Page')]
    public $title;
    public $meta_description;
    public $content;

    public $page;
    public function mount($id)
    {
        $this->page = Page::findOrFail($id);
        $this->title = $this->page->title;
        $this->meta_description = $this->page->meta_description;
        $this->content = $this->page->content;
    }

    public function save()
    {
        $this->validate([
            'meta_description' => 'required',
            'content' => 'required',
        ]);

        $this->page->title = $this->title;
        $this->page->meta_description = $this->meta_description;
        $this->page->content = $this->content;
        $this->page->save();
        $this->success('Page updated successfully', redirectTo: route('admin.page.index'));
    }
};
?>
@section('cdn')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
<div>
    <div class="breadcrumbs mb-4 text-sm">
        <h1 class="text-2xl font-bold mb-2">
            Edit {{ $title }}
        </h1>
        <ul>
            <li>
                <a href="{{ route('admin.index') }}" wire:navigate>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.page.index') }}" wire:navigate>
                    All Pages
                </a>
            </li>
            <li>
                Edit {{ $title }}
            </li>
        </ul>
    </div>
    <hr class="my-5">
    <x-form wire:submit="save">
        <x-input wire:model="title" label="Title" readonly />
        <x-textarea wire:model="meta_description" label="Meta Description" />
        <div class="grid mt-5 content-start gap-8">
            <div class="card bg-base-100 rounded-lg p-5">
                @php
                    $config = [
                        'plugins' => 'autoresize',
                        'min_height' => 250,
                        'max_height' => 700,
                        'statusbar' => false,
                    ];
                @endphp
                <x-editor label="Content" wire:model="content" :config="$config" disk="s3" />
            </div>
        </div>
        <x-slot:actions>
            <div class="w-full flex justify-end mb-5">
                <x-button label="Update" class="btn-primary" type="submit" spinner="save" />
            </div>
        </x-slot:actions>
    </x-form>
</div>
