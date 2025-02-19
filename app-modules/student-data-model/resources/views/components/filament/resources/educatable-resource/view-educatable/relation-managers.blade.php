{{--
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
--}}
@props(['managers','preventLazyLoading' => []])

@php
    use Illuminate\Support\Js;

    $managers = array_filter($managers, fn(string $manager): bool => $manager::canViewForRecord($this->getRecord(), static::class));
@endphp

@if ($managers)
    <div
        x-data="{ activeTab: @js(array_key_first($managers)) }"
        {{ $attributes->class(['flex flex-col gap-3']) }}
    >
        <x-filament::tabs>
            @foreach ($managers as $managerKey => $manager)
                <x-filament::tabs.item :alpine-active="'activeTab === ' . Js::from($managerKey)" :x-on:click="'activeTab = ' . Js::from($managerKey)">
                    {{ $manager::getTitle($this->getRecord(), static::class) }}
                </x-filament::tabs.item>
            @endforeach
        </x-filament::tabs>

        @foreach ($managers as $managerKey => $manager)
            <div x-show="activeTab === @js($managerKey)">
                @livewire(
                    $manager,
                    [
                        'ownerRecord' => $this->getRecord(),
                        'pageClass' => static::class,
                        'lazy' => $loop->first ? false : (in_array($managerKey, $preventLazyLoading) ? false : 'on-load'),
                    ],
                    key('relation-manager-' . $managerKey)
                )
            </div>
        @endforeach
    </div>
@endif
