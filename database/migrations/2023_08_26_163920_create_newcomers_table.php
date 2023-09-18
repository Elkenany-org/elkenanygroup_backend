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
        Schema::create('newcomers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('secondname');
            $table->string('phone');
            $table->string('email');
            $table->string('job_title')->nullable(true);
            $table->string('cv');
            $table->boolean('read')->default(false);
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
        Schema::dropIfExists('newcomers');
    }
};
