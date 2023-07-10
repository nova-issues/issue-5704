<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $casts = [
        'values' => 'json'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class)
            ->using(MetaPost::class)
            ->withTimestamps();
    }
}
