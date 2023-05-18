<?php

namespace Database\Seeders;

use App\Imports\VoterImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class VotersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('voters.xlsx');
        Excel::import(new VoterImport(),$path);
    }
}
