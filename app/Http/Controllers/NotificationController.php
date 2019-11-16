<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function getNotification()
    {
        $user = auth()->user();

        return [
            'read' => $user->readNotifications(),
            'unread' => $user->unreadNotifications()
        ];
    }
}
