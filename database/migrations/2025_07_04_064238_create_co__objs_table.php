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
            $table->foreignId('bis_cyc_id');
            $table->string('codeCO', 10);
            $table->text('control_obj');
            $table->string('asersi1', 20);
            $table->string('asersi2', 20)->nullable();
            $table->string('asersi3', 20)->nullable();
            $table->string('asersi4', 20)->nullable();
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
