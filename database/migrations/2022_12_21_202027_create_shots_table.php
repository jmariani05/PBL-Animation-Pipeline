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
        Schema::create('shots', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sequence');
            $table->string('title');
            $table->string('path')->nullable();
            $table->string('frames')->nullable();
            $table->string('in')->nullable();
            $table->string('out')->nullable();
            // Layout
            $table->string('status_layout')->default('todo');
            $table->string('user_layout')->nullable();
            // Animation
            $table->string('status_animation')->default('todo');
            $table->string('user_animation')->nullable();
            // Render
            $table->string('status_render')->default('todo');
            $table->string('user_render')->nullable();
            // Compositing
            $table->string('status_compositing')->default('todo');
            $table->string('user_compositing')->nullable();
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
        Schema::dropIfExists('shots');
    }
};
