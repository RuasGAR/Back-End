<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('id');
            $table->string('name');
            $table->string('cpf')->unique()->nullable();
            $table->string('age');
            $table->string('email');->unique()->nullable();
            $table->string('team_id')->nullable();
        });
        
        Schema::table('fans', function (Blueprint $table){
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('set null');
        }



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fans');
    }
}
