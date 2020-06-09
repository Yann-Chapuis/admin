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
        factory(App\Client::class, 184)->create();
        factory(App\Contact::class, 500)->create();
        factory(App\Mission::class, 500)->create();
        factory(App\User::class, 1)->create();
    }
}
