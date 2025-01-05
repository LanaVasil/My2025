<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


use App\Models\Menu;
use App\Models\Role;
use App\Models\Unit;

class MenuUnit extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'menu_id', 'role_id', 'unit_id'];

    public function menu(): BelongsTo
    {
      return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function roles(): HasMany
    {
       return $this->hasMany(Role::class);
    }
    public function units(): HasMany
    {
       return $this->hasMany(Unit::class);
    }

}
