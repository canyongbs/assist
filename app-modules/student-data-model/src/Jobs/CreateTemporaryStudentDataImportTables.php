<?php

namespace AdvisingApp\StudentDataModel\Jobs;

use App\Models\Import;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class CreateTemporaryStudentDataImportTables implements ShouldQueue
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
            DB::statement("create table \"import_{$this->studentsImport->getKey()}_students\" as table \"students\" with no data");
            DB::statement("create table \"import_{$this->programsImport->getKey()}_programs\" as table \"programs\" with no data");
            DB::statement("create table \"import_{$this->enrollmentsImport->getKey()}_enrollments\" as table \"enrollments\" with no data");
        });
    }
}
