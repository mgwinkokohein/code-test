<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Table;

class CreateMoviereviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Table::MOVIEREVIEW, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_id')->unsigned();
            $table->foreign('movie_id')->references('id')->on(Table::MOVIE);
            $table->string('user_email'); //can join with user table 
            $table->string('review_text');

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
        Schema::dropIfExists('moviereview');
    }
}
