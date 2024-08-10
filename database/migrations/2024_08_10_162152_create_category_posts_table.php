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
        Schema::create('category_post', function (Blueprint $table) {
            $table->id();
            //внешний `id` таблицы `categories` - это `category_id` в этой таблице
            //`cascade` - всякий раз когда категория удаляется, то записи должны удалиться
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            //внешний `id` таблицы `posts` - это `post_id` в этой таблице
            //`cascade` - всякий раз когда пост удаляется, то записи должны удалиться
            $table->foreignId('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_post');
    }
};
