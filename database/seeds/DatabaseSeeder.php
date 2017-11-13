<?php

use Illuminate\Database\Seeder;
use App\Models\Pantry;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserType;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKs = 0');
        Pantry::truncate();
        User::truncate();
        Product::truncate();
        Category::truncate();
        UserType::truncate();

        factory(Category::class, 50)->create();
        factory(UserType::class, 3)->create();
        factory(Product::class, 500)->create();
        factory(User::class, 20)->create();
        factory(Pantry::class, 200)->create();

        // $this->call('UsersTableSeeder');
    }
}
