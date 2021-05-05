<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->username = "iumfulug";
        $customer->email = "iumfulug@iumfulug.com";
        $customer->save();

        $customer2 = new Customer();
        $customer2->username = "petandro";
        $customer2->email = "petandro@petandro.com";
        $customer2->save();

        $customer3 = new Customer();
        $customer3->username = "methomem";
        $customer3->email = "methomem@methomem.com";
        $customer3->save();

        $customer4 = new Customer();
        $customer4->username = "ridetcha";
        $customer4->email = "ridetcha@ridetcha.com";
        $customer4->save();

        $customer5 = new Customer();
        $customer5->username = "ogerpecr";
        $customer5->email = "ogerpecr@ogerpecr.com";
        $customer5->save();
    }
}
