<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RelayController extends Controller
{  
    public function toggle(Request $request)
    {
        $user = Auth::user();
        $newRelayState = !$user->relay_state;
        $user->update(['relay_state' => $newRelayState]);

        //return response()->json(['success' => true, 'relayState' => $newRelayState]);
        return redirect('/sensores');
    }
}

