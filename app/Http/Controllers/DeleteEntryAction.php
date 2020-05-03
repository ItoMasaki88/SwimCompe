<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShowEventsList;
use App\Http\Controllers\ShowMypage;
use App\User;
use App\Event;
use App\Entry;
use Illuminate\Support\Facades\Auth;


class DeleteEntryAction extends Controller
{


      /**
       * マイページでボタン押したら削除処理をする
       *
       * @param
       * @return View
       */
      public function __invoke(Request $request)
      {
        $entry = Entry::find($request->entry_id);
        $entry->delete();

        //**showMypage**//
        return view('app/mypage', ['entries' => Auth::user()->entries,]);
      }

}
