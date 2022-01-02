<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

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
