<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleCalendarController extends Controller
{
    public function connect()
    {
            $client = GoogleCalendar::getClient();
            $authUrl = $client->createAuthUrl();
            return redirect($authUrl);
    }


    public function store()
    {
        $client = GoogleCalendar::getClient();
        $authCode = request('code');
        // Load previously authorized credentials from a file.
        $credentialsPath = storage_path('keys/client_secret_generated.json');
        // Exchange authorization code for an access token.
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        // Store the credentials to disk.
        if (!file_exists(dirname($credentialsPath))) {
            mkdir(dirname($credentialsPath), 0700, true);
        }
        file_put_contents($credentialsPath, json_encode($accessToken));
        return redirect('/google-calendar')->with('message', 'Credentials saved');
    }


    public function getResources()
{
        // Get the authorized client object and fetch the resources.
        $client = GoogleCalendar::oauth();
        return GoogleCalendar::getResources($client);

 }
}
