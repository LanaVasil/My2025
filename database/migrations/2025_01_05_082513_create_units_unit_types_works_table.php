<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\UnitType;
use App\Models\Unit;


return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

    Schema::create('unit_types', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->softDeletes();
      $table->string('name', 32)->unique()->nullable();
      $table->boolean('status')->default(true);
      $table->tinyInteger('sort')->unsigned()->default(99);
    });


    Schema::create('units', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->softDeletes();
      $table->string('name_full', 255)->nullable();
      $table->string('name', 32)->unique()->nullable();
      $table->tinyInteger('sort')->unsigned()->default(99);
      $table->bigInteger('parent_id')->unsigned()->default(0);
    //   $table->foreignIdFor(UnitType::class)
        $table->foreignIdFor(UnitType::class)
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->nullOnDelete();
      $table->boolean('status')->default(true)
        ->nullable()
        ->constrained()
        ->cascadeOnUpdate()
        ->nullOnDelete();;
    });

    Schema::create('unit_workers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name', 64)->unique()->nullable();
            $table->string('phone', 64)->nullable();
            $table->string('cellphone', 64)->nullable();
            $table->string('email', 64)->nullable();
            $table->foreignIdFor(Unit::class)
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->boolean('status')->default(true);
        });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    if (app()->isLocal()) {
      Schema::dropIfExists('unit_works');
      Schema::dropIfExists('units');
      Schema::dropIfExists('unit_types');
    }
  }
};
