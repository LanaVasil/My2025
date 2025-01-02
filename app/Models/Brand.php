<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Builder;

class Brand extends Model
{
  use HasFactory;
  use SoftDeletes;

  // protected $fillable = ['name', 'content'] -  перелік полів які можно заповнювати методoм only
  protected $fillable = ['name', 'status', 'sort'];

  // захищені поля. якщо $guarded порожній, то все що не $guarded - розглядаються як філевл
  // protected $guarded = [];

  public function devices(): HasMany
  {
    return $this->hasMany(Device::class);
  }
}
