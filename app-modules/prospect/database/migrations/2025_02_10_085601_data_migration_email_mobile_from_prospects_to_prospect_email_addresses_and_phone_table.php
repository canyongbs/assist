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
                DB::transaction(function () use ($prospects) {
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

                    DB::table('prospects as p')
                        ->whereIn('p.id', $prospects->pluck('id')->toArray())
                        ->update([
                            'primary_email_id' => DB::raw('(SELECT id FROM prospect_email_addresses WHERE prospect_id = p.id AND "order" = 1 LIMIT 1)'),
                            'primary_phone_id' => DB::raw('(SELECT id FROM prospect_phone_numbers WHERE prospect_id = p.id AND "order" = 1 LIMIT 1)'),
                            'primary_address_id' => DB::raw('(SELECT id FROM prospect_addresses WHERE prospect_id = p.id AND "order" = 1 LIMIT 1)'),
                        ]);
                });
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
