<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert($this->data());
    }

    private function data(){
        return [
            [
                'name'=>'admin',
                'display_name'=>'Admin',
                'description'=>null
            ],
            [
                'name'=>'vote',
                'display_name'=>'Voters',
                'description'=>null
            ]

        ];
    }
}
