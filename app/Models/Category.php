<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(product::class, 'category_product', 'categories_id', 'products_id');
    }
}
