<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Entry;
use Carbon\Carbon;

class ResultController extends Controller
{

  /**
   * 結果タイム入力フォーム
   *
   * @param
   * @return View
   */
  public function input(Request $request)
  {
    $event = Event::find($request->eventId);

    $raceRecords = [];
    foreach ($event->races as $race) {

      $entryRecords = [];
      foreach ($race->entries as $entry) {
        $player = User::find($entry->user_id);
        array_push($entryRecords, [
          'entryId' => $entry->id,
          'playerName' => $player->name,
          'age' => $player->age,
          'recordTime' => $entry->record_time,
          'rank' => $entry->rank,
        ]);
      }

      array_push($raceRecords, [
        'No' => $race->number,
        'startTime' => $race->startTime,
        'entryRecords' => $entryRecords,
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
   * 結果タイム入力フォーム
   *
   * @param
   * @return redirectTo(all)
   */
  public function submit(Request $request)
  {
    foreach (Event::find($request->eventId)->races as $race) {
      foreach ($race->entries as $entry) {
        $id = $entry->id;
        Entry::find($id)->update([
          'recordTime' =>
            $request->min[$id] *60
            + $request->sec[$id]
            + $request->msec[$id] *0.01
        ]);
      }
    }

    return redirect('/all');
  }

}
