<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'rating',
        'image',
        'review',
        'is_published',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
