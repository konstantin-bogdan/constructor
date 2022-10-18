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
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('cover')->nullable();
            $table->boolean('show')->default(false);
            $table->smallInteger('number')->default(1);
            $table->json('first_fields')->nullable();
            $table->json('second_fields')->nullable();
            $table->json('third_fields')->nullable();
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
        Schema::dropIfExists('templates');
    }
};
