<?php

namespace App\Models;

use App\Traits\NumberOrderTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Language extends Model
{
    use HasFactory;
    use NumberOrderTrait;

    protected $fillable = ['title', 'slug', 'show', 'number'];

}

