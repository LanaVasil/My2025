<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Post;
use App\Models\Role;
use App\Models\Unit;
use App\Models\State;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name_full', 255)->nullable();
            $table->string('name', 32)->nullable();
            $table->decimal('stake',3,2)->default(1);
            $table->tinyInteger('sort')->unsigned()->default(99);
            $table->boolean('status')->default(true);
        });

        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name_full', 255);
            $table->string('name', 32);
            $table->foreignIdFor(Post::class)
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignIdFor(Unit::class)
            ->nullable()
            ->constrained()
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->decimal('quantity',5,2)->default(1);
            $table->date('start_at')->nullable();
            $table->boolean('status')->default(true);
            $table->tinyInteger('sort')->unsigned()->default(99);
        });

        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name_full', 255)->nullable();
            $table->string('name', 64)->nullable();
            $table->tinyInteger('gender')->unsigned()->default(0);
            $table->string('phone', 64)->nullable();
            $table->string('cellphone', 64)->nullable();
            $table->string('email', 64)->nullable();
            $table->foreignIdFor(State::class)->constrained();
            $table->decimal('rate', 8, 2)->default(1);
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('posts');
            Schema::dropIfExists('states');
            Schema::dropIfExists('worker');
        }
    }
};
