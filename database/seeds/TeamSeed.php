<?php

use Illuminate\Database\Seeder;

class TeamSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Astana',],
            ['id' => 2, 'name' => 'Almaty',],
            ['id' => 3, 'name' => 'Shymkent',],

        ];

        foreach ($items as $item) {
            \App\Team::create($item);
        }
    }
}
