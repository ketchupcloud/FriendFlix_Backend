<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id'); /* incrementa em 1 */
			$table->string('name');
			$table->longText('synopsis');
			/*$table->unsignedBigInteger('user_id');*/
            $table->string('image')->nullable();
            $table->integer('year_release');
            $table->integer('year_end')->nullable();
            $table->timestamps(); /* guarda o momento de criacao/atualizacao */
        });
	// 	Schema::table('series', function(Blueprint $table) {
	// 	$table->foreign('user_series_id')->references('id')->on('user_series')->
	// 	OnDelete('cascade');
	// });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
