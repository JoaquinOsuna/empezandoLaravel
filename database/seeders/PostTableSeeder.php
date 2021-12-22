<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        $categories = Category::all();

        foreach($categories as $key => $c){
            for($i = 1; $i<=20; $i++){
                Post::create([
                    'title' => "Post $i $key",
                    'url_clean' => "post-$i-$key",
                    'content' => "Laravel es un framework",
                    'posted' => 'yes',
                    'category_id' => $c->id
                ]);
            }
        }
        
    }
}
