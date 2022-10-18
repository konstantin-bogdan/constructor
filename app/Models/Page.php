<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path', 'meta', 'number', 'show'];

    public function blocks () {
        return $this->hasMany(Block::class)->whereNull('block_id')
            ->with('template', 'blocks');
    }
}
