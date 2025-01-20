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

namespace AdvisingApp\StudentDataModel\Filament\Resources\StudentResource\Actions;

use AdvisingApp\StudentDataModel\Models\Student;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\Actions\Action;
use Filament\Notifications\Notification;

class EditStudentAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->modalHeading('Edit')
            ->modalSubmitActionLabel('Save changes')
            ->mountUsing(function (Form $form, $record) {
                $form->fill($record->attributesToArray());
            })
            ->form([
                Section::make('Personal Information')
                    ->schema([
                        TextInput::make('otherid')
                            ->label('Other ID')
                            ->string()
                            ->maxLength(255),
                        TextInput::make(Student::displayFirstNameKey())
                            ->label('First Name')
                            ->string()
                            ->maxLength(255),
                        TextInput::make(Student::displayLastNameKey())
                            ->label('Last Name')
                            ->string()
                            ->maxLength(255),
                        TextInput::make(Student::displayNameKey())
                            ->label('Full Name')
                            ->string()
                            ->maxLength(255),
                        TextInput::make('preferred')
                            ->label('Preferred Name')
                            ->string()
                            ->maxLength(255),
                        DatePicker::make('birthdate')
                            ->label('Birthdate')
                            ->native(false)
                            ->closeOnDateSelection()
                            ->format('Y-m-d')
                            ->displayFormat('Y-m-d')
                            ->maxDate(now()),
                        TextInput::make('hsgrad')
                            ->label('High School Graduation Date')
                            ->nullable()
                            ->numeric(),
                    ])
                    ->columns(3),
                Section::make('Contact Information')
                    ->schema([
                        TextInput::make('email')
                            ->label('Primary Email')
                            ->email()
                            ->unique(ignoreRecord: true)
                            ->required(),
                        TextInput::make('email_2')
                            ->label('Other Email')
                            ->email(),
                        TextInput::make('mobile')
                            ->label('Mobile')
                            ->string()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->label('Other Phone')
                            ->string()
                            ->maxLength(255),
                        TextInput::make('address')
                            ->label('Address')
                            ->string()
                            ->maxLength(255),
                        TextInput::make('address2')
                            ->label('Apartment/Unit Number')
                            ->string()
                            ->maxLength(255),
                        TextInput::make('address3')
                            ->label('Additional Address')
                            ->string()
                            ->maxLength(255),
                        TextInput::make('city')
                            ->label('City')
                            ->string()
                            ->maxLength(255),
                        TextInput::make('state')
                            ->label('State')
                            ->string()
                            ->maxLength(255),
                        TextInput::make('postal')
                            ->label('Postal')
                            ->string()
                            ->maxLength(255),
                    ])
                    ->columns(3),
                Section::make('Engagement Restrictions')
                    ->schema([
                        Toggle::make('sms_opt_out')
                            ->label('SMS Opt Out'),
                        Toggle::make('email_bounce')
                            ->label('Email Bounce'),
                        Toggle::make('dual')
                            ->label('Dual'),
                        Toggle::make('ferpa')
                            ->label('FERPA'),
                        Toggle::make('firstgen')
                            ->label('Firstgen'),
                        Toggle::make('sap')
                            ->label('SAP'),
                        TextInput::make('holds')
                            ->label('Holds'),
                        DatePicker::make('dfw')
                            ->label('DFW')
                            ->native(false)
                            ->closeOnDateSelection()
                            ->format('Y-m-d')
                            ->displayFormat('Y-m-d'),
                        TextInput::make('ethnicity')
                            ->label('Ethnicity')
                            ->string(),
                        DateTimePicker::make('lastlmslogin')
                            ->label('Last LMS login')
                            ->native(false)
                            ->closeOnDateSelection()
                            ->format('Y-m-d H:i:s')
                            ->displayFormat('Y-m-d H:i:s'),
                        TextInput::make('f_e_term')
                            ->label('First Enrollment Term')
                            ->string()
                            ->maxLength(255),
                        TextInput::make('mr_e_term')
                            ->label('Most Recent Enrollment Term')
                            ->string()
                            ->maxLength(255),
                    ])
                    ->columns(3),
            ])
            ->action(function (array $data, Student $student) {
                $student->update($data);

                Notification::make()
                    ->title('Student record updated.')
                    ->success()
                    ->send();
            })
            ->authorize(function ($record) {
                return auth()->user()->can('update', $record);
            });
    }
}
