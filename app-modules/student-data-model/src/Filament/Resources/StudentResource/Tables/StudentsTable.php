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

namespace AdvisingApp\StudentDataModel\Filament\Resources\StudentResource\Tables;

use AdvisingApp\StudentDataModel\Filament\Resources\StudentResource;
use AdvisingApp\StudentDataModel\Models\Student;
use App\Features\ProspectStudentRefactor;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\Constraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\NumberConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\Operators\Operator;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\RelationshipConstraint\Operators\IsRelatedToOperator;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(fn () => Student::query())
            ->columns([
                TextColumn::make(Student::displayNameKey())
                    ->label('Name')
                    ->sortable(),
                TextColumn::make('email')->visible(! ProspectStudentRefactor::active()),
                TextColumn::make('mobile')->visible(! ProspectStudentRefactor::active()),
                TextColumn::make('phone')->visible(! ProspectStudentRefactor::active()),
                TextColumn::make('primaryEmail.address')->label('Email')->visible(ProspectStudentRefactor::active()),
                TextColumn::make('primaryPhone.number')->label('Phone')->visible(ProspectStudentRefactor::active()),
                TextColumn::make('sisid'),
                TextColumn::make('otherid'),
            ])
            ->filters([
                QueryBuilder::make()
                    ->constraints([
                        TextConstraint::make('full_name')
                            ->label('Full Name')
                            ->icon('heroicon-m-user'),
                        TextConstraint::make('first')
                            ->label('First Name')
                            ->icon('heroicon-m-user'),
                        TextConstraint::make('last')
                            ->label('Last Name')
                            ->icon('heroicon-m-user'),
                        TextConstraint::make('preferred')
                            ->label('Preferred Name')
                            ->icon('heroicon-m-user'),
                        TextConstraint::make('sisid')
                            ->label('Student ID')
                            ->icon('heroicon-m-finger-print'),
                        TextConstraint::make('otherid')
                            ->label('Other ID')
                            ->icon('heroicon-m-finger-print'),
                        ...(ProspectStudentRefactor::active()
                            ?
                            [
                                TextConstraint::make('primaru_email_id')
                                    ->label('Email Address')
                                    ->relationship('primaryEmail', 'address')
                                    ->icon('heroicon-m-envelope'),
                                TextConstraint::make('primary_phone_id')
                                    ->label('Mobile')
                                    ->relationship('primaryPhone', 'number')
                                    ->icon('heroicon-m-phone'),
                                TextConstraint::make('primary_address_id')
                                    ->label('Address')
                                    ->relationship('primaryAddress', 'line_1')
                                    ->icon('heroicon-m-map-pin'),
                            ]
                            :
                            [
                                TextConstraint::make('email')
                                    ->label('Email Address')
                                    ->icon('heroicon-m-envelope'),
                                TextConstraint::make('mobile')
                                    ->icon('heroicon-m-phone'),
                                TextConstraint::make('address')
                                    ->icon('heroicon-m-map-pin'),
                            ]),
                        RelationshipConstraint::make('tags')
                            ->label('Tags')
                            ->icon('heroicon-m-rectangle-group')
                            ->selectable(
                                IsRelatedToOperator::make()
                                    ->titleAttribute('name')
                                    ->multiple()
                                    ->preload(),
                            ),
                        TextConstraint::make('holds')
                            ->icon('heroicon-m-exclamation-triangle'),
                        BooleanConstraint::make('sap')
                            ->label('SAP')
                            ->icon('heroicon-m-academic-cap'),
                        BooleanConstraint::make('dual'),
                        BooleanConstraint::make('firstgen')
                            ->label('First Generation')
                            ->icon('heroicon-m-academic-cap'),
                        BooleanConstraint::make('ferpa')
                            ->label('FERPA')
                            ->icon('heroicon-m-lock-open'),
                        Constraint::make('subscribed')
                            ->icon('heroicon-m-bell')
                            ->operators([
                                Operator::make('subscribed')
                                    ->label(fn (bool $isInverse): string => $isInverse ? 'Not subscribed' : 'Subscribed')
                                    ->summary(fn (bool $isInverse): string => $isInverse ? 'You are not subscribed' : 'You are subscribed')
                                    ->baseQuery(fn (Builder $query, bool $isInverse) => $query->{$isInverse ? 'whereDoesntHave' : 'whereHas'}(
                                        'subscriptions.user',
                                        fn (Builder $query) => $query->whereKey(auth()->user()),
                                    )),
                            ]),
                        RelationshipConstraint::make('programs')
                            ->multiple()
                            ->label('Number of Programs')
                            ->attributeLabel(fn (array $settings): string => Str::plural('program', $settings['count']))
                            ->icon('heroicon-m-academic-cap'),
                        TextConstraint::make('programSisid')
                            ->label('Program SISID')
                            ->relationship('programs', 'sisid'),
                        TextConstraint::make('programOtherid')
                            ->label('Program STUID')
                            ->relationship('programs', 'otherid'),
                        TextConstraint::make('programDivision')
                            ->label('Program College')
                            ->relationship('programs', 'division'),
                        TextConstraint::make('programDescr')
                            ->label('Program Description')
                            ->relationship('programs', 'descr'),
                        TextConstraint::make('programFoi')
                            ->label('Program Field of Interest')
                            ->relationship('programs', 'foi'),
                        NumberConstraint::make('programCumGpa')
                            ->label('Program Cumulative GPA')
                            ->relationship('programs', 'cum_gpa'),
                        RelationshipConstraint::make('enrollments')
                            ->multiple()
                            ->attributeLabel(fn (array $settings): string => Str::plural('enrollment', $settings['count']))
                            ->icon('heroicon-m-folder-open'),
                        TextConstraint::make('enrollmentSisid')
                            ->label('Enrollment SISID')
                            ->relationship('enrollments', 'sisid'),
                        TextConstraint::make('enrollmentDivision')
                            ->label('Enrollment College')
                            ->relationship('enrollments', 'division'),
                        TextConstraint::make('enrollmentClassNbr')
                            ->label('Enrollment Course')
                            ->relationship('enrollments', 'class_nbr'),
                        TextConstraint::make('enrollmentCrseGradeOff')
                            ->label('Enrollment Grade')
                            ->relationship('enrollments', 'crse_grade_off'),
                        NumberConstraint::make('enrollmentUntTaken')
                            ->label('Enrollment Attempted')
                            ->relationship('enrollments', 'unt_taken'),
                        NumberConstraint::make('enrollmentUntEarned')
                            ->label('Enrollment Earned')
                            ->relationship('enrollments', 'unt_earned'),
                    ])
                    ->constraintPickerColumns([
                        'md' => 2,
                        'lg' => 3,
                        'xl' => 4,
                    ])
                    ->constraintPickerWidth('7xl'),
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                ViewAction::make()
                    ->authorize('view')
                    ->url(fn (Student $record) => StudentResource::getUrl('view', ['record' => $record])),
            ]);
    }
}
