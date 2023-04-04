<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produits_id')->unsigned();
            $table->foreign('produits_id')->references('id')->on('produits');
            //libelle et date
            $table->integer('QteE');
            $table->integer('prixE');
            $table->string('dateE');
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
        Schema::dropIfExists('entrees');
    }
};
