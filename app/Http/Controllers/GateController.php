<?php

namespace App\Http\Controllers;

use App\Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File; 

class GateController extends Controller
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
        $gates = Gate::all();
        return view('gate.index',compact('gates'));
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
        if($request->file('gambar_barcode')<>null){
            $today = Carbon::now()->setTimezone('Asia/Jakarta');
            $tanggal = $today->toDateString();
            $file = Image::make($request->gambar_barcode)->stream('jpg',100);
            $file_name = $request->nama .'-'.$tanggal . '.jpg';
            file_put_contents(public_path('img/gambar_barcode/'.$file_name), $file);
        } else {
            $file_name = $request->gambar_barcode;
        }
        Gate::create([
            'nama'=>$request->nama,
            'kode_barcode'=>$request->kode_barcode,
            'gambar_barcode'=>$file_name        
        ]);
        return redirect('/gate')->with('message','Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gate  $gate
     * @return \Illuminate\Http\Response
     */
    public function show(Gate $gate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gate  $gate
     * @return \Illuminate\Http\Response
     */
    public function edit(Gate $gate)
    {
        return view('gate.edit',['gate'=>$gate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gate  $gate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gate $gate)
    {
        // return $request;die;
        if($request->file('gambar_barcode')<>null){
            $today = Carbon::now()->setTimezone('Asia/Jakarta');
            $tanggal = $today->toDateString();
            $file = Image::make($request->gambar_barcode)->stream('jpg',100);
            $file_name = $request->nama .'-'.$tanggal . '.jpg';
            file_put_contents(public_path('img/gambar_barcode/'.$file_name), $file);
            File::delete('/img/gambar_barcode'.$gate->gambar_barcode);
        } else {
            $file_name = $gate->gambar_barcode;
        }
        Gate::where('id',$gate->id)
                ->update([
                    'nama' => $request->nama,
                    'kode_barcode' => $request->kode_barcode,
                    'gambar_barcode' => $file_name
                ]);
        return redirect('/gate')->with('message','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gate  $gate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gate $gate)
    {   
        File::delete('/img/gambar_barcode'.$gate->gambar_barcode);
        Gate::destroy($gate->id);
        return redirect('/gate')->with('message','Data berhasil dihapus!');
    }
}
