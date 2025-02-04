<?php

namespace AdvisingApp\Prospect\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProspectEmailAddress extends BaseModel
{
    protected $fillable = [
        'address',
        'type',
    ];

    public function prospect(): BelongsTo
    {
        return $this->belongsTo(Prospect::class);
    }
}
