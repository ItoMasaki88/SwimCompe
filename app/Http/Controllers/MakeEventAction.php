<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Race;
use Carbon\Carbon;

class MakeEventAction extends Controller
{
    public function __invoke(Request $request)
    {
      // validation が入る予定

      $data = Event::create([
        'swimStyle' => $request->style,     //free brest back fly medley
        'distance' => $request->distance,      //50 100 200
        'qualifyingSex' => $request->sex, //male female (mix)
        'qualifyingAge' => $request->age, //elemaentary jouniorhigh high adult over30 over50
        'playerType' => (bool) $request->entryType,    //individual group
        'players' => $request->players,
      ]);

      $lane = 5;
      $firstDay = Carbon::parse('2020-08-10 00:00:00');
      $firstDay->addSecond(
        ($request->date-1) *60*60*24
        + $request->hour *60*60
        + ($request->minute) *60
      );
      for ($i=0; $i < ceil($request->players/$lane) ; $i++) {
        Race::create([
          'event_id' => $data->id,
          'startTime' => $firstDay->addSecond(600),
        ]);
      }

      return redirect('/all');
    }
}
