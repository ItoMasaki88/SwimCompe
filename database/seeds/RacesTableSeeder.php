<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Event;

class RacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // タイムスタンプを取得
      $firstTime = Carbon::parse('2020-08-10 09:08:50');
      $eventId =1;

      $raceCounts = [2, 2, 1, 3, 2, 2,];

      for ($i=0; $i<2; $i++) {
        foreach ($raceCounts as $raceCount) {
          for ($k=1; $k<=$raceCount; $k++) {
            DB::table('races')->insert([
              'event_id' => $eventId,
              'startTime' => $firstTime->addSecond(600),
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ]);
          }
          $eventId++;
        }
      }

    }
}
