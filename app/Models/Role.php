<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MenuUnit;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function menu_units(): HasMany
    {
      return $this->hasMany(MenuUnit::class);
    }
}
