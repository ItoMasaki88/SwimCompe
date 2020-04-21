<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowEventsList extends Controller
{
    // protected $Domain;
    // protected $Responder;
    //
    // public function __construct(Domain $Domain, Responder $Responder)
    // {
    //     $this->Domain     = $Domain;
    //     $this->Responder  = $Responder;
    // }

    /**
     * 指定ユーザーのプロフィール表示
     *
     * @param
     * @return View
     */
    public function __invoke()
    {
      $events = Event::all();
      return view('app/entry', ['events' => $events]);
    }
}
