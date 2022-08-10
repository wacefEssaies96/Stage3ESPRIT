<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::where('id', '<>', $request->user()->id)->get();
        return view('messages.index', compact('users'));
    } 

    public function chat($ids)
    {
        $authUser = Auth::user();
        $otherUser = User::find(explode('-', $ids)[1]);
        $users = User::where('id', '<>', $authUser->id)->get();

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
        return view('messages.chat', compact('users', 'otherUser'));
    }
}
