<?php

use Illuminate\Database\Seeder;
use \App\Product;

class ProductTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title' => 'Macbook Pro 13 2017',
            'description' => 'Seri Komputer jaringan Macintosh Yang di Produksi Oleh Aple',
            'price' => 20224500,
            'stock' => 12
        ]);

        Product::create([
            'title' => 'Matbook Air 2000',
            'description' => 'Seri Komputer jaringan Matbook Yang di Produksi Oleh Huawei',
            'price' => 30250999,
            'stock' => 7
        ]);
    }
}
