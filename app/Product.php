<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'body', 'price', 'slug'];

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
}
