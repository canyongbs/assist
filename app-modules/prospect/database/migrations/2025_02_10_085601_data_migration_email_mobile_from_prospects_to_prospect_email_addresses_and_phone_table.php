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

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class () extends Migration {
    public function up(): void
    {
        DB::transaction(function(){
            DB::table('prospects')
            ->select('id', 'email', 'email_2', 'mobile', 'phone', 'address', 'address_2', 'address_3', 'city', 'state', 'postal')
            ->orderBy('id', 'asc')
            ->chunkById(100, function ($prospects) {
                $emails = [];
                $phones = [];
                $addresses = [];

                foreach ($prospects as $prospect) {
                    
                    if (! blank($prospect->email)) {
                        $emails[] = [
                            'id' => (string) Str::orderedUuid(),
                            'prospect_id' => $prospect->id,
                            'address' => $prospect->email,
                            'type' => 'Personal',
                            'order' => 1,
                        ];
                    }

                    if (! blank($prospect->email_2)) {
                        $emails[] = [
                            'id' => (string) Str::orderedUuid(),
                            'prospect_id' => $prospect->id,
                            'address' => $prospect->email_2,
                            'type' => 'Other',
                            'order' => 2,
                        ];
                    }

                    if (! blank($prospect->mobile)) {
                        $phones[] = [
                            'id' => (string) Str::orderedUuid(),
                            'prospect_id' => $prospect->id,
                            'number' => $prospect->mobile,
                            'can_recieve_sms' => true,
                            'type' => 'Mobile',
                            'order' => 1,
                        ];
                    }

                    if (! blank($prospect->phone)) {
                        $phones[] = [
                            'id' => (string) Str::orderedUuid(),
                            'prospect_id' => $prospect->id,
                            'number' => $prospect->phone,
                            'can_recieve_sms' => false,
                            'type' => 'Phone',
                            'order' => 2,
                        ];
                    }

                    if (! blank($prospect->address)) {
                        $addresses[] = [
                            'id' => (string) Str::orderedUuid(),
                            'prospect_id' => $prospect->id,
                            'line_1' => $prospect->address,
                            'line_2' => $prospect->address_2,
                            'line_3' => $prospect->address_3,
                            'city' => $prospect->city,
                            'state' => $prospect->state,
                            'postal' => $prospect->postal,
                            'order' => 1,
                        ];
                    }
                }

                if (! empty($emails)) {
                    DB::table('prospect_email_addresses')->insert($emails);
                }

                if (! empty($phones)) {
                    DB::table('prospect_phone_numbers')->insert($phones);
                }

                if (! empty($addresses)) {
                    DB::table('prospect_addresses')->insert($addresses);
                }
            });

            DB::table('prospects')
                ->update([
                    'primary_email_id' => DB::raw('(SELECT email.id FROM prospect_email_addresses email WHERE email.prospect_id = prospects.id AND email."order" = 1 LIMIT 1)'),
                    'primary_phone_id' => DB::raw('(SELECT phone.id FROM prospect_phone_numbers phone WHERE phone.prospect_id = prospects.id AND phone."order" = 1 LIMIT 1)'),
                    'primary_address_id' => DB::raw('(SELECT address.id FROM prospect_addresses address WHERE address.prospect_id = prospects.id AND address."order" = 1 LIMIT 1)'),
                ]);

        });
    }

    public function down(): void
    {
        DB::transaction(function(){

            DB::table('prospects')
            ->update([
                'primary_email_id' => null,
                'primary_phone_id' => null,
                'primary_address_id' => null,
            ]);

            DB::table('prospect_email_addresses')
                ->delete();

            DB::table('prospect_phone_numbers')
                ->delete();

            DB::table('prospect_addresses')
                ->delete();

        });
    }
};
