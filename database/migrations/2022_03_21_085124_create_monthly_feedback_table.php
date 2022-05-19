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
        Schema::create('monthly_feedback', function (Blueprint $table) {
            $table->id();
            $table->string('relocate');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('firstMenteeName')->nullable();
            $table->string('firstMenteePhone')->nullable();
            $table->string('firstMenteeOffice')->nullable();
            $table->string('firstMenteemfm')->nullable();
            $table->string('secondMenteeName')->nullable();
            $table->string('secondMenteePhone')->nullable();
            $table->string('secondMenteeOffice')->nullable();
            $table->string('secondMenteemfm')->nullable();
            $table->string('lackOfficer');
            $table->string('center')->nullable();
            $table->string('officer')->nullable();
            $table->string('officerChange');
            $table->string('whenWho')->nullable();
            $table->string('remark');
            $table->timestamps();
            $table->bigInteger('zone_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_feedback');
    }
};
