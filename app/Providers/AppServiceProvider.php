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

namespace App\Providers;

use App\Models\Tenant;
use Sentry\State\Scope;
use App\Models\SystemUser;
use Laravel\Pennant\Feature;
use Rector\Caching\CacheFactory;

use function Sentry\configureScope;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Queue;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\ServiceProvider;
use Laravel\Octane\Commands\ReloadCommand;
use Filament\Actions\Imports\Jobs\ImportCsv;
use AdvisingApp\Prospect\Models\PipelineStage;
use Illuminate\Session\Middleware\StartSession;
use Filament\Actions\Exports\Jobs\PrepareCsvExport;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Overrides\Laravel\PermissionMigrationCreator;
use OpenSearch\Migrations\Filesystem\MigrationStorage;
use App\Overrides\Laravel\StartSession as OverrideStartSession;
use App\Overrides\Filament\Actions\Imports\Jobs\ImportCsvOverride;
use App\Overrides\Filament\Actions\Imports\Jobs\PrepareCsvExportOverride;
use LastDragon_ru\LaraASP\GraphQL\SearchBy\Types\Condition as GraphQLSearchByTypesCondition;
use LastDragon_ru\LaraASP\GraphQL\SearchBy\Definitions\SearchByDirective as GraphQLSearchByDirectiveAlias;
use App\Overrides\LastDragon_ru\LaraASP\GraphQL\SearchBy\Types\Condition as GraphQLSearchByTypesConditionOverride;
use App\Overrides\LastDragon_ru\LaraASP\GraphQL\SearchBy\Definitions\SearchByDirective as GraphQLSearchByDirectiveOverride;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('originalAppKey', fn () => config('app.key'));

        $this->app->bind(GraphQLSearchByTypesCondition::class, GraphQLSearchByTypesConditionOverride::class);
        $this->app->bind(GraphQLSearchByDirectiveAlias::class, GraphQLSearchByDirectiveOverride::class);
        $this->app->bind(ImportCsv::class, ImportCsvOverride::class);
        $this->app->bind(PrepareCsvExport::class, PrepareCsvExportOverride::class);

        // Laravel Octane does not register the `ReloadCommand` when the application is not running in the console.
        // We need to call this command from the `UpdateBrandSettingsController` during an HTTP request.
        if (! $this->app->runningInConsole()) {
            $this->commands([
                ReloadCommand::class,
            ]);
        }

        $this->app->scoped(StartSession::class, function ($app) {
            return new OverrideStartSession($app->make(SessionManager::class), function () use ($app) {
                return $app->make(CacheFactory::class);
            });
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        resolve(MigrationStorage::class)->registerPaths([
            'app-modules/prospect/opensearch/migrations',
        ]);

        Relation::morphMap([
            'system_user' => SystemUser::class,
            'tenant' => Tenant::class,
            'pipeline_stage' => PipelineStage::class,
        ]);

        Feature::resolveScopeUsing(fn ($driver) => null);

        if (config('app.force_https')) {
            URL::forceScheme('https');
            $this->app['request']->server->set('HTTPS', true);
        }

        Queue::looping(function () {
            configureScope(function (Scope $scope): void {
                $scope->removeUser();
            });
        });

        $this->app->singleton(PermissionMigrationCreator::class, function ($app) {
            return new PermissionMigrationCreator($app['files'], $app->basePath('stubs'));
        });

        $this->app->singleton('current-commit', function ($app) {
            $commitProcess = Process::run('git log --pretty="%h" -n1 HEAD');

            if ($commitProcess->successful()) {
                return rtrim($commitProcess->output());
            }
            report($commitProcess->errorOutput());

            return null;
        });

        $this->app->singleton('current-version', function ($app) {
            $gitVersion = Process::run('git describe --tags $(git rev-list --tags --max-count=1)');

            if ($gitVersion->successful()) {
                return rtrim($gitVersion->output());
            }
            report($gitVersion->errorOutput());

            return null;
        });

        Feature::discover();
    }
}
