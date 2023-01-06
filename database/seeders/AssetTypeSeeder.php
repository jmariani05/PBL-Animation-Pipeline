<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_type_assets = ['Characters', 'Camera', 'Environment', 'FX', 'Props'];
        foreach ($list_type_assets as $type) {
            \App\Models\AssetTypes::create([
                'name' => $type
            ]);
        }
    }
}
