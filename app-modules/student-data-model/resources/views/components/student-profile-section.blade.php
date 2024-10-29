{{--
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
--}}

<div
    class="rounded-xl bg-white ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:text-white dark:ring-white/10">
    <div class="border-b px-6 py-4 text-lg font-medium text-black dark:border-white/10 dark:text-white">
        Profile Information
    </div>
    <div class="text-lg font-medium text-black dark:text-white">
        <div class="border-b p-6 dark:border-white/10">
            <div>
                <p class="mb-3 text-base font-medium text-black dark:text-white">Alternate Email</p>
                <p class="mb-3 text-base text-gray-600 dark:text-gray-400">{{ $record?->email_2 }}</p>
            </div>
            <div>
                <p class="mb-3 text-base font-medium text-black dark:text-white">Phone</p>
                <p class="mb-3 text-base text-gray-600 dark:text-gray-400">{{ $record?->phone }}</p>
            </div>
            <div>
                <p class="mb-3 text-base font-medium text-black dark:text-white">Address</p>
                <p class="mb-3 text-base text-gray-600 dark:text-gray-400">{{ $record->full_address }}</p>
            </div>
        </div>
        <div class="border-b p-6 dark:border-white/10">
            <div>
                <p class="mb-3 text-base font-medium text-black dark:text-white">Ethnicity</p>
                <p class="mb-3 text-base text-gray-600 dark:text-gray-400">{{ $record?->ethnicity }}</p>
            </div>
            <div>
                <p class="mb-3 text-base font-medium text-black dark:text-white">Birthdate</p>
                <p class="mb-3 text-base text-gray-600 dark:text-gray-400">{{ $record?->birthdate?->format('F d, Y') }}
                </p>
            </div>
            <div>
                <p class="mb-3 text-base font-medium text-black dark:text-white">High School Graduation</p>
                <p class="mb-3 text-base text-gray-600 dark:text-gray-400">{{ $record?->hsgrad }}</p>
            </div>
        </div>
        <div class="p-6 dark:border-white/10">
            <div>
                <p class="mb-3 text-base font-medium text-black dark:text-white">First Term</p>
                <p class="mb-3 text-base text-gray-600 dark:text-gray-400">{{ $record?->f_e_term }}</p>
            </div>
            <div>
                <p class="mb-3 text-base font-medium text-black dark:text-white">Recent Term</p>
                <p class="mb-3 text-base text-gray-600 dark:text-gray-400">{{ $record?->mr_e_term }}</p>
            </div>
            <div>
                <p class="mb-3 text-base font-medium text-black dark:text-white">SIS Holds</p>
                <p class="mb-3 text-base text-gray-600 dark:text-gray-400">{{ $record?->holds }}</p>
            </div>
        </div>
    </div>
</div>
