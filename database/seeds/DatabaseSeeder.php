<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Quiz::class,5)->create();
        factory(App\Question::class,10)->create();
        factory(App\Answer::class,20)->create();
        

    }
}
