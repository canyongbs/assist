<?php

namespace Assist\Case\Tests\RequestFactories;

use App\Models\Institution;
use Assist\Case\Models\CaseItemType;
use Assist\Case\Models\CaseItemStatus;
use Assist\Case\Models\CaseItemPriority;
use Worksome\RequestFactories\RequestFactory;

class CreateCaseItemRequestFactory extends RequestFactory
{
    public function definition(): array
    {
        return [
            'casenumber' => $this->faker->randomNumber(8),
            'institution_id' => Institution::factory()->create()->id,
            'status_id' => CaseItemStatus::factory()->create()->id,
            'priority_id' => CaseItemPriority::factory()->create()->id,
            'type_id' => CaseItemType::factory()->create()->id,
            'close_details' => $this->faker->sentence,
            'res_details' => $this->faker->sentence,
        ];
    }
}
