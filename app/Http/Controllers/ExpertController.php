<?php

namespace App\Http\Controllers;

use App\Paiement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    public function index()
    {
        $paiement = Paiement::where('client_id', Auth::user()->id)->where('operation', 'expert')->get();
        if(sizeof($paiement) == 0){
            return redirect()->route('checkout', ['operation' => 'expert']);
        }
        return view('expert', ['users' => User::where('type', 'expert')->get()]);
    }

    public function videoCall($email, $room)
    {
        return view('videocall', ['email'=> $email,'room'=>$room]);
    }

    public function videoCallPost(Request $request){
        return view('videocall', ['email'=> $request->email,'room'=>$request->room]);
    }

}
