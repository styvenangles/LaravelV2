<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Agence extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agences', function (Blueprint $table) {
            $table->bigIncrements('id_agence');
            $table->string('nom_agence')->nullable();
            $table->string('email_agence')->nullable();
            $table->string('tel_agence')->nullable();
            $table->integer('nbr_agent_agence')->nullable();
            $table->string('region_agence')->nullable();
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
        Schema::dropIfExists('agences');
    }
}
