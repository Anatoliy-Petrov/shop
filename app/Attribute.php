<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];

    protected $with = ['options'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_attribute');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attribute')->withPivot('options_available');
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
