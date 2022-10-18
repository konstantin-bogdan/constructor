<?php

namespace App\Models;

use App\Traits\NumberOrderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, NumberOrderTrait;

    protected $fillable = ['name', 'type', 'options', 'show', 'number', 'menu_id', 'template_id'];

    public function menus () {
        return $this->hasMany(Menu::class)
            ->with('template', 'menus');
    }

    public function template() {
        return $this->belongsTo(Template::class);
    }
}
