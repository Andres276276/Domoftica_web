<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;

class RelayStateController extends Controller
{
    public function actualizarRelayState(Request $request, $userId)
    {
        try {
            $newRelayState = $request->input('relay_state');
            $action = $newRelayState ? 'on' : 'off';

            $client = new Client();
            $response = $client->post('http://192.168.1.58/' . $action, []);

            return response()->json(['message' => 'Relay state actualizado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el relay state', 'message' => $e->getMessage()], 500);
        }
    }
}
