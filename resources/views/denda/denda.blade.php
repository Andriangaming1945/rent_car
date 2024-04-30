@extends('layouts.min')

@section('content')


<div class="container mt-4">
    <h1 class="mb-4"><a href="{{route('admin')}}" style="color: black; text-decoration: none;">Daftar Denda</h1>
    <a href="{{route('denda.create')}}" class="btn btn-primary mb-3">Tambah denda mobil</a>
    <table class="table table-striped">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Keterlambatan</th>
            <th scope="col">Kerusakan</th>
            <th scope="col">kode mobil</th>
            <th scope="col">total denda</th>
            <th scope="col">Aksi</th>
        </tr>
        <thead>
            <tbody>
                @foreach($denda as $dend)
                <tr>
                    <td>{{$dend->id}}</td>
                    <td>{{$dend->keterlambatan}}</td>
                    <td>{{$dend->kerusakan}}</td>
                    <td>{{$dend->kd_mobil}}</td>
                    <td>{{$dend->total_denda}}</td>
                    <td>
                        <a href="{{route('denda.edit', $dend->id)}}">Edit</a>
                        <form action="{{route('denda.destroy', $dend->id)}}" method="POST" enctype="multipart/form-data">
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
