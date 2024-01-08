<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLikesTable extends Migration
{
    public function up(): void
    {
        // 一時的に likes テーブルを削除
        Schema::dropIfExists('likes');

        // likes テーブルを再作成
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // ロールバック時の処理を記述
        Schema::dropIfExists('likes');
    }
}
