<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignRoleByGmailWhenRegistered
{
    private $userRole = [
        'amirjelodarian@gmail.com' => 'administrator'
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
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        foreach ($this->userRole as $email => $role)
            if ($event->user->email == $email)
                $event->user->assignRole($role);
    }
}
