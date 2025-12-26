<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Rajesh Kumar',
                'position' => 'Founder, TechStartup India',
                'rating' => '5',
                'image' => null,
                'review' => 'BingeAt Media transformed our social media presence completely! Their creative content and strategic campaigns helped us reach millions. The team is professional, creative, and truly understands digital marketing.',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Priya Sharma',
                'position' => 'Marketing Head, Fashion Brand',
                'rating' => '5',
                'image' => null,
                'review' => 'Working with BingeAt Media has been an absolute game-changer for our brand. Their video production quality is top-notch, and their content strategy delivered real results. Highly recommend their services!',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Amit Patel',
                'position' => 'CEO, E-commerce Company',
                'rating' => '5',
                'image' => null,
                'review' => 'BingeAt Media helped us grow our online presence from scratch. Their team handled everything from content creation to digital campaigns with exceptional creativity and professionalism. Our sales increased by 300% in just 6 months!',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
