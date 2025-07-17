<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['code', 'name', 'description', 'purchase_price', 'selling_price', 'stock', 'photo'];

    public function productentries(): HasMany
    {
        return $this->hasMany(stock_entries::class);
    }

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(category::class, 'category_product', 'categories_id', 'products_id');
    }
}
