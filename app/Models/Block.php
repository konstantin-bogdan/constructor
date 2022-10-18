<?php

namespace App\Models;

use App\Traits\NumberOrderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory, NumberOrderTrait;

    protected $fillable = ['page_id', 'template_id', 'number', 'block_id'];

    public function blocks() {
        return $this->hasMany(Block::class);
    }

    public function template() {
        return $this->belongsTo(Template::class);
    }
}
