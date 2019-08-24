<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('clinic_id')->references('id')->on('clinics');
            $table->foreign('session_id')->references('id')->on('sessions');
            $table->foreign('day_id')->references('id')->on('days');
            $table->foreign('charge_id')->references('id')->on('charges');
        });
    }
}
