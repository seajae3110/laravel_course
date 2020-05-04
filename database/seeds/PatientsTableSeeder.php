<?php

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'first_name' => 'Sea',
            'middle_name' => 'Jae',
            'last_name' => 'Valor'
        ]);
    }
}
