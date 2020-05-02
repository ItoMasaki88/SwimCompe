<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Race;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = Carbon::now();

      $ageCounts = [7, 8, 3, 13, 10, 9,];

      $userId =2;
      $raceId =0;
      for ($sex=1; $sex<=2 ; $sex++) {
        foreach ($ageCounts as $ageCount) {
          for ($playerCount=0; $playerCount < $ageCount; $playerCount++) {
            if ($playerCount % 5 === 0) $raceId++;

            DB::table('entries')->insert([
              'user_id' => $userId,
              'race_id' => $raceId,
              'created_at' => $now,
              'updated_at' => $now,
            ]);

            $userId++;
          }
        }
      }

    }
}
