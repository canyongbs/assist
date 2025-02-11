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

use AdvisingApp\Application\Database\Seeders\ApplicationSubmissionStateSeeder;
use AdvisingApp\Application\Models\Application;
use AdvisingApp\Application\Models\ApplicationAuthentication;
use AdvisingApp\Form\Http\Middleware\EnsureSubmissibleIsEmbeddableAndAuthorized;
use AdvisingApp\Prospect\Models\Prospect;
use App\Settings\LicenseSettings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\seed;
use function Pest\Laravel\withoutMiddleware;

test('define is protected with proper feature access control', function () {
    withoutMiddleware([EnsureSubmissibleIsEmbeddableAndAuthorized::class]);

    seed(ApplicationSubmissionStateSeeder::class);

    $settings = app(LicenseSettings::class);

    $settings->data->addons->onlineAdmissions = false;

    $settings->save();

    $application = Application::factory()->create();

    get(URL::signedRoute(
        name: 'applications.define',
        parameters: ['application' => $application],
        absolute: false,
    ))
        ->assertForbidden()
        ->assertJson([
            'error' => 'Online Admissions is not enabled.',
        ]);

    $settings->data->addons->onlineAdmissions = true;

    $settings->save();

    get(URL::signedRoute(
        name: 'applications.define',
        parameters: ['application' => $application],
        absolute: false,
    ))
        ->assertSuccessful();
});

test('request-authentication is protected with proper feature access control', function () {
    withoutMiddleware([EnsureSubmissibleIsEmbeddableAndAuthorized::class]);

    seed(ApplicationSubmissionStateSeeder::class);

    $settings = app(LicenseSettings::class);

    $settings->data->addons->onlineAdmissions = false;

    $settings->save();

    $application = Application::factory()->create();

    $prospect = Prospect::factory()->create();

    post(URL::signedRoute(
        name: 'applications.request-authentication',
        parameters: ['application' => $application, 'email' => $prospect->primaryEmail->address],
        absolute: false,
    ))
        ->assertForbidden()
        ->assertJson([
            'error' => 'Online Admissions is not enabled.',
        ]);

    $settings->data->addons->onlineAdmissions = true;

    $settings->save();

    post(URL::signedRoute(
        name: 'applications.request-authentication',
        parameters: ['application' => $application, 'email' => $prospect->primaryEmail->address],
        absolute: false,
    ))
        ->assertSuccessful();
});

test('authenticate is protected with proper feature access control', function () {
    withoutMiddleware([EnsureSubmissibleIsEmbeddableAndAuthorized::class]);

    seed(ApplicationSubmissionStateSeeder::class);

    $settings = app(LicenseSettings::class);

    $settings->data->addons->onlineAdmissions = false;

    $settings->save();

    $application = Application::factory()->create();

    $code = random_int(100000, 999999);

    $authorization = ApplicationAuthentication::factory()->create([
        'application_id' => $application->id,
        'code' => Hash::make($code),
    ]);

    post(URL::signedRoute(
        name: 'applications.authenticate',
        parameters: ['application' => $application, 'authentication' => $authorization,  'code' => $code],
        absolute: false,
    ))
        ->assertForbidden()
        ->assertJson([
            'error' => 'Online Admissions is not enabled.',
        ]);

    $settings->data->addons->onlineAdmissions = true;

    $settings->save();

    post(URL::signedRoute(
        name: 'applications.authenticate',
        parameters: ['application' => $application, 'authentication' => $authorization, 'code' => $code],
        absolute: false,
    ))
        ->assertSuccessful();
});

test('submit is protected with proper feature access control', function () {
    withoutMiddleware([EnsureSubmissibleIsEmbeddableAndAuthorized::class]);

    seed(ApplicationSubmissionStateSeeder::class);

    $settings = app(LicenseSettings::class);

    $settings->data->addons->onlineAdmissions = false;

    $settings->save();

    $application = Application::factory()->create();

    $application->content = [];

    $application->save();

    $application->fields()->delete();

    $authorization = ApplicationAuthentication::factory()->create([
        'application_id' => $application->id,
    ]);

    post(URL::signedRoute(
        name: 'applications.submit',
        parameters: ['application' => $application, 'authentication' => $authorization],
        absolute: false,
    ))
        ->assertForbidden()
        ->assertJson([
            'error' => 'Online Admissions is not enabled.',
        ]);

    $settings->data->addons->onlineAdmissions = true;

    $settings->save();

    post(URL::signedRoute(
        name: 'applications.submit',
        parameters: ['application' => $application, 'authentication' => $authorization],
        absolute: false,
    ))
        ->assertSuccessful();
});
