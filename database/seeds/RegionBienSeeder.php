<?php

use Illuminate\Database\Seeder;

class RegionBienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
                'nom_region' => 'Alsace, Champagne-Ardenne et Lorraine',
            ], 
            [
                'nom_region' => 'Aquitaine, Limousin et Poitou-Charentes',
            ],
            [
                'nom_region' => 'Auvergne et Rhone-Alpes',
            ],
            [
                'nom_region' => 'Bourgogne et Franche Comte',
            ],
            [
                'nom_region' => 'Languedoc-Roussillon et Midi-Pyrenees',
            ],
            [
                'nom_region' => 'Nord-Pas-de-Calais et Picardie',
            ],
            [
                'nom_region' => 'Basse-Normandie et Haute-Normandie',
            ],
            [
                'nom_region' => 'Bretagne',
            ],
            [
                'nom_region' => 'Corse',
            ],
            [
                'nom_region' => 'Centre',
            ],
            [
                'nom_region' => 'Ile-de-France',
            ],
            [
                'nom_region' => 'Pays de la Loire',
            ],
            [
                'nom_region' => "Provence-Alpes-Cote d'Azur",
            ]);
        App\RegionBien::insert($data);
    }
}
