<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('your_phone');
            $table->string('father_name');
            $table->string('father_phone');
            $table->string('email');
            $table->text('address');
            $table->string('photo');
            $table->string('nid_number');
            $table->integer('room_id');
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
        Schema::dropIfExists('borders');
    }
}
