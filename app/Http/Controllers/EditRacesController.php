<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Entry;
use Carbon\Carbon;

class EditRacesController extends Controller
{

    /**
     * Race編集フォーム
     *
     * @param Post Request
     * @return View
     */
    public function input(Request $request)
    {
      $event = Event::find($request->eventId);

      $raceRecords = [];
      foreach ($event->races as $race) {
        array_push($raceRecords, [
          'No' => $race->number,
          'startTime' => $race->startTime,
        ]);
      }

      $eventRecord = [
        'eventId' => $event->id,
        'eventName' => $event->event_name,
        'raceRecords' => $raceRecords,
      ];

      return view('admin.resultForm', ['eventRecord' => $eventRecord]);
    }

    /**
     * 編集処理
     *
     * @param
     * @return redirectTo(all)
     */
    public function submit(Request $request)
    {
      foreach (Event::find($request->eventId)->races as $race) {
        foreach ($race->entries as $entry) {
          $id = $entry->id;

          if (isset($request->min[$id])) {
            $min = (float) $request->min[$id];
          } else {
            $min = 0;
          }
          if (isset($request->sec[$id])) {
            $sec = (float) $request->sec[$id];
          } else {
            $sec = 0;
          }
          if (isset($request->msec[$id])) {
            $msec = (float) $request->msec[$id];
          } else {
            $msec = 0;
          }

          if ($min+$sec+$msec != 0) {
            $ent = Entry::find($id);
            $ent->recordTime = $min*60 + $sec + $msec*0.01;
            $ent->save();
          }

        }
      }

      return redirect('/all');
    }

}
