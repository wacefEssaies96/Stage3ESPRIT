<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use Illuminate\Support\Facades\Hash;

class LinkedInController extends Controller
{

    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function handleLinkedinCallback()
    {
        try {
            $user = Socialite::driver('linkedin')->user();
            $finduser = User::where('linkedin_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('home');
            } else {
                $email = User::where('email', $user->email)->first();
                if($email){
                    return redirect()->route('login')->with('error', "L'adresse email existe déjà dans notre base de données");
                }
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'gender' => 'Male',
                    'type' => 'Client',
                    'state' => 'Bizerte',
                    'password' => Hash::make('password'),
                    'phoneNbr' => '12345678',
                    'image' => ' '
                ]);
                Auth::login($newUser);
                return redirect()->route('new.password');
            }
        } catch (Exception $e) {
            return redirect('/error');
        }
    }
}
