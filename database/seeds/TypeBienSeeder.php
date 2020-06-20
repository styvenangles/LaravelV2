<?php

use Illuminate\Database\Seeder;

class TypeBienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
                'nom_type' => 'Ventes Immobilieres',
            ], 
            [
                'nom_type' => 'Immobilier Neuf',
            ],
            [
                'nom_type' => 'Locations',
            ],
            [
                'nom_type' => 'Colocations',
            ],
            [
                'nom_type' => 'Bureaux',
            ],
            [
                'nom_type' => 'Locaux et Commerces',
            ]);
        App\TypeBien::insert($data);
    }
}
