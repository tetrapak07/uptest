<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCleanersCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cleaners_cities', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->integer('cleaner_id')->unsigned();
		    $table->integer('city_id')->unsigned();
                    $table->timestamps();
		    
		    $table->primary(['cleaner_id', 'city_id']);
		
		    $table->index('cleaner_id','fk_cleaners_cities_1_idx');
		    $table->index('city_id','fk_cleaners_cities_2_idx');
		
		    $table->foreign('cleaner_id','fk_cleaners_cities_1')
		        ->references('id')->on('cleaners')
		        ->onDelete('cascade')
		        ->onUpdate('cascade');
		
		    $table->foreign('city_id','fk_cleaners_cities_2')
		        ->references('id')->on('cities')
		        ->onDelete('cascade')
		        ->onUpdate('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cleaners_cities');
    }
}
