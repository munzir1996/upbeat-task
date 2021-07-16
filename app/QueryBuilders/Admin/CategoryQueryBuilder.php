<?php
namespace App\QueryBuilders\Admin;

use Illuminate\Database\Eloquent\Builder;

class CategoryQueryBuilder extends Builder
{
    public function active(): self
    {
        return $this->where('status', config('constants.status.active'));
    }

    public function inactive(): self
    {
        return $this->where('status', config('constants.status.inactive'));
    }
}
