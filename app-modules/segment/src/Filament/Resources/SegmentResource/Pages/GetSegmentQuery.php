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

namespace AdvisingApp\Segment\Filament\Resources\SegmentResource\Pages;

use AdvisingApp\Segment\Enums\SegmentType;
use AdvisingApp\Segment\Filament\Resources\SegmentResourceForProcesses;
use App\Filament\Resources\Pages\EditRecord\Concerns\EditPageRedirection;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class GetSegmentQuery extends EditRecord implements HasTable
{
    use InteractsWithTable {
        bootedInteractsWithTable as baseBootedInteractsWithTable;
    }
    use EditPageRedirection;

    protected static string $resource = SegmentResourceForProcesses::class;

    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->fillForm();

        $this->previousUrl = url()->previous();
    }

    public function table(Table $table): Table
    {
        $segment = $this->getRecord();

        $table = $segment->model->table($table);

        if ($segment->type === SegmentType::Static) {
            $keys = $segment->subjects()->pluck('subject_id');

            $table->modifyQueryUsing(fn (Builder $query) => $query->whereKey($keys));
        }

        return $table;
    }

    public function bootedInteractsWithTable(): void
    {
        if ($this->shouldMountInteractsWithTable) {
            $this->tableFilters = $this->getRecord()->filters;
        }

        $this->baseBootedInteractsWithTable();
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $segment = $this->getRecord();

        $data['model'] = $segment->model;
        $data['type'] = $segment->type;
        $data['user']['name'] = $segment->user->name;

        return $data;
    }
}
