<?php
namespace App\Http\Controllers\Managers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Managers\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Managers\WelcomeController;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],     
        function()
    { 
       
            Route::group(['prefix' => 'dashboard'], function() {

                Route::middleware('auth')->group(function () {

                        Route::get('/index', [ManagerController::class,  'index']);
                    
                        Route::get('/', [WelcomeController::class,  'index'])->name('welcome');

                        //user routes
                        Route::resource('users', UserController::class)->except(['show']);   

                   });
                });
    });
    
