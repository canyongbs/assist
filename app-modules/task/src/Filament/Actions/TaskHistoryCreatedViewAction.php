<?php

/*
<COPYRIGHT>

    Copyright © 2016-2024, Canyon GBS LLC. All rights reserved.

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

namespace AdvisingApp\Task\Filament\Actions;

use Filament\Actions\ViewAction;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Split;
use AdvisingApp\Task\Histories\TaskHistory;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\TextEntry;

class TaskHistoryCreatedViewAction extends ViewAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->infolist([
            Split::make([
                Grid::make()
                    ->schema([
                        TextEntry::make('title')
                            ->label(fn (TaskHistory $record): ?string => $record->formatted['title']['key'])
                            ->getStateUsing(fn (TaskHistory $record): ?string => $record->formatted['title']['new'])
                            ->columnSpanFull(),
                        TextEntry::make('description')
                            ->label(fn (TaskHistory $record): ?string => $record->formatted['description']['key'])
                            ->getStateUsing(fn (TaskHistory $record): ?string => $record->formatted['description']['new'])
                            ->columnSpanFull(),
                        TextEntry::make('assigned_to')
                            ->label(fn (TaskHistory $record): ?string => $record->formatted['assigned_to']['key'])
                            ->getStateUsing(fn (TaskHistory $record): ?string => $record->formatted['assigned_to']['new'])
                            ->url(fn (TaskHistory $record): ?string => $record->formatted['assigned_to']['extra']['new']['link'])
                            ->default('Unassigned'),
                    ]),
                Fieldset::make('metadata')
                    ->label('Metadata')
                    ->schema([
                        TextEntry::make('status')
                            ->label(fn (TaskHistory $record): ?string => $record->formatted['status']['key'])
                            ->getStateUsing(fn (TaskHistory $record): ?string => $record->formatted['status']['new'])
                            ->badge(),
                        TextEntry::make('due')
                            ->label(fn (TaskHistory $record): ?string => $record->formatted['due']['key'])
                            ->getStateUsing(fn (TaskHistory $record): ?string => $record->formatted['due']['new'])
                            ->default('N/A'),
                        TextEntry::make('created_by')
                            ->label(fn (TaskHistory $record): ?string => $record->formatted['created_by']['key'])
                            ->getStateUsing(fn (TaskHistory $record): ?string => $record->formatted['created_by']['new'])
                            ->url(fn (TaskHistory $record): ?string => $record->formatted['created_by']['extra']['new']['link'])
                            ->default('N/A'),
                    ]),
            ])->from('md'),
        ]);
    }
}
