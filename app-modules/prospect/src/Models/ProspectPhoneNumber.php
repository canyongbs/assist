<?php

namespace AdvisingApp\Prospect\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProspectPhoneNumber extends BaseModel
{
    protected $fillable = [
        'number',
        'ext',
        'type',
        'is_mobile',
    ];

    public function prospect(): BelongsTo
    {
        return $this->belongsTo(Prospect::class);
    }
}
