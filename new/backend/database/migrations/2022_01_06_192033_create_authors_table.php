<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
            Schema::create('products', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('name', 200);
                $table->string('desc', 1200)->default('Sem descrição');
    
    
                #FOREIGN KEYS
                //$table->foreign('user_id')->references('id')->on('users');
                //$table->unsignedBigInteger('user_id');
    
    
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
        Schema::dropIfExists('products');
    }
}
