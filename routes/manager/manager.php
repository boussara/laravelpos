<?php
namespace App\Http\Controllers\Managers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],     
        function()
    { 
        Route::group(['prefix' => 'dashboard'], function() {

            Route::get('/index', [ManagerController::class,  'index']);
            });
            


    });
    
