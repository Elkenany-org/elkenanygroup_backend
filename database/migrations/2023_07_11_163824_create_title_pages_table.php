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
        Schema::create('title_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->string('image');
            $table->longtext('description_en')->default('no description');
            $table->longtext('description_ar')->default('لا يوجد وصف');
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
        Schema::dropIfExists('title_pages');
    }
};
