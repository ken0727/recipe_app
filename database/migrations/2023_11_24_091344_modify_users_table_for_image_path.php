<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // users テーブルの修正
        Schema::table('users', function (Blueprint $table) {
            $table->binary('image')->nullable()->change(); // blob型のimage（nullableでNULLを許可）
        });

        // posts テーブルの修正
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image_path')->nullable(); // 画像のファイルパスを保存するカラムを追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // users テーブルの修正を元に戻す
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
        });

        // posts テーブルの修正を元に戻す
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
};

