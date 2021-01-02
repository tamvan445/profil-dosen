<?php

namespace Database\Seeders;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // database seeds to create first user
        $user = new User;
        $user->name = "wildan";
        $user->email = "wildan@admin.com";
        $user->password = bcrypt('wildan123');
        $user->save();
    }
}
