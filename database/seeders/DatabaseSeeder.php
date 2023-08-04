<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Post::truncate();
        Category::truncate();

        
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        // $personal = Category::create([
        //     'name' => 'Personal;',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $family->id,
        //     'title' => 'My family post',
        //     'slug' => 'my-first-post',
        //     'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure rem ab doloribus facere ut dolore ea, repudiandae accusamus illum, id ipsa voluptas ipsum dolores libero porro magni debitis, modi ullam!</p>'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'My work post',
        //     'slug' => 'my-work-post',
        //     'excerpt' => '<p>Lorem ipsum dolar sit amet</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure rem ab doloribus facere ut dolore ea, repudiandae accusamus illum, id ipsa voluptas ipsum dolores libero porro magni debitis, modi ullam!</p>'
        // ]);
    }
}
