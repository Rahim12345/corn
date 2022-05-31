<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaqqimizdasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('haqqimizdas', function (Blueprint $table) {
            $table->id();
            $table->string('src')->nullable();
            $table->string('text_az')->nullable();
            $table->string('text_en')->nullable();
            $table->string('text_ru')->nullable();
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
        Schema::dropIfExists('haqqimizdas');
    }
}
