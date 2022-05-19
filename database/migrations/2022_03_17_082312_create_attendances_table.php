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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('activity');
            $table->string('femaleAdult')->nullable();
            $table->string('maleAdult')->nullable();
            $table->string('femaleYouth')->nullable();
            $table->string('maleYouth')->nullable();
            $table->string('femaleTeen')->nullable();
            $table->string('maleTeen')->nullable();
            $table->string('femaleChild')->nullable();
            $table->string('maleChild')->nullable();
            $table->string('visit');
            $table->string('covid');
            $table->string('covidReason')->nullable();
            $table->string('stateOfFlock');
            $table->string('finalRemark');
            $table->string('totalMale')->nullable();
            $table->string('totalFemale')->nullable();
            $table->string('totalAttendance')->nullable();
            $table->string('timeStart');
            $table->string('timeEnd');
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
        Schema::dropIfExists('attendances');
    }
};
