<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bien', function (Blueprint $table) {
            $table->bigIncrements('id_bien');
            $table->string('titre_bien')->nullable();
            $table->string('descr_bien')->nullable();
            $table->binary('image_bien')->nullable();
            $table->string('type_bien')->nullable();
            $table->foreign('type_bien')
                  ->references('id_type')
                  ->on('type_bien');
            $table->integer('superficie_bien')->nullable();
            $table->integer('nbr_piece_bien')->nullable();
            $table->boolean('dependance_bien')->default(0);
            $table->integer('prix_bien')->nullable();
            $table->integer('frais_agence_bien')->nullable();
            $table->string('region_bien')->nullable();
            $table->foreign('region_bien')
                  ->references('id_region')
                  ->on('region_bien');
            $table->timestamp('bien_parut_le')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('id_vendeur')->nullable();
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
        Schema::dropIfExists('bien');
    }
}
