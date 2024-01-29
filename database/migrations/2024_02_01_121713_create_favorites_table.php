<?php

// database/migrations/xxxx_xx_xx_create_favorites_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // お気に入りをするユーザーのID
            $table->unsignedBigInteger('favorited_user_id'); // お気に入りされるユーザーのID
            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('favorited_user_id')->references('id')->on('users')->onDelete('cascade');

            // user_id と favorited_user_id の組み合わせはユニーク
            $table->unique(['user_id', 'favorited_user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}

