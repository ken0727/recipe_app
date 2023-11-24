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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint型のID
            $table->string('name'); // varchar型のname
            $table->string('email'); // varchar型のmail
            $table->string('password', 15); // varchar型のpassword（最大15文字）
            $table->binary('image')->nullable(); // blob型のimage（nullableでNULLを許可）
            $table->timestamps(); // created_atとupdated_atのtimestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
