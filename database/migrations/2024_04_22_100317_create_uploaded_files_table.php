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
        if (!Schema::hasTable('uploaded_files')) {

        Schema::create('uploaded_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reunions_id')->constrained()->onDelete('cascade');
            $table->string('file_name', 255)->nullable();
            $table->longText('file_content')->nullable();
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploaded_files');
    }
};
