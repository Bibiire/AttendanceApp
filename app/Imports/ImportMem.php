<?php

namespace App\Imports;

use App\Models\Mem;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportMem implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function  __construct($center_id)
    {
        $this->center_id= $center_id;
    }
    public function model(array $row)
    {
        return new Mem([
            'family_name' => $row[0],
            'center_id' =>  $this->center_id,
            'email' => $row[1],
            'password' => bcrypt($row[2]),
        ]);
    }
}
