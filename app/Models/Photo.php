<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id', 'slug', 'description', 'image', 'in_evidence', 'is_published'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
