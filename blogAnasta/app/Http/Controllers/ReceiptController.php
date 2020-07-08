<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use PDF;

class ReceiptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function print(Request $request)
    {
        $order = DB::table('orders')->where('order_id', $request->order_id)->first();
        $user =  DB::table('users')->where('id', $request->customer_id)->first();

        $pdf = PDF::loadView('receipt', ['order' => $order, 'user' => $user]);
        return $pdf->download('receipt.pdf');
    }
}
