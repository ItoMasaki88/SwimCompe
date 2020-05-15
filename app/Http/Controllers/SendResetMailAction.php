<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;

class SendResetMailAction extends Controller
{
  public function __invoke(Request $request)
  {

    Mail::to($request->email)->send(new PasswordResetMail());
    return redirect()->route('mailSent');
  }
}
