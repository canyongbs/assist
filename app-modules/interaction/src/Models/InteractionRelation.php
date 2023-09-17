<?php

namespace Assist\Interaction\Models;

use App\Models\BaseModel;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Assist\Interaction\Models\Concerns\HasManyInteractions;
use Assist\Audit\Models\Concerns\Auditable as AuditableTrait;

/**
 * Assist\Interaction\Models\InteractionRelation
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Assist\Audit\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Assist\Interaction\Models\Interaction> $interactions
 * @property-read int|null $interactions_count
 *
 * @method static \Assist\Interaction\Database\Factories\InteractionRelationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation query()
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|InteractionRelation withoutTrashed()
 *
 * @mixin \Eloquent
 * @mixin IdeHelperInteractionRelation
 */
class InteractionRelation extends BaseModel implements Auditable
{
    use AuditableTrait;
    use HasManyInteractions;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];
}
