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

    public function isActivate()
    {
        return ($this->status == config('constants.status.active')) ? true : false ;
    }
}