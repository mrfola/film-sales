<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function show()
    {
        $data = ["user" => Auth()->user()];
        return view('profile', $data);
    }

    public function update(Request $request)
    {   
        $user = Auth()->user();

        if(isset($request->password))
        {
            $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        $user->name = ($request->name != null) ? $request->name : $user->name;
        $user->email = ($request->email != null) ? $request->email : $user["email"];
        $user->password = ($request->password != null) ? Hash::make($request->password) : Hash::make('password');
        $user->address = ($request->address != null) ? $request->address : $user->address;
        $user->date_of_birth = ($request->date_of_birth != null) ? $request->date_of_birth : $user->date_of_birth;
        
        if($user->save())
        {
            return back()->with("message", "User updated successfully");
        }
        else 
        {
            return back()->withErrors(["error" => "An error occured. Please try again."]);
        }
    }
}
