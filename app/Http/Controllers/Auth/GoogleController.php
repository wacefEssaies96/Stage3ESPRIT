<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->route('home');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy'),
                    'gender' => 'à changer',
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
            dd($e->getMessage());
        }
    }
}
