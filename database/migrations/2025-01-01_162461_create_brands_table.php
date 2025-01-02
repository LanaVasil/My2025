<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name', 32)->unique()->nullable();
            $table->boolean('status')->default(true);
            $table->tinyInteger('sort')->unsigned()->default(99);                  
      });

      Schema::create('dev_types', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->softDeletes();
          $table->string('name', 32)->unique()->nullable();
          $table->boolean('status')->default(true);
          $table->tinyInteger('sort')->unsigned()->default(99);
      });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      if (app()->isLocal()) {
        Schema::dropIfExists('brands');
        Schema::dropIfExists('dev_types');
      }
    }
};
