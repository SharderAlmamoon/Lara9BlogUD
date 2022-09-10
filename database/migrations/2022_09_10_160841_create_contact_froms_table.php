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
        Schema::create('contact_froms', function (Blueprint $table) {
            $table->id();
            $table->string('contact_name',120);
            $table->string('contact_email',100);
            $table->string('contact_number',15);
            $table->text('contact_message',15);
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
        Schema::dropIfExists('contact_froms');
    }
};
