<?php

namespace App\Policies;

use App\Models\User;

class ProfilePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    protected $policies = [
        'App\Models\User' => 'App\Policies\ProfilePolicy',
    ];
    
}
