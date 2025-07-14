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
        Schema::create('co__objs', function (Blueprint $table) {
            $table->id();
            $table->string('kodeBisCyc', 20);
            // $table->foreign('kodeBisCyc')->references('kodeBisCyc')->on('buisness_cycles');
            $table->string('kodeCO', 20)->unique();
            $table->text('control_obj');
            $table->text('description');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co__objs');
    }
};
