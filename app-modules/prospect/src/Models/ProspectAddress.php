<?php

namespace AdvisingApp\Prospect\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProspectAddress extends BaseModel
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

    public function prospect(): BelongsTo
    {
        return $this->belongsTo(Prospect::class);
    }
}
