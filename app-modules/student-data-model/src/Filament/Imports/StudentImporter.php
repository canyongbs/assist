<?php

/*
<COPYRIGHT>

    Copyright © 2016-2025, Canyon GBS LLC. All rights reserved.

    Advising App™ is licensed under the Elastic License 2.0. For more details,
    see https://github.com/canyongbs/advisingapp/blob/main/LICENSE.

    Notice:

    - You may not provide the software to third parties as a hosted or managed
      service, where the service provides users with access to any substantial set of
      the features or functionality of the software.
    - You may not move, change, disable, or circumvent the license key functionality
      in the software, and you may not remove or obscure any functionality in the
      software that is protected by the license key.
    - You may not alter, remove, or obscure any licensing, copyright, or other notices
      of the licensor in the software. Any use of the licensor’s trademarks is subject
      to applicable law.
    - Canyon GBS LLC respects the intellectual property rights of others and expects the
      same in return. Canyon GBS™ and Advising App™ are registered trademarks of
      Canyon GBS LLC, and we are committed to enforcing and protecting our trademarks
      vigorously.
    - The software solution, including services, infrastructure, and code, is offered as a
      Software as a Service (SaaS) by Canyon GBS LLC.
    - Use of this software implies agreement to the license terms and conditions as stated
      in the Elastic License 2.0.

    For more information or inquiries please visit our website at
    https://www.canyongbs.com or contact us via email at legal@canyongbs.com.

</COPYRIGHT>
*/

namespace AdvisingApp\StudentDataModel\Filament\Imports;

use AdvisingApp\StudentDataModel\Models\Student;
use App\Features\ProspectStudentRefactor;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentImporter extends Importer
{
    protected static ?string $model = Student::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('sisid')
                ->label('Student ID')
                ->requiredMapping()
                ->example('########')
                ->rules([
                    'required',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('otherid')
                ->label('Other ID')
                ->example('##########')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('first')
                ->example('Jonathan')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('last')
                ->example('Smith')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('full_name')
                ->example('Jonathan Smith')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('preferred')
                ->example('John')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('birthdate')
                ->example('2024-10-21')
                ->rules([
                    'nullable',
                    'date',
                ]),
            ImportColumn::make('hsgrad')
                ->example('1920')
                ->rules([
                    'nullable',
                    'integer',
                ]),
            ImportColumn::make('email')
                ->example('johnsmith@gmail.com')
                ->rules([
                    'nullable',
                    'email',
                    'max:255',
                ]),
            ImportColumn::make('mobile')
                ->example('+1 (555) 555-5555')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('address')
                ->example('123 Main St.')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('address2')
                ->example('Apt. 1')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('address3')
                ->example('xyz')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('city')
                ->example('Los Angeles')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('state')
                ->example('california')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('postal')
                ->example('83412')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('sms_opt_out')
                ->label('SMS opt out')
                ->example('false')
                ->boolean(),
            ImportColumn::make('email_bounce')
                ->example('true')
                ->boolean(),
            ImportColumn::make('dual')
                ->example('true')
                ->boolean(),
            ImportColumn::make('ferpa')
                ->label('FERPA')
                ->example('true')
                ->boolean(),
            ImportColumn::make('dfw')
                ->label('DFW')
                ->example('2024-10-21')
                ->rules([
                    'nullable',
                    'date',
                ]),
            ImportColumn::make('sap')
                ->label('SAP')
                ->example('true')
                ->boolean(),
            ImportColumn::make('holds')
                ->example('UHIJN')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('firstgen')
                ->example('true')
                ->boolean(),
            ImportColumn::make('ethnicity')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('lastlmslogin')
                ->label('Last LMS login')
                ->example('2024-10-21 12:00:00')
                ->rules([
                    'nullable',
                    'date',
                ]),
            ImportColumn::make('f_e_term')
                ->label('First Enrollment Term')
                ->example('1234')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
            ImportColumn::make('mr_e_term')
                ->label('Most Recent Enrollment Term')
                ->example('1234')
                ->rules([
                    'nullable',
                    'string',
                    'max:255',
                ]),
        ];
    }

    public function resolveRecord(): ?Student
    {
        return (new Student())->setTable("import_{$this->import->getKey()}_students");
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your student import has completed and ' . number_format($import->successful_rows) . ' ' . Str::plural('row', $import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . Str::plural('row', $failedRowsCount) . ' failed to import.';
        }

        return $body;
    }

    public function afterCreate(): void
    {
        if (ProspectStudentRefactor::active()) {
            /** @var Prospect $record */
            $record = $this->record;

            $primaryEmail = $record->emailAddresses()->create([
                'address' => $this->data['email'],
                'order' => DB::raw("(SELECT COALESCE(MAX(\"order\"), 0) + 1 FROM student_email_addresses WHERE sisid = '{$record->id}')"),
            ]);

            $record->primaryEmail()->associate($primaryEmail);

            if (! blank($this->data['mobile'])) {
                $primaryMobile = $record->phoneNumbers()->create([
                    'number' => $this->data['mobile'],
                    'type' => 'Mobile',
                    'can_recieve_sms' => $this->data['sms_opt_out'],
                    'order' => DB::raw("(SELECT COALESCE(MAX(\"order\"), 0) + 1 FROM student_phone_numbers WHERE sisid = '{$record->id}')"),
                ]);

                $record->primaryPhone()->associate($primaryMobile);
            }

            if (! blank($this->data['address']) || ! blank($this->data['address_2'])) {
                $primaryAddress = $record->addresses()->create([
                    'line_1' => $this->data['address'],
                    'line_2' => $this->data['address2'],
                    'line_3' => $this->data['address3'],
                    'city' => $this->data['city'],
                    'state' => $this->data['state'],
                    'postal' => $this->data['postal'],
                    'order' => DB::raw("(SELECT COALESCE(MAX(\"order\"), 0) + 1 FROM student_addresses WHERE sisid = '{$record->id}')"),
                ]);

                $record->primaryAddress()->associate($primaryAddress);
            }

            $record->save();
        }
    }
}
