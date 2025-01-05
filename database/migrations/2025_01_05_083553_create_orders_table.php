<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Device;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Device::class)
              ->nullable()
              ->constrained()
              ->cascadeOnUpdate()
              ->nullOnDelete();
            $table->foreignIdFor(User::class)
              ->nullable()
              ->constrained()
              ->cascadeOnUpdate()
              ->nullOnDelete();
            $table->enum('status',['pending', 'approved', 'cancelled'])->default('pending');
            $table->string('name', 255)->nullable();
            $table->string('quantity', 255)->default(0);
        });

    //   Schema::create('orders_items', function (Blueprint $table) {
    //       $table->id();
    //       $table->timestamps();
    //       $table->softDeletes();
    //       $table->foreignId('order_id')->nullable();
    //       $table->foreignId('device_id')->nullable();
    //   });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      if (app()->isLocal()) {
        Schema::dropIfExists('orders');
        // Schema::dropIfExists('orders_items');
      }
    }
};
