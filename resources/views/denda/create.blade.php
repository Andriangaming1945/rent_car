@extends('layouts.min')

@section('content')
    <h1>Daftar Denda Mobil</h1>

   

    <form action="{{route('denda.store')}}" method="POST">
        @csrf
        <div>
            <label for="keterlambatan">Keterlambatan :</label>
            <input type="number" name="keterlambatan" id="keterlambatan">
        </div>

        <div>
            <label for="kerusakan">Kerusakan : </label>
            <input type="number" name="kerusakan" id="kerusakan">
        </div>

        <div>
            <label for="kd_mobil">kode mobil: </label>
            <input type="text" name="kd_mobil" id="kd_mobil">
        </div>

      
        <button type="submit" name="submit">Submit</button>
    </form>
    @endsection