<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class dendacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   

        $denda = Denda::all();
        return view('denda.denda', compact('denda'));   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $denda = Denda::all();
        return view('denda.create', compact('denda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "keterlambatan" => 'required|integer',
            "kerusakan" => 'required|string', // Ensure 'kerusakan' is an integer
            "kd_mobil" => 'required',
            
        ]);
    
        // Cast 'kerusakan' input value to an integer
        $total_denda = (int) $request->total_denda;
    
        $denda = new Denda([
            'keterlambatan' => $request->keterlambatan,
            'kerusakan' => $request->kerusakan, // Use the casted value
            'kd_mobil' => $request->kd_mobil,
            'total_denda' => $total_denda
            
        ]);
        $total_denda = $denda->calculate();
        $denda->save();
    
        return redirect()->route('admin')->with('success', 'Denda berhasil ditambahkan, total denda : '.$total_denda);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $denda = Denda::findOrFail($id);
        return view('denda.show', compact('denda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $denda = Denda::find($id);
        return view('denda.edit', compact('denda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "keterlambatan" => 'required',
            "kerusakan" => 'required',
            "kd_mobil" => 'required',
            
        ]);

        $denda = Denda::find($id)([
            'keterlambatan' => $request->keterlambatan,
            'kerusakan' => $request->kerusakan,
            'kd_mobil' => $request->kd_mobil,
            'total_denda' => $request->total_denda

            
        ]);

        $totaldenda = $denda->calculate();
        $denda->save();

        return redirect()->route('admin')->with('success', 'Denda berhasil ditambahkan, total denda : '.$totaldenda);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $denda = Denda::find($id);

        if($denda){
            $denda->delete();
            return redirect()->route('admin')->with('success', "Denda berhasil terhapus");
        }else{
            return redirect()->route('admin')->with('error', "Denda tidak berhasil terhapus");
        }
    }
}
