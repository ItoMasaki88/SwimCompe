<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShowEventsList;
use App\Http\Controllers\ShowMypage;
use App\User;
use App\Event;
use App\Entry;
use Illuminate\Support\Facades\Auth;


class aaaEntryAction extends Controller
{

      private function validateStatus(
        User $user,
        Event $event
      ) {

        $ageClass = $user->ageClassify();
        $sexClass = $user->sexClassify();
        $entries = $user->entries;

        $eventAge = $event->int_age;
        $eventSex = $event->int_sex;
        $eventId = $event->id;

        $instance = new ShowEventsList();
        return $instance->entryStatus(
          $entries, $eventId, $ageClass, $sexClass, $eventAge, $eventSex);
      }

      /**
       * 種目一覧でボタン押したら登録処理をする
       *
       * @param
       * @return View
       */
      public function __invoke(Request $request)
      {
        $user = User::find($request->user_id);
        $event = Event::find($request->event_id);

        $status = $this->validateStatus(
          $user,
          Event::find($request->event_id)
        );

        if ($status == 0 && $status == 2) return view('app.error');


        Entry::create([
          'user_id' => $request->user_id,
          'race_id' => $event->races->all()[0]->id,
        ]);

        $entries = Auth::user()->entries;

        $events = array();
        foreach ($entries as $entry) {
          array_push($events, $entry->race->event);
        }
        return view('app/mypage', ['events' => $events]);
      }

}
