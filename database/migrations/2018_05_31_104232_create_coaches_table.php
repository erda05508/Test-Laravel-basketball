<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if(! Schema::hasTable('coaches')) {
            Schema::create('coaches', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->date('birth_date');
                $table->string('country');
                $table->integer('team_id');               
                
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
        Schema::dropIfExists('coaches');
    }
}
