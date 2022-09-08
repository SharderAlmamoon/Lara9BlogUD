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
        Schema::create('foters', function (Blueprint $table) {
            $table->id();
            $table->string('number',15)->unique();
            $table->text('footer_short_description');
            $table->string('address',200);
            $table->string('email',100)->unique();
            $table->string('facebook_link',200);
            $table->string('twitter_link',200);
            $table->string('linkedin_link',200);
            $table->string('dribble_link',200);
            $table->string('pinterest_link',200);
            $table->string('copywrite_text',200);
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
        Schema::dropIfExists('foters');
    }
};
