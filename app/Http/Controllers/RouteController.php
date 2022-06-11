<?php

namespace App\Http\Controllers;

use App\Route;
use App\ViewRute;
use App\Gate;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $routes= ViewRute::all();
        $gates = Gate::pluck('nama','id');
        $selectedID = 2;
        return view('rute.index',compact('routes','gates','selectedID'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;die;
        Route::create($request->all());
        return redirect('/rute')->with('message','Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    

    public function edit(Route $route)
    {   
        $gates = Gate::pluck('nama','id');
        return view('rute.edit',['route'=>$route,'gates'=>$gates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $route)
    {
        // return $request;die;
        Route::where('id',$route->id)
                ->update([
                    'id_gate_masuk'=>$request->id_gate_masuk,
                    'id_gate_keluar'=>$request->id_gate_keluar,
                    'tarif_golongan_i'=>$request->tarif_golongan_i,                    
                    'tarif_golongan_i'=>$request->tarif_golongan_ii,                    
                    'tarif_golongan_i'=>$request->tarif_golongan_iii,                    
                    'tarif_golongan_i'=>$request->tarif_golongan_iv,                    
                    'tarif_golongan_i'=>$request->tarif_golongan_v               
                ]);
        return redirect('/rute')->with('message','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        Route::destroy($route->id);
        return redirect('/rute')->with('message','Data berhasil dihapus!');
    }
}
