<?php

namespace App\Http\Controllers;

use App\Expert;
use App\Paiement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class ExpertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(Auth::user()->type == "Client"){
            $paiement = Paiement::where('client_id', Auth::user()->id)->where('operation', 'expert')->get();
            if(sizeof($paiement) == 0){
                return redirect()->route('checkout', ['operation' => 'expert']);
            }
        }
        $user = User::where('type', 'expert')->join('experts','users.id', '=', 'experts.client_id')->select('users.*' , 'experts.service')->get();
        return view('expert', ['users' => $user]);
    }

    public function videoCall($email, $room)
    {
        $otherUser = User::where('email', $email)->first();
        $this->chat($room, $otherUser);
        return view('videocall', [
            'email'=> $email,
            'room' => $room,
            'otherUser' => $otherUser
        ]);
    }

    public function videoCallPost(Request $request){
        $idOtherUser = explode('-', $request->room)[0];
        $otherUser = User::find($idOtherUser);
        $this->chat($request->room, $otherUser);
        return view('videocall', [
            'email'=> $request->email,
            'room'=>$request->room,
            'otherUser' => $otherUser
        ]);
    }

    public function chat($ids, $otherUser)
    {
        $authUser = Auth::user();

        $twilio = new Client(env('TWILIO_ACCOUNT_SID'), env('TWILIO_AUTH_TOKEN'));

        // Fetch channel or create a new one if it doesn't exist
        try {
            $channel = $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
                ->channels($ids)
                ->fetch();
        } catch (\Twilio\Exceptions\RestException $e) {
            $channel = $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
                ->channels
                ->create([
                        'uniqueName' => $ids,
                        'type' => 'private',
                ]);
        }

        // Add first user to the channel
        try {
            $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
                ->channels($ids)
                ->members($authUser->email)
                ->fetch();

        } catch (\Twilio\Exceptions\RestException $e) {
            $member = $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
                ->channels($ids)
                ->members
                ->create($authUser->email);
        }

        // Add second user to the channel
        try {
            $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
                ->channels($ids)
                ->members($otherUser->email)
                ->fetch();

        } catch (\Twilio\Exceptions\RestException $e) {
            $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
                ->channels($ids)
                ->members
                ->create($otherUser->email);
        }
        return true;
    }

}
