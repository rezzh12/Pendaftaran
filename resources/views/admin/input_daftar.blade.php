@extends('admin.layouts.master')
@section('title', 'Input Pendaftar')
@section('judul', 'Input Pendaftar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Data Pendaftar</div>

                <div class="card-body">
                <form method="post" action="{{ route('admin.pendaftaran.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" required /> 
                        </div>
                        <div class="form-group">
                            <label for="nama_panggilan">Nama panggilan</label>
                            <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" required /> 
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Putra">Putra</option>
                            <option value="Putri">Putri </option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" required />
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="number" class="form-control" name="no_hp" id="no_hp" required />
                        </div>
                       
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required />
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required />
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required />
                        </div>
                        <div class="form-group">
                            <label for="asal_pesantren">Asal Pesantren</label>
                            <input type="text" class="form-control" name="asal_pesantren" id="asal_pesantren" required />
                        </div>
                        <div class="form-group">
                            <label for="pas_foto">Pas Foto</label>
                            <input type="file" class="form-control" name="pas_foto" id="pas_foto" required />
                        </div>
                        </div>
                        </div>
                </div>
                
            </div>
            <div class="card">
                <div class="card-header">Data Wali</div>
                <div class="card-body">
                    
                        <div class="row">
                        <div class="col-md-6">
                            
                        <div class="form-group">
                            <label for="nama_wali">Nama Wali</label>
                            <input type="text" class="form-control" name="nama_wali" id="nama_wali" required />
                        </div>
                        <div class="form-group">
                            <label for="no_hp_wali">No HP Wali</label>
                            <input type="number" class="form-control" name="no_hp_wali" id="no_hp_wali" required />
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="kategori" id="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Mustaotin">Mustaotin</option>
                            <option value="Mukimin">Mukimin </option>
                           </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                     
                        <div class="form-group">
                            <label for="foto_kk">Foto KK</label>
                            <input type="file" class="form-control" name="foto_kk" id="foto_kk" required />
                        </div>
                        <div class="form-group">
                            <label for="foto_ktp">Foto KTP Wali</label>
                            <input type="file" class="form-control" name="foto_ktp" id="foto_ktp" required />
                        </div>
                        </div>
                        </div>
                </div>
                
            </div>
                
            </div>


            <div class="modal-footer">
            <input type="hidden" name="id_login" id="id_login" value="{{ Auth::user()->id }}" />
            <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@stop