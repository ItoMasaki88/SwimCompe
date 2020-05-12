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
        'startTime' => $race->start_time_texted,
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
   * 結果登録処理
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
