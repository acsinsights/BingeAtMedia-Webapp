<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'title', 'date', 'description', 'image', 'content', 'is_published'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
