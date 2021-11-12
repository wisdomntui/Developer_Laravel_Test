<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create new dummy users
        // \App\Models\User::factory(10)->create();

        // use the factory to create a Faker\Generator instance
        $faker = Factory::create();

        foreach ((range(1, 20)) as $index) {
            Blog::create([
                'title' => $faker->sentence,
                'body' => $faker->text($maxNbChars = 300),
            ]);

            Meal::create([
                'title' => $faker->word,
            ]);

            Category::create([
                'name' => $faker->word,
            ]);

        }

        foreach ((range(1, 20)) as $index) {
            DB::table('categorizables')->insert(
                [
                    'category_id' => rand(1, 20),
                    'categorizable_id' => rand(1, 20),
                    'categorizable_type' => rand(0, 1) == 1 ? 'App\Models\Blog' : 'App\Models\Meal',
                ]
            );
        }

        // Create new dummy posts
        Post::factory(40)->create();
    }
}
