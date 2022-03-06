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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('start');
            $table->string('finish');
            $table->float('distance',3, 1);
            $table->integer('elevation');
            $table->integer('type_id');
            $table->integer('difficulty_id');
            $table->integer('terrain_id');
            $table->time('time')->nullable();
            $table->string('notes')->nullable();
            $table->string('link')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('routes');
    }
};
