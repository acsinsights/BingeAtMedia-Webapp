<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageMeta;

class PageMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'route_name' => 'frontend.home',
                'page_name' => 'Home',
                'meta_title' => 'BingeAt Media | Creative Digital Marketing & Branding Agency',
                'meta_description' => 'BingeAt Media delivers creative content and result-driven digital marketing campaigns. From production to promotion, we make your brand grow.',
                'meta_keywords' => 'digital marketing agency, creative content, branding agency, social media marketing, video production, content creation, brand growth'
            ],
            [
                'route_name' => 'frontend.about',
                'page_name' => 'About',
                'meta_title' => 'About BingeAt Media - Your Digital Marketing Partner',
                'meta_description' => 'Learn about BingeAt Media, your trusted partner for creative content and digital marketing. We craft compelling campaigns for creators and businesses.',
                'meta_keywords' => 'about BingeAt Media, digital marketing experts, creative agency, content creators, marketing consultants'
            ],
            [
                'route_name' => 'frontend.contact',
                'page_name' => 'Contact',
                'meta_title' => 'Contact BingeAt Media - Get in Touch With Our Team',
                'meta_description' => 'Contact BingeAt Media for creative digital marketing and branding solutions. Get in touch with our expert team today.',
                'meta_keywords' => 'contact BingeAt Media, digital marketing consultation, creative services inquiry, branding contact'
            ],
            [
                'route_name' => 'frontend.blog',
                'page_name' => 'Blog',
                'meta_title' => 'BingeAt Media Blog - Digital Marketing Insights & Tips',
                'meta_description' => 'Read expert insights on digital marketing, content creation, branding strategies, and social media tips from BingeAt Media.',
                'meta_keywords' => 'digital marketing blog, content marketing tips, branding insights, social media strategies, marketing guides'
            ],
            [
                'route_name' => 'frontend.portfolio',
                'page_name' => 'Portfolio',
                'meta_title' => 'BingeAt Media Portfolio - Our Creative Work',
                'meta_description' => 'Explore BingeAt Media\'s portfolio of creative digital marketing campaigns, branding projects, and content creation work.',
                'meta_keywords' => 'portfolio, creative work, digital marketing projects, branding campaigns, content examples'
            ],
            [
                'route_name' => 'frontend.privacy-policy',
                'page_name' => 'Privacy Policy',
                'meta_title' => 'Privacy Policy - BingeAt Media',
                'meta_description' => 'Read BingeAt Media privacy policy. Learn how we collect, use, and protect your personal information.',
                'meta_keywords' => 'privacy policy, data protection, BingeAt Media privacy'
            ],
            [
                'route_name' => 'frontend.terms-of-service',
                'page_name' => 'Terms of Service',
                'meta_title' => 'Terms of Service - BingeAt Media',
                'meta_description' => 'Terms of service for BingeAt Media. Read our terms and conditions for using our digital marketing services.',
                'meta_keywords' => 'terms of service, terms and conditions, BingeAt Media terms'
            ],
        ];

        foreach ($pages as $page) {
            PageMeta::updateOrCreate(
                ['route_name' => $page['route_name']],
                [
                    'page_name' => $page['page_name'],
                    'meta_title' => $page['meta_title'],
                    'meta_description' => $page['meta_description'],
                    'meta_keywords' => $page['meta_keywords'],
                ]
            );
        }
    }
}
