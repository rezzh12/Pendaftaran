@extends('admin.layouts.master')
@section('title', 'Data Pihak')
@section('judul', 'Data Pihak')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Data Pihak') }}</div>
            <div class="card-body">
                <table id="table-data" class="table table-striped table-white">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>Jumlah Putra</th>
                            <th>Jumlah Putri </th>
                            <th>Jumlah Pengurus </th>
                            <th>Jumlah alumni </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                        @foreach ($pihak as $row)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">{{ $row->jumlah_putra }}</td>
                                <td class="text-center">{{ $row->jumlah_putri }}</td>
                                <td class="text-center">{{ $row->jumlah_pengurus }}</td>
                                <td class="text-center">{{ $row->jumlah_alumni }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-akademik" class="btn btn-xs btn-success"
                                            data-toggle="modal" data-target="#ubahTAkademikModal"
                                            data-id="{{ $row->id }}"><i class="fa fa-edit"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     <!-- Ubah Akademik -->
     <div class="modal fade" id="ubahTAkademikModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pihak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.pihak.update') }}" enctype="multipart/form-data">
                    @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="edit-putra">Jumlah Putra</label>
                            <input type="text" class="form-control" name="putra" id="edit-putra" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-putri">Jumlah Putri</label>
                            <input type="text" class="form-control" name="putri" id="edit-putri" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-pengurus">Jumlah Pengurus</label>
                            <input type="text" class="form-control" name="pengurus" id="edit-pengurus" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-alumni">Jumlah Alumni</label>
                            <input type="text" class="form-control" name="alumni" id="edit-alumni" required />
                        </div>
                <div class="modal-footer">
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
            $(document).on('click', '#btn-edit-akademik', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ url('/admin/ajaxadmin/dataPihak') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-putra').val(res.jumlah_putra);
                        $('#edit-putri').val(res.jumlah_putri);
                        $('#edit-pengurus').val(res.jumlah_pengurus);
                        $('#edit-alumni').val(res.jumlah_alumni);
                        $('#edit-id').val(res.id);
                    },
                });
            });
        });

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
                        url: "angkatan/delete/" + npm,
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