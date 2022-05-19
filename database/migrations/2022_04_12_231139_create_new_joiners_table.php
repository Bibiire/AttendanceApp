<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_joiners', function (Blueprint $table) {
            $table->id();
            $table->string('family_name');
            $table->string('other_name');
            $table->string('date_of_birth');
            $table->string('age');
            $table->string('age_band');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('home_address');
            $table->string('stateOfOrigin');
            $table->string('position');
            $table->string('phone_number');
            $table->bigInteger('center_id')->unsigned();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('new_joiners');
    }
};
