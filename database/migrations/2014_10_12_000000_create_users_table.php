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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('role')->default('resident');
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->integer('age')->nullable();
            $table->string('status')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('occupation')->nullable();
            $table->string('religion')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('purok_id')->nullable()->constrained();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
