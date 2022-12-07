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
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->text('description');
            $table->foreignId('body_id')->constrainded();
            $table->foreignId('breed_id')->constrainded();
            $table->foreignId('coat_id')->constrainded();
            $table->foreignId('origin_id')->constrainded();
            $table->foreignId('pattern_id')->constrainded();
            $table->foreignId('type_id')->constrainded();

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
        Schema::dropIfExists('cats');
    }
};
