<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(App\Airport::class, 5)->create();
        factory(App\Flight::class, 10)->create()->each(function($flight){
           factory(App\Passenger::class, 100)->make()->each(function($passenger) use($flight){
              $flight->passengers()->save($passenger);
           });
        });
    }
}
