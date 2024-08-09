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
        Schema::create('materi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_name_id')->constrained()->onDelete('cascade');
            $table->text('materi_1');
            $table->string('image_materi_1')->nullable();
            $table->text('materi_2')->nullable();
            $table->string('image_materi_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi_details');
    }
};
