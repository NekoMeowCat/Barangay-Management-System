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
        Schema::create('blotters', function (Blueprint $table) {
            $table->id();
            $table->string('complainant');
            $table->string('defendant');
            $table->text('incident_description');
            $table->date('date_occured');
            $table->enum('status', ['ongoing', 'settled'])->default('ongoing');
            $table->datetime('schedule')->nullable();
            $table->string('remarks')->nullable();
            $table->unsignedBigInteger('officer_involved')->nullable();
            $table->timestamps();
            $table->foreign('officer_involved')
                ->references('id')
                ->on('officials')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blotters');
    }
};
