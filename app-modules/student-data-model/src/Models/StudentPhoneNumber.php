<?php

namespace AdvisingApp\StudentDataModel\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentPhoneNumber extends BaseModel
{
    protected $fillable = [
        'number',
        'ext',
        'type',
        'is_mobile',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'sisid');
    }
}
