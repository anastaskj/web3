<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('customer_id', $user->id)->get();
        
        return view('dashboard') -> with('orders', $orders);
    }
    

   
   
}
