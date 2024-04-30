@extends('layouts.min')

@section('content')


<div class="container mt-4">
    <h1 class="mb-4"><a href="{{route('user')}}" style="color: black; text-decoration: none;">Daftar denda mobil</a></h1>

    <table class="table table-stripped">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Keterlambatan</th>
            <th scope="col">Kerusakan</th>
            <th scope="col">kode mobil</th>
            <th scope="col">Total denda</th>
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
            </tr>
            @endforeach
        </tbody>
    </thead>
    </table>
</div>