<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'content',
        'publish_date',
        'photo',
        'is_important'
    ];

    protected $casts = [
        'publish_date' => 'datetime',
        'is_important' => 'boolean'
    ];

    // Scope for important notices
    public function scopeImportant($query)
    {
        return $query->where('is_important', true);
    }

    // Scope for active notices (published and not expired)
    public function scopeActive($query)
    {
        return $query->where('publish_date', '<=', now());
    }

    // Scope for notices by category
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
