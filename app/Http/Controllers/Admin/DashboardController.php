<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Gallery;
use App\Models\Log;
use App\Models\Signup;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    
        return view('admin.home.index');
    }
}
