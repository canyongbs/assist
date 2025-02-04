<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('prospect_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('prospect_id')->constrained('prospects');
            $table->string('line_1')->nullable();
            $table->string('line_2')->nullable();
            $table->string('line_3')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prospect_addresses');
    }
};
