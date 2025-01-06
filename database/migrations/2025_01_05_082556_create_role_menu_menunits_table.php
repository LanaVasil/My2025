<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Unit;
use App\Models\Menu;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 32)->unique()->nullable();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name', 32)->unique()->nullable();
            $table->string('route', 255)->nullable();            
            $table->tinyInteger('parent_id')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('sort')->unsigned()->default(99);
        });

        Schema::create('menu_units', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name', 32)->unique()->nullable();
            $table->foreignIdFor(Menu::class)
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignIdFor(Unit::class)
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      if (app()->isLocal()) {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_units');
      }
    }
};
