<?php

use Illuminate\Database\Seeder;

class PlayerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'team_id' => 1, 'name' => 'Yerdaulet', 'surname' => 'T', 'birth_date' => '', 'tall' => '185', 'weight' => '85',],
            ['id' => 2, 'team_id' => 1, 'name' => 'Nikita', 'surname' => 'N', 'birth_date' => '', 'tall' => '185', 'weight' => '85',],

        ];

        foreach ($items as $item) {
            \App\Player::create($item);
        }
    }
}
