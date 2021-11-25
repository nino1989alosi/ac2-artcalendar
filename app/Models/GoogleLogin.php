<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleLogin extends Model
{
    use HasFactory;

    public function validateToken($token,$email)
    {
        $endpoint = "https://oauth2.googleapis.com/tokeninfo";
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('GET', $endpoint, ['query' => [
                'id_token' => $token
            ]]);
            $statusCode = $response->getStatusCode();
            $content = json_decode($response->getBody(), true);

            if(!empty($content['email']) && $content['email'] == $email){
                return true;
            }
            return false;
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            return false;
        }
    }
}
