<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\newOrderNotification;
use Illuminate\Support\Facades\Notification;
class NotificationController extends Controller
{
     
     public function send() {

        // $admin = User::find(1);
        // $admin->notify(new newOrderNotification());

        $admins = User::where('type', 'admin')->get();
        Notification::send($admins, new newOrderNotification('Ali', 'T-SHirt', 100));
        return 'Notification Send';
     }


}
