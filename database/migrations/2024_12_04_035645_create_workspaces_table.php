<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('body');
            $table->timestamps();
            $table->integer('total_rooms')->default(0);
            $table->integer('workshop_rooms')->default(0);
            $table->integer('classrooms')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down():void
    {
        Schema::dropIfExists('workspaces');
    }
};
