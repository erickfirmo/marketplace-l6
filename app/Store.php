<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
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
