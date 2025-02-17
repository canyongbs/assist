<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class () extends Migration {
    public function up(): void
    {
        DB::beginTransaction();

        DB::table('prospects')
            ->select('id', 'email', 'email_2', 'mobile', 'phone', 'address', 'address_2', 'address_3', 'city', 'state', 'postal')
            ->orderBy('id', 'asc')
            ->chunkById(100, function ($prospects) {
                $emails = [];
                $phones = [];
                $addresses = [];

                foreach ($prospects as $prospect) {
                    // Collect Emails
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

                    // Collect Phones
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

                    // Collect Addresses
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

                // Bulk Insert Data
                if (! empty($emails)) {
                    DB::table('prospect_email_addresses')->insert($emails);
                }

                if (! empty($phones)) {
                    DB::table('prospect_phone_numbers')->insert($phones);
                }

                if (! empty($addresses)) {
                    DB::table('prospect_addresses')->insert($addresses);
                }

                // Perform Bulk Update Using JOINs in Laravel Query Builder
                DB::table('prospects as p')
                    ->leftJoinSub(
                        DB::table('prospect_email_addresses')
                            ->select('prospect_id', DB::raw('MIN(id) as primary_email_id'))
                            ->groupBy('prospect_id'),
                        'e',
                        'p.id',
                        '=',
                        'e.prospect_id'
                    )
                    ->leftJoinSub(
                        DB::table('prospect_phone_numbers')
                            ->select('prospect_id', DB::raw('MIN(id) as primary_phone_id'))
                            ->groupBy('prospect_id'),
                        'ph',
                        'p.id',
                        '=',
                        'ph.prospect_id'
                    )
                    ->leftJoinSub(
                        DB::table('prospect_addresses')
                            ->select('prospect_id', DB::raw('MIN(id) as primary_address_id'))
                            ->groupBy('prospect_id'),
                        'a',
                        'p.id',
                        '=',
                        'a.prospect_id'
                    )
                    ->whereIn('p.id', $prospects->pluck('id')->toArray())
                    ->update([
                        'p.primary_email_id' => DB::raw('e.primary_email_id'),
                        'p.primary_phone_id' => DB::raw('ph.primary_phone_id'),
                        'p.primary_address_id' => DB::raw('a.primary_address_id'),
                    ]);
            });

        DB::commit();
    }

    public function down(): void
    {
        DB::beginTransaction();

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

        DB::commit();
    }
};
