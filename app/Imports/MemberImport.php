<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MemberImport implements ToModel
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
        return new Member([
            'family_name' => $row[0],
            'other_name' => $row[1],
            'center_id' => $this->center_id,
            'date_of_birth' => $row[2],
            'gender' => $row[3],
            'marital_status' => $row[4],
            'home_address' => $row[5],
            'phone_number' => $row[6],
            'email' => $row[7],
            'age' => $row[8],
            'age_band' => $row[9],
            'stateOfOrigin' => $row[10],
            'position' => $row[11],
        ]);
    }
}
