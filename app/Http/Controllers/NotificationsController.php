<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Inertia\Inertia;

class NotificationsController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Notifications');   
    }
}
