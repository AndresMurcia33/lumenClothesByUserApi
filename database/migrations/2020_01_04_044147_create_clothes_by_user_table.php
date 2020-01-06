<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClothesByUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clothe_by_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 150);
            $table->string('description', 500);
            $table->integer('price')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->integer('category_id')->unsigned();
            $table->boolean('state')-> default(true);  
           
            $table->bigInteger('clothing_size_id')->unsigned();
            $table->foreign('clothing_size_id')->references('id')->on('clothing_sizes');
           
            $table->bigInteger('clothing_brand_id')->unsigned();
            $table->foreign('clothing_brand_id')->references('id')->on('clothing_brands');
           
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
        Schema::dropIfExists('clothe_by_users');

        Schema::table('clothe_by_users', function(Blueprint $table){

            $table->dropForeign(['clothing_size_id']);
            $table->dropColumn('clothing_size_id');
            $table->dropForeign(['clothing_brand_id']);
            $table->dropColumn('clothing_brand_id');
        }
    );
    }
}
