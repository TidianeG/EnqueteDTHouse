<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquetes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('duree');
            $table->integer('prix');
            $table->string('lien_enquete');
            $table->string('type_enquete');
            $table->string('niveau_etude');
            $table->integer('nombre_max_enquete');
            $table->string('sexe');
            $table->string('age');
            $table->string('etat');
            $table->string('pays');
            $table->string('profession');
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
        Schema::dropIfExists('enquetes');
    }
}
