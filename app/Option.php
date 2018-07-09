<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public function colors()
    {
        return $this->morphedByMany(Color::class, 'attribute_option');
    }

    public function sizesFootwear()
    {
        return $this->morphedByMany(SizeFootwear::class, 'attribute_option');
    }

    public function memories()
    {
        return $this->morphedByMany(Memory::class, 'attribute_option');
    }

    public function sizesScreen()
    {
        return $this->morphedByMany(SizeScreen::class, 'attribute_option');
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
