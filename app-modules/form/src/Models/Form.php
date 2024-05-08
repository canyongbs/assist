<?php

/*
<COPYRIGHT>

    Copyright © 2016-2024, Canyon GBS LLC. All rights reserved.

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

use AdvisingApp\Form\Enums\Rounding;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contracts\CanBeReplicated;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperForm
 */
class Form extends Submissible implements CanBeReplicated
{
    protected $fillable = [
        'name',
        'description',
        'embed_enabled',
        'allowed_domains',
        'is_authenticated',
        'is_wizard',
        'recaptcha_enabled',
        'primary_color',
        'rounding',
        'content',
        'on_screen_response',
    ];

    protected $casts = [
        'content' => 'array',
        'embed_enabled' => 'boolean',
        'allowed_domains' => 'array',
        'is_authenticated' => 'boolean',
        'is_wizard' => 'boolean',
        'recaptcha_enabled' => 'boolean',
        'rounding' => Rounding::class,
    ];

    public function fields(): HasMany
    {
        return $this->hasMany(FormField::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(FormStep::class);
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(FormSubmission::class);
    }

    public function emailAutoReply(): HasOne
    {
        return $this->hasOne(FormEmailAutoReply::class);
    }

    public function replicateRelatedData(Model $original): void
    {
        $stepMap = $this->replicateSteps($original);
        $fieldMap = $this->replicateFields($original, $stepMap);
        $this->updateStepContent($fieldMap);
        $this->replicateEmailAutoReply($original);
    }

    protected function replicateSteps(Model $original): array
    {
        $stepMap = [];

        $original->steps()->each(function (FormStep $step) use (&$stepMap) {
            $newStep = $step->replicate();
            $newStep->form_id = $this->id;
            $newStep->save();

            $stepMap[$step->id] = $newStep->id;
        });

        return $stepMap;
    }

    protected function replicateFields(Model $original, array $stepMap): array
    {
        $fieldMap = [];

        $original->fields()->each(function (FormField $field) use (&$fieldMap, $stepMap) {
            $newField = $field->replicate();
            $newField->form_id = $this->id;
            $newField->step_id = $stepMap[$field->step_id] ?? null;
            $newField->save();

            $fieldMap[$field->id] = $newField->id;
        });

        return $fieldMap;
    }

    protected function updateStepContent(array $fieldMap): void
    {
        $this->steps()->each(function (FormStep $step) use ($fieldMap) {
            $step->update([
                'content' => $this->replaceIdsInContent($step->content, $fieldMap),
            ]);
        });
    }

    protected function replicateEmailAutoReply(Model $original): void
    {
        if ($original->emailAutoReply) {
            $original->emailAutoReply->replicate()->save();
        }
    }

    protected function replaceIdsInContent(&$content, $fieldMap)
    {
        if (is_array($content)) {
            foreach ($content as $key => &$value) {
                if (is_array($value)) {
                    $this->replaceIdsInContent($value, $fieldMap);
                } else {
                    if ($key === 'id' && isset($fieldMap[$value])) {
                        $value = $fieldMap[$value];
                    }
                }
            }
        }

        return $content;
    }
}
