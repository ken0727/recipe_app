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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // varchar型のname
            $table->binary('image')->nullable(); // blob型のimage（nullableでNULLを許可）
            $table->string('material'); 
            $table->string('procedure'); 
            $table->foreignId('user_id')->constrained('users'); // users テーブルの id カラムに対する外部キー
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
public function down()
{
    Schema::dropIfExists('posts');
}
};
