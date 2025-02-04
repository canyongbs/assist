<?php

namespace AdvisingApp\StudentDataModel\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentEmailAddress extends BaseModel
{
    protected $fillable = [
        'address',
        'type',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'sisid');
    }
}
