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
        Schema::create('cihs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('zone_id')->unsigned();
            $table->bigInteger('center_id')->unsigned();
            $table->string('address');
            $table->string('phone');
            $table->string('profile_image')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            // $table->foreign('zonal_coordinator_id')->refrences('id')->on('zonal_coordinators');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cih');
    }
};
