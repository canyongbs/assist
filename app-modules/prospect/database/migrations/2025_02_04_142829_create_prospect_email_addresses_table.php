<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('prospect_email_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('prospect_id')->constrained('prospects');
            $table->string('address');
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prospect_email_addresses');
    }
};
