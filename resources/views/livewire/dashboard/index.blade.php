<?php

use Mary\Traits\Toast;
use Livewire\WithPagination;
use Livewire\Volt\Component;
use Livewire\Attributes\{Layout, Title};
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\View\View;

new class extends Component {
    use Toast, WithPagination;

    #[Title('Dashboard')]
    public function rendering(View $view): void
    {
        $now = now();
        $startOfWeek = $now->copy()->startOfWeek();
        $endOfWeek = $now->copy()->endOfWeek();

        $view->stats = [
            'blogs' => Blog::count(),
            'published_blogs' => Blog::published()->count(),
            'unpublished_blogs' => Blog::where('is_published', false)->count(),
            'recent_blogs' => Blog::latest()->take(5)->get(),
            'contacts' => Contact::count(),
            'contacts_today' => Contact::whereDate('created_at', $now->toDateString())->count(),
            'contacts_this_week' => Contact::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count(),
            'contacts_this_month' => Contact::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->count(),
            'recent_contacts' => Contact::latest()->take(5)->get(),
            'testimonials' => Testimonial::count(),
            'published_testimonials' => Testimonial::published()->count(),
            'unpublished_testimonials' => Testimonial::where('is_published', false)->count(),
        ];
    }
}; ?>
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold mb-2">Dashboard</h1>
        <p class="text-base-content/70">Welcome back! Here's what's happening with your website.</p>
    </div>

    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 lg:grid-cols-4">
        {{-- Contacts Card --}}
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <div class="text-sm text-base-content/70 mb-1">Total Entries</div>
                        <div class="text-3xl font-bold">{{ $stats['contacts'] }}</div>
                    </div>
                    <div class="p-3 bg-base-200 rounded-lg">
                        <x-icon name="o-envelope" class="w-8 h-8 text-primary" />
                    </div>
                </div>
                <div class="space-y-1 mb-2">
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-base-content/60">Today:</span>
                        <span class="font-semibold">{{ $stats['contacts_today'] }}</span>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-base-content/60">This Week:</span>
                        <span class="font-semibold">{{ $stats['contacts_this_week'] }}</span>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-base-content/60">This Month:</span>
                        <span class="font-semibold">{{ $stats['contacts_this_month'] }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="badge badge-sm badge-info">All Time</span>
                    <x-button link="{{ route('admin.contact.index') }}" wire:navigate icon="o-arrow-right"
                        class="btn-ghost btn-sm">
                        View
                    </x-button>
                </div>
            </div>
        </div>
        {{-- Blogs Card --}}
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <div class="text-sm text-base-content/70 mb-1">Total Blogs</div>
                        <div class="text-3xl font-bold">{{ $stats['blogs'] }}</div>
                    </div>
                    <div class="p-3 bg-base-200 rounded-lg">
                        <x-icon name="o-newspaper" class="w-8 h-8 text-primary" />
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="badge badge-sm badge-success">{{ $stats['published_blogs'] }} Published</span>
                        @if ($stats['unpublished_blogs'] > 0)
                            <span class="badge badge-sm badge-warning">{{ $stats['unpublished_blogs'] }} Draft</span>
                        @endif
                    </div>
                    <x-button link="{{ route('admin.blog.index') }}" wire:navigate icon="o-arrow-right"
                        class="btn-ghost btn-sm">
                        View
                    </x-button>
                </div>
            </div>
        </div>

        {{-- Testimonials Card --}}
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <div class="text-sm text-base-content/70 mb-1">Total Testimonials</div>
                        <div class="text-3xl font-bold">{{ $stats['testimonials'] }}</div>
                    </div>
                    <div class="p-3 bg-base-200 rounded-lg">
                        <x-icon name="o-star" class="w-8 h-8 text-primary" />
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="badge badge-sm badge-success">{{ $stats['published_testimonials'] }}
                            Published</span>
                        @if ($stats['unpublished_testimonials'] > 0)
                            <span class="badge badge-sm badge-warning">{{ $stats['unpublished_testimonials'] }}
                                Draft</span>
                        @endif
                    </div>
                    <x-button link="{{ route('admin.testimonial.index') }}" wire:navigate icon="o-arrow-right"
                        class="btn-ghost btn-sm">
                        View
                    </x-button>
                </div>
            </div>
        </div>
    </div>

    {{-- Activity Summary Section --}}
    <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">
        {{-- Recent Contacts --}}
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-base-300">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-primary/10 rounded-lg">
                            <x-icon name="o-envelope" class="w-5 h-5 text-primary" />
                        </div>
                        <h2 class="text-xl font-bold">Recent Form Entries</h2>
                    </div>
                    <x-button link="{{ route('admin.contact.index') }}" wire:navigate class="btn-ghost btn-sm">
                        View All
                        <x-icon name="o-arrow-right" class="w-4 h-4" />
                    </x-button>
                </div>
                @if ($stats['recent_contacts']->count() > 0)
                    <div class="space-y-2">
                        @foreach ($stats['recent_contacts'] as $contact)
                            <a href="{{ route('admin.contact.show', $contact->id) }}" wire:navigate
                                class="flex items-start gap-4 p-4 rounded-lg border border-base-300 hover:border-primary/50 hover:bg-base-200 transition-all cursor-pointer group">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-2 mb-1">
                                        <div
                                            class="font-semibold text-base truncate group-hover:text-primary transition-colors">
                                            {{ $contact->name ?? 'N/A' }}
                                        </div>
                                        <x-icon name="o-chevron-right"
                                            class="w-4 h-4 text-base-content/30 group-hover:text-primary transition-colors shrink-0" />
                                    </div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <x-icon name="o-envelope" class="w-3.5 h-3.5 text-base-content/50" />
                                        <span
                                            class="text-sm text-base-content/70 truncate">{{ $contact->email ?? 'N/A' }}</span>
                                    </div>
                                    @if ($contact->subject)
                                        <div class="flex items-center gap-2 mb-2">
                                            <x-icon name="o-chat-bubble-left-right"
                                                class="w-3.5 h-3.5 text-base-content/50" />
                                            <span
                                                class="text-xs text-base-content/60 truncate">{{ $contact->subject }}</span>
                                        </div>
                                    @endif
                                    <div class="flex items-center gap-2">
                                        <x-icon name="o-clock" class="w-3.5 h-3.5 text-base-content/40" />
                                        <span
                                            class="text-xs text-base-content/50">{{ $contact->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <x-empty icon="o-envelope" message="No contacts yet" />
                @endif
            </div>
        </div>

        {{-- Recent Blog Posts --}}
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex items-center justify-between mb-6 pb-4 border-b border-base-300">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-primary/10 rounded-lg">
                            <x-icon name="o-newspaper" class="w-5 h-5 text-primary" />
                        </div>
                        <h2 class="text-xl font-bold">Recent Blog Posts</h2>
                    </div>
                    <x-button link="{{ route('admin.blog.index') }}" wire:navigate class="btn-ghost btn-sm">
                        View All
                        <x-icon name="o-arrow-right" class="w-4 h-4" />
                    </x-button>
                </div>
                @if ($stats['recent_blogs']->count() > 0)
                    <div class="space-y-2">
                        @foreach ($stats['recent_blogs'] as $blog)
                            <a href="{{ route('admin.blog.edit', $blog->id) }}" wire:navigate
                                class="flex items-start gap-4 p-4 rounded-lg border border-base-300 hover:border-primary/50 hover:bg-base-200 transition-all cursor-pointer group">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-2 mb-1">
                                        <div
                                            class="font-semibold text-base truncate group-hover:text-primary transition-colors">
                                            {{ $blog->title ?? 'Untitled' }}
                                        </div>
                                        <x-icon name="o-chevron-right"
                                            class="w-4 h-4 text-base-content/30 group-hover:text-primary transition-colors shrink-0" />
                                    </div>
                                    <div class="flex items-center gap-2 mb-2">
                                        @if ($blog->is_published)
                                            <span class="badge badge-sm badge-success">Published</span>
                                        @else
                                            <span class="badge badge-sm badge-warning">Draft</span>
                                        @endif
                                        @if ($blog->date)
                                            <span
                                                class="text-xs text-base-content/60">{{ \Carbon\Carbon::parse($blog->date)->format('M d, Y') }}</span>
                                        @endif
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <x-icon name="o-clock" class="w-3.5 h-3.5 text-base-content/40" />
                                        <span
                                            class="text-xs text-base-content/50">{{ $blog->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <x-empty icon="o-newspaper" message="No blog posts yet" />
                @endif
            </div>
        </div>
    </div>

    {{-- Activity Summary Card --}}
    @if ($stats['contacts_today'] > 0 || $stats['unpublished_blogs'] > 0 || $stats['unpublished_testimonials'] > 0)
        <div class="card bg-base-100 shadow mb-6">
            <div class="card-body">
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2 bg-primary/10 rounded-lg">
                        <x-icon name="o-chart-bar" class="w-5 h-5 text-primary" />
                    </div>
                    <h2 class="text-xl font-bold">Activity Summary</h2>
                </div>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    @if ($stats['contacts_today'] > 0)
                        <div class="p-4 rounded-lg bg-info/10 border border-info/20">
                            <div class="flex items-center gap-2 mb-2">
                                <x-icon name="o-envelope" class="w-4 h-4 text-info" />
                                <span class="text-sm font-semibold text-info">New Entries Today</span>
                            </div>
                            <div class="text-2xl font-bold text-info">{{ $stats['contacts_today'] }}</div>
                        </div>
                    @endif
                    @if ($stats['unpublished_blogs'] > 0)
                        <div class="p-4 rounded-lg bg-warning/10 border border-warning/20">
                            <div class="flex items-center gap-2 mb-2">
                                <x-icon name="o-newspaper" class="w-4 h-4 text-warning" />
                                <span class="text-sm font-semibold text-warning">Draft Blogs</span>
                            </div>
                            <div class="text-2xl font-bold text-warning">{{ $stats['unpublished_blogs'] }}</div>
                            <x-button link="{{ route('admin.blog.index') }}" wire:navigate
                                class="btn-ghost btn-xs mt-2">
                                Review
                            </x-button>
                        </div>
                    @endif
                    @if ($stats['unpublished_testimonials'] > 0)
                        <div class="p-4 rounded-lg bg-warning/10 border border-warning/20">
                            <div class="flex items-center gap-2 mb-2">
                                <x-icon name="o-star" class="w-4 h-4 text-warning" />
                                <span class="text-sm font-semibold text-warning">Draft Testimonials</span>
                            </div>
                            <div class="text-2xl font-bold text-warning">{{ $stats['unpublished_testimonials'] }}
                            </div>
                            <x-button link="{{ route('admin.testimonial.index') }}" wire:navigate
                                class="btn-ghost btn-xs mt-2">
                                Review
                            </x-button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    {{-- Quick Actions --}}
    <div class="card bg-base-100 shadow">
        <div class="card-body">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2 bg-primary/10 rounded-lg">
                    <x-icon name="o-bolt" class="w-5 h-5 text-primary" />
                </div>
                <h2 class="text-xl font-bold">Quick Actions</h2>
            </div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                <x-button link="{{ route('admin.testimonial.create') }}" wire:navigate icon="o-plus"
                    class="btn-outline">
                    Add Testimonial
                </x-button>
                <x-button link="{{ route('admin.page-meta.index') }}" wire:navigate icon="o-document-text"
                    class="btn-outline">
                    Page Meta
                </x-button>
                <x-button link="{{ route('admin.website-data') }}" wire:navigate icon="o-cog" class="btn-outline">
                    Website Settings
                </x-button>
                <x-button link="{{ route('admin.profile') }}" wire:navigate icon="o-user" class="btn-outline">
                    Edit Profile
                </x-button>
            </div>
        </div>
    </div>
</div>
