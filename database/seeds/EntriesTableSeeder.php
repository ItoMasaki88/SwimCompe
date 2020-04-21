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
      $user = DB::table('users')->first(); // ★
      $now = Carbon::now();

      for ($i=1; $i<=5; $i++) {
        $event = DB::table('races')->first(); // ★
        // code...
        DB::table('entries')->insert([
          'user_id' => $user->id, // ★
          'race_id' => Race::find(($i-1)*12 + 4)->id, // ★
          'created_at' => $now,
          'updated_at' => $now,
        ]);
      }
    }
}
