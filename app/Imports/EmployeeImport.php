<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            'question'=>$row['question'],
            'profileimage'=>$row['profileimage'],
            'a'=>$row['a'],
            'b'=>$row['b'],
            'c'=>$row['c'],
            'd'=>$row['d'],
            'ans'=>$row['ans'],
        ]);
    }
}
