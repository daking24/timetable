<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function sendSms()
    {

        Nexmo::message()->send([
            'to'   => 'reciever',
            'from' => 'sender',
            'text' => 'Info'
        ]);
    }
}
