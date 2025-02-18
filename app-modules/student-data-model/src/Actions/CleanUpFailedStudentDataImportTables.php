<?php

namespace AdvisingApp\StudentDataModel\Actions;

use App\Models\Import;
use Illuminate\Support\Facades\DB;

class CleanUpFailedStudentDataImportTables
{
    public function execute(
        ?Import $studentsImport,
        ?Import $programsImport = null,
        ?Import $enrollmentsImport = null,
    ): void {
        DB::statement("drop table if exists import_{$studentsImport->getKey()}_students");

        if ($programsImport) {
            DB::statement("drop table if exists import_{$programsImport->getKey()}_programs");
        }

        if ($enrollmentsImport) {
            DB::statement("drop table if exists import_{$enrollmentsImport->getKey()}_enrollments");
        }
    }
}
