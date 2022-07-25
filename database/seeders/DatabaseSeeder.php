<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Package;
use App\Models\User;
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
        // User::factory(10)->create();
        // Item::factory(10)->create();
        for($i = 1; $i < 5; $i++) {
            $data = [
                    'code' => 'paket-00'.$i,
                    'name' => 'Paket '.$i,
                    'description' => 'Cuci Aja',
                    'price' => $i.'000',
            ];
            Package::create($data);
        }
    }
}
