<?php

namespace App\Imports;

use App\Models\Torque;
use Maatwebsite\Excel\Concerns\ToModel;

class TorqueImport implements ToModel
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
