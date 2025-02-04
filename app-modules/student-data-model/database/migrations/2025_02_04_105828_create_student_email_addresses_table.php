<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('student_email_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('student_id');
            $table->string('address');
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_email_addresses');
    }
};
