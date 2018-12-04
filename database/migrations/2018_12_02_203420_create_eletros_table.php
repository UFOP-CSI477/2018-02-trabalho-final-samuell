<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEletrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eletros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 30);
            $table->decimal('potencia', 6, 2);
            $table->string('quantidade');
            $table->decimal('tempo', 5, 2);
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
        Schema::dropIfExists('eletros');
    }
}
