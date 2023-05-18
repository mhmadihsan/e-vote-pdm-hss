<?php

namespace App\Imports;

use App\Models\Voters;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VoterImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $c){
            try {
                Voters::updateOrCreate(
                    [
                        'name_tickets'=>$c['nama'],
                    ],
                    [
                        'name_tickets'=>$c['nama'],
                        'number_ticket'=>$c['code'],
                        'voted'=>false
                    ]
                );
            }
            catch (\Throwable $th){
                dd($th,$c);
            }
        }
    }
}
