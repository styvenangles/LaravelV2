<?php

use Illuminate\Database\Seeder;

class AgenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(RegionBienSeeder::class);
        $regions = App\RegionBien::all(); 
        factory(App\Agence::class, 25)->create()->each(function($d) use ($regions) {
        
            $regionSet = $regions->random();
             
            $regionSet->agence()->save($d);
        });*/
    }
}
