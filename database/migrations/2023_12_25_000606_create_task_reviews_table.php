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
        Schema::create('task_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('number')->default('TR-default');
            $table->string('equipment')->nullable();
            $table->string('model')->nullable();
            $table->string('sn')->nullable();
            $table->string('registration')->nullable();
            $table->json('tasks')->nullable();
            $table->json('materials')->nullable();
            $table->json('additionalTasks')->nullable();
            $table->json('comments')->nullable();
            $table->string('organization')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_reviews');
    }
};
