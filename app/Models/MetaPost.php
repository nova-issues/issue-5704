<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MetaPost extends Pivot
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function meta()
    {
        return $this->belongsTo(Meta::class);
    }
}
