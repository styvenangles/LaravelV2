<?php

use Illuminate\Database\Seeder;

class RankuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
                'nom_rank' => 'admin',
            ], 
            [
                'nom_rank' => 'vendeur',
            ],
            [
                'nom_rank' => 'acheteur',
            ],
            [
                'nom_rank' => 'agent',
            ]);
        App\Rankuser::insert($data);
    }
}
