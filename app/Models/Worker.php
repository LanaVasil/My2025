<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

use App\Models\State;
use App\Models\RepairDevice;

class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $fillable = ['name', 'content'] -  перелік полів які можно заповнювати методoм only
    // protected $fillable = ['name', 'status', 'brand_id', 'devtype_id'];
  
    // захищені поля. якщо $guarded порожній, то все що не $guarded - розглядаються як філевл
    protected $guarded = []; 
    // protected $guarded = false;
  
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
  
    // public function post(): BelongsTo
    // {
    //   return $this->belongsTo(Post::class, 'post_id', 'id');
    // }

    public function state(): BelongsTo
    {
      return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function unit(): BelongsTo
    {
      return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function repair_devices(): HasMany
    {
      return $this->hasMany(RepairDevice::class);
    }
}
