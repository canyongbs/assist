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
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_SES_KEY'),
        'secret' => env('AWS_SES_SECRET'),
        'region' => env('AWS_SES_DEFAULT_REGION', 'us-east-1'),
    ],

    'kms' => [
        'ses_s3_key_id' => env('AWS_KMS_SES_S3_KEY_ID'),
    ],

    'azure' => [
        'client_id' => env('AZURE_CLIENT_ID'),
        'client_secret' => env('AZURE_CLIENT_SECRET'),
        'redirect' => env('AZURE_REDIRECT_URI'),
        'tenant_id' => env('AZURE_TENANT_ID', 'common'),
    ],

    'azure_calendar' => [
        'client_id' => env('AZURE_CALENDAR_CLIENT_ID', env('AZURE_CLIENT_ID')),
        'client_secret' => env('AZURE_CALENDAR_CLIENT_SECRET', env('AZURE_CLIENT_SECRET')),
        'tenant_id' => env('AZURE_CALENDAR_TENANT_ID', env('AZURE_TENANT_ID', 'common')),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),
    ],

    'microsoft_graph' => [
        'client_id' => env('MICROSOFT_GRAPH_CLIENT_ID'),
        'client_secret' => env('MICROSOFT_GRAPH_CLIENT_SECRET'),
        'redirect' => env('MICROSOFT_GRAPH_REDIRECT_URI'),
        'scopes' => env('MICROSOFT_GRAPH_SCOPES', 'user.read calendars.readwrite calendars.read calendars.read.shared calendars.readbasic calendars.readwrite.shared'),
        'authority' => env('MICROSOFT_GRAPH_AUTHORITY', 'https://login.microsoftonline.com/common'),
        'authorize_endpoint' => env('MICROSOFT_GRAPH_AUTHORIZE_ENDPOINT', '/oauth2/v2.0/authorize'),
        'token_endpoint' => env('MICROSOFT_GRAPH_TOKEN_ENDPOINT', '/oauth2/v2.0/token'),
    ],

    'google_calendar' => [
        'client_id' => env('GOOGLE_CALENDAR_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CALENDAR_CLIENT_SECRET'),
    ],

    'google_recaptcha' => [
        'url' => 'https://www.google.com/recaptcha/api/siteverify',
    ],
];
