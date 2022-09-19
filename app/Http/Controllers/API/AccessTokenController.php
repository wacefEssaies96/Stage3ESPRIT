<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use App\Mail\VideoCallInvitation;
use App\User;
use Illuminate\Http\Request;
use Twilio\Jwt\Grants\ChatGrant;
use Twilio\Rest\Client;

class AccessTokenController extends Controller
{
    public function generate_token($email, $room, $id)
    {
        // Substitute your Twilio Account SID and API Key details
        $accountSid = env('TWILIO_ACCOUNT_SID');
        $apiKeySid = env('TWILIO_API_KEY_SID');
        $apiKeySecret = env('TWILIO_API_KEY_SECRET');

        $identity = uniqid();

        // Create an Access Token
        $token = new AccessToken(
            $accountSid,
            $apiKeySid,
            $apiKeySecret,
            3600,
            $identity
        );
        // Grant access to Video
        $grant = new VideoGrant();
        $roomName = $this->genererChaineAleatoire(20, $id);
        if ($room == 'null') {
            $grant->setRoom($roomName);
            $this->sendMailInvitation($email, $roomName);
        }
        if ($email == 'null') {
            $grant->setRoom($room);
        }
        $token->addGrant($grant);

        // Serialize the token as a JWT
        echo $token->toJWT();
    }

    public function generate(Request $request)
    {
        $token = new AccessToken(
            env('TWILIO_ACCOUNT_SID'),
            env('TWILIO_API_KEY_SID'),
            env('TWILIO_API_KEY_SECRET'),
            3600,
            $request->email
        );

        $chatGrant = new ChatGrant();
        $chatGrant->setServiceSid(env('TWILIO_SERVICE_SID'));
        $token->addGrant($chatGrant);

        return response()->json([
            'token' => $token->toJWT()
        ]);
    }

    function genererChaineAleatoire($longueur = 20, $id)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++) {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $id . '-' . $chaineAleatoire;
    }
    public function sendMailInvitation($email, $roomName)
    {
        $details = [
            'title' => 'Video call invitation',
            'body' => $roomName
        ];
        Mail::to($email)->send(new VideoCallInvitation($details));
    }

    public function chat($authUser, $otherUser)
    {
        $ids = $authUser.'-'.$otherUser;

        $user1 = User::findOrFail($authUser);
        $user2 = User::findOrFail($otherUser);

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
                ->members($user1->email)
                ->fetch();
        } catch (\Twilio\Exceptions\RestException $e) {
            $member = $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
                ->channels($ids)
                ->members
                ->create($user1->email);
        }

        // Add second user to the channel
        try {
            $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
                ->channels($ids)
                ->members($user2->email)
                ->fetch();
        } catch (\Twilio\Exceptions\RestException $e) {
            $twilio->chat->v2->services(env('TWILIO_SERVICE_SID'))
                ->channels($ids)
                ->members
                ->create($user2->email);
        }
        return true;
    }
}
