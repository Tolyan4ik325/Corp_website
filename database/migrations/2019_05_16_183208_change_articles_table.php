<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            
            $table->integer('user_id')->unsigned()->defauld(1);
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('cetegory_id')->unsigned()->defauld(1);
            $table->foreign('cetegory_id')->references('id')->on('categoties');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
