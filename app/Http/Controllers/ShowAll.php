<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowAll extends Controller
{

    /**
     * 一覧データを取得
     *
     * @param
     * @return View
     */
    public function __invoke()
    {
      return view('admin.all', ['events' => Event::all()]);
    }

}
