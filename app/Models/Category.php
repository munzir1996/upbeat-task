<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categories()
    {
        return $this->hasMany('App\Models\Category', 'parent_category');
    }

    /**
     * Get all of the cars for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function isActivate()
    {
        return ($this->status == config('constants.status.active')) ? true : false ;
    }
}
