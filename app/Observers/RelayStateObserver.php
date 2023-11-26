<?php

namespace App\Observers;

use App\Models\User;

class RelayStateObserver
{
    public function updated(User $user)
    {
        if ($user->isDirty('relay_state')) {
            $newRelayState = $user->relay_state;

            $action = $newRelayState ? 'on' : 'off';

            $client = new \GuzzleHttp\Client();
            $response = $client->post('http://192.168.1.58/' . $action, []);
        }
    }
}
