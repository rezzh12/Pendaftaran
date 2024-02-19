@extends('admin.layouts.master')
@section('title', 'Data Pendaftar')
@section('judul', 'Data Pendaftar')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Pendaftaran Santri Baru') }}</div>
            <div class="card-body">
            <a href="tambah_pendaftar" class="btn btn-primary "><i class="fa fa-plus">Tambah Data</i></a>
                    <hr />
            
                    <hr />
                <table id="table-data" class="table table-striped table-white">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Tempat Lahir</th>
                            <th>Nama Wali</th>
                            <th>NO HP</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($pendaftaran as $daftar)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> @if ($daftar->foto_santri !== null)
                                        <img src="{{ asset('storage/pas_foto/' . $daftar->foto_santri) }}" width="100px" height="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                                <td>{{ $daftar->nama}}</td>
                                <td>{{ $daftar->email }}</td>
                                <td>{{ $daftar->jenis_kelamin }}</td>
                                <td>{{ $daftar->tempat_lahir }}</td>
                                <td>{{ $daftar->nama_wali }}</td>
                                <td>{{ $daftar->no_hp }}</td>
                                
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{$daftar->id}}/edit_pendaftar" class="btn btn-success "><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-xs"></button>
                                            <button type="button" class="btn btn-danger"
                                            onclick="deleteConfirmation('{{ $daftar->id }}', '{{ $daftar->nama }}' )"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
    @stop

    @section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
$(function() {
            $(document).on('click', function() {
                let NISN = $(this).data('NISN');
                $.ajax({
                    type: "get",
                    url: "{{ url('/admin/ajaxadmin/dataPendaftar') }}/" + NISN,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-kode').val(res.kode_prodi);
                        $('#edit-nama').val(res.nama_prodi);
                        $('#edit-id').val(res.id);
                    },
                });
            });
        });

        @if(session('status'))
            Swal.fire({
                title: 'Congratulations!',
                text: "{{ session('status') }}",
                icon: 'Success',
                timer: 3000
            })
        @endif
        @if($errors->any())
            @php
                $message = '';
                foreach($errors->all() as $error)
                {
                    $message .= $error."<br/>";
                }
            @endphp
            Swal.fire({
                title: 'Error',
                html: "{!! $message !!}",
                icon: 'error',
            })
        @endif
        function deleteConfirmation(npm, judul) {
            swal.fire({
                title: "Hapus?",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus data buku dengan nama " + judul + "?!",

                showCancelButton: !0,
                confirmButtonText: "Ya, lakukan!",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "pendaftar/delete/" + npm,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            if (results.success === true) {
                                swal.fire("Done!", results.message, "success");
                                // refresh page after 2 seconds
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
    </script>
    @stop