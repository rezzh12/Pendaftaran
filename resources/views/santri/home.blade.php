@extends('santri.layouts.master')
@section('title', 'Pendaftaran')
@section('judul', 'Pendaftaran')
@section('content')

@if ($pendaftaran->isEmpty())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Data Pendaftar</div>

                <div class="card-body">
                <form method="post" action="{{ route('santri.pendaftaran.simpan') }}" enctype="multipart/form-data">
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
@else
<div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Data Pendaftaran Santri Baru') }}</div>
            <div class="card-body">
            <div class="row">
                        <div class="col-md-6">
                        @foreach($pendaftaran as $daftar)
                            <table>
                            <tr>
                            <td> @if ($daftar->foto_santri !== null)
                                        <img src="{{ asset('storage/pas_foto/' . $daftar->foto_santri) }}" width="100px" height="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                            </tr>
                            <tr>
                              <td><b>Nama</b></td>  
                              <td>:</td>  
                              <td>{{$daftar->nama}}</td>  
                            </tr>
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td>:</td>
                                <td>{{$daftar->jenis_kelamin}}</td>
                            </tr>
                            <tr>
                                <td><b>Tempat,Tanggal Lahir</b></td>
                                <td>:</td>
                                <td>{{$daftar->tempat_lahir}},{{$daftar->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td>:</td>
                                <td> {{$daftar->alamat}}</td>
                            </tr>
                            <tr>
                            <td><b>No Hp</b></td>
                            <td>:</td>
                            <td> {{$daftar->no_hp}}</td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td>:</td>
                            <td> {{$daftar->email}}</td>
                        </tr>
                        <tr>
                            <td><b>Nama Wali</b></td>
                            <td>:</td>
                            <td>{{$daftar->nama_wali}}</td>
                        </tr>
                            </table>
   
    <br />
   
@endforeach
</div>
<div class="col-md-6">
@foreach($pembayaran as $bayar)
<table>
<tr>
                            <td> @if ($bayar->bukti !== null)
                                        <img src="{{ asset('storage/bukti/' . $bayar->bukti) }}" width="100px" height="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                            </tr>
                            <tr>
                              <td><b>No Kwitansi</b></td>  
                              <td>:</td>  
                              <td>{{$bayar->no_kwitansi}}</td>  
                            </tr>
                            <tr>
                                <td><b>Jumlah Harus Dibayar</b></td>
                                <td>:</td>
                                <td>{{$bayar->jumlah_pembayaran}}</td>
                            </tr>
                            <tr>
                                <td><b>Status Pembayaran</b></td>
                                <td>:</td>
                                <td>@if ($bayar->status_pembayaran == 1)
                                    <span>Pembayaran Diterima</span>
                                    @elseif ($bayar->status_pembayaran == 2)
                                    <span>Pembayaran Ditolak</span>
                                    @elseif ($bayar->status_pembayaran == Null)
                                    <span>Belum Dibayar / Belum Diverifikasi</span>
                                    @endif</td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Bayar</b></td>
                                <td>:</td>
                                <td> {{$bayar->tgl_pembayaran}}</td>
                            </tr>
                            <tr>
                                <td> <b>No Rekening Pembayaran</b></td>
                                <td>:</td>
                                <td> 085.5555.2134.7</td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td>:</td>
                                <td>@if ($bayar->status_pembayaran == 1)
                                    <span>Diterima</span>
                                    @else
                                    <span>Sedang Verifikasi Persyaratan</span>
                                    @endif</td>
                            </tr>
                            </table>
</div>
@if ($bayar->status_pembayaran != 1)
<button type="button" id="btn-edit-user" class="btn btn-xs btn-success"
                                            data-toggle="modal" data-target="#ubahUserModal"
                                            data-id="{{ $bayar->id }}"><i class="fa fa-edit">upload bukti</i></button>                            
                                    @endif</td>
@endforeach
</div>
@endif
<div class="modal fade" id="ubahUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Bukti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('santri.pembayaran.update') }}" enctype="multipart/form-data">
                    @csrf
                        @method('PATCH')
                        <div class="row">
                        <div class="form-group">
                            <label for="bukti">Bukti</label>
                            <input type="file" class="form-control" name="bukti" id="bukti" required />
                        </div>
                        </div>
                <div class="modal-footer">
              
                <input type="hidden" name="no_kwitansi" id="edit-no_kwitansi" />
                <input type="hidden" name="jumlah_pembayaran" id="edit-jumlah_pembayaran" />
                <input type="hidden" name="pendaftar_id" id="edit-pendaftar_id" />
                <input type="hidden" name="old_foto" id="edit-old_foto" />
                <input type="hidden" name="id" id="edit-id" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Upload</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
@stop
@section('js')
    <script>
        //EDIT
        $(function() {
            $(document).on('click', '#btn-edit-user', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ url('/santri/ajaxadmin/dataPembayaran') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-no_kwitansi').val(res.no_kwitansi);
                        $('#edit-jumlah_pembayaran').val(res.jumlah_pembayaran);
                        $('#edit-pendaftar_id').val(res.pendaftar_id);
                        $('#edit-old_foto').val(res.bukti);
                        $('#edit-id').val(res.id);
                    },
                });
            });
        });

  
        </script>
    @stop