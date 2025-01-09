<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Unit;
use App\Models\UnitWorker;
use App\Models\Worker;
use App\Models\Repair;
use App\Models\RepairLetters;
use App\Models\Device;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Unit::class)->constrained();
            $table->foreignIdFor(UnitWorker::class)->nullable()->constrained();
            $table->string('note', 255)->nullable();
            $table->string('content', 255)->nullable();
            $table->tinyInteger('letter_quantity')->unsigned()->default(0);
            $table->tinyInteger('transfer_quantity')->unsigned()->default(0);
            $table->tinyInteger('make_quantity')->unsigned()->default(0);
            $table->tinyInteger('return_quantity')->unsigned()->default(0);
            $table->tinyInteger('box')->unsigned()->default(1);                      
            $table->tinyInteger('status')->unsigned()->default(0);
            $table->Integer('user_id')->unsigned()->default(0);
      
        });

        Schema::create('repair_letters', function (Blueprint $table) {
          $table->id();
          $table->timestamps();
          $table->date('income_at')->nullable();
          $table->string('income', 32)->nullable();
          $table->string('name_full', 255)->nullable();
          $table->string('name', 64)->nullable();
          $table->foreignIdFor(Unit::class)->constrained();
          $table->date('unitdoc_at')->nullable();
          $table->string('unitdoc', 32)->unique()->nullable();
          $table->date('ddzdoc_at')->nullable();
          $table->string('ddzdoc', 32)->unique()->nullable();
      });

      Schema::create('repair_devices', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->softDeletes();
        $table->foreignIdFor(Repair::class)->nullable()->constrained();
        $table->foreignIdFor(Device::class)->nullable()->constrained();
        $table->foreignIdFor(Worker::class)->nullable()->constrained();
        $table->foreignIdFor(RepairLetters::class)->nullable()->constrained();
        $table->longText('note')->nullable();
        $table->string('serial', 32)->nullable();
        $table->string('inventory', 32)->nullable();
        $table->date('transfer_at')->nullable();
        $table->date('make_at')->nullable();
        $table->date('return_at')->nullable();
        $table->Integer('user_id')->unsigned()->default(0);        
    });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      if (app()->isLocal()) {      
        Schema::dropIfExists('repairs');
        Schema::dropIfExists('repair_letters');
        Schema::dropIfExists('repair_devices');
      }
    }
};
