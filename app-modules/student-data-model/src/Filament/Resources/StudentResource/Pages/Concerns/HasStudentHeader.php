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

namespace AdvisingApp\StudentDataModel\Filament\Resources\StudentResource\Pages\Concerns;

use AdvisingApp\Notification\Filament\Actions\SubscribeHeaderAction;
use AdvisingApp\StudentDataModel\Actions\DeleteStudent;
use AdvisingApp\StudentDataModel\Filament\Resources\StudentResource;
use AdvisingApp\StudentDataModel\Filament\Resources\StudentResource\Actions\StudentTagsAction;
use AdvisingApp\StudentDataModel\Filament\Resources\StudentResource\Actions\SyncStudentSisAction;
use AdvisingApp\StudentDataModel\Filament\Resources\StudentResource\Pages\ViewStudent;
use AdvisingApp\StudentDataModel\Settings\StudentInformationSystemSettings;
use App\Features\ProspectStudentRefactor;
use App\Settings\DisplaySettings;
use Filament\Actions\DeleteAction;
use Illuminate\Contracts\View\View;

trait HasStudentHeader
{
    public function getHeader(): ?View
    {
        $sisSettings = app(StudentInformationSystemSettings::class);

        $student = $this->getRecord();
        $studentName = filled($student->full_name)
            ? $student->full_name
            : "{$student->first} {$student->last}";

        return view('student-data-model::filament.resources.educatable-resource.view-educatable.header', [
            'actions' => $this->getCachedHeaderActions(),
            'backButtonLabel' => 'Back to student',
            'backButtonUrl' => $this instanceof ViewStudent
                ? null
                : StudentResource::getUrl('view', ['record' => $this->getRecord()]),
            'badges' => [
                ...($student->firstgen ? ['First Gen'] : []),
                ...($student->dual ? ['Dual'] : []),
                ...($student->sap ? ['SAP'] : []),
                ...(filled($student->dfw) ? ["DFW {$student->dfw->format('m/d/Y')}"] : []),
            ],
            'breadcrumbs' => $this->getBreadcrumbs(),
            'details' => [
                ['Student', 'heroicon-m-user'],
                ...(filled($student->preferred) ? [["Goes by \"{$student->preferred}\"", 'heroicon-m-heart']] : []),
                ...(
                    ProspectStudentRefactor::active()
                ? (filled($student->primaryPhone) ? [[$student->primaryPhone->number, 'heroicon-m-phone']] : [])
                : (filled($student->phone) ? [[$student->phone, 'heroicon-m-phone']] : [])
                ),
                ...(
                    ProspectStudentRefactor::active()
                    ? (filled($student->primaryEmail) ? [[$student->primaryEmail->address, 'heroicon-m-envelope']] : [])
                    : (filled($student->email) ? [[$student->email, 'heroicon-m-envelope']] : [])
                ),
                ...(filled($student->sisid) ? [[$student->sisid, 'heroicon-m-identification']] : []),
            ],
            'hasSisSystem' => $sisSettings->is_enabled && $sisSettings->sis_system,
            'educatable' => $student,
            'educatableInitials' => str($studentName)
                ->trim()
                ->explode(' ')
                ->map(fn (string $segment): string => filled($segment) ? mb_substr($segment, 0, 1) : '')
                ->join(' '),
            'educatableName' => $studentName,
            'timezone' => app(DisplaySettings::class)->getTimezone(),
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            StudentTagsAction::make()->visible(fn (): bool => auth()->user()->can('student.*.update')),
            SyncStudentSisAction::make(),
            SubscribeHeaderAction::make(),
            DeleteAction::make()
                ->modalDescription('Are you sure you wish to delete the student? By deleting a student record, you will remove any related enrollment and program data, along with any related interactions, notes, etc. This action cannot be reversed.')
                ->using(function ($record) {
                    app(DeleteStudent::class)->execute($record);
                }),
        ];
    }
}
