<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Investor;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('connexion/addUser');
    }
    // ********************************************************** //
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:75',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required|string|max:6',
            'gender2' => 'required|string|max:12',
            'address' => 'required|string|max:50',
            'pwd' => 'required|min:8|max:20',
            'rePwd' => 'required|same:pwd',
            'phoneNbr' => 'required|regex:/[0-9]/|min:8|unique:users'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'type' => $request->gender2,
            'state' => $request->address,
            'password' => Hash::make($request->pwd),
            'phoneNbr' => $request->phoneNbr,
            'image' => ' '
        ]);

        if ($request->description != null) {
            Investor::create([
                'client_id' => $user->id,
                'description' => $request->description,
                'fonds' => $request->fonds
            ]);
        }

        if ($request->service != null) {
            Expert::create([
                'client_id' => $user->id,
                'service' => $request->service
            ]);
        }

        return redirect('login');
    }
    // ********************************************************** //
    public function login()
    {
        return view('connexion/login');
    }

    public function authenticate(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if ($user->type == 'Super admin') {
                return redirect('user');
            }
            return redirect()->intended('/');
        }

        return redirect('login')->with('error', "Opps! Vous avez entré des informations d'identification invalides");
    }
    // ************************************************************ //
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    // ************************************************************ //

}
