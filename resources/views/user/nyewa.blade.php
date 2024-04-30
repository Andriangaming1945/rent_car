@extends('layouts.min')

@section('content')
    <h1>Daftar sewa mobil</h1>

    <h2>Pesanan mobil</h2>

    <form action="{{route('nyewa.store')}}" method="POST">
        @csrf
        <div>
            <label for="penyewa">Nama penyewa :</label>
            <input type="text" name="penyewa" id="penyewa">
        </div>

        <div>
            <label for="kd_mobil">Kode mobil : </label>
            <input type="text" name="kd_mobil" id="kd_mobil">
        </div>

        <div>
            <label for="id_supir">id supir : </label>
            <input type="number" name="id_supir" id="id_supir">
        </div>

        <div>
            <label for="tgl_pinjam">Tanggal pinjam : </label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam">
        </div>

        <div>
            <label for="tgl_kembali">Tanggal kembali : </label>
            <input type="date" name="tgl_kembali" id="tgl_kembali">
        </div>

        <div>
            <label for="dp">DP : </label>
            <input type="number" name="dp" id="dp" value="{{ number_format($dp, 0, ',', '.') }}">
        </div>

        <div>
            <label for="diskon">Diskon : </label>
            <span>{{$diskon * 100}}</span>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
    @endsection