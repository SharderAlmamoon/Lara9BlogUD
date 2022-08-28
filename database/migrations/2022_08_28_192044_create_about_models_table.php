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
        Schema::create('about_models', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->string('short_title',255);
            $table->text('short_description');
            $table->text('long_description');
            $table->string('about_image');
            $table->integer('status')->default(1)->comment('1 For Active 2 For Inactive');
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
        Schema::dropIfExists('about_models');
    }
};
