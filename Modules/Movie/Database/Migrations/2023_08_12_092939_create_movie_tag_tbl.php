<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Table;

class CreateMovieTagTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on(Table::MOVIE);
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on(Table::TAG);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_tags');
    }
}
