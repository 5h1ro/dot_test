<?php

namespace Database\Seeders;

use App\Models\Item;
use Faker\Factory;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Daxa M71 Pro',
            'Daxa M84',
            'Daxa Air II',
            'Daxa TS1'
        ];

        $fk_type = [
            1,
            1,
            2,
            3
        ];

        $faker = Factory::create();

        $id = [
            'KE',
            'KE',
            'MO',
            'HE'
        ];

        foreach ($name as $key => $value) {
            $data = new Item;
            $data->id = IdGenerator::generate(['table' => 'items', 'length' => 5, 'prefix' => $id[$key], 'reset_on_prefix_change' => true]);
            $data->name = $value;
            $data->description = $faker->paragraph();
            $data->quantity = $faker->randomNumber(2, false);
            $data->fk_type = $fk_type[$key];
            $data->save();
        }
    }
}
