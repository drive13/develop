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
        Schema::create('co__acts', function (Blueprint $table) {
            $table->id();
            $table->string('kodeCO', 20);
            $table->foreign('kodeCO')->references('kodeCO')->on('co__objs');
            $table->string('kodeCA', 20)->unique();
            $table->text('control_act');
            $table->text('description');
            $table->text('test_of_control');
            $table->string('nature', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co__acts');
    }
};
