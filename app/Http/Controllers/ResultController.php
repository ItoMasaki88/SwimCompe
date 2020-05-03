<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class ResultController extends Controller
{

  /**
   * 結果タイム入力フォーム
   *
   * @param
   * @return View
   */
  public function input()
  {
    return view('admin.resultForm', ['event' => Event::find(1)]);
  }


}
