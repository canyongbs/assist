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
            ->chunk(100, function ($prospects) {
                foreach ($prospects as $prospect) {
                    DB::table('prospect_email_addresses')
                        ->insert([
                            'id' => (string) Str::orderedUuid(),
                            'prospect_id' => $prospect->id,
                            'address' => $prospect->email,
                            'type' => 'Personal',
                            'order' => 1
                        ]);


                    if(!blank($prospect->email_2)) {
                        DB::table('prospect_email_addresses')
                        ->insert([
                            'id' => (string) Str::orderedUuid(),
                            'prospect_id' => $prospect->id,
                            'address' => $prospect->email_2,
                            'type' => 'Other',
                            'order' => 2
                        ]);
                    }

                    if (! blank($prospect->mobile)) {
                        DB::table('prospect_phone_numbers')
                            ->insert([
                                'id' => (string) Str::orderedUuid(),
                                'prospect_id' => $prospect->id,
                                'number' => $prospect->mobile,
                                'can_recieve_sms' => true,
                                'type' => 'Mobile',
                                'order' => 1
                            ]);
                    }

                    if (! blank($prospect->phone)) {
                        DB::table('prospect_phone_numbers')
                            ->insert([
                                'id' => (string) Str::orderedUuid(),
                                'prospect_id' => $prospect->id,
                                'number' => $prospect->phone,
                                'can_recieve_sms' => false,
                                'type' => 'Phone',
                                'order' => 2
                            ]);
                    }

                    if (! blank($prospect->address)) {
                        DB::table('prospect_addresses')
                            ->insert([
                                'id' => (string) Str::orderedUuid(),
                                'prospect_id' => $prospect->id,
                                'line_1' => $prospect->address,
                                'line_2' => $prospect->address_2,
                                'line_3' => $prospect->address_3,
                                'city' => $prospect->city,
                                'state' => $prospect->state,
                                'postal' => $prospect->postal,
                                'order' => 1
                            ]);
                    }

                    $primaryEmail = DB::table('prospect_email_addresses')
                        ->where('prospect_id', $prospect->id)
                        ->first();

                    $primaryPhone = DB::table('prospect_phone_numbers')
                        ->where('prospect_id', $prospect->id)
                        ->first();

                    $primaryAddress = DB::table('prospect_addresses')
                        ->where('prospect_id', $prospect->id)
                        ->first();

                    DB::table('prospects')
                        ->where('id', $prospect->id)
                        ->update([
                            'primary_email_id' => $primaryEmail->id ?? null,
                            'primary_phone_id' => $primaryPhone->id ?? null,
                            'primary_address_id' => $primaryAddress->id ?? null,
                        ]);
                }
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
