<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Constants\RoleType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Owner;
use App\Models\Rider;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if ($request->authorize()) {
            
            $user = Auth::user();

            switch ($user->role_type) {
                case RoleType::CUSTOMER:
                    $cust = Customer::where('user_id', $user->user_id)->first();

                    
                    session([ 'user' => [
                            'full_name' => $user->full_name,
                            'username' => $user->username,
                            'email' => $user->email,
                            'role_type' => $user->role_type,
                            'address' => $cust->address,
                            'cust_id' => $cust->cust_id
                        ]
                    ]);
                    break;
                case RoleType::RESTAURANT_OWNER:
                    $owner = Owner::where('user_id', $user->user_id)->first();

                    session([ 'user' => [
                            'full_name' => $user->full_name,
                            'username' => $user->username,
                            'email' => $user->email,
                            'role_type' => $user->role_type,
                            'owner_id' => $owner->owner_id,
                            'owner_id_no' => $owner->owner_id_no
                        ]
                    ]);
                    break;
                case RoleType::RIDER:
                    $rider = Rider::where('user_id', $user->user_id)->first();

                    session([ 'user' => [
                            'full_name' => $user->full_name,
                            'username' => $user->username,
                            'email' => $user->email,
                            'role_type' => $user->role_type,
                            'rider_id' => $rider->rider_id,
                            'rider_id_no' => $rider->rider_id_no
                        ]
                    ]);
                    break;
                case RoleType::ADMIN:
                    $admin = Admin::where('user_id', $user->user_id)->first();
                    session([ 'user' => [
                        'full_name' => $user->full_name,
                        'username' => $user->username,
                        'email' => $user->email,
                        'role_type' => $user->role_type,
                        'admin_id' => $admin->admin_id,
                        'staff_id_no' => $admin->staff_id_no
                    ]
                ]);
                    break;
            }
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
