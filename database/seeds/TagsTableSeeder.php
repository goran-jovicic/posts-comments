<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            'Other',
            'Freelancing',
            'How to',
            'Blogging',
            'Internet Marketing'
        ];

        // Post::all()->each(function (Post $post) {
        //     $post->tags()->detach();                 BRISANJE PO TABELE VEZANIH POST TAG ID-EVA
        // });

        Tag::truncate();
        

        foreach($values as $value) {
            Tag::create([
                'name' => $value
            ]);
        }

        Post::all()->each(function (Post $post) {
            $randIds = Tag::inRandomOrder()->select('id')->take(3)->pluck('id');
            $post->tags()->attach($randIds);
        });
    }
}
