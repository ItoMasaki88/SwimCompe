<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowMypage extends Controller
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
    $entries = Auth::user()->entries();

    $events = array();
    foreach ($entries as $entry) {
      array_push($events, $entry->race()->event());
    }
    return view('app/mypage', ['events' => $events]);
  }
}
