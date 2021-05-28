<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Service;
use App\Models\Order;
use App\Models\Blog;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*view()->composer('*',function($view)){
            if ($view->getName() != 'login') {
                
            }
        }*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            if (Auth::check()) {
                $order = Order::where('status',1)->count();
                $view->with('OrderCount',$order);
            }
            $layout_blog = Blog::where([
                ['status',1],
                ['deleted',1]
            ])->orderBy('updated_at','desc')->limit(2)->get();
            $layout_service = Service::where([
                ['status',1],
                ['deleted',1]
            ])->orderBy('updated_at','desc')->limit(4)->get();
            $view->with([
                'layout_service' => $layout_service,
                'layout_blog'    => $layout_blog
            ]);
        });
    }
}
