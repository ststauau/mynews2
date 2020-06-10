<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //// up() migration 実行時に行われる処理★
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');

            #$table->string('user_id'); // 先々の課題。ユーザー単位で記事をコントロール
            
            $table->string('title'); // ニュースのタイトルを保存するカラム
            $table->string('body'); // ニュースの本文を保存するカラム
            $table->string('image_path')->nullable(); // 画像のパスを保存するカラム $table->timestamps();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
