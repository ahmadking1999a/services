<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mother_name');
            $table->string('phone_number');
            $table->text('workshop_address')->nullable();
            $table->string('id_number')->unique();
            $table->string('national_number')->unique();
            $table->string('id_photo');
            $table->string('personal_photo')->nullable();
            $table->string('description')->nullable();
            $table->string('service');
            $table->string('password');
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
        Schema::dropIfExists('workers');
    }
}
