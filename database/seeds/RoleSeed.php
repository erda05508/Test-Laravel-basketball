<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Admin',],
            ['id' => 2, 'title' => 'Organizator',],
            ['id' => 3, 'title' => 'Trener',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
