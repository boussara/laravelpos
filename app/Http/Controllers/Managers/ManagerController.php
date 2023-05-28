<?php

namespace App\Http\Controllers\Managers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ManagerController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('dashboard.welcome');
    }



}
