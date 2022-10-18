<?php

namespace App\Models;

use App\Traits\NumberOrderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory, NumberOrderTrait;

    protected $fillable = ['type', 'title', 'slug', 'cover', 'show', 'number',
                            'first_fields', 'second_fields', 'third_fields' ];
}

