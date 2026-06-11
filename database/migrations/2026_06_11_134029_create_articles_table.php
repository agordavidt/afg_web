<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('category', ['remote', 'scholarship', 'platforms', 'career']);
            $table->text('excerpt');
            $table->longText('body');           // TipTap HTML
            $table->string('featured_image_url')->nullable();
            $table->unsignedTinyInteger('reading_time_minutes')->default(5);
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
 