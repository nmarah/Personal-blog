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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 255);
            $table->string('image')->nullable();
            $table->String('about_me', 1000);
            $table->string('email');
            $table->string('phone');
            $table->string('address',255);
            $table->string('facebook',512);
            $table->string('instagram',512);
            $table->string('twitter',512);
            $table->string('linkedin',512);
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
        Schema::dropIfExists('about');
    }
};
