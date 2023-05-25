<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profilages', function (Blueprint $table) {
            $table->id();
            $table->string('optionregion');
            $table->string('optionpersonnemenage');
            $table->string('optionetatcivil');
            $table->string('optionacheteproduit');
            $table->string('optionlogement');
            $table->string('optionnbreenfant');
            $table->string('optionappareilmenager');
            $table->string('optionniveaueducation');
            $table->string('optionsituationprofe');
            $table->string('optionservice');
            $table->string('optiontelephone');
            $table->string('optionvoiture');
            $table->string('optionvoyage');
            $table->string('optionproduitselectro');
            $table->string('optionboisson');
            $table->string('optionempruntepret');
            $table->string('optionfrequencefume');
            $table->string('optionelecteur');
            $table->unsignedInteger('client_id')->nullable(true);
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
        Schema::dropIfExists('profilages');
    }
}
