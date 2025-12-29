<?php

use Livewire\Volt\Component;
use App\Models\EnquiryLead;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\StreamedResponse;

new class extends Component {
    use Toast, WithPagination;
    #[Title(content: 'Enquiry Leads')]
    public $headers;
    public $sortBy = ['column' => 'created_at', 'direction' => 'desc'];
    public string $search = '';
    public $startDate;
    public $endDate;
    public bool $exportDrawer = false;

    public function boot(): void
    {
        $this->headers = [['key' => 'id', 'label' => '#', 'class' => 'w-1'], ['key' => 'name', 'label' => 'Name'], ['key' => 'email', 'label' => 'Email'], ['key' => 'phone', 'label' => 'Phone'], ['key' => 'created_at', 'label' => 'Date']];
    }

    public function rendering(View $view): void
    {
        $view->enquiries = EnquiryLead::orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->where('name', 'like', "%$this->search%")
            ->when($this->startDate, fn($query) => $query->whereDate('created_at', '>=', $this->startDate))
            ->when($this->endDate, fn($query) => $query->whereDate('created_at', '<=', $this->endDate))
            ->latest()
            ->paginate(10);
    }
    public function filter()
    {
        $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);
        $this->enquiries = EnquiryLead::orderBy($this->sortBy['column'], $this->sortBy['direction'])
            ->where('name', 'like', "%$this->search%")
            ->when($this->startDate, fn($query) => $query->whereDate('created_at', '>=', $this->startDate))
            ->when($this->endDate, fn($query) => $query->whereDate('created_at', '<=', $this->endDate))
            ->get();
        // clear the search
        $this->search = '';
        $this->exportDrawer = false;
    }

    public function export()
    {
        $this->filter();

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=enquiry-leads.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $columns = ['Name', 'Phone', 'Email', 'Source Page', 'Source URL', 'Message', 'Date'];

        $callback = function () use ($columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($this->enquiries as $enquiry) {
                fputcsv($file, [$enquiry->name, $enquiry->phone, $enquiry->email, $enquiry->source_page, $enquiry->source_url, $enquiry->message, $enquiry->created_at->format('d M Y')]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
};

?>
@section('cdn')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection
<div>
    <div class="flex justify-between items-start lg:items-center flex-col lg:flex-row mt-3 mb-5 gap-2">
        <div>
            <h1 class="text-2xl font-bold">
                Enquiry Leads
            </h1>
            <div class="breadcrumbs text-sm">
                <ul class="flex">
                    <li>
                        <a href="{{ route('admin.index') }}" wire:navigate>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        Enquiry Leads
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex justify-end items-end gap-3">
            <x-input placeholder="Search ..." icon="o-magnifying-glass" wire:model.live.debounce="search" />
            <x-button label="Filter" @click="$wire.exportDrawer = true" icon="o-funnel" class="btn btn-primary" />
        </div>
    </div>

    <x-drawer wire:model="exportDrawer" title="Export Enquiry Leads" separator with-close-button close-on-escape
        class="w-11/12 lg:w-1/3" right>
        <div class="flex flex-col gap-3">
            <x-datepicker label="Start Date" icon="o-calendar" wire:model="startDate" />
            <x-datepicker label="End Date" icon="o-calendar" wire:model="endDate" />
        </div>
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.exportDrawer = false" />
            <x-button label="Filter" wire:click="filter" class="btn-primary" icon="o-funnel" />
            <x-button label="Export" wire:click="export" class="btn-primary" icon="o-arrow-down-tray" />
        </x-slot:actions>
    </x-drawer>

    <hr class="mb-5">
    <x-table :headers="$headers" :rows="$enquiries" with-pagination :sort-by="$sortBy">

        @scope('cell_created_at', $enquiry)
            {{ $enquiry->created_at->format('d M Y') }}
        @endscope

        @scope('actions', $enquiry)
            <div class="flex">
                <x-button icon="o-eye" link="{{ route('admin.enquiry-leads.show', $enquiry->id) }}" />
            </div>
        @endscope
        <x-slot:empty>
            <x-empty icon="o-no-symbol" message="No enquiry leads found." />
        </x-slot>
    </x-table>
</div>
