<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowEventsList extends Controller
{
    /** エントリー可能であるかの判定
    *
    * @param
    * @return int
    */
     // UserデータがEventの設定クラスに一致すればTrue
     protected function entryStatus(Event $a_event, $user)
     {
       $ageFlag = 0;
       $sexFlag = 0;

       $ageClass = $user->ageClassify();
       $sexClass = $user->sexClassify();
       $entriedEventsID = array();
       foreach ($user->entries as $entry) {
         array_push($entriedEventsID, $entry->race->event_id);
       }


       if (in_array($a_event->id, $entriedEventsID)) {
         return 2;
       }

       $qAge = $a_event->int_age;
       $qSex = $a_event->int_sex;
       foreach ($ageClass as $userValue)
       {
         if ($userValue == $qAge) $ageFlag = 1;
       }
       foreach ($sexClass as $userValue)
       {
         if ($userValue == $qSex) $sexFlag = 1;
       }
       return $ageFlag * $sexFlag;

     }



    /**
     * 指定ユーザーのプロフィール表示
     *
     * @param
     * @return View
     */
    public function __invoke()
    {
      $events = Event::all();

      $eventsAndStatuses = array();
      if (\Auth::check()) {
        $user = \Auth::user();

        foreach ($events as $event) {
          array_push($eventsAndStatuses, [
            'event' => $event,
            'status' => $this->entryStatus($event, $user),
          ]);
        }
        return view('app/entry', ['eventsAndStatuses' => $eventsAndStatuses,]);
      }

      foreach ($events as $event) {
        array_push($eventsAndStatuses, [
          'event' => $event,
          'status' => '',
        ]);
      }
      return view('app/entry', ['eventsAndStatuses' => $eventsAndStatuses,]);
    }
}
