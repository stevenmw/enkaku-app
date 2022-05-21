<?php

namespace App\Imports;

use App\Models\Arus;
use Maatwebsite\Excel\Concerns\ToModel;

class ArusImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

    }
}
