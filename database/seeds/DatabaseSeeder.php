<?php

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
        // $this->call(UsersTableSeeder::class);

        //untuk mengirimkan data ke  table product yg di buat pada file ProductTableSeeders.php
        $this->call(ProductTableSeeders::class); // load seeder class yg telah di buat
    }
}
