<?php

namespace App\Exports;

use App\Food;
use Maatwebsite\Excel\Concerns\FromCollection;

class FoodExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Food::select('name', 'category', 'description','price')->get();
    }
}
