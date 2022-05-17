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
        Schema::create('incident_service', function (Blueprint $table) {
            $table->foreignId('incident_id');
            $table->foreignId('service_id');
            $table->primary(['incident_id', 'service_id']);
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => 'IncidentServiceSeeder'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_service');
    }
};
