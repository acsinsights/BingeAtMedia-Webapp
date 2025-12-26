<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('website_data')->insert(
            [
                [
                    'name' => 'Google Tag Manager (Head)',
                    'slug' => 'gtm-head-code',
                    'type' => 'textarea',
                    'value' => '<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({\'gtm.start\':new Date().getTime(),event:\'gtm.js\'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!=\'dataLayer\'?\'&l=\'+l:\'\';j.async=true;j.src=\'https://www.googletagmanager.com/gtm.js?id=\'+i+dl;f.parentNode.insertBefore(j,f);})(window,document,\'script\',\'dataLayer\',\'GTM-KRCXG37T\');</script>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Google Tag Manager (Noscript)',
                    'slug' => 'gtm-noscript-code',
                    'type' => 'textarea',
                    'value' => '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KRCXG37T" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Meta Pixel',
                    'slug' => 'meta-pixel-code',
                    'type' => 'textarea',
                    'value' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Google Analytics',
                    'slug' => 'google-analytics-code',
                    'type' => 'textarea',
                    'value' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Meta Title',
                    'slug' => 'meta-title',
                    'type' => 'text',
                    'value' => 'BingeAt Media',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Meta Description',
                    'slug' => 'meta-description',
                    'type' => 'textarea',
                    'value' => 'BingeAt Media delivers creative digital solutions that help your brand grow, engage, and shine online. From content creation to full-scale digital campaigns.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Meta Keywords',
                    'slug' => 'meta-keywords',
                    'type' => 'textarea',
                    'value' => 'BingeAt Media, digital marketing, creative content, branding, social media, video production, content creation, brand growth',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // Social Links
                [
                    'name' => 'Facebook URL',
                    'slug' => 'social-facebook',
                    'type' => 'url',
                    'value' => 'https://www.facebook.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Twitter URL',
                    'slug' => 'social-twitter',
                    'type' => 'url',
                    'value' => 'https://www.twitter.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Instagram URL',
                    'slug' => 'social-instagram',
                    'type' => 'url',
                    'value' => 'https://www.instagram.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'WhatsApp URL',
                    'slug' => 'social-whatsapp',
                    'type' => 'url',
                    'value' => 'https://wa.me/918484935227',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'LinkedIn URL',
                    'slug' => 'social-linkedin',
                    'type' => 'url',
                    'value' => 'https://www.linkedin.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // Contact Details
                [
                    'name' => 'Phone Number',
                    'slug' => 'contact-phone',
                    'type' => 'text',
                    'value' => '+91 80878 35227',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Email Address',
                    'slug' => 'contact-email',
                    'type' => 'email',
                    'value' => 'hello@bingeatmedia.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Notification Email',
                    'slug' => 'notification-email',
                    'type' => 'email',
                    'value' => 'hello@bingeatmedia.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Address',
                    'slug' => 'contact-address',
                    'type' => 'textarea',
                    'value' => 'Flat No.102, White House Building, Above AU Bank, Khodaram Baug, Boisar – 401501',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Google Maps URL',
                    'slug' => 'contact-google-maps',
                    'type' => 'url',
                    'value' => 'https://maps.app.goo.gl/BingeAtMedia',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Google Maps Iframe',
                    'slug' => 'contact-google-maps-iframe',
                    'type' => 'textarea',
                    'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3753.9064146999917!2d72.7571502!3d19.8015649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be71f41c6206d39%3A0xfa1936032142c93d!2sArise%20Consultancy%20Services!5e0!3m2!1sen!2sin!4v1758617905325!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
