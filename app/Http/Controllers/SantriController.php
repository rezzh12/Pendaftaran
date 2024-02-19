<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\DataSantri;
use App\Models\Guru;
use App\Models\Alumni;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Pengumuman;
use App\Models\Berita;
use App\Models\Pihak;
use App\Models\Roles;
use App\Models\TahunPendaftaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use PDF;
use Session;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view_input()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftar::where('nama_akun',auth()->user()->username)->get();
        $id = Pendaftar::where('nama_akun',auth()->user()->username)->value('id');
        $pembayaran = Pembayaran::where('pendaftar_id',$id)->get();
        return view('santri.home', compact('user', 'pendaftaran','pembayaran'));
    }
    public function submit_daftar(Request $req)
    { $validate = $req->validate([
        'nama'=> 'required',
        'nama_panggilan'=> 'required',
        'jenis_kelamin'=> 'required',
        'email'=> 'required',
        'no_hp'=> 'required',
        'tempat_lahir'=> 'required',
        'tanggal_lahir'=> 'required',
        'alamat'=> 'required',
        'asal_pesantren'=> 'required',
        'pas_foto'=> 'required',
        'kategori'=> 'required',
        'nama_wali'=> 'required',
        'no_hp_wali'=> 'required',
        'foto_kk'=> 'required',
        'foto_ktp'=> 'required',
    ]);
    $angkatan = TahunPendaftaran::where('status',1)->value('id');
    $Pendaftaran = new Pendaftar;
    $Pendaftaran->nama = $req->get('nama');
    $Pendaftaran->nama_panggilan = $req->get('nama_panggilan');
    $Pendaftaran->jenis_kelamin = $req->get('jenis_kelamin');
    $Pendaftaran->email = $req->get('email');
    $Pendaftaran->no_hp = $req->get('no_hp');
    $Pendaftaran->tempat_lahir = $req->get('tempat_lahir');
    $Pendaftaran->tanggal_lahir = $req->get('tanggal_lahir');
    $Pendaftaran->alamat = $req->get('alamat');
    $Pendaftaran->asal_pesantren = $req->get('asal_pesantren');
    $Pendaftaran->tahun_pendaftaran_id = $angkatan;
    $Pendaftaran->nama_wali = $req->get('nama_wali');
    $Pendaftaran->no_hp_wali = $req->get('no_hp_wali');
    $Pendaftaran->nama_akun = auth()->user()->username;
    $Pendaftaran->kategori = $req->get('kategori');
    if($req->hasFile('pas_foto'))
    {
        $extension = $req->file('pas_foto')->extension();
        $filename = 'pas_foto'.time().'.'.$extension;
        $req->file('pas_foto')->storeAS('public/pas_foto', $filename);
        $Pendaftaran->foto_santri = $filename;
    }
    if($req->hasFile('foto_kk'))
    {
        $extension = $req->file('foto_kk')->extension();
        $filename = 'foto_kk'.time().'.'.$extension;
        $req->file('foto_kk')->storeAS('public/foto_kk', $filename);
        $Pendaftaran->foto_kk = $filename;
    }
    if($req->hasFile('foto_ktp'))
    {
        $extension = $req->file('foto_ktp')->extension();
        $filename = 'foto_ktp'.time().'.'.$extension;
        $req->file('foto_ktp')->storeAS('public/foto_ktp', $filename);
        $Pendaftaran->foto_ktp_wali = $filename;
    }
    $Pendaftaran->save();
    $Pendaftar = Pendaftar::where('nama','=',$req->get('nama'))->value('id');
    $pembayaran = new Pembayaran;
    $id = IdGenerator::generate(['table' => 'pembayarans','field'=>'no_kwitansi', 'length' => 7, 'prefix' =>'BY']);
    $pembayaran->no_kwitansi = $id;
    if($req->get('kategori')=="Mukimin"){
        $pembayaran->jumlah_pembayaran ="Rp.1.000.000";
    }
    else{
        $pembayaran->jumlah_pembayaran ="Rp.750.000" ;
    }
    $pembayaran->status_pembayaran = 0;
    $pembayaran->tgl_pembayaran = null;
    $pembayaran->bukti = null;
    $pembayaran->pendaftar_id = $Pendaftar;
    $pembayaran->save();

    Session::flash('status', 'Input Data Pendaftaran Berhasil!!!');
    return redirect()->route('santri.pendaftaran.submit');
    }

    public function getDataPembayaran($id)
    {
        $pembayaran = Pembayaran::find($id);
        return response()->json($pembayaran);
    }

    public function update_pembayaran(Request $req){
        $pembayaran= Pembayaran::find($req->get('id'));
        { $validate = $req->validate([
            'no_kwitansi'=> 'required',
            'jumlah_pembayaran'=> 'required',
            'pendaftar_id'=> 'required',
            'bukti'=> 'required',
        ]);
        $pembayaran->no_kwitansi = $req->get('no_kwitansi');
        $pembayaran->jumlah_pembayaran = $req->get('jumlah_pembayaran');
        $pembayaran->status_pembayaran = 0;
        $pembayaran->tgl_pembayaran = Carbon::now();
        $pembayaran->pendaftar_id = $req->get('pendaftar_id');
        if($req->hasFile('bukti'))
        {
            $extension = $req->file('bukti')->extension();
            $filename = 'bukti'.time().'.'.$extension;
            $req->file('bukti')->storeAS('public/bukti', $filename);
            Storage::delete('public/bukti/'.$req->get('old_foto'));
            $pembayaran->bukti = $filename;
        }
        $pembayaran->save();
        Session::flash('status', 'Upload Bukti berhasil!!!');
        return redirect()->route('santri.pendaftaran.submit');
    }}

    public function pengguna(){
        $user = Auth::user();
        $pengguna = User::where('id',auth()->user()->id)->with('roles')->get();
        $roles = Roles::all();
        return view('santri.akun', compact('user','pengguna','roles'));
    }

    public function update_pengguna(Request $req)
{ 
    $user= User::find($req->get('id'));
    { $validate = $req->validate([
        'username'=> 'required',
        'email'=> 'required',
        'password'=> 'required',
        'foto'=> 'required',
        'roles_id'=> 'required',
    ]);
    $user->username = $req->get('username');
    $user->email = $req->get('email');
    $user->password = Hash::make($req->get('password'));
    $user->roles_id = $req->get('roles_id');
    $user->email_verified_at = null;
    $user->remember_token = null;
    if($req->hasFile('foto'))
    {
        $extension = $req->file('foto')->extension();
        $filename = 'foto'.time().'.'.$extension;
        $req->file('foto')->storeAS('public/pengguna', $filename);
        Storage::delete('public/pengguna/'.$req->get('old_foto'));
        $user->foto = $filename;
    }
    $user->save();
    Session::flash('status', 'Ubah data Pengguna berhasil!!!');
    return redirect()->route('santri.pengguna');
}
}
}
