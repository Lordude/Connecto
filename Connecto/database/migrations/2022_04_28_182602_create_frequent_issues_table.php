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
        Schema::create('frequent_issues', function (Blueprint $table) {
            $table->id();
            $table->string('problem');
            $table->timestamps();

        });

        Artisan::call('db:seed', [
            '--class' => 'FrequentIssueSeeder'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frequent_issues');
    }
};
