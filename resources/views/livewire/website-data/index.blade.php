<?php

use Livewire\Volt\Component;
use App\Models\WebsiteData;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    #[Title('Website Settings')]
    public $websiteData = [];
    public $headers;
    public $editData = [
        'slug' => '',
        'name' => '',
        'value' => '',
        'type' => '',
    ];
    public $showModal = false;

    public function boot(): void
    {
        $this->websiteData = WebsiteData::all()->keyBy('slug')->toArray();
        $this->headers = [['key' => 'id', 'label' => '#', 'class' => 'w-1'], ['key' => 'name', 'label' => 'Name', 'class' => 'w-56'], ['key' => 'value', 'label' => 'Value']];
    }

    public function save()
    {
        foreach ($this->websiteData as $slug => $data) {
            $rules = "websiteData.$slug.value";
            if ($data['type'] === 'email') {
                $this->validate([$rules => 'nullable|email']);
            } elseif ($data['type'] === 'url') {
                $this->validate([$rules => 'nullable|url']);
            }
            WebsiteData::updateOrCreate(['slug' => $slug], ['name' => $data['name'], 'value' => $data['value'], 'type' => $data['type']]);
        }
    }

    public function edit($slug)
    {
        $this->resetValidation(); // Clear previous validation errors
        $data = $this->websiteData[$slug];
        $this->editData = [
            'slug' => $slug,
            'name' => $data['name'],
            'value' => $data['value'],
            'type' => $data['type'],
        ];
        $this->showModal = true;
    }

    public function update()
    {
        $slug = $this->editData['slug'];
        $rules = ['editData.value' => 'nullable'];

        if ($this->editData['type'] === 'email') {
            $rules['editData.value'] = 'nullable|email';
        } elseif ($this->editData['type'] === 'url') {
            $rules['editData.value'] = 'nullable|url';
        } elseif (in_array($this->editData['slug'], ['meta-pixel-code', 'google-analytics-code'])) {
            $rules['editData.value'] = ['nullable', 'regex:/^\s*(?:<!--\s*[^>]*\s*-->\s*)?<script[^>]*>(.*?)<\/script>(?:\s*<!--\s*[^>]*\s*-->)?$/s'];
        }

        $messages = [
            'editData.value.required' => 'Field is required.',
            'editData.value.email' => 'Invalid email address.',
            'editData.value.url' => 'Invalid URL.',
            'editData.value.regex' => 'Invalid script code format.',
        ];

        $this->validate($rules, $messages);

        $this->websiteData[$slug]['value'] = $this->editData['value'];
        $this->save();
        $this->showModal = false;

        cache()->forget('website_settings');
        $this->success('Website settings updated.');
    }
};
?>

<div>
    <div class="breadcrumbs text-sm">
        <h1 class="text-2xl font-bold mb-2">
            Website Settings
        </h1>
        <ul>
            <li><a href="{{ route('admin.index') }}" wire:navigate>Dashboard</a></li>
            <li>Website Settings</li>
        </ul>
    </div>
    <hr class="mb-5 mt-5">
    <x-table :headers="$headers" :rows="$websiteData">
        @scope('cell_value', $data)
            <p class="truncate w-56">{{ $data['value'] }}</p>
        @endscope
        @scope('actions', $data)
            <x-button icon="o-pencil" @click="$wire.edit('{{ $data['slug'] }}')" class="btn-xs" />
        @endscope
    </x-table>

    @if ($showModal)
        <x-modal wire:model="showModal" class="backdrop-blur">
            <x-form wire:submit.prevent="update">
                <x-input label="Name" wire:model="editData.name" readonly />

                @if($editData['type'] === 'textarea')
                <x-textarea label="Value" wire:model="editData.value" rows="10" />
                @elseif($editData['type'] === 'email')
                    <x-input type="email" label="Value" wire:model="editData.value" />
                @elseif($editData['type'] === 'url')
                    <x-input type="url" label="Value" wire:model="editData.value" />
                @else
                    <x-input label="Value" wire:model="editData.value" />
                @endif
                <x-slot:actions>
                    <x-button label="Cancel" @click="$wire.set('showModal', false)" />
                    <x-button label="Submit" class="btn-primary" type="submit" spinner="save" />
                </x-slot:actions>
            </x-form>
        </x-modal>
    @endif
</div>
