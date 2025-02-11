<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreignUuid('primary_email_id')->nullable()->constrained('student_email_addresses')->cascadeOnDelete();
            $table->foreignUuid('primary_phone_id')->nullable()->constrained('student_phone_numbers')->cascadeOnDelete();
            $table->foreignUuid('primary_address_id')->nullable()->constrained('student_addresses')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['primary_email_id', 'primary_phone_id', 'primary_address_id']);
        });
    }
};
