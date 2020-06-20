<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RankuserSeeder::class);
        $ranks = App\Rankuser::all(); 
        factory(App\User::class, 200)->create()->each(function($c) use ($ranks) {
        
            $rankSet = $ranks->random();
             
            $rankSet->user()->save($c);
        });;
        
        DB::table('users')->insert([
            'name' => 'AdminTest',
            'firstname' => 'Admin',
            'lastname' => 'Test',
            'bio' => 'AdminnimdA',
            'rank' => 'admin',
            'email' => 'admintest@test.com',
            'tel' => '+3352568545',
            'date_naissance' => '2020-02-20',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('123456789'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        
        DB::table('users')->insert([
            'name' => 'VendeurTest',
            'firstname' => 'Vendeur',
            'lastname' => 'Test',
            'bio' => 'VendeurruedneV',
            'rank' => 'vendeur',
            'email' => 'vendeurtest@test.com',
            'tel' => '+3396636286',
            'date_naissance' => '2020-02-20',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('123456789'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        
        DB::table('users')->insert([
            'name' => 'AcheteurTest',
            'firstname' => 'Acheteur',
            'lastname' => 'Test',
            'bio' => 'AcheteurruetehcA',
            'rank' => 'acheteur',
            'email' => 'acheteurtest@test.com',
            'tel' => '+3374787271',
            'date_naissance' => '2020-02-20',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('123456789'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        
        DB::table('users')->insert([
            'name' => 'AgentTest',
            'firstname' => 'Agent',
            'lastname' => 'Test',
            'bio' => 'AgenttnegA',
            'rank' => 'agent',
            'email' => 'agenttest@test.com',
            'tel' => '+3323635339',
            'date_naissance' => '2020-02-20',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('123456789'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
