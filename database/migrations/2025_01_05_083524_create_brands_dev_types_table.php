<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
      Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name', 32)->unique()->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('sort')->unsigned()->default(99);
            $table->Integer('user_id')->unsigned()->default(0);
      });

      Schema::create('dev_types', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->softDeletes();
          $table->string('name', 32)->unique()->nullable();
          $table->tinyInteger('status')->default(1);
          $table->tinyInteger('sort')->unsigned()->default(99);
      });

    }

    public function down(): void
    {
      if (app()->isLocal()) {
        Schema::dropIfExists('brands');
        Schema::dropIfExists('dev_types');
      }
    }
};
