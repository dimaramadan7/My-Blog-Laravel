<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['name', 'email'];

    public function user()
    {
        return $this->BelongsTo(user::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
