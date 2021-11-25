<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->default('Details about subject');
            $table->string('code')->unique();
            $table->string('cover')->nullable();
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')
                ->references('id')->on('doctors')
                ->onDelete('cascade');
            
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onDelete('cascade');
            
            $table->integer('level_id')->unsigned();
            $table->foreign('level_id')
                ->references('id')->on('levels')
                ->onDelete('cascade');
    
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
        Schema::dropIfExists('subjects');
    }
}
