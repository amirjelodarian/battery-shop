<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignRoleByGmail
{
    private $userRole = [
        // 'amirjelodarian@gmail.com' => 'administrator'
    ];
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        foreach ($this->userRole as $email => $role)
            if ($event->user->email == $email)
                $event->user->assignRole($role);
    }
   

}
