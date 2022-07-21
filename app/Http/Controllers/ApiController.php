<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userapp;
use App\Transaction;
use App\Vehicle;
use App\Route;
use App\Gate;
use App\Information;
use App\ViewTransaksi;
use App\ViewRute;
use Hash;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File; 


class ApiController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = Userapp::where('username',$username)->first();

        if($user){
            if(Hash::check($password, $user->password)){
                $response =[
                    'success' => 1,
                    'message' => 'Berhasil login!',
                    'data' => $user
                ];
                return response()->json($response);
            }else {
                $response = [
                    'success' => 0,
                    'message' => 'Username atau password salah! 1'
                ];            
                return response()->json($response);
            }
        } else {
            $response = [
                'success' => 0,
                'message' => 'Username atau password salah!'
            ];            
            return response()->json($response);
        }
        
    }
    public function getUser(Request $request){
        $user = Userapp::where('id',$request->idUser)->first();
        if ($user){
            $response = [
                'data' => $user
            ];            
            return response()->json($response);
        } else {
            $response = [
                'error' => 'User tidak ditemukan'
            ]; 
            return response()->json($response);
        }
    }

    public function register(Request $request)
    {   
        // return $request;die;
        try{
            $password = Hash::make($request->password);
            Userapp::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'email' => $request->email,
                'telepone' => $request->telepone,
                'kendaraan' => $request->kendaraan,
                'password' => $password
            ]);
            $response =[
                'success' => 1,
                'message' => 'Berhasil mendaftar!'
            ];
            return response()->json($response);
        } catch (\Exception $e){
            return response()->json($e);
        }
        
    }

    public function konfirmasi(Request $request)
    {
        $id_user = $request->id_user;        
        $tanggal = Carbon::now()->addHours(7);

        // return $tanggal;die;
        $user = Userapp::select('saldo','kendaraan')
                    ->where('id',$id_user)
                    ->first();

        $golongan = Vehicle::where('nama',$user->kendaraan)
                    ->pluck('golongan');
        $golongan = str_replace('"', "", $golongan);
        $golongan = str_replace('[', "", $golongan);
        $golongan = str_replace(']', "", $golongan);

        $rute = Route::select('id','tarif_golongan_'.$golongan)
                    ->where('id_gate_masuk',$request->id_gate_masuk)
                    ->where('id_gate_keluar',$request->id_gate_keluar)
                    ->first()->toArray();
        $rute= array_values($rute);

        $gate_masuk = Gate::select('nama')
                        ->where('id',$request->id_gate_masuk)
                        ->first();
        $gate_keluar = Gate::select('nama')
                        ->where('id',$request->id_gate_keluar)
                        ->first();

        $response = [
            'saldo' => 'Rp. '.$user->saldo,
            'tarif' => 'Rp. '.$rute[1],
            'gate_masuk' => $gate_masuk->nama,
            'gate_keluar' => $gate_keluar->nama,
        ];
        return response()->json($response);
        //konfirmasi belum selesai
    }

    public function store(Request $request)
    {
        $id_user = $request->id_user;        
        $tanggal = Carbon::now()->addHours(7);

        // return $tanggal;die;
        $user = Userapp::select('saldo','kendaraan')
                    ->where('id',$id_user)
                    ->first();
        $golongan = Vehicle::where('nama',$user->kendaraan)
                    ->first();
        return $golongan->golongan;die;        
        $golongan = str_replace('"', "", $golongan);
        $golongan = str_replace('[', "", $golongan);
        $golongan = str_replace(']', "", $golongan);
        return $golongan;die;
        $rute = Route::select('id','tarif_golongan_'.$golongan)
                    ->where('id_gate_masuk',$request->id_gate_masuk)
                    ->where('id_gate_keluar',$request->id_gate_keluar)
                    ->first()->toArray();
        $rute= array_values($rute);

        if($user->saldo - $rute[1]<0){
            $response = [
                'success' => 0,
                'message' => 'Saldo tidak mencukupi!'
            ];
            return response()->json($response);
        } else {
            Transaction::create([
                'id_rute'=>$rute[0],
                'id_user'=>$id_user,
                'tanggal'=>$tanggal,          
                'waktu'=>$tanggal,          
                'tarif'=>$rute[1],
                'status'=>'Berhasil',
            ]);

            $sisa_saldo = $user->saldo - $rute[1];
            Userapp::where('id',$id_user)
                    ->update([
                        'saldo'=>$sisa_saldo
                    ]);
            $response = [
                'success' =>1,
                'message' => 'Transaksi berhasil!',
                'tarif' => 'Rp. '.$rute[1],
                'sisa_saldo' =>'Rp. '.$sisa_saldo
            ];
            return response()->json($response,200);
        }
    }

    public function topup(Request $request)
    {
        $saldo = Userapp::where('id',$request->id)
                    ->first();
        $topup = $saldo->saldo + $request->nominal;
        
        Userapp::where('id',$request->id)
                    ->update([
                        'saldo'=>$topup
                    ]);
        $response = [
            'message' => 'Topup berhasil!',
            'nominal' => 'Rp. '. $request->nominal
        ];
        return response()->json($response);
    }

    public function saldo(Request $request)
    {
        $saldo = Userapp::where('id',$request->id)
                    ->first();
        $saldo = $saldo->saldo;
        return $saldo;
    }

    public function kendaraan()
    {
        $kendaraan = Vehicle::get()
                    ->pluck('nama');
        return response()->json($kendaraan);
    }
    public function updatePhoto(Request $request){
        if($request->profile<>null){
            $user = Userapp::where('id',$request->id)
                        ->first();
            $username = $user->username;
            $profil =$user->profil;

            if($profil<>null){
                $destinationPath =public_path().'\\img\\profile\\'.$profil;
                File::delete($destinationPath);
                // return $destinationPath;die;
            }

            $today = Carbon::now()->setTimezone('Asia/Jakarta');
            $tanggal = $today->toDateString();
            $file = Image::make($request->profile)->stream('jpg',100);
            $file_name = $username .'-'.$tanggal . '.jpg';
            file_put_contents(public_path('img/profile/'.$file_name), $file);

            $userapp = Userapp::where('id',$request->id)
                ->update([
                    'profil' => $file_name
                ]);
            
            $response = [
                'success'=>1,
                'message'=>"Berhasil mengubah profil!"
            ];
            return response()->json($response);
        } else {
            $response = [
                'success'=>0,
                'message'=>"Tidak ada gambar yang dipilih"
            ];
            return response()->json($response);
        }
    }

    public function updateProfile(Request $request)
    {
        // return $request;die;
        
        $userapp = Userapp::where('id',$request->id)
                ->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'telepone' => $request->telepone,
                    'kendaraan' => $request->kendaraan
                ]);
        if($request->password<>null){
            $password = Hash::make($request->password);
            $userapp = Userapp::where('id',$request->id)
                ->update([
                    'password'=>$password
                ]);      
        } 
        $response  = [
            'success' => 1,
            'message'=>'Berhasil mengubah profil!'
        ]; 
        return response()->json($response);
    }

    public function riwayat(Request $request)
    {
        $response = ViewTransaksi::where('id',$request->id)
                    ->orderBy('tanggal','desc')
                    ->get();
        return response()->json($response);
    }

    public function rute(){
        $response = ViewRute::get();
        return response()->json($response);
    }
    public function informasi(){
        $response = Information::where('status',1)
                        ->get();
        return response()->json($response);
    }

    public function gate(Request $request)  
    {
        $gate = Gate::where('kode_barcode',$request->kode_barcode)
                    ->first();
        if($gate){
            $response = [
                'message' => 'success',
                'data' => $gate
            ];
            return response()->json($response);
        } else {
            $response = [
                'message' => 'Gate tidak terdaftar!'
            ];
            return response()->json($response);
        }
    }
}
