<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class () extends Migration {
    public function up(): void
    {
        DB::transaction(function(){
            DB::table('students')
            ->select('sisid', 'email', 'email_2', 'mobile', 'phone', 'address', 'address2', 'address3', 'city', 'state', 'postal')
            ->orderBy('sisid', 'asc')
            ->chunkById(100, function ($students) {
                $emails = [];
                $phones = [];
                $addresses = [];

                foreach ($students as $student) {
                    $emails[] = [
                        'id' => (string) Str::orderedUuid(),
                        'sisid' => $student->sisid,
                        'address' => $student->email,
                        'type' => 'Personal',
                        'order' => 1,
                    ];

                    if (! blank($student->email_2)) {
                        $emails[] = [
                            'id' => (string) Str::orderedUuid(),
                            'sisid' => $student->sisid,
                            'address' => $student->email_2,
                            'type' => 'Other',
                            'order' => 2,
                        ];
                    }

                    if (! blank($student->mobile)) {
                        $phones[] = [
                            'id' => (string) Str::orderedUuid(),
                            'sisid' => $student->sisid,
                            'number' => $student->mobile,
                            'can_recieve_sms' => true,
                            'type' => 'Mobile',
                            'order' => 1,
                        ];
                    }

                    if (! blank($student->phone)) {
                        $phones[] = [
                            'id' => (string) Str::orderedUuid(),
                            'sisid' => $student->sisid,
                            'number' => $student->phone,
                            'can_recieve_sms' => false,
                            'type' => 'Phone',
                            'order' => 2,
                        ];
                    }

                    if (! blank($student->address)) {
                        $addresses[] = [
                            'id' => (string) Str::orderedUuid(),
                            'sisid' => $student->sisid,
                            'line_1' => $student->address,
                            'line_2' => $student->address2,
                            'line_3' => $student->address3,
                            'city' => $student->city,
                            'state' => $student->state,
                            'postal' => $student->postal,
                            'order' => 1,
                        ];
                    }
                }

                if (! empty($emails)) {
                    DB::table('student_email_addresses')->insert($emails);
                }

                if (! empty($phones)) {
                    DB::table('student_phone_numbers')->insert($phones);
                }

                if (! empty($addresses)) {
                    DB::table('student_addresses')->insert($addresses);
                }

                
            }, 'sisid');

            DB::table('students')
                ->update([
                    'primary_email_id' => DB::raw('(SELECT email.id FROM student_email_addresses email WHERE email.sisid = students.sisid AND email."order" = 1 LIMIT 1)'),
                    'primary_phone_id' => DB::raw('(SELECT phone.id FROM student_phone_numbers phone WHERE phone.sisid = students.sisid AND phone."order" = 1 LIMIT 1)'),
                    'primary_address_id' => DB::raw('(SELECT address.id FROM student_addresses address WHERE address.sisid = students.sisid AND address."order" = 1 LIMIT 1)'),
                ]);
        });
        
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
