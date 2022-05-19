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
        Schema::create('audit_trail_details', function (Blueprint $table) {
            $table->id();
            $table->string('auditTrailLinkId');
            $table->string('fieldName');
            $table->string('oldValue');
            $table->string('newValue');
            $table->string('linkId');
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
        Schema::dropIfExists('audit_trail_details');
    }
};
