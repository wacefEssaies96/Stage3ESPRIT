<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use App\Mail\VideoCallInvitation;
use Illuminate\Http\Request;
use Twilio\Jwt\Grants\ChatGrant;

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
        if($room == 'null'){
            $grant->setRoom($roomName);
            $this->sendMailInvitation($email, $roomName);
        }
        if($email == 'null'){
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
        for ($i = 0; $i < $longueur; $i++)
        {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $id.'-'.$chaineAleatoire;
    }
    public function sendMailInvitation($email, $roomName){
        $details = [
            'title' => 'Video call invitation',
            'body' => $roomName
        ];
        Mail::to($email)->send(new VideoCallInvitation($details));
    }
}
