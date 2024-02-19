@extends('santri.layouts.master')
@section('title', 'Akun')
@section('judul', 'Akun')
@section('content')


<div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Data Akun') }}</div>
            <div class="card-body">
                        @foreach($pengguna as $row)
                            <table>
                            <tr>
                            <td> @if ($row->foto !== null)
                                        <img src="{{ asset('storage/pengguna/' . $row->foto) }}" width="100px" height="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                            </tr>
                            <tr>
                              <td><b>Nama</b></td>  
                              <td>:</td>  
                              <td>{{$row->username}}</td>  
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>:</td>
                                <td>{{$row->email}}</td>
                            </tr>
                            <tr>
                                <td><b>Hak Akses</b></td>
                                <td>:</td>
                                <td>{{ $row->roles->name }}</td>
                            </tr>
                            
                            </table>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-user" class="btn btn-xs btn-success"
                                            data-toggle="modal" data-target="#ubahUserModal"
                                            data-id="{{ $row->id }}"><i class="fa fa-edit">ubah</i></button>
                                    </div>
   
    <br />
   
@endforeach

</div>

<div class="modal fade" id="ubahUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('santri.pengguna.update') }}" enctype="multipart/form-data">
                    @csrf
                        @method('PATCH')
                        <div class="row">
                        
                        <div class="form-group">
                            <label for="edit-username">Username</label>
                            <input type="text" class="form-control" name="username" id="edit-username" required />
                        </div>

                        
                        <div class="form-group">
                            <label for="edit-email">Email</label>
                            <input type="text" class="form-control" name="email" id="edit-email" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-password">Password</label>
                            <input type="password" class="form-control" name="password" id="edit-password" required />
                        </div>
                        <div class="form-group">
                        <label for="edit-roles_id">Roles</label>
                            <select name="roles_id" id="edit-roles_id" class="form-control">
                            <option value="">Pilih Hak Akses</option>
                            @foreach($roles as $rl)
                            <option value="{{$rl->id}}">{{$rl->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-foto">Foto</label>
                            <input type="file" class="form-control" name="foto" id="edit-foto" required />
                        </div>
                        </div>
                        
                        

                <div class="modal-footer">
              
                <input type="hidden" name="old_foto" id="edit-old_foto" />
                <input type="hidden" name="id" id="edit-id" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Ubah</button>
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
                    url: "{{ url('/admin/ajaxadmin/dataPengguna') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-name').val(res.name);
                        $('#edit-username').val(res.username);
                        $('#edit-email').val(res.email);
                        $('#edit-password').val(res.password);
                        $('#edit-old_foto').val(res.foto);
                        $('#edit-roles_id').val(res.roles_id);
                        $('#edit-id').val(res.id);
                    },
                });
            });
        });

        function deleteConfirmation(npm, judul) {
            swal.fire({
                title: "Hapus?",
                type: 'warning',
                text: "Apakah anda yakin akan menghapus data dengan nama " + judul + "?!",

                showCancelButton: !0,
                confirmButtonText: "Ya, lakukan!",
                cancelButtonText: "Tidak, batalkan!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "pengguna/delete/" + npm,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            if (results.success === true) {
                                swal.fire("Selamat", results.message, "success");
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