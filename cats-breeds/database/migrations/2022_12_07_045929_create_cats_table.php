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
            $table->foreignId('body_id')->constrained()->restrictOnDelete();
            $table->foreignId('breed_id')->constrained()->restrictOnDelete();
            $table->foreignId('coat_id')->constrained()->restrictOnDelete();
            $table->foreignId('origin_id')->constrained()->restrictOnDelete();
            $table->foreignId('pattern_id')->constrained()->restrictOnDelete();
            $table->foreignId('type_id')->constrained()->restrictOnDelete();

            $table->unique(['body_id', 'breed_id','coat_id', 'origin_id', 'pattern_id', 'type_id'], 'category_index');

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
