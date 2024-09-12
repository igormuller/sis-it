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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('enroll')->unique();
            $table->string('name');
            $table->date('birthday');
            $table->enum('segment', ['KINDERGARTEN', 'EARLY', 'SECONDARY', 'HIGH_SCHOOL'])->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
