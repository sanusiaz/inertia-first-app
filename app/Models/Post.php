<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'title',
        'slug',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDescriptionAttribute()
    {
        return Str::limit($this->attributes['description'], 100, '...');
    }

    public function getImageAttribute()
    {
        return url( '/storage/' . $this->attributes['image'] );
    }
}
