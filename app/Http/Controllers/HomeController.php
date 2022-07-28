<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewRuteTerbanyak;
use App\Transaction;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $total_transaksi = Transaction::count();
        $total_pemasukan = number_format(Transaction::sum('tarif') , 0, ',', '.');
        $rute = ViewRuteTerbanyak::pluck("rute");
        $jumlah = ViewRuteTerbanyak::pluck("jumlah");
        $terbanyak = $jumlah[0]+round((0.1*$jumlah[0]),0);
        return view('dashboard',compact('rute','jumlah','terbanyak','total_transaksi','total_pemasukan'));
    }
}
