@extends('layouts.min')

@section('content')
    <h1>Edit sewa mobil</h1>

    <form action="{{route('sewa.update', $sewa->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="penyewa">Nama penyewa :</label>
            <input type="text" name="penyewa" id="penyewa" value="{{$sewa->penyewa}}" required>
        </div>

        <div>
            <label for="kd_mobil">Kode mobil : </label>
            <input type="text" name="kd_mobil" id="kd_mobil" value="{{$sewa->kd_mobil}}" >
        </div>

        <div>
            <label for="id_supir">id supir : </label>
            <input type="number" name="id_supir" id="id_supir" value="{{$sewa->id_supir}}" >
        </div>

        <div>
            <label for="tgl_pinjam">Tanggal pinjam : </label>
            <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="{{$sewa->tgl_pinjam}}" >
        </div>

        <div>
            <label for="tgl_kembali">Tanggal kembali : </label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" value="{{$sewa->tgl_kembali}}" >
        </div>

        <div>
            <label for="dp">DP : </label>
            <input type="number" name="dp" id="dp" value="{{$sewa->dp}}" required>
        </div>

        <div>
            <label for="diskon">Diskon : </label>
            <input type="decimal" class="form-control" id="diskon" name="diskon" value="{{ $sewa->diskon }}" required>
        </div>

        <div>
            <label for="total">Total : </label>
            <input type="number" class="form-control" id="diskon" name="diskon" value="{{ $sewa->total }}" required>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
    @endsection