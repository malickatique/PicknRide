<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
use Illuminate\Support\Facades\Auth;

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('chat.{receiverid}', function ($user, $receiverid) {

    return ( Auth::check());

    // return ( Auth::check() && in_array($receiverid, $user->friends) );
    // in_array($receiverid, $user->friends) will returns ids of this user's friends
});

Broadcast::channel('onlineStatus', function ($user) {
    if( Auth::check() )
    {
        return $user;
    }
});