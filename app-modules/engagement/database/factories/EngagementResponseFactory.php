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

namespace AdvisingApp\Engagement\Database\Factories;

use AdvisingApp\Engagement\Enums\EngagementResponseType;
use AdvisingApp\Engagement\Models\EngagementResponse;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\StudentDataModel\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * @extends Factory<EngagementResponse>
 */
class EngagementResponseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sender_type' => fake()->randomElement([
                (new Student())->getMorphClass(),
                (new Prospect())->getMorphClass(),
            ]),
            'sender_id' => function (array $attributes) {
                $senderClass = Relation::getMorphedModel($attributes['sender_type']);

                /** @var Student|Prospect $senderModel */
                $senderModel = new $senderClass();

                $sender = $senderClass === Student::class
                    ? Student::inRandomOrder()->first() ?? Student::factory()->create()
                    : $senderModel::factory()->create();

                return $sender->getKey();
            },
            'content' => fake()->sentence(),
            'sent_at' => fake()->dateTimeBetween('-1 year', '-1 day'),
            'type' => fake()->randomElement(EngagementResponseType::cases()),
            'subject' => function ($attributes) {
                return match ($attributes['type']) {
                    EngagementResponseType::Email => fake()->sentence(),
                    EngagementResponseType::Sms => null,
                };
            },
            // Bring in a raw value here for testing later
            'raw' => null,
        ];
    }
}
