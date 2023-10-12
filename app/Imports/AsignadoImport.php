<?php

namespace App\Imports;

use App\Models\Asignado;
use Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Upload;

class AsignadoImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        try{
            $upload = Upload::latest('id')->first();

            Asignado::create([
                
            ]);
        } catch(Exception $ex) {

        }
    }
}
