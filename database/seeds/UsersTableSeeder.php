<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        DB::table('users')->insert([
          'name' => 'Admin',
          'sex' => True,
          'age' => 25,
          'email' => 'administrator@gmail.com',
          'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
          'remember_token' => str_random(10),
          'admin' => True,
          'created_at' => $now,
          'updated_at' => $now,
        ]);

        factory(\App\User::class, 50)->create();
    }
}
