<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;
    
    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
                        ->generateSlugsFrom('name')
                        ->saveSlugsTo('slug');
    }

    /**
     * Return relationship with Store
     *
     * @return Object
     */
    public function store(): Object
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Return relationship with Categories
     *
     * @return Object
     */
    public function categories(): Object
    {
        return $this->belongsToMany(Category::class);
    }

    public function getPrice()
    {
        return number_format($this->price, 2, ',', '.');
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
