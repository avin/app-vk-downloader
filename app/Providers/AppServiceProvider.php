<?php namespace App\Providers;

use App\Repositories\Vk\VkRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        // Note
        $app->bind('App\Repositories\Vk\VkRepositoryInterface', function ($app) {
            return new VkRepository();
        });
    }
}
