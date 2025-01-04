<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Device;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'user_id', 'device_id'];


    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function device(): BelongsTo
    {
      return $this->belongsTo(Device::class, 'device_id', 'id');
    }
}
