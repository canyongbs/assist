<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class () extends Migration {
    public function up(): void
    {
        DB::beginTransaction();

        DB::table('students')
            ->select('sisid', 'email', 'email_2', 'mobile', 'phone', 'address', 'address2', 'address3', 'city', 'state', 'postal')
            ->orderBy('sisid', 'asc')
            ->chunkById(100, function ($students) {
                foreach ($students as $student) {
                    DB::table('student_email_addresses')
                        ->insert([
                            'id' => (string) Str::orderedUuid(),
                            'sisid' => $student->sisid,
                            'address' => $student->email,
                            'type' => 'Personal',
                            'order' => 1,
                        ]);

                    if (! blank($student->email_2)) {
                        DB::table('student_email_addresses')
                            ->insert([
                                'id' => (string) Str::orderedUuid(),
                                'sisid' => $student->sisid,
                                'address' => $student->email_2,
                                'type' => 'Other',
                                'order' => 2,
                            ]);
                    }

                    if (! blank($student->mobile)) {
                        DB::table('student_phone_numbers')
                            ->insert([
                                'id' => (string) Str::orderedUuid(),
                                'sisid' => $student->sisid,
                                'number' => $student->mobile,
                                'can_recieve_sms' => true,
                                'type' => 'Mobile',
                                'order' => 1,
                            ]);
                    }

                    if (! blank($student->phone)) {
                        DB::table('student_phone_numbers')
                            ->insert([
                                'id' => (string) Str::orderedUuid(),
                                'sisid' => $student->sisid,
                                'number' => $student->phone,
                                'can_recieve_sms' => false,
                                'type' => 'Phone',
                                'order' => 2,
                            ]);
                    }

                    if (! blank($student->address)) {
                        DB::table('student_addresses')
                            ->insert([
                                'id' => (string) Str::orderedUuid(),
                                'sisid' => $student->sisid,
                                'line_1' => $student->address,
                                'line_2' => $student->address2,
                                'line_3' => $student->address3,
                                'city' => $student->city,
                                'state' => $student->state,
                                'postal' => $student->postal,
                                'order' => 1,
                            ]);
                    }

                    $primaryEmail = DB::table('student_email_addresses')
                        ->where('sisid', $student->sisid)
                        ->first();

                    $primaryPhone = DB::table('student_phone_numbers')
                        ->where('sisid', $student->sisid)
                        ->first();

                    $primaryAddress = DB::table('student_addresses')
                        ->where('sisid', $student->sisid)
                        ->first();

                    DB::table('students')
                        ->where('sisid', $student->sisid)
                        ->update([
                            'primary_email_id' => $primaryEmail->id ?? null,
                            'primary_phone_id' => $primaryPhone->id ?? null,
                            'primary_address_id' => $primaryAddress->id ?? null,
                        ]);
                }
            }, 'sisid');

        DB::commit();
    }

    public function down(): void
    {
        DB::beginTransaction();

        DB::table('students')
            ->update([
                'primary_email_id' => null,
                'primary_phone_id' => null,
                'primary_address_id' => null,
            ]);

        DB::table('student_email_addresses')
            ->delete();

        DB::table('student_phone_numbers')
            ->delete();

        DB::table('student_addresses')
            ->delete();

        DB::commit();
    }
};
