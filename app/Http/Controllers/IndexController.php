<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = User::with('roles')->find(Auth::id());

        if ($user->hasRole('customer')) {
            return view('Customers.index');
        }

        if ($user->hasRole('restaurant owner')) {
            return view('Owner.index');
        }
        
        if ($user->hasRole('rider')) {
            return view('Riders.index');
        }

        if ($user->hasRole('admin')) {
            return view('Admin.index');
        }
    }
}
