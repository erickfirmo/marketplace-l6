<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
                        ->generateSlugsFrom('name')
                        ->saveSlugsTo('slug');
    }

    /**
     * Return relationship with Products
     *
     * @return Object
     */
    public function products(): Object
    {
        return $this->belongsToMany(Product::class);
    }
}
