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
        Schema::create('meta_post', function (Blueprint $table) {
            $table->foreignId('post_id')
                ->references('id')
                ->on('posts');
            $table->foreignId('meta_id')
                ->references('id')
                ->on('metas');
            $table->json('value');
            $table->timestamps();

            $table->primary(['post_id', 'meta_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_post');
    }
};
