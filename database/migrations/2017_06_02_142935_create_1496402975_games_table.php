<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create1496402975GamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('games')) {
            Schema::create('games', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('tournament_id')->unsigned()->nullable();
                $table->integer('team1_id')->unsigned()->nullable();
                $table->foreign('team1_id', '41908_59314c1f52463')->references('id')->on('teams')->onDelete('cascade');
                $table->integer('team2_id')->unsigned()->nullable();
                $table->foreign('team2_id', '41908_59314c1f5682b')->references('id')->on('teams')->onDelete('cascade');
                $table->datetime('start_time');

                $table->integer('result1')->unsigned()->nullable();
                $table->integer('result2')->unsigned()->nullable();

                $table->integer('g2point1')->unsigned()->nullable();
                $table->integer('g2point2')->unsigned()->nullable();

                $table->integer('g3point1')->unsigned()->nullable();
                $table->integer('g3point2')->unsigned()->nullable();

                $table->integer('fine1')->unsigned()->nullable();
                $table->integer('fine2')->unsigned()->nullable();

                $table->integer('transfers1')->unsigned()->nullable();
                $table->integer('transfers2')->unsigned()->nullable();

                $table->integer('rebounds1')->unsigned()->nullable();
                $table->integer('rebounds2')->unsigned()->nullable();

                $table->integer('interceptions1')->unsigned()->nullable();
                $table->integer('interceptions2')->unsigned()->nullable();

                $table->integer('fouls1')->unsigned()->nullable();
                $table->integer('fouls2')->unsigned()->nullable();




                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
