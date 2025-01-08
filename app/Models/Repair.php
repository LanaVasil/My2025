<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Unit;
use App\Models\UnitWorker;
use App\Models\RepairDevice;

class Repair extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $guarded = [];
    protected $fillable = ['unit_id', 'unit_worker_id', 'note', 'content', 'letter_quantity', 'transfer_quantity', 'make_quantity', 'return_quantity', 'status', 'box', 'user_id'];

    public function unit(): BelongsTo
    {
      return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
  
    public function unit_worker(): BelongsTo
    {
      return $this->belongsTo(UnitWorker::class, 'unit_worker_id', 'id');
    }
  
    public function repair_devices(): HasMany
    {
      return $this->hasMany(Repdevice::class);
    }
}
