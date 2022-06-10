<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;

class MailController extends Controller
{
    function sendMail() {
        Mail::to('doquangsan14022002@gmail.com')->send(new UserMail);
    }
}
