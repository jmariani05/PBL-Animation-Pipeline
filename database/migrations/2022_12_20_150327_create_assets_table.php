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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->integer('id_asset_type');
            $table->integer('id_project');
            $table->string('name');
            $table->string('description');
            $table->string('code');
            $table->string('path')->nullable();
            // Rigging
            $table->string('status_rigging')->default('todo');
            $table->string('user_rigging')->nullable();
            // Concept
            $table->string('status_concept')->default('todo');
            $table->string('user_concept')->nullable();
            // Shading
            $table->string('status_shading')->default('todo');
            $table->string('user_shading')->nullable();
            // Modeling
            $table->string('status_modeling')->default('todo');
            $table->string('user_modeling')->nullable();
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
        Schema::dropIfExists('assets');
    }
};
