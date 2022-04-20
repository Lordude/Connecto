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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->mediumText('commentary')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreignId('state_id')
                    ->constrained()
                    ->onDeletE('cascade');
        });

        Artisan::call('db:seed', [
            '--class' => 'IncidentSeeder'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
};
