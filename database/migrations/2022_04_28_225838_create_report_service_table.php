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
        Schema::create('report_service', function (Blueprint $table) {
            $table->foreignId('report_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->foreignId('service_id')
                    ->constrained()
                    ->onDelete('cascade');
            $table->primary(['report_id', 'service_id']);
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => 'ReportServiceSeeder'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_service');
    }
};
