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

return [
    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_S3_ACCESS_KEY_ID'),
            'secret' => env('AWS_S3_SECRET_ACCESS_KEY'),
            'region' => env('AWS_S3_DEFAULT_REGION'),
            'bucket' => env('AWS_S3_BUCKET'),
            'url' => env('AWS_S3_URL'),
            'endpoint' => env('AWS_S3_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_S3_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'root' => env('AWS_S3_ROOT'),
            'media_library_visibility' => 'private',
        ],

        's3-public' => [
            'driver' => 's3',
            'key' => env('AWS_S3_ACCESS_KEY_ID'),
            'secret' => env('AWS_S3_SECRET_ACCESS_KEY'),
            'region' => env('AWS_S3_DEFAULT_REGION'),
            'bucket' => env('AWS_S3_BUCKET'),
            'url' => env('AWS_S3_URL'),
            'endpoint' => env('AWS_S3_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_S3_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'root' => env('AWS_S3_PUBLIC_ROOT', env('AWS_S3_ROOT') . '/PUBLIC'),
            'media_library_visibility' => 'public',
        ],

        's3-inbound-email' => [
            'driver' => 's3',
            'key' => env('AWS_S3_ACCESS_KEY_ID'),
            'secret' => env('AWS_S3_SECRET_ACCESS_KEY'),
            'region' => env('AWS_S3_DEFAULT_REGION'),
            'bucket' => env('AWS_S3_BUCKET'),
            'url' => env('AWS_S3_URL'),
            'endpoint' => env('AWS_S3_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_S3_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => true,
            'root' => env('AWS_S3_ROOT') . '/inbound-email',
            'media_library_visibility' => 'private',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],
];
