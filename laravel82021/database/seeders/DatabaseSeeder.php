<?php

namespace Database\Seeders;

use App\Models\Product;
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
        // \App\Models\User::factory(10)->create();
        $productos = new Product();
        $productos->setName('Pastilla 1');
        $productos->setPrice(5000);
        $productos->setAmount(10);
        $productos->setIva(1);
        $productos->setPercentage(19);
        $productos->save();
        $productos = new Product();
        $productos->setName('Pastilla 2');
        $productos->setPrice(3000);
        $productos->setAmount(20);
        $productos->setIva(1);
        $productos->setPercentage(5);
        $productos->save();
        $productos = new Product();
        $productos->setName('Pastilla 3');
        $productos->setPrice(7000);
        $productos->setAmount(30);
        $productos->setIva(1);
        $productos->setPercentage(19);
        $productos->save();
        $productos = new Product();
        $productos->setName('Pastilla 4');
        $productos->setPrice(8000);
        $productos->setAmount(15);
        $productos->setIva(0);
        $productos->setPercentage(0);
        $productos->save();
        $productos = new Product();
        $productos->setName('Pastilla 5');
        $productos->setPrice(2000);
        $productos->setAmount(18);
        $productos->setIva(1);
        $productos->setPercentage(5);
        $productos->save();
    }
}
