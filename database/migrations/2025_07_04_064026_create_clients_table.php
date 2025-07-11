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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('kodeIndustri', 20);
            // $table->foreign('kodeIndustri')->references('kodeIndustri')->on('tipe_industris');
            $table->string('code_client', 15);
            $table->string('nama', 50);
            $table->text('alamat');
            $table->string('initial_year', 4);
            $table->string('current_year', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
