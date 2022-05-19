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
        Schema::create('zonal_coordinators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('zone_id')->unsigned();
            $table->string('phone');
            $table->string('Address');
            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            // $table->foreign('team_lead_id')->refrences('id')->on('team_leads')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zonal_coordinators');
    }
};
