<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1496402870PlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('players')) {
            Schema::create('players', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('team_id')->unsigned()->nullable();
                $table->foreign('team_id', '41907_59314bb611908')->references('id')->on('teams')->onDelete('cascade');
                $table->string('avatar')->default('default.jpg');
                $table->string('name');
                $table->string('surname');
                $table->date('birth_date')->nullable();
                $table->string('tall');
                $table->string('weight');
                
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
        Schema::dropIfExists('players');
    }
}
