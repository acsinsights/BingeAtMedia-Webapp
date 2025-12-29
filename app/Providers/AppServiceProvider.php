<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\MetaTagsService;
use App\Models\WebsiteData;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share meta tags and GTM codes with frontend layout
        View::composer('frontend.layouts.app', function ($view) {
            $metaTagsService = new MetaTagsService();
            $blog = $view->getData()['blog'] ?? null;
            $pageMeta = $view->getData()['pageMeta'] ?? null;
            $metaTags = $metaTagsService->generateMetaTags($blog, $pageMeta);

            // Get GTM codes from WebsiteData
            $gtmCodes = WebsiteData::whereIn('slug', ['gtm-head-code', 'gtm-noscript-code'])
                ->get()
                ->keyBy('slug');

            $view->with($metaTags)
                ->with('gtmHeadCode', $gtmCodes->get('gtm-head-code')?->value ?? '')
                ->with('gtmNoscriptCode', $gtmCodes->get('gtm-noscript-code')?->value ?? '');
        });

        // Share social media links and contact info with footer
        View::composer('frontend.layouts.footer', function ($view) {
            $socialLinks = WebsiteData::whereIn('slug', [
                'social-facebook',
                'social-twitter',
                'social-instagram',
                'social-whatsapp',
                'social-linkedin'
            ])->get()->keyBy('slug');

            $view->with('socialLinks', $socialLinks);
        });
    }
}
