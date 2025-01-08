<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Brand;
use App\Models\DevType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('devices', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->softDeletes();
        $table->string('name')->unique()->nullable();
        $table->string('note')->nullable();
        $table->tinyInteger('status')->default(true);
        // $table->enum('status',['actual', 'unactual', 'noservice'])->default('active');
        $table->string('img')->nullable();
        $table->foreignIdFor(Brand::class)
          ->nullable()
          ->constrained()
          ->cascadeOnUpdate()
          ->nullOnDelete();
        $table->foreignIdFor(DevType::class)
          ->nullable()
          ->constrained()
          ->cascadeOnUpdate()
          ->nullOnDelete();
          $table->Integer('user_id')->unsigned()->default(0);
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      if (app()->isLocal()) {
        Schema::dropIfExists('devices');
      }
    }
};
