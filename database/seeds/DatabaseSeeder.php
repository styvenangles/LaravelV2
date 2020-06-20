<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      
        $this->call(UserSeeder::class);
        $this->call(TypeBienSeeder::class);
        $this->call(RegionBienSeeder::class);
        $this->call(AgenceSeeder::class);
        $types = App\TypeBien::all(); 
        $regions = App\RegionBien::all();
        factory(App\Bien::class, 100)->create()->each(function($b) use ($types, $regions) {
        
            $typeSet = $types->random();
             
            $typeSet->bien()->save($b);
            
            $regionSet = $regions->random();
      
            $regionSet->bien()->save($b);
        });
        
        factory(App\Agence::class, 25)->create()->each(function($d) use ($regions) {
        
            $regionSet = $regions->random();
             
            $regionSet->agence()->save($d);
        });
    }
}
