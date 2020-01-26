<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('season');
            $table->longText('synopsis');
            $table->integer('ep_number');
            $table->string('ep_image');
            $table->date('release_date');//"DD/MM/AAAA"
            $table->unsignedBigInteger('series_id')->nullable();
            $table->timestamps();
        });
        Schema::table('episodes', function(Blueprint $table){
            //A tabela referenciada deve ter uma data de criacao-->
            //anterior a que a referencia nas migrations!!!
            $table->foreign('series_id')->references('id')->on('series')->
            OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
