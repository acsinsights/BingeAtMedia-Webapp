<?php

use Livewire\Volt\Component;
use App\Models\Contact;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;
    #[Title('Contact Form Entry Details')]
    public Contact $contact;

    public bool $Delete = false;

    public function mount($id): void
    {
        $this->contact = Contact::findOrFail($id);
    }

    public function delete(): void
    {
        $this->contact->delete();
        $this->success('Contact Form Entry deleted.', redirectTo: route('admin.contact.index'));
    }
};
?>

<div>
    {{-- Header Section --}}
    <div class="flex justify-between items-start mb-6">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <x-button link="{{ route('admin.contact.index') }}" wire:navigate icon="o-arrow-left"
                    class="btn-ghost btn-sm">
                    Back
                </x-button>
            </div>
            <h1 class="text-3xl font-bold mb-2">Contact Form Entry Details</h1>
            <div class="flex items-center gap-2 text-sm text-base-content/70">
                <x-icon name="o-clock" class="w-4 h-4" />
                <span>Received {{ $contact->created_at->diffForHumans() }}</span>
                <span>•</span>
                <span>{{ $contact->created_at->format('M d, Y | h:i A') }}</span>
            </div>
        </div>
        <x-button label="Delete Entry" class="btn-error" wire:click="$set('Delete', true)" icon="o-trash" />
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        {{-- Left Column - Contact Information --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Contact Information Card --}}
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-base-300">
                        <div class="p-2 bg-primary/10 rounded-lg">
                            <x-icon name="o-user" class="w-5 h-5 text-primary" />
                        </div>
                        <h2 class="text-xl font-bold">Contact Information</h2>
                    </div>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2 text-sm text-base-content/60">
                                <x-icon name="o-user-circle" class="w-4 h-4" />
                                <span>Full Name</span>
                            </div>
                            <div class="text-base font-semibold">{{ $contact->name ?? 'N/A' }}</div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex items-center gap-2 text-sm text-base-content/60">
                                <x-icon name="o-envelope" class="w-4 h-4" />
                                <span>Email Address</span>
                            </div>
                            @if ($contact->email)
                                <a href="mailto:{{ $contact->email }}"
                                    class="text-base font-semibold text-primary hover:underline flex items-center gap-2">
                                    {{ $contact->email }}
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
                            @if ($contact->phone)
                                <a href="tel:{{ $contact->phone }}"
                                    class="text-base font-semibold text-primary hover:underline flex items-center gap-2">
                                    {{ $contact->phone }}
                                    <x-icon name="o-arrow-top-right-on-square" class="w-3.5 h-3.5" />
                                </a>
                            @else
                                <div class="text-base text-base-content/50">N/A</div>
                            @endif
                        </div>

                        @if ($contact->service)
                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-sm text-base-content/60">
                                    <x-icon name="o-briefcase" class="w-4 h-4" />
                                    <span>Service</span>
                                </div>
                                <div class="text-base font-semibold">{{ $contact->service }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Message Card --}}
            @if ($contact->message || $contact->subject)
                <div class="card bg-base-100 shadow">
                    <div class="card-body">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-base-300">
                            <div class="p-2 bg-primary/10 rounded-lg">
                                <x-icon name="o-chat-bubble-left-right" class="w-5 h-5 text-primary" />
                            </div>
                            <h2 class="text-xl font-bold">Message</h2>
                        </div>
                        <div class="space-y-4">
                            @if ($contact->subject)
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2 text-sm text-base-content/60 mb-2">
                                        <x-icon name="o-tag" class="w-4 h-4" />
                                        <span>Subject</span>
                                    </div>
                                    <div class="text-base font-semibold">{{ $contact->subject }}</div>
                                </div>
                            @endif

                            @if ($contact->message)
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2 text-sm text-base-content/60 mb-2">
                                        <x-icon name="o-document-text" class="w-4 h-4" />
                                        <span>Message</span>
                                    </div>
                                    <div class="text-base whitespace-pre-wrap bg-base-200 p-4 rounded-lg">{{ $contact->message }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Right Column - Form Details & Actions --}}
        <div class="space-y-6">
            {{-- Form Details Card --}}
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-base-300">
                        <div class="p-2 bg-primary/10 rounded-lg">
                            <x-icon name="o-information-circle" class="w-5 h-5 text-primary" />
                        </div>
                        <h2 class="text-xl font-bold">Form Details</h2>
                    </div>
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2 text-sm text-base-content/60">
                                <x-icon name="o-document-duplicate" class="w-4 h-4" />
                                <span>Form Type</span>
                            </div>
                            @if ($contact->form_type)
                                <span class="badge badge-primary badge-lg">{{ $contact->form_type }}</span>
                            @else
                                <div class="text-base text-base-content/50">N/A</div>
                            @endif
                        </div>

                        @if ($contact->source_url)
                            <div class="space-y-1">
                                <div class="flex items-center gap-2 text-sm text-base-content/60">
                                    <x-icon name="o-link" class="w-4 h-4" />
                                    <span>Source URL</span>
                                </div>
                                <a href="{{ $contact->source_url }}" target="_blank"
                                    class="text-base text-primary hover:underline break-all flex items-center gap-2">
                                    <span class="truncate">{{ $contact->source_url }}</span>
                                    <x-icon name="o-arrow-top-right-on-square" class="w-3.5 h-3.5 shrink-0" />
                                </a>
                            </div>
                        @endif

                        <div class="space-y-1 pt-2 border-t border-base-300">
                            <div class="flex items-center gap-2 text-sm text-base-content/60">
                                <x-icon name="o-calendar" class="w-4 h-4" />
                                <span>Submitted</span>
                            </div>
                            <div class="text-base font-semibold">
                                {{ $contact->created_at->format('F d, Y') }}
                            </div>
                            <div class="text-sm text-base-content/60">
                                {{ $contact->created_at->format('h:i:s A') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Actions Card --}}
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-primary/10 rounded-lg">
                            <x-icon name="o-bolt" class="w-5 h-5 text-primary" />
                        </div>
                        <h2 class="text-xl font-bold">Quick Actions</h2>
                    </div>
                    <div class="space-y-2">
                        @if ($contact->email)
                            <x-button link="mailto:{{ $contact->email }}" icon="o-envelope" class="btn-outline w-full">
                                Send Email
                            </x-button>
                        @endif
                        @if ($contact->phone)
                            <x-button link="tel:{{ $contact->phone }}"
                                icon="o-phone" class="btn-outline w-full">
                                Call Now
                            </x-button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <x-modal wire:model="Delete" class="backdrop-blur">
        <div class="p-6">
            <div class="flex items-center gap-4 mb-4">
                <div class="p-3 bg-error/10 rounded-full">
                    <x-icon name="o-exclamation-triangle" class="w-8 h-8 text-error" />
                </div>
                <div>
                    <h3 class="text-xl font-bold">Delete Contact Entry</h3>
                    <p class="text-base-content/70">This action cannot be undone.</p>
                </div>
            </div>
            <p class="text-base mb-4">
                Are you sure you want to delete this contact form entry for
                <strong>{{ $contact->name }}</strong>? This will permanently remove all associated data.
            </p>
        </div>
        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.Delete = false" class="btn-ghost" />
            <x-button label="Delete Entry" class="btn-error" wire:click="delete" spinner="delete" icon="o-trash" />
        </x-slot:actions>
    </x-modal>
</div>
