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

            // Get all website data from database
            $websiteData = WebsiteData::whereIn('slug', [
                'gtm-head-code',
                'gtm-noscript-code',
                'meta-pixel-code',
                'google-analytics-code',
                'meta-title',
                'meta-description',
                'meta-keywords'
            ])->get()->keyBy('slug');

            $view->with($metaTags)
                ->with('gtmHeadCode', $websiteData->get('gtm-head-code')?->value ?? '')
                ->with('gtmNoscriptCode', $websiteData->get('gtm-noscript-code')?->value ?? '')
                ->with('metaPixelCode', $websiteData->get('meta-pixel-code')?->value ?? '')
                ->with('googleAnalyticsCode', $websiteData->get('google-analytics-code')?->value ?? '')
                ->with('siteMetaTitle', $websiteData->get('meta-title')?->value ?? '')
                ->with('siteMetaDescription', $websiteData->get('meta-description')?->value ?? '')
                ->with('siteMetaKeywords', $websiteData->get('meta-keywords')?->value ?? '');
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
