<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $teams = [];
        for ($i = 1; $i <= 64; $i++) {
            $teams[] = [
                'name' => 'Team '.$i,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        
        DB::table('teams')->insert($teams);
    }

}
