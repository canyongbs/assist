<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('student_phone_numbers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('student_id');
            $table->string('number');
            $table->unsignedInteger('ext')->nullable();
            $table->string('type')->nullable();
            $table->boolean('is_mobile')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_phone_numbers');
    }
};
