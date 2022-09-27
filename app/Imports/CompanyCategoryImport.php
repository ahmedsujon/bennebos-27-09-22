<?php

namespace App\Imports;

use App\Models\CompanyCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompanyCategoryImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CompanyCategory([
            'category_id'=>$row['id'],
            'name'=>$row['category_name'],
        ]);
    }
}
