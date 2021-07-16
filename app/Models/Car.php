<?php

namespace App\Models;

use App\QueryBuilders\Admin\CarQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Car extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];
    protected $with = ['category', 'store'];

    public function newEloquentBuilder($query): CarQueryBuilder
    {
        return new CarQueryBuilder($query);
    }

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('car');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('car')->singleFile();
    }
    /**
     * Get the store that owns the Car
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Get the category that owns the Car
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function isActivate()
    {
        return ($this->status == config('constants.status.active')) ? true : false ;
    }

}
