<?php

use Livewire\Volt\Component;
use App\Models\EnquiryLead;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;
    #[Title('Enquiry Lead Details')]
    public EnquiryLead $enquiry;

    public bool $Delete = false;

    public function mount($id): void
    {
        $this->enquiry = EnquiryLead::findOrFail($id);
    }

    public function delete(): void
    {
        $this->enquiry->delete();
        $this->success('Enquiry Lead deleted.', redirectTo: route('admin.enquiry-leads.index'));
    }
};
?>

<div>
    {{-- Header Section --}}
    <div class="flex justify-between items-start mb-6">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <x-button link="{{ route('admin.enquiry-leads.index') }}" wire:navigate icon="o-arrow-left"
                    class="btn-ghost btn-sm">
                    Back
                </x-button>
            </div>
            <h1 class="text-3xl font-bold mb-2">Enquiry Lead Details</h1>
            <div class="flex items-center gap-2 text-sm text-base-content/70">
                <x-icon name="o-clock" class="w-4 h-4" />
                <span>Received {{ $enquiry->created_at->diffForHumans() }}</span>
                <span>•</span>
                <span>{{ $enquiry->created_at->format('M d, Y | h:i A') }}</span>
            </div>
        </div>
        <x-button label="Delete Entry" class="btn-error" wire:click="$set('Delete', true)" icon="o-trash" />
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Left Column - Contact Information --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Enquiry Details Card --}}
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-base-300">
                        <div class="p-2 bg-primary/10 rounded-lg">
                            <x-icon name="o-user" class="w-5 h-5 text-primary" />
                        </div>
                        <h2 class="text-xl font-bold">Enquiry Details</h2>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2 text-sm text-base-content/60">
                                <x-icon name="o-user-circle" class="w-4 h-4" />
                                <span>Full Name</span>
                            </div>
                            <div class="text-base font-semibold">{{ $enquiry->name ?? 'N/A' }}</div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center gap-2 text-sm text-base-content/60">
                                <x-icon name="o-envelope" class="w-4 h-4" />
                                <span>Email Address</span>
                            </div>
                            @if ($enquiry->email)
                                <a href="mailto:{{ $enquiry->email }}"
                                    class="text-base font-semibold text-primary hover:underline flex items-center gap-2">
                                    {{ $enquiry->email }}
                                    <x-icon name="o-arrow-top-right-on-square" class="w-3.5 h-3.5" />
                                </a>
                            @else
                                <div class="text-base text-base-content/50">N/A</div>
                            @endif
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center gap-2 text-sm text-base-content/60">
                                <x-icon name="o-phone" class="w-4 h-4" />
                                <span>Phone Number</span>
                            </div>
                            @if ($enquiry->phone)
                                <a href="tel:{{ $enquiry->phone }}"
                                    class="text-base font-semibold text-primary hover:underline flex items-center gap-2">
                                    {{ $enquiry->phone }}
                                    <x-icon name="o-arrow-top-right-on-square" class="w-3.5 h-3.5" />
                                </a>
                            @else
                                <div class="text-base text-base-content/50">N/A</div>
                            @endif
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center gap-2 text-sm text-base-content/60">
                                <x-icon name="o-briefcase" class="w-4 h-4" />
                                <span>Service</span>
                            </div>
                            <div class="text-base font-semibold">{{ $enquiry->source_page ?? 'N/A' }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Message Card --}}
            @if ($enquiry->message)
                <div class="card bg-base-100 shadow">
                    <div class="card-body">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-base-300">
                            <div class="p-2 bg-primary/10 rounded-lg">
                                <x-icon name="o-chat-bubble-left-right" class="w-5 h-5 text-primary" />
                            </div>
                            <h2 class="text-xl font-bold">Message</h2>
                        </div>
                        <div class="space-y-4">
                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-sm text-base-content/60 mb-2">
                                    <x-icon name="o-document-text" class="w-4 h-4" />
                                    <span>Message</span>
                                </div>
                                <div class="text-base whitespace-pre-wrap bg-base-200 p-4 rounded-lg">
                                    {{ $enquiry->message }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Right Column - Additional Information --}}
        <div class="space-y-6">
            {{-- Metadata Card --}}
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-base-300">
                        <div class="p-2 bg-primary/10 rounded-lg">
                            <x-icon name="o-information-circle" class="w-5 h-5 text-primary" />
                        </div>
                        <h2 class="text-xl font-bold">Additional Info</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2 text-sm text-base-content/60">
                                <x-icon name="o-document" class="w-4 h-4" />
                                <span>Source Page</span>
                            </div>
                            <div class="text-sm">{{ $enquiry->source_page ?? 'N/A' }}</div>
                        </div>

                        @if ($enquiry->source_url)
                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-sm text-base-content/60">
                                    <x-icon name="o-link" class="w-4 h-4" />
                                    <span>Source URL</span>
                                </div>
                                <a href="{{ $enquiry->source_url }}" target="_blank"
                                    class="text-sm text-primary hover:underline break-all flex items-start gap-1">
                                    {{ $enquiry->source_url }}
                                    <x-icon name="o-arrow-top-right-on-square"
                                        class="w-3.5 h-3.5 flex-shrink-0 mt-0.5" />
                                </a>
                            </div>
                        @endif

                        @if ($enquiry->country_code)
                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-sm text-base-content/60">
                                    <x-icon name="o-globe-alt" class="w-4 h-4" />
                                    <span>Country Code</span>
                                </div>
                                <div class="text-sm">{{ $enquiry->country_code }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Actions Card --}}
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-base-300">
                        <div class="p-2 bg-primary/10 rounded-lg">
                            <x-icon name="o-cog-6-tooth" class="w-5 h-5 text-primary" />
                        </div>
                        <h2 class="text-xl font-bold">Actions</h2>
                    </div>
                    <div class="space-y-3">
                        @if ($enquiry->email)
                            <a href="mailto:{{ $enquiry->email }}" class="btn btn-primary btn-block btn-sm gap-2">
                                <x-icon name="o-envelope" class="w-4 h-4" />
                                Send Email
                            </a>
                        @endif
                        @if ($enquiry->phone)
                            <a href="tel:{{ $enquiry->phone }}" class="btn btn-outline btn-block btn-sm gap-2">
                                <x-icon name="o-phone" class="w-4 h-4" />
                                Call Now
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <x-modal wire:model="Delete" title="Delete Enquiry Lead"
        subtitle="Are you sure you want to delete this enquiry lead?" separator>
        <div class="space-y-4">
            <div class="alert alert-warning">
                <x-icon name="o-exclamation-triangle" class="w-5 h-5" />
                <span>This action cannot be undone. The enquiry lead will be permanently deleted.</span>
            </div>

            <div class="bg-base-200 p-4 rounded-lg space-y-2">
                <p class="text-sm text-base-content/70">Lead Details:</p>
                <div class="space-y-1">
                    <p><strong>Name:</strong> {{ $enquiry->name }}</p>
                    <p><strong>Email:</strong> {{ $enquiry->email }}</p>
                    <p><strong>Phone:</strong> {{ $enquiry->phone }}</p>
                </div>
            </div>
        </div>

        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.Delete = false" />
            <x-button label="Delete" class="btn-error" wire:click="delete" />
        </x-slot:actions>
    </x-modal>
</div>
