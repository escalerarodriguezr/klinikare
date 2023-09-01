<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class DashboardController extends Controller
{


    public function __construct()
    {

    }

    public function __invoke(Request $request): View
    {

        return view('admin/dashboard',[
            'actionUser' => $request->user()
        ]);
    }


}
