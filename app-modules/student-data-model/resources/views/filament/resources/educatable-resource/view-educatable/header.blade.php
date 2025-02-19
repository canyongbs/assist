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
<header class="flex flex-col gap-8">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
        <div class="flex flex-col gap-3">
            <x-filament::breadcrumbs
                class="hidden sm:block"
                :breadcrumbs="$breadcrumbs"
            />

            <div class="flex flex-col gap-x-6 gap-y-1 md:flex-row">
                <div
                    class="flex h-16 w-16 select-none items-center justify-center overflow-hidden rounded-full bg-blue-500 text-2xl tracking-tighter text-white">
                    {{ $educatableInitials }}
                </div>

                <div class="flex-1">
                    <div class="flex h-16 items-center">
                        <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white sm:text-3xl">
                            {{ $educatableName }}
                        </h1>
                    </div>

                    <div class="flex flex-col gap-3">
                        <div
                            class="flex flex-wrap items-center gap-3 text-sm font-medium text-gray-600 dark:text-gray-400 lg:gap-6">
                            @foreach ($details as [$detailLabel, $detailIcon,$detailOnClick])
                                <div class="flex items-center gap-2">
                                    @svg($detailIcon, 'size-5')
                                    @if($detailOnClick)

                                        <x-filament::link color="gray" tag="button" :x-on:click="$detailOnClick">
                                            {{ $detailLabel }}
                                        </x-filament::link>
                                    
                                    @else
                                        <span>
                                            {{ $detailLabel }}
                                        </span>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div
                            class="flex flex-wrap items-center gap-3 text-xs font-semibold text-blue-600 dark:text-blue-400">
                            @foreach ($badges as $badgeLabel)
                                <div class="rounded-lg border border-blue-500 px-3 py-1">
                                    {{ $badgeLabel }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex shrink-0 flex-col gap-3 sm:items-end">
            <x-filament::actions :actions="$actions" />

            @if ($hasSisSystem ?? false)
                <p class="text-xs text-gray-600 dark:text-gray-400">
                    Last Updated {{ $educatable->updated_at->setTimezone($timezone)->format('m/d/Y \a\t g:i A') }}
                </p>
            @endif
        </div>
    </div>

    @if ($backButtonUrl)
        <div>
            <x-filament::link
                :href="$backButtonUrl"
                icon="heroicon-m-arrow-left"
            >
                {{ $backButtonLabel }}
            </x-filament::link>
        </div>
    @endif
</header>
