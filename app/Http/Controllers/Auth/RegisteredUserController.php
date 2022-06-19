<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Constants\RoleType;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Owner;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        switch ($request->role_type) {
            // customer
            case RoleType::CUSTOMER:
                $request->validate([
                    'full_name' => ['required', 'string', 'max:255'],
                    'username' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'role_type' => ['required'],
                ]);

                $user = User ::create([
                    'full_name' => $request->full_name,
                    'username' => $request->username,
                    'password' => $request->password,
                    'email' => $request->email,
                    'role_type' => $request->role_type
                ]);

                $cust = Customer::create([
                    'user_id' => $user->user_id
                ]);
                
                break;

            // restaurant owner
            case RoleType::RESTAURANT_OWNER:
                
                $request->validate([
                    'full_name' => ['required', 'string', 'max:255'],
                    'owner_id_no' => ['required', 'string', 'max:255'],
                    'username' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'role_type' => ['required'],
                ]);

                $user = User ::create([
                    'full_name' => $request->full_name,
                    'username' => $request->username,
                    'password' => $request->password,
                    'email' => $request->email,
                    'role_type' => $request->role_type
                ]);

                $owner = Owner::create([
                    'user_id' => $user->user_id,
                    'owner_id_no' => $user->owner_id_no
                ]);

                break;

            // rider
            case RoleType::RIDER:
                $request->validate([
                    'full_name' => ['required', 'string', 'max:255'],
                    'rider_id_no' => ['required', 'string', 'max:255'],
                    'username' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'role_type' => ['required'],
                ]);

                $user = User ::create([
                    'full_name' => $request->full_name,
                    'username' => $request->username,
                    'password' => $request->password,
                    'email' => $request->email,
                    'role_type' => $request->role_type
                ]);

                $owner = Owner::create([
                    'user_id' => $user->user_id,
                    'rider_id_no' => $user->rider_id_no
                ]);
                break;

            // admin
            case RoleType::ADMIN:
                $request->validate([
                    'full_name' => ['required', 'string', 'max:255'],
                    'staff_id_no' => ['required', 'string', 'max:255'],
                    'username' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'role_type' => ['required'],
                ]);

                $user = User ::create([
                    'full_name' => $request->full_name,
                    'username' => $request->username,
                    'password' => $request->password,
                    'email' => $request->email,
                    'role_type' => $request->role_type
                ]);

                $admin = Admin::create([
                    'user_id' => $user->user_id,
                    'staff_id_no' => $user->staff_id_no
                ]);


                break;
        }

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
