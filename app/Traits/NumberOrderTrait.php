<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait NumberOrderTrait {
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('number');
        });
    }
}
