<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->tag = "Subscriber";
        $tag->save();

        $tag2 = new Tag();
        $tag2->tag = "Regular";
        $tag2->save();

        $tag3 = new Tag();
        $tag3->tag = "Contributor";
        $tag3->save();

        $tag4 = new Tag();
        $tag4->tag = "New customer";
        $tag4->save();
    }
}
