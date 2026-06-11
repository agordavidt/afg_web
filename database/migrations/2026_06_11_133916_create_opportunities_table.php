<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('type', ['remote', 'scholarship', 'grant', 'training']);
            $table->text('summary');
            $table->string('source_name');
            $table->string('source_url');
            $table->date('deadline')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_urgent')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};