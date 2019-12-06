<?php

namespace App\App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapAuthRoutes();
        $this->mapGuestRoutes();
        $this->mapPublicRoutes();
//        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAuthRoutes()
    {
        foreach (glob(base_path('routes/api/auth/*.php')) as $file) {
            Route::prefix('api')
                ->middleware(['api', 'auth:api'])
                ->group($file);
        }
    }
    protected function mapGuestRoutes()
    {

        foreach (glob(base_path('routes/api/guest/*.php')) as $file) {
            Route::prefix('api')
                ->middleware(['api', 'guest:api'])
                ->group($file);
        }
    }
    protected function mapPublicRoutes()
    {
        foreach (glob(base_path('routes/api/public/*.php')) as $file) {
            Route::prefix('api')
                ->middleware('api')
                ->group($file);
        }
    }
}
