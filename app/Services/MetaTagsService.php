<?php

namespace App\Services;

use App\Models\PageMeta;

class MetaTagsService
{
    private $siteName = 'BingeAt Media';
    private $defaultTitle = 'BingeAt Media | Creative Digital Marketing & Branding Agency';
    private $defaultDescription = 'BingeAt Media - Creative Digital Marketing & Branding Agency specializing in social media marketing, content creation, branding, and digital advertising solutions.';

    /**
     * Generate meta tags data based on blog or pageMeta
     *
     * @param mixed $blog
     * @param mixed $pageMeta
     * @return array
     */
    public function generateMetaTags($blog = null, $pageMeta = null): array
    {
        // For blog posts, use blog-specific meta
        if ($blog) {
            $metaTitle = $blog->title . ' | ' . $this->siteName;
            $metaDescription = $blog->description
                ? strip_tags($blog->description)
                : ($pageMeta && $pageMeta->meta_description
                    ? $pageMeta->meta_description
                    : $this->defaultDescription);
            $blogImage = $this->getBlogImage($blog);
        } else {
            // Get meta data from pageMeta
            $metaTitle = $pageMeta && $pageMeta->meta_title
                ? $pageMeta->meta_title
                : $this->defaultTitle;
            $metaDescription = $pageMeta && $pageMeta->meta_description
                ? $pageMeta->meta_description
                : $this->defaultDescription;
            $blogImage = asset('frontend/images/logo.svg');
        }

        $metaKeywords = $pageMeta && $pageMeta->meta_keywords
            ? $pageMeta->meta_keywords
            : null;

        // Get current URL
        $currentUrl = url()->current();

        return [
            'siteName' => $this->siteName,
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
            'metaKeywords' => $metaKeywords,
            'blogImage' => $blogImage,
            'currentUrl' => $currentUrl,
            'isBlog' => (bool) $blog,
        ];
    }

    /**
     * Get blog image URL with proper path handling
     *
     * @param mixed $blog
     * @return string
     */
    private function getBlogImage($blog): string
    {
        if (!$blog->image) {
            return asset('frontend/images/logo.svg');
        }

        if (strpos($blog->image, '/storage/') === 0) {
            return asset($blog->image);
        }

        if (strpos($blog->image, 'storage/') === 0) {
            return asset('/' . $blog->image);
        }

        return asset('storage/' . $blog->image);
    }
}
