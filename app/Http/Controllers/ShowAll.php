<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
      $events = Event::all();

      $eventRecords = [];
      foreach ($events as $event) {

        $raceRecords = [];
        foreach ($event->races as $race) {

          $entryRecords = [];
          foreach ($race->entries as $entry) {
            $player = User::find($entry->user_id);
            array_push($entryRecords, [
              'playerName' => $player->name,
              'age' => $player->age,
              'recordTime' => $entry->record_time_texted,
              'rank' => $entry->rank,
            ]);
          }

          array_push($raceRecords, [
            'No' => $race->number,
            'startTime' => $race->start_time_texted,
            'entryRecords' => $entryRecords,
          ]);
        }

        array_push($eventRecords, [
          'eventId' => $event->id,
          'eventName' => $event->event_name,
          'raceRecords' => $raceRecords,
        ]);
      }

      return view('admin.all', ['eventRecords' => $eventRecords]);
    }

}
