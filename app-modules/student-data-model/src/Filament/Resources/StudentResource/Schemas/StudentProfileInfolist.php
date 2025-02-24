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

namespace AdvisingApp\StudentDataModel\Filament\Resources\StudentResource\Schemas;

use AdvisingApp\StudentDataModel\Filament\Resources\StudentResource\Actions\EditStudentAction;
use App\Features\ProspectStudentRefactor;
use App\Infolists\Components\Subsection;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;

class StudentProfileInfolist
{
    public static function configure(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Profile Information')
                    ->schema([
                        Subsection::make([
                            TextEntry::make('tags.name')
                                ->label('Tags')
                                ->badge()
                                ->placeholder('-'),
                            TextEntry::make('phone')
                                ->visible(! ProspectStudentRefactor::active())
                                ->placeholder('-'),
                            TextEntry::make('phoneNumbers.number')
                                ->label('Phone')
                                ->listWithLineBreaks()
                                ->limitList(3)
                                ->expandableLimitedList()
                                ->visible(ProspectStudentRefactor::active())
                                ->placeholder('-'),
                            TextEntry::make('email_2')
                                ->label('Alternate Email')
                                ->visible(! ProspectStudentRefactor::active())
                                ->placeholder('-'),
                            TextEntry::make('emailAddresses.address')
                                ->label('Alternate Email')
                                ->listWithLineBreaks()
                                ->limitList(3)
                                ->expandableLimitedList()
                                ->visible(ProspectStudentRefactor::active())
                                ->placeholder('-'),
                            TextEntry::make('full_address')
                                ->label('Address')
                                ->placeholder('-'),
                        ]),
                        Subsection::make([
                            TextEntry::make('ethnicity')
                                ->placeholder('-'),
                            TextEntry::make('birthdate')
                                ->date()
                                ->placeholder('-'),
                            TextEntry::make('hsgrad')
                                ->label('High School Graduation')
                                ->placeholder('-'),
                        ]),
                        Subsection::make([
                            TextEntry::make('f_e_term')
                                ->label('First Term')
                                ->placeholder('-'),
                            TextEntry::make('mr_e_term')
                                ->label('Recent Term')
                                ->placeholder('-'),
                            TextEntry::make('holds')
                                ->label('SIS Holds')
                                ->placeholder('-'),
                        ]),
                    ])

                    ->extraAttributes(['class' => 'fi-section-has-subsections'])
                    ->headerActions([
                        EditStudentAction::make('edit'),
                    ]),
            ]);
    }
}
