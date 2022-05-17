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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->tinyText('detail')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();

            $table->foreignId('frequent_issue_id')
            ->constrained()
            ->onDelete('cascade')
            ->nullable();
        });

        Artisan::call('db:seed', [
            '--class' => 'ReportSeeder'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
