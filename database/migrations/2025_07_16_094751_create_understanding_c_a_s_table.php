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
        Schema::create('understanding_c_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('kodeLeadsheet', 50);
            $table->string('kodeActivityCA', 30)->unique();
            $table->text('activityCA');
            $table->boolean('sop'); //
            $table->boolean('dijalankan'); //
            $table->text('penjelasanActivity');
            $table->json('attachments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('understanding_c_a_s');
    }
};
