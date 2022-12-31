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

        Schema::create('categories', function (Blueprint $table) {
            // id: BIGINT  UNSIGN  NOT_NULL  AI  PRIMARY
            $table->id();
            $table->String('name',255);
            $table->string('title',255)->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('disc', 512)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
