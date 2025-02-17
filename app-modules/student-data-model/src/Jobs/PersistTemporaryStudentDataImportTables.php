<?php

namespace AdvisingApp\StudentDataModel\Jobs;

use App\Models\Import;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class PersistTemporaryStudentDataImportTables implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Import $studentsImport,
        public Import $programsImport,
        public Import $enrollmentsImport,
    ) {}

    public function handle(): void
    {
        DB::transaction(function () {
            DB::statement('drop table "students"');
            DB::statement("alter table \"import_{$this->studentsImport->getKey()}_students\" rename to \"students\"");

            DB::statement('drop table "programs"');
            DB::statement("alter table \"import_{$this->programsImport->getKey()}_programs\" rename to \"programs\"");

            DB::statement('drop table "enrollments"');
            DB::statement("alter table \"import_{$this->enrollmentsImport->getKey()}_enrollments\" rename to \"enrollments\"");
        });
    }
}
