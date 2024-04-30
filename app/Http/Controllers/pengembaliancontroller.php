<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Sewa;
use Illuminate\Http\Request;

class pengembaliancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sewa = Sewa::all();
        $diskon = 0.1;
        $dp = 1000000;
        return view("pengembalian.pengembalian", compact('sewa', 'diskon', 'dp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   

        $sewa = Sewa::all();
        $diskon = 0.1;
        $dp = 1000000;
        return view('pengembalian.create', compact('sewa', 'diskon', 'dp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Menghitung total diskon
    $penyewa_pertama = Sewa::where('penyewa', $request->penyewa)->count() == 0;
    $diskon = $penyewa_pertama ? 0.1 : 0.1;
    $total_diskon = $diskon;

    // Menghitung total akhir setelah diskon
    $total_akhir = 100 - $total_diskon;


    ;
    // Validasi tanggal pengembalian
    $tgl_pinjam = strtotime($request->tgl_pinjam);
    $tgl_kembali = strtotime($request->tgl_kembali);

    if ($tgl_kembali <= $tgl_pinjam) {
        return redirect()->back()->with('error', 'Tanggal pengembalian harus setelah tanggal pinjam.');
    }

    // Simpan data penyewaan
    $sewa = new Pengembalian([
        'penyewa' => $request->penyewa,
        'kd_mobil' => $request->kd_mobil,
        'id_supir' => $request->id_supir,
        'tgl_pinjam' => $request->tgl_pinjam,
        'tgl_kembali' => $request->tgl_kembali,
        'diskon' => $total_diskon,
        'total' => $total_akhir 
    ]);

    $sewa->save();

    return redirect()->route('pengembalian.pengembalian')->with("berhasil", "data penyewaan berhasil di masukan");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sewa = Sewa::findOrFail($id);
        return view('admin.pengembalian.show', compact("sewa"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sewa = Sewa::find($id);
        return view('pengembalian.edit', compact("sewa"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'penyewa' => 'required|string',
            'kd_mobil' => 'required|string',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date|after:tgl_pinjam',
            
        ]);
    
        // Find the specific Sewa instance
        $sewa = Sewa::findOrFail($id);
    
        // Calculate discount (not changed during update)
        $penyewa_pertama = Sewa::where('penyewa', $request->penyewa)->count() == 0;
        $diskon = $penyewa_pertama ? 0.1 : 0.0;
    
        // Calculate total after discount (not changed during update)
        $total_akhir = $request->dp * (1 - $diskon);
    
        // Update the Sewa instance
        $sewa->update([
            'penyewa' => $request->penyewa,
            'kd_mobil' => $request->kd_mobil,
            'id_supir' => $request->id_supir,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'diskon' => $diskon,
            'total' => $total_akhir
        ]);
    
        return redirect()->route('pengembalian.pengembalian')->with('success', 'Data pengembalian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sewa = Sewa::find($id);

        if($sewa){
            $sewa->delete();
            return redirect()->route('pengembalian')->with("success", 'Data penyewaan berhasil di delete');
        }else{
            return redirect()->route('pengembalian')->with("error", "Data tidak berhasil terhapus");
        }
    }
}
