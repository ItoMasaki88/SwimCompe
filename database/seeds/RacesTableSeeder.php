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

      for ($i=1; $i<=53; $i++) {
        DB::table('races')->insert([
          'event_id' => Event::find(ceil($i/5))->id, // ★ceil($i/5),
          'startTime' => $firstTime->addSecond(600),
          'name' => 'race'. (string) $i,
          'players' => 5,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
      }

    }
}
