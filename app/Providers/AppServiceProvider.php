<?php

namespace App\Providers;


use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Auth::viaRemember(function ($user){
            $request = Request::capture();
            $ipAddress = $request->ip();
            $id = $request->id();
            Session::put('ip_address', $ipAddress, 'id', $id);
            return $user;
        });
    }
}
