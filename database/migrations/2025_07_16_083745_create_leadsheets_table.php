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
        Schema::create('leadsheets', function (Blueprint $table) {
            $table->id();
            $table->string('kodeLeadsheet', 50); //gk bisa uniq
            $table->string('kodeBisCyc', 20);
            $table->string('kodeCO', 20);
            $table->string('kodeCA', 20);
            $table->boolean('desain')->nullable(); //true = Ya , false = Tidak
            $table->boolean('test')->nullable(); //true = Ya , false = Tidak
            $table->text('issue')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leadsheets');
    }
};
