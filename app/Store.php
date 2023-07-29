<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Store extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'description', 'phone', 'mobile_phone', 'slug', 'logo'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
                        ->generateSlugsFrom('name')
                        ->saveSlugsTo('slug');
    }

    /**
     * Return relationship with User
     *
     * @return Object
     */
    public function user(): Object
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return relationship with Products
     *
     * @return Object
     */
    public function products(): Object
    {
        return $this->hasMany(Product::class);
    }
}
