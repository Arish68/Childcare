<?php

namespace App\Providers;

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
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/admin';

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
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        // Api Routes functions
        $this->mapApiUserRoutes();
        $this->mapApiUserRequestRoutes();   
        $this->mapApiMeetingRoutes();
        // web routes functions
        $this->mapMeetupRoutes();

        
    }

    protected function mapMeetupRoutes()
    {
        Route::middleware('web')
            ->prefix('meetup-management')
            ->name('meetup-management.')
            ->namespace($this->namespace.'\admin\Meetup')
            ->group(base_path('routes/meetup.php'));
    }

    protected function mapApiUserRoutes()
    {
        Route::middleware('api')
            ->prefix('api')
            ->namespace($this->namespace.'\ApiControllers\User')
            ->group(base_path('routes/user.php'));
    }

    protected function mapApiMeetingRoutes()
    {
        Route::middleware('api')
            ->prefix('api')
            ->namespace($this->namespace.'\ApiControllers\Meeting')
            ->group(base_path('routes/meetings.php'));
    }

    protected function mapApiUserRequestRoutes(){

        Route::middleware('api')
            ->prefix('api')
            ->namespace($this->namespace.'\ApiControllers\Request')
            ->group(base_path('routes/user-request.php'));
    }


  


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
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
