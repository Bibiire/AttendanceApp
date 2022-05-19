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
        Schema::create('special_requests', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('dob');
            $table->string('gender');
            $table->string('phoneNo');
            $table->string('maritalStatus');
            $table->string('address');
            $table->string('email');
            $table->string('attendance');
            $table->string('prevApply');
            $table->string('finCounsel');
            $table->string('finSituation');
            $table->decimal('totalSum',20,2);
            $table->string('need');
            $table->string('pastorComment')->nullable();
            $table->string('employmentStatus');
            $table->string('RequestDetails');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('special_requests');
    }
};
