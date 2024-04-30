@extends('layouts.min')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4"><a href="{{route('admin')}}" style="color: black; text-decoration: none;">Daftar sewa</h1>
    <a href="{{route('sewa.create')}}" class="btn btn-primary mb-3">Tambah mobil</a>
    <table class="table table-striped">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Penyewa</th>
            <th scope="col">Mobil</th>
            <th scope="col">id supir</th>
            <th scope="col">Tanggal pinjam</th>
            <th scope="col">Tanggal kembali</th>
            <th scope="col">DP</th>
            <th scope="col">Diskon</th>
            <th scope="col">Total</th>
            <th scope="col">Aksi</th>
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
                <td>{{$nyewa->dp}}</td>
                <td>{{$nyewa->diskon}}</td>
                <td>{{$nyewa->total}}</td>
                <td>
                    <a href="{{route('sewa.edit', $nyewa->id)}}">Edit</a>
                    <form action="{{route('sewa.destroy', $nyewa->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
    </table>
</div>