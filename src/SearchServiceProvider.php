<?php

namespace Honvid\Providers;

/*
|--------------------------------------------------------------------------
| CLASS NAME: SearchServiceProvider
|--------------------------------------------------------------------------
| @author    honvid
| @datetime  2018-06-08 17:09
| @package   Honvid\Providers
| @description:
|
*/

use Honvid\Search;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true; // 延迟加载服务

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/./Config/search.php' => config_path('search.php'),
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('search', function () {
            return new Search();
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['search'];
    }
}