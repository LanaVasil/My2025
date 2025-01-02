<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Builder;

class DevType extends Model
{
    /** @use HasFactory<\Database\Factories\DevTypeFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'status', 'sort'];

    public function devices(): HasMany
    {
      return $this->hasMany(Device::class);
    }
}
