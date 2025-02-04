<?php

namespace AdvisingApp\StudentDataModel\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentAddress extends BaseModel
{
    protected $fillable = [
        'line_1',
        'line_2',
        'line_3',
        'city',
        'state',
        'postal',
        'country',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'sisid');
    }
}
