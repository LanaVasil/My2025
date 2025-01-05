<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

use App\Models\UnitType;
use App\Models\UnitWorker;
use App\Models\MenuUnite;
use App\Models\Worker;
// use App\Models\Document;
use App\Models\State;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Unit extends Model
{
  use HasFactory;
  use SoftDeletes;

  // protected $fillable = ['name', 'content'] -  перелік полів які можно заповнювати методoм only
  protected $fillable = ['name_full', 'name', 'sort', 'parent_id', 'unitype_id', 'status'];

  public function scopeHomePage(Builder $query)
  {
    // return $query->where('status', 1)->orderBy('sort')->limit(10);
    // return $query->where('status', 1)->orderBy('sort');
    return $query->where('status', 1);
  }

  public function scopeSearch(Builder $query, $value)
  {
    // $query->where('name', 'like', "%{$value}%")->orWhere('email', 'like', "%{$value}%");
    $query->where('name', 'like', "%{$value}%");
  }

  public function scopeFilterField(Builder $query, $value, $field)
  {
    if ($value > 0)
      $query->where("{$field}", "{$value}");
  }

  public function unit_type(): BelongsToMany
  {
    return $this->belongsToMany(UnitType::class);
  }

    public function unit_workers(): HasMany
  {
    return $this->hasMany(UnitWorker::class);
  }


  public function menu_unit(): BelongsToMany
  {
    return $this->belongsToMany(MenuUnit::class);
  }
  // public function unit_type(): BelongsTo
  // {
  //   return $this->belongsTo(Unitype::class, 'unit_type_id', 'id');
  // }

  // public function states(): HasMany
  // {
  //   return $this->hasMany(State::class);
  // }

  // public function workers(): HasMany
  // {
  //   return $this->hasMany(Worker::class);
  // }
}
