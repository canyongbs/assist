<?php

/*
<COPYRIGHT>

    Copyright © 2016-2025, Canyon GBS LLC. All rights reserved.

    Advising App™ is licensed under the Elastic License 2.0. For more details,
    see https://github.com/canyongbs/advisingapp/blob/main/LICENSE.

    Notice:

    - You may not provide the software to third parties as a hosted or managed
      service, where the service provides users with access to any substantial set of
      the features or functionality of the software.
    - You may not move, change, disable, or circumvent the license key functionality
      in the software, and you may not remove or obscure any functionality in the
      software that is protected by the license key.
    - You may not alter, remove, or obscure any licensing, copyright, or other notices
      of the licensor in the software. Any use of the licensor’s trademarks is subject
      to applicable law.
    - Canyon GBS LLC respects the intellectual property rights of others and expects the
      same in return. Canyon GBS™ and Advising App™ are registered trademarks of
      Canyon GBS LLC, and we are committed to enforcing and protecting our trademarks
      vigorously.
    - The software solution, including services, infrastructure, and code, is offered as a
      Software as a Service (SaaS) by Canyon GBS LLC.
    - Use of this software implies agreement to the license terms and conditions as stated
      in the Elastic License 2.0.

    For more information or inquiries please visit our website at
    https://www.canyongbs.com or contact us via email at legal@canyongbs.com.

</COPYRIGHT>
*/

namespace AdvisingApp\Form\Models;

use AdvisingApp\Engagement\Actions\GenerateEngagementBodyContent;
use AdvisingApp\Prospect\Models\Prospect;
use AdvisingApp\StudentDataModel\Models\Student;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperFormEmailAutoReply
 */
class FormEmailAutoReply extends BaseModel implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'subject',
        'body',
        'is_enabled',
    ];

    protected $casts = [
        'body' => 'array',
        'is_enabled' => 'boolean',
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function getBody(Student|Prospect|null $author): string
    {
        return app(GenerateEngagementBodyContent::class)(
            $this->body,
            $this->getMergeData($author),
            $this,
            'body',
        );
    }

    public function getMergeData(Student|Prospect|null $author): array
    {
        return [
            'student first name' => $author->getAttribute($author->displayFirstNameKey()),
            'student last name' => $author->getAttribute($author->displayLastNameKey()),
            'student full name' => $author->getAttribute($author->displayNameKey()),
            'student email' => $author->primaryEmail->address,
            'student preferred name' => $author->getAttribute($author->displayPreferredNameKey()),
        ];
    }
}
