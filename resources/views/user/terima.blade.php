@extends('layouts.min')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4"><a href="{{route('user')}}" style="color: black; text-decoration: none;">Daftar pengembalian mobil </a></h1>

    @if ($sewa)
       
   
    <table class="table table-striped">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Penyewa</th>
            <th scope="col">Kode Mobil</th>
            <th scope="col">id supir</th>
            <th scope="col">Tanggal pinjam</th>
            <th scope="col">Tanggal kembali</th>
            <th scope="col">Diskon</th>
            <th scope="col">Total</th>
        </tr>
    <thead>
        <tbody>
            @foreach($sewa as $nyewa)
            <tr>
                <td>{{$nyewa->id}}</td>
                <td>{{$nyewa->penyewa}}</td>
                <td>{{$nyewa->kd_mobil}}</td>
                <td>{{$nyewa->id_supir}}</td>
                <td>{{$nyewa->tgl_pinjam}}</td>
                <td>{{$nyewa->tgl_kembali}}</td>
                <td>{{$nyewa->diskon}}</td>
                <td>{{$nyewa->total}}</td>
            </tr>
            @endforeach
        </tbody>
    </thead>
    </table>
    @else
        <p>Tidak ada data pengembalian mobil.</p>
    @endif
</div>