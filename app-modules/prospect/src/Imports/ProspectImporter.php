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

namespace AdvisingApp\Prospect\Imports;

use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\Prospect\Models\ProspectEmailAddress;
use AdvisingApp\Prospect\Models\ProspectSource;
use AdvisingApp\Prospect\Models\ProspectStatus;
use App\Features\ProspectStudentRefactor;
use App\Models\User;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProspectImporter extends Importer
{
    protected static ?string $model = Prospect::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('first_name')
                ->rules(['required'])
                ->requiredMapping()
                ->example('Jonathan'),
            ImportColumn::make('last_name')
                ->rules(['required'])
                ->requiredMapping()
                ->example('Smith'),
            ImportColumn::make('full_name')
                ->rules(['required'])
                ->requiredMapping()
                ->example('Jonathan Smith'),
            ImportColumn::make('preferred')
                ->example('John'),
            ImportColumn::make('status')
                ->relationship(
                    resolveUsing: fn (mixed $state) => ProspectStatus::query()
                        ->when(
                            Str::isUuid($state),
                            fn (Builder $query) => $query->whereKey($state),
                            fn (Builder $query) => $query->where('name', $state),
                        )
                        ->first(),
                )
                ->guess(['status_id', 'status_name'])
                ->requiredMapping()
                ->example(fn (): ?string => ProspectStatus::query()->value('name')),
            ImportColumn::make('source')
                ->relationship(
                    resolveUsing: fn (mixed $state) => ProspectSource::query()
                        ->when(
                            Str::isUuid($state),
                            fn (Builder $query) => $query->whereKey($state),
                            fn (Builder $query) => $query->where('name', $state),
                        )
                        ->first(),
                )
                ->guess(['source_id', 'source_name'])
                ->requiredMapping()
                ->example(fn (): ?string => ProspectSource::query()->value('name')),
            ImportColumn::make('description')
                ->example('A description of the prospect.'),
            ImportColumn::make('email')
                ->rules(['required', 'email'])
                ->requiredMapping()
                ->example('johnsmith@gmail.com'),
            // ImportColumn::make('email_2')
            //     ->rules(['email'])
            //     ->example('johnsmith@hotmail.com'),
            ImportColumn::make('mobile')
                ->example('+1 (555) 555-5555'),
            ImportColumn::make('sms_opt_out')
                ->label('SMS opt out')
                ->boolean()
                ->rules(['boolean'])
                ->example('no'),
            ImportColumn::make('email_bounce')
                ->boolean()
                ->rules(['boolean'])
                ->example('yes'),
            // ImportColumn::make('phone')
            //     ->example('+1 (555) 555-5555'),
            ImportColumn::make('address')
                ->example('123 Main St.'),
            ImportColumn::make('address_2')
                ->example('Apt. 1'),
            ImportColumn::make('birthdate')
                ->rules(['date'])
                ->example('1990-01-01'),
            ImportColumn::make('hsgrad')
                ->example('2009'),
        ];
    }

    public function resolveRecord(): ?Model
    {
        $email = $this->data['email'];

        if(ProspectStudentRefactor::active()){
            $emails = [$email];
        }else{
            $email2 = $this->data['email_2'] ?? null;
            $emails = [
                $email,
                ...filled($email2) ? [$email2] : [],
            ];
        }

        $prospect = Prospect::query()
            ->when(!ProspectStudentRefactor::active(),function(Builder $query) use($emails) {
                $query->whereIn('email', $emails)
                ->orWhereIn('email_2', $emails);
            })
            ->when(ProspectStudentRefactor::active(),function(Builder $query) use($emails) {
                $query->whereHas('primaryEmail',function(Builder $query) use($emails) {
                    $query->whereIn('address', $emails);
                });
            })
            ->first();

        if(!ProspectStudentRefactor::active()){
            return $prospect ?? new Prospect([
                'email' => $email,
                'email_2' => $email2,
            ]);
        }else{
            return $prospect ?? new Prospect();
        }
    }

    public function beforeCreate(): void
    {
        /** @var Prospect $record */
        $record = $this->record;

        /** @var User $user */
        $user = $this->import->user;

        $record->createdBy()->associate($user);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your prospect import has completed and ' . number_format($import->successful_rows) . ' ' . Str::plural('row', $import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . Str::plural('row', $failedRowsCount) . ' failed to import.';
        }

        return $body;
    }

    public function afterCreate():void
    {
       if(ProspectStudentRefactor::active()){
         /** @var Prospect $record */
         $record = $this->record;

         $primaryEmail = $record->emailAddresses()->create([
             'address' => $this->data['email'],
             'order' => DB::raw("(SELECT COALESCE(MAX(\"order\"), 0) + 1 FROM prospect_email_addresses WHERE prospect_id = '$record->id')")
         ]);
 
         $record->primaryEmail()->associate($primaryEmail);
 
         if(!blank($this->data['mobile'])){
 
             $primaryMobile = $record->phoneNumbers()->create([
                 'number' => $this->data['mobile'],
                 'order' => DB::raw("(SELECT COALESCE(MAX(\"order\"), 0) + 1 FROM prospect_phone_numbers WHERE prospect_id = '$record->id')")
             ]);
 
             $record->primaryPhone()->associate($primaryMobile);
 
         }
 
         if(!blank($this->data['address']) || !blank($this->data['address_2'])){
             $primaryAddress = $record->addresses()->create([
                 'line_1' => $this->data['address'],
                 'line_2' => $this->data['address_2'],
                 'order' => DB::raw("(SELECT COALESCE(MAX(\"order\"), 0) + 1 FROM prospect_addresses WHERE prospect_id = '$record->id')")
             ]);
             
             $record->primaryAddress()->associate($primaryAddress);
         }
 
         $record->save();
       }
    }
}
