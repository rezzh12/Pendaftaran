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

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dataPendaftar = Pendaftar::select(DB::raw("COUNT(*) as count"))->whereYear("created_at",date('Y'))->groupBy(DB::raw("Year(created_at)"))->pluck('count');
        $user = Auth::user();
        $santri = DataSantri::Count();
        $guru = Guru::Count();
        $alumni = Alumni::Count();
        $pengguna = User::Count();
        return view('admin.home', compact( 'user','dataPendaftar','santri','guru','alumni','pengguna'));
    }

    public function angkatan(){
        $user = Auth::user();
        $angkatan = TahunPendaftaran::all();
        return view('admin.angkatan', compact('user','angkatan'));
    }
    
    public function submit_angkatan(Request $req){
        { $validate = $req->validate([
            'angkatan'=> 'required',
            'status'=> 'required',
        ]);
        $angkatan = new TahunPendaftaran;
        $angkatan->tahun_pendaftaran = $req->get('angkatan');
        $angkatan->status = $req->get('status');
        $angkatan->save();
        Session::flash('status', 'Tambah data Angkatan berhasil!!!');
        return redirect()->route('admin.angkatan');
    }}
    
    public function update_angkatan(Request $req){
        $angkatan= TahunPendaftaran::find($req->get('id'));
        { $validate = $req->validate([
            'angkatan'=> 'required',
            'status'=> 'required',
        ]);
        $angkatan->tahun_pendaftaran = $req->get('angkatan');
        $angkatan->status = $req->get('status');
        $angkatan->save();
        Session::flash('status', 'Ubah data Angkatan berhasil!!!');
        return redirect()->route('admin.angkatan');
    }}
    
    public function getDataAngkatan($id)
    {
        $akademik = TahunPendaftaran::find($id);
        return response()->json($akademik);
    }
    
    public function delete_angkatan($id)
    {
        $angkatan = TahunPendaftaran::find($id);
        $angkatan->delete();
        $success = true;
        $message = "Data Angkatan Berhasil Dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function view_pendaftar()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftar::all();
        return view('admin.pendaftaran', compact('user', 'pendaftaran'));
    }

    public function view_input()
    {
        $user = Auth::user();
        $pendaftaran = Pendaftar::all();
        return view('admin.input_daftar', compact('user', 'pendaftaran'));
    }

    public function view_edit($id)
    {
        $user = Auth::user();
        $pendaftaran['pendaftaran'] =  pendaftar::findOrFail($id);
        return view('admin.edit_daftar', compact('user','pendaftaran'));
    }

    public function submit_pendaftar(Request $req)
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
    $pembayaran->pendaftar_id = $Pendaftar;
    $pembayaran->save();

    Session::flash('status', 'Input Data Pendaftaran Berhasil!!!');
    return redirect()->route('admin.pendaftaran');
    }


    public function update_pendaftar(Request $req)
    {
        $Pendaftaran = Pendaftar::find($req->get('id'));
    
        $validate = $req->validate([
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
        $Pendaftaran->kategori = $req->get('kategori');
        if($req->hasFile('pas_foto'))
        {
            $extension = $req->file('pas_foto')->extension();
            $filename = 'pas_foto'.time().'.'.$extension;
            $req->file('pas_foto')->storeAS('public/pas_foto', $filename);
            Storage::delete('public/pas_foto/'.$req->get('old_pas_foto'));
            $Pendaftaran->foto_santri = $filename;
        }
        if($req->hasFile('foto_kk'))
        {
            $extension = $req->file('foto_kk')->extension();
            $filename = 'foto_kk'.time().'.'.$extension;
            $req->file('foto_kk')->storeAS('public/foto_kk', $filename);
            Storage::delete('public/foto_kk/'.$req->get('old_foto_kk'));
            $Pendaftaran->foto_kk = $filename;
        }
        if($req->hasFile('foto_ktp'))
        {
            $extension = $req->file('foto_ktp')->extension();
            $filename = 'foto_ktp'.time().'.'.$extension;
            $req->file('foto_ktp')->storeAS('public/foto_ktp', $filename);
            Storage::delete('public/foto_ktp/'.$req->get('old_foto_ktp_wali'));
            $Pendaftaran->foto_ktp_wali = $filename;
        }
       
        $Pendaftaran->save();
    
        Session::flash('status', 'Edit data berhasil!!!');
        return redirect()->route('admin.pendaftaran');
    }

    public function delete_pendaftar($id)
    {
        $pendaftar = Pendaftar::find($id);
        Storage::delete('public/foto_kk/'.$pendaftar->foto_kk);
        Storage::delete('public/foto_ktp/'.$pendaftar->foto_ktp_wali);
        Storage::delete('public/pas_foto/'.$pendaftar->foto_santri);
        $pendaftar->delete();
        $success = true;
        $message = "Data Pendaftar Berhasil Dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
}

public function pembayaran()
{
    $user = Auth::user();
    $pembayaran = Pembayaran::all();
    return view('admin.pembayaran', compact( 'user','pembayaran'));
}
public function terima_pembayaran($id){
    $terima = DB::table('pembayarans')->where('id', $id)->update(['status_pembayaran' => 1, 'tgl_pembayaran'=>Carbon::now() ]);
    Session::flash('status', 'Pembayaran Berhasil di Terima!!!');
    return redirect()->back();
}
public function tolak_pembayaran($id){
    $terima = DB::table('pembayarans')->where('id', $id)->update(['status_pembayaran' => 2, 'tgl_pembayaran'=>null ]);
    Session::flash('status', 'Pembayaran Berhasil di Tolak!!!');
    return redirect()->back();
}


public function santri(){
    $user = Auth::user();
    $santri = DataSantri::all();
    return view('admin.santri', compact('user','santri'));
}

public function submit_santri(Request $req){
    { $validate = $req->validate([
        'santri'=> 'required',
        'kelas'=> 'required',
    ]);
    $data = Pendaftar::where('nama',$req->get('santri'))->value('id');
    $data1 = Pendaftar::where('nama',$req->get('santri'))->value('tahun_pendaftaran_id');
    $data2 = TahunPendaftaran::where('id',$data1)->value('tahun_pendaftaran');
    $santri = new DataSantri;
    $santri->pendaftar_id = $data;
    $santri->kelas = $req->get('kelas');
    $santri->angkatan = $data2;
    $santri->save();
    Session::flash('status', 'Tambah data Santri berhasil!!!');
    return redirect()->route('admin.santri');
}}

public function update_santri(Request $req){
    $santri= DataSantri::find($req->get('id'));
    {  $validate = $req->validate([
        'santri'=> 'required',
        'kelas'=> 'required',
    ]);
    $santri->pendaftar_id = $req->get('santri');
    $santri->kelas = $req->get('kelas');
    $santri->angkatan = $req->get('angkatan');
    $santri->save();
    Session::flash('status', 'Ubah data Santri berhasil!!!');
    return redirect()->route('admin.santri');
}}

public function getDataSantri($id)
{
    $santri = DataSantri::find($id);
    return response()->json($santri);
}

public function delete_santri($id)
{
    $santri = DataSantri::find($id);
    $santri->delete();
    $success = true;
    $message = "Data Santri Berhasil Dihapus";
    return response()->json([
        'success' => $success,
        'message' => $message,
    ]);
}
function fetch_santri(Request $request)
{
    if($request->get('query'))
    {
        $query = $request->get('query');
        $data = DB::table('pendaftars')
            ->where('nama', 'LIKE', "%{$query}%")
            ->orwhere('email', 'LIKE', "%{$query}%")
            ->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';
        foreach($data as $row)
        {
            $output .= '
            <li><a class="dropdown-item" href="#">'.$row->nama.'</a></li>
            ';
        }
        $output .= '</ul>';
        echo $output;
    }
}

public function alumni(){
    $user = Auth::user();
    $alumni = Alumni::all();
    return view('admin.alumni', compact('user','alumni'));
}

public function submit_alumni(Request $req){
    { $validate = $req->validate([
        'nama'=> 'required',
        'email'=> 'required',
        'jenis_kelamin'=> 'required',
        'alamat'=> 'required',
        'no_hp'=> 'required',
        'pekerjaan'=> 'required',
        'foto'=> 'required',
        'angkatan'=> 'required',
    ]);
    $alumni = new Alumni;
    $alumni->nama = $req->get('nama');
    $alumni->email = $req->get('email');
    $alumni->jenis_kelamin = $req->get('jenis_kelamin');
    $alumni->alamat = $req->get('alamat');
    $alumni->no_hp = $req->get('no_hp');
    $alumni->pekerjaan = $req->get('pekerjaan');
    $alumni->angkatan = $req->get('angkatan');
    if($req->hasFile('foto'))
    {
        $extension = $req->file('foto')->extension();
        $filename = 'foto'.time().'.'.$extension;
        $req->file('foto')->storeAS('public/alumni', $filename);
        $alumni->foto = $filename;
    }
    $alumni->save();
    Session::flash('status', 'Tambah data Alumni berhasil!!!');
    return redirect()->route('admin.alumni');
}}

public function update_alumni(Request $req){
    $alumni= Alumni::find($req->get('id'));
    { $validate = $req->validate([
        'nama'=> 'required',
        'email'=> 'required',
        'jenis_kelamin'=> 'required',
        'alamat'=> 'required',
        'no_hp'=> 'required',
        'pekerjaan'=> 'required',
        'foto'=> 'required',
        'angkatan'=> 'required',
    ]);
    $alumni->nama = $req->get('nama');
    $alumni->email = $req->get('email');
    $alumni->jenis_kelamin = $req->get('jenis_kelamin');
    $alumni->alamat = $req->get('alamat');
    $alumni->no_hp = $req->get('no_hp');
    $alumni->pekerjaan = $req->get('pekerjaan');
    $alumni->angkatan = $req->get('angkatan');
    if($req->hasFile('foto'))
    {
        $extension = $req->file('foto')->extension();
        $filename = 'foto'.time().'.'.$extension;
        $req->file('foto')->storeAS('public/alumni', $filename);
        Storage::delete('public/alumni/'.$req->get('old_foto'));
        $alumni->foto = $filename;
    }
    $alumni->save();
    Session::flash('status', 'Ubah data Alumni berhasil!!!');
    return redirect()->route('admin.alumni');
}}

public function getDataAlumni($id)
{
    $alumni = Alumni::find($id);
    return response()->json($alumni);
}

public function delete_alumni($id)
{
    $alumni = Alumni::find($id);
    Storage::delete('public/alumni/'.$alumni->foto);
    $alumni->delete();
    $success = true;
    $message = "Data Alumni Berhasil Dihapus";
    return response()->json([
        'success' => $success,
        'message' => $message,
    ]);
}

public function guru(){
    $user = Auth::user();
    $guru = Guru::all();
    return view('admin.guru', compact('user','guru'));
}

public function submit_guru(Request $req){
    { $validate = $req->validate([
        'nama'=> 'required',
        'pelajaran'=> 'required',
        'pesan'=> 'required',
        'foto'=> 'required',
    ]);
    $guru = new Guru;
    $guru->nama = $req->get('nama');
    $guru->pelajaran = $req->get('pelajaran');
    $guru->pesan = $req->get('pesan');
    if($req->hasFile('foto'))
    {
        $extension = $req->file('foto')->extension();
        $filename = 'foto'.time().'.'.$extension;
        $req->file('foto')->storeAS('public/guru', $filename);
        $guru->foto = $filename;
    }
    $guru->save();
    Session::flash('status', 'Tambah data Guru berhasil!!!');
    return redirect()->route('admin.guru');
}}

public function update_guru(Request $req){
    $guru= Guru::find($req->get('id'));
    { $validate = $req->validate([
        'nama'=> 'required',
        'pelajaran'=> 'required',
        'pesan'=> 'required',
        'foto'=> 'required',
    ]);
    $guru->nama = $req->get('nama');
    $guru->pelajaran = $req->get('pelajaran');
    $guru->pesan = $req->get('pesan');
    if($req->hasFile('foto'))
    {
        $extension = $req->file('foto')->extension();
        $filename = 'foto'.time().'.'.$extension;
        $req->file('foto')->storeAS('public/guru', $filename);
        Storage::delete('public/guru/'.$req->get('old_foto'));
        $guru->foto = $filename;
    }
    $guru->save();
    Session::flash('status', 'Ubah data Guru berhasil!!!');
    return redirect()->route('admin.guru');
}}

public function getDataGuru($id)
{
    $guru = Guru::find($id);
    return response()->json($guru);
}

public function delete_guru($id)
{
    $guru = Guru::find($id);
    Storage::delete('public/guru/'.$guru->foto);
    $guru->delete();
    $success = true;
    $message = "Data Guru Berhasil Dihapus";
    return response()->json([
        'success' => $success,
        'message' => $message,
    ]);
}

public function pihak(){
    $user = Auth::user();
    $pihak = Pihak::all();
    return view('admin.pihak', compact('user','pihak'));
}
public function update_pihak(Request $req){
    $pihak= Pihak::find($req->get('id'));
    { $validate = $req->validate([
        'putra'=> 'required',
        'putri'=> 'required',
        'pengurus'=> 'required',
        'alumni'=> 'required',
    ]);
    $pihak->jumlah_putra = $req->get('putra');
    $pihak->jumlah_putri = $req->get('putri');
    $pihak->jumlah_pengurus = $req->get('pengurus');
    $pihak->jumlah_alumni = $req->get('alumni');
    $pihak->save();
    Session::flash('status', 'Ubah data Pihak berhasil!!!');
    return redirect()->route('admin.pihak');
}}

public function getDataPihak($id)
{
    $pihak = Pihak::find($id);
    return response()->json($pihak);
}
public function pengumuman(){
    $user = Auth::user();
    $pengumuman = Pengumuman::all();
    return view('admin.pengumuman', compact('user','pengumuman'));
}

public function submit_pengumuman(Request $req){
    { $validate = $req->validate([
        'judul'=> 'required',
        'isi'=> 'required',
    ]);
    $pengumuman = new Pengumuman;
    $pengumuman->judul = $req->get('judul');
    $pengumuman->isi = $req->get('isi');
    $pengumuman->save();
    Session::flash('status', 'Tambah data Pengumuman berhasil!!!');
    return redirect()->route('admin.pengumuman');
}}

public function update_pengumuman(Request $req){
    $pengumuman= Pengumuman::find($req->get('id'));
    { $validate = $req->validate([
        'judul'=> 'required',
        'isi'=> 'required',
    ]);
    $pengumuman->judul = $req->get('judul');
    $pengumuman->isi = $req->get('isi');
    $pengumuman->save();
    Session::flash('status', 'Ubah data Pengumuman berhasil!!!');
    return redirect()->route('admin.pengumuman');
}}

public function getDataPengumuman($id)
{
    $pengumuman = Pengumuman::find($id);
    return response()->json($pengumuman);
}

public function delete_pengumuman($id)
{
    $pengumuman = Pengumuman::find($id);
    $pengumuman->delete();
    $success = true;
    $message = "Data Pengumuman Berhasil Dihapus";
    return response()->json([
        'success' => $success,
        'message' => $message,
    ]);
}

public function berita(){
    $user = Auth::user();
    $berita = Berita::all();
    return view('admin.berita', compact('user','berita'));
}

public function submit_berita(Request $req){
    { $validate = $req->validate([
        'judul'=> 'required',
        'isi'=> 'required',
        'foto'=> 'required',
    ]);
    $berita = new Berita;
    $berita->judul = $req->get('judul');
    $berita->isi = $req->get('isi');
    if($req->hasFile('foto'))
    {
        $extension = $req->file('foto')->extension();
        $filename = 'foto'.time().'.'.$extension;
        $req->file('foto')->storeAS('public/berita', $filename);
        $berita->foto = $filename;
    }
    $berita->save();
    Session::flash('status', 'Tambah data Berita berhasil!!!');
    return redirect()->route('admin.berita');
}}

public function update_berita(Request $req){
    $berita= Berita::find($req->get('id'));
    { $validate = $req->validate([
        'judul'=> 'required',
        'isi'=> 'required',
        'foto'=> 'required',
    ]);
    $berita->judul = $req->get('judul');
    $berita->isi = $req->get('isi');
    if($req->hasFile('foto'))
    {
        $extension = $req->file('foto')->extension();
        $filename = 'foto'.time().'.'.$extension;
        $req->file('foto')->storeAS('public/berita', $filename);
        Storage::delete('public/berita/'.$req->get('old_foto'));
        $berita->foto = $filename;
    }
    $berita->save();
    Session::flash('status', 'Ubah data Berita berhasil!!!');
    return redirect()->route('admin.berita');
}}

public function getDataBerita($id)
{
    $berita = Berita::find($id);
    return response()->json($berita);
}

public function delete_berita($id)
{
    $berita = Berita::find($id);
    Storage::delete('public/berita/'.$berita->foto);
    $berita->delete();
    $success = true;
    $message = "Data Berita Berhasil Dihapus";
    return response()->json([
        'success' => $success,
        'message' => $message,
    ]);
}

public function pengguna(){
    $user = Auth::user();
    $pengguna = User::with('roles')->get();
    $roles = Roles::all();
    return view('admin.pengguna', compact('user','pengguna','roles'));
}

public function submit_pengguna(Request $req){
    { $validate = $req->validate([
        'username'=> 'required',
        'email'=> 'required',
        'password'=> 'required',
        'foto'=> 'required',
        'roles_id'=> 'required',
    ]);
    
    $user = new User;
    $user->username = $req->get('username');
    $user->email = $req->get('email');
    $user->password = Hash::make($req->get('password'));
    $user->roles_id = $req->get('roles_id');
    $user->email_verified_at = null;
    $user->remember_token = null;
    if($req->hasFile('foto')){
        $extension = $req->file('foto')->extension();
        $filename = 'foto'.time().'.'.$extension;
        $req->file('foto')->storeAS('public/pengguna', $filename);
        $user->foto = $filename;
    }
    $user->save();
    Session::flash('status', 'Tambah data Pengguna berhasil!!!');
    return redirect()->route('admin.pengguna');
}}
public function getDataPengguna($id)
{
    $pengguna = User::find($id);
    return response()->json($pengguna);
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
    return redirect()->route('admin.pengguna');
}
}
public function delete_user($id)
{
    $user = User::find($id);
    Storage::delete('public/pengguna/'.$berita->foto);
    $user->delete();

    $success = true;
    $message = "Data Pengguna Berhasil Dihapus";
    return response()->json([
        'success' => $success,
        'message' => $message,
    ]);
}
}
