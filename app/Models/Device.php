<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Brand;
use App\Models\DevType;
use App\Models\Order;

class Device extends Model
{
    /** @use HasFactory<\Database\Factories\DeviceFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'note', 'status', 'img', 'brand_id', 'dev_type_id'];


    public function scopeHomePage(Builder $query)
    {
      // return $query->where('status', 1)->orderBy('sort')->limit(10);
      // return $query->where('status', 1)->orderBy('sort');
      return $query->where('status', 1);
    }

    public function scopeSearch(Builder $query, $value)
    {
      // $query->where('name', 'like', "%{$value}%")->orWhere('email', 'like', "%{$value}%");
      $query->where('name', 'like', "%{$value}%")
            ->orWhere('note', 'like', "%{$value}%");
    }

    public function scopeFilterField(Builder $query, $value, $field)
    {
      if ($value > 0)
      $query->where("{$field}", "{$value}");
    }

    public function brand(): BelongsTo
    {
      return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function dev_type(): BelongsTo
    {
      return $this->belongsTo(DevType::class, 'dev_type_id', 'id');
    }

    public function orders(): HasMany
    {
       return $this->hasMany(Order::class);
    }
}
