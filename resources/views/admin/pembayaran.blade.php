@extends('admin.layouts.master')

@section('title', 'Data Pembayaran')
@section('judul', 'Data Pembayaran')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Pembayaran') }}</div>
            <div class="card-body">
                <table id="table-data" class="table table-striped table-white">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>Bukti</th>
                            <th>Nama</th>
                            <th>No Kwitansi</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Status Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($pembayaran as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> @if ($row->bukti !== null)
                                        <img src="{{ asset('storage/bukti/' . $row->bukti) }}" width="100px" height="100px" />
                                    @else
                                        [Gambar tidak tersedia]
                                    @endif</td>
                                <td>{{ $row->pendaftar->nama }}</td>
                                <td>{{ $row->no_kwitansi}}</td>
                                <td>{{ $row->jumlah_pembayaran }}</td>
                                <td>@if ($row->status_pembayaran == 1)
                                    <span>Pembayaran Diterima</span>
                                    @elseif ($row->status_pembayaran == 2)
                                    <span>Pembayaran Ditolak</span>
                                    @elseif ($row->status_pembayaran == Null)
                                    <span>Belum Dibayar</span>
                                    @endif
                                </td>
                                <td>{{ $row->tgl_pembayaran }}</td>
                                
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn  btn-success" href="pembayaran/terima/{{$row->id}}"><i class="fa fa-check"></i></a>
                                            <button class="btn btn-xs"></button>
                                            <a class="btn  btn-danger" href="pembayaran/tolak/{{$row->id}}"><i class="fa fa-times"></i></a>
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
<script>
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
</script>
@stop