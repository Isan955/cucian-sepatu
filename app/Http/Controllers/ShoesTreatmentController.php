<?php

namespace App\Http\Controllers;

use App\Models\ShoesTreatment;
use Illuminate\Http\Request;

class ShoesTreatmentController extends Controller
{
    public function index()
    {
        $treatments = ShoesTreatment::all();
        return view('shoes_treatment.index', compact('treatments'));
    }

    public function create()
    {
        return view('shoes_treatment.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat_lengkap' => 'required',
            'no_hp' => 'required|string|max:20',
            'pickup_delivery' => 'required|in:pickup,delivery',
            'tanggal_jam_pickup' => 'nullable|date',
            'jumlah_sepatu' => 'required|integer',
            'service' => 'required|string',
            'note' => 'nullable|string',
            'progress' => 'nullable|in:pending,on progress,done',
        ]);

        ShoesTreatment::create($validated);
        return redirect()->route('shoes_treatment.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
