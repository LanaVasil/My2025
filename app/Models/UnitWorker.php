<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Unit;

class UnitWorker extends Model
{
    use HasFactory;
    use SoftDeletes;

      // protected $fillable = ['name', 'content'] -  перелік полів які можно заповнювати методoм only
  protected $fillable = ['name', 'status', 'sort'];

  public function scopeHomePage(Builder $query)
  {
    // return $query->where('status', 1)->orderBy('sort')->limit(10);
    return $query->where('status', 1)->orderBy('sort');
  }

  public function scopeSearch(Builder $query, $value)
  {
    $query->where('name', 'like', "%{$value}%");
  }

    public function unit(): BelongsTo
    {
      return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
