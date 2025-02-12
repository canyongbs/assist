<?php

use App\Features\ProspectStudentRefactor;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up(): void
    {
        ProspectStudentRefactor::activate();
    }

    public function down(): void
    {
        ProspectStudentRefactor::deactivate();
    }
};
