<?php

namespace Database\Seeders;

use App\Models\ItemType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'keyboard',
            'mouse',
            'headset'
        ];

        $code = [
            'KE',
            'MO',
            'HE'
        ];

        foreach ($name as $key => $value) {
            $data = new ItemType;
            $data->name = $value;
            $data->code = $code[$key];
            $data->save();
        }
    }
}
