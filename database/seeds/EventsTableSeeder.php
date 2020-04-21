<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      for ($i=1; $i<=5; $i++) {
        for ($j=1; $j<=3; $j++) {
          for ($k=1; $k<=2; $k++) {
            for ($l=1; $l<=6; $l++) {
              DB::table('events')->insert([
                'swimStyle' => $i,
                'distance' => $j,
                'qualifyingSex' => $k,
                'qualifyingAge' => $l,
                'playerType' => True,
                'persons' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
              ]);
            }
          }
        }
      }

    }
}
