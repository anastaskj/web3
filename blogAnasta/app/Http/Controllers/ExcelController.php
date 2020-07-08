<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Exports\FoodExport;

class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    function export()
    {
        return Excel::download(new FoodExport, 'products.xlsx');
    }
}
