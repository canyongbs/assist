<?php

use App\Features\ProspectStudentRefactor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        ProspectStudentRefactor::activate();
    }

    public function down(): void
    {
        ProspectStudentRefactor::deactivate();
    }
};
