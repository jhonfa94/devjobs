<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //lISTAR NOTIFICACIONES NO LEIDAS
        $notificaciones = auth()->user()->unReadNotifications;

        //MARCAR NOTIFICACIONES LEIDAS
        auth()->user()->unReadNotifications->markAsRead();
        return view('notificaciones.index', compact('notificaciones'));
    }
}
