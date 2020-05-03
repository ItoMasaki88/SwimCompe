<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowEventsList extends Controller
{
    /** エントリー可能であるかの判定
    *
    * @param Various
    * @return int
    */
     // UserデータがEventの設定クラスに一致すればTrue
     public function entryStatus(
       $entries, // Eloquent\Collection(Entry)
       int $eventId,
       array $ageClass,
       array $sexClass,
       int $eventAge,
       int $eventSex
     ) {
       $ageFlag = 0;
       $sexFlag = 0;

       $entriedEventsID = array();
       foreach ($entries as $entry) {
         array_push($entriedEventsID, $entry->race->event_id);
       }


       if (in_array($eventId, $entriedEventsID)) {
         return 2;
       }

       foreach ($ageClass as $userValue)
       {
         if ($userValue == $eventAge) $ageFlag = 1;
       }
       foreach ($sexClass as $userValue)
       {
         if ($userValue == $eventSex) $sexFlag = 1;
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
        $ageClass = $user->ageClassify();
        $sexClass = $user->sexClassify();
        $entries = $user->entries;

        foreach ($events as $event) {
          $eventAge = $event->int_age;
          $eventSex = $event->int_sex;
          $eventId = $event->id;
          array_push($eventsAndStatuses, [
            'event' => $event,
            'status' => $this->entryStatus(
              $entries, $eventId, $ageClass, $sexClass, $eventAge, $eventSex),
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
