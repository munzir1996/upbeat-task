<?php

namespace App\Models;

use App\QueryBuilders\Admin\StoreQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function newEloquentBuilder($query): StoreQueryBuilder
    {
        return new StoreQueryBuilder($query);
    }

    /**
     * Get all of the cars for the Store
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
