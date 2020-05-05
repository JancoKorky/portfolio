<?php

use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;
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
        // $this->call(UserSeeder::class);
        Model::unguard();

        factory(User::class, 5)->create();
        factory(Category::class, 10)->create();

        Model::reguard();
    }
}
