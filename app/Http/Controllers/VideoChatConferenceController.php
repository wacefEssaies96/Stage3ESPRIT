<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class VideoChatConferenceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function videoCall($email, $room)
    {
        $otherUser = User::where('email', $email)->first();
        return view('videocall', [
            'email' => $email,
            'room' => $room,
            'otherUser' => $otherUser
        ]);
    }

    public function videoCallPost(Request $request)
    {
        $idOtherUser = explode('-', $request->room)[0];
        $otherUser = User::find($idOtherUser);
        return view('videocall', [
            'email' => $request->email,
            'room' => $request->room,
            'otherUser' => $otherUser
        ]);
    }

}
