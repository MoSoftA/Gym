<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  $this->call(UsersTableSeeder::class);
         User::insert([
            'name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin'),
          'admin' =>1,
          'start' => '2019-12-1',
          'end' => '2019-12-1,'
        ]);
        
    }
}
