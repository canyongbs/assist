<?php

namespace AdvisingApp\StudentDataModel\Actions;

use App\Models\Import;
use Illuminate\Support\Facades\DB;

class CreateTemporaryStudentDataImportTables
{
    public function execute(
        ?Import $studentsImport,
        ?Import $programsImport = null,
        ?Import $enrollmentsImport = null,
    ): void {
        DB::transaction(function () use ($studentsImport, $programsImport, $enrollmentsImport) {
            DB::statement("create table \"import_{$studentsImport->getKey()}_students\" as table \"students\" with no data");

            if ($programsImport) {
                DB::statement("create table \"import_{$programsImport->getKey()}_programs\" as table \"programs\" with no data");
            }

            if ($enrollmentsImport) {
                DB::statement("create table \"import_{$enrollmentsImport->getKey()}_enrollments\" as table \"enrollments\" with no data");
            }
        });
    }
}
