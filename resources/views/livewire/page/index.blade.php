<?php

use Livewire\Volt\Component;
use App\Models\Page;
use Livewire\WithPagination;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Attributes\Title;

new class extends Component {
    use WithPagination;
    #[Title('All Pages')]
    public $headers;
    #[Url]
    public string $search = '';

    public $sortBy = ['column' => 'title', 'direction' => 'asc'];
    // boot
    public function boot(): void
    {
        $this->headers = [['key' => 'id', 'label' => '#', 'class' => 'w-1'], ['key' => 'title', 'label' => 'title'], ['key' => 'updated_at', 'label' => 'Last updated on']];
    }

    public function rendering(View $view): void
    {
        $view->pages = Page::orderBy(...array_values($this->sortBy))
            ->where('title', 'like', "%$this->search%")
            ->paginate(20);
        $view->title('All Pages');
    }
};
?>

<div>
    <div class="flex justify-between items-start lg:items-center flex-col lg:flex-row mt-3 mb-5 gap-2">
        <div>
            <h1 class="text-2xl font-bold mb-2">
                All Pages
            </h1>
            <div class="breadcrumbs text-sm">
                <ul class="flex">
                    <li>
                        <a href="{{ route('admin.index') }}" wire:navigate>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        All Pages
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="mb-5">
    <x-table :headers="$headers" :rows="$pages" with-pagination :sort-by="$sortBy">
        @scope('cell_updated_at', $page)
            {{ $page->updated_at->format('d M Y') }}
        @endscope
        @scope('actions', $page)
            <div class="flex">
                <x-button icon="o-pencil" link="{{ route('admin.page.edit', $page->id) }}" class="btn-xs" />
            </div>
        @endscope
    </x-table>
</div>
