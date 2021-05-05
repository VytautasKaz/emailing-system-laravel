<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Template();
        $customer->subject = "Welcome!";
        $customer->content = "Your registration was successful! Welcome to our page, hope you enjoy our content!";
        $customer->save();

        $customer2 = new Template();
        $customer2->subject = "Update notification";
        $customer2->content = "We recently updated our policies, make sure to check them out!";
        $customer2->save();

        $customer3 = new Template();
        $customer3->subject = "Newsletter";
        $customer3->content = "Here's what's new this week!";
        $customer3->save();
    }
}
