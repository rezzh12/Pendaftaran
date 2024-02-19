<?php

namespace App\Http\Controllers;


use App\Models\Pendaftar;
use App\Models\DataSantri;
use App\Models\Guru;
use App\Models\Alumni;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\TahunPendaftaran;
use App\Models\Pihak;
use App\Models\Pengumuman;
use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $angkatan = TahunPendaftaran::where('status',1)->value('tahun_pendaftaran');
        $pihak = Pihak::all();
        $pengumuman = Pengumuman::all();
        $berita = Berita::all();
        return view('beranda', compact('pihak','pengumuman','berita','angkatan'));
    }
    public function biaya()
    {
        return view('biaya');
    }
    public function pengumuman()
    {
        $pengumuman = Pengumuman::all();
        return view('pengumuman', compact('pengumuman'));
    }
    public function guru()
    {
        $guru = Guru::all();
        return view('pengajar', compact('guru'));
    }
    public function berita()
    {
        $berita = Berita::all();
        return view('berita', compact('berita'));
    }
  
}
