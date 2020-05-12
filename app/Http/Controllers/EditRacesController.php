<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Race;
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

      $events = Event::all();

      $eventRecords = [];
      foreach ($events as $event) {

        $raceRecords = [];
        foreach ($event->races as $race) {
          array_push($raceRecords, [
            'No' => $race->number,
            'startTime' => $race->start_time_texted,
            'raceId' => $race->id,
          ]);
        }

        array_push($eventRecords, [
          'eventId' => $event->id,
          'eventName' => $event->event_name,
          'raceRecords' => $raceRecords,
        ]);
      }

      return view('admin.raceEditForm', ['eventRecords' => $eventRecords]);

    }

    /**
     * 編集処理
     *
     * @param
     * @return redirectTo(all)
     */
    public function submit(Request $request)
    {
      foreach (Event::all() as $event) {
        foreach ($event->races as $race) {
          $id = $race->id;

          if (
            isset($request->day[$id])
            && isset($request->hour[$id])
            && isset($request->min[$id])
          ) {
            $initial = new Carbon('2020-08-10');
            $initial->addDay($request->day[$id]-1);
            $initial->addHour($request->hour[$id]);
            $initial->addMinute($request->min[$id]);

            $ent = Race::find($id);
            $ent->startTime = $initial;
            $ent->save();
          }
        }
      }

      return redirect('/all');
    }

}
