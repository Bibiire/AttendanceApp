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
        Schema::create('mems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('other');
            // $table->string('date_of_birth');
            $table->string('age');
            // $table->string('age_band');
            $table->string('gender');
            $table->bigInteger('center_id')->unsigned();
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
        Schema::dropIfExists('mems');
    }
};
