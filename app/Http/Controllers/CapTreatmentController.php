<?php

namespace App\Http\Controllers;

use App\Models\CapTreatment;
use Illuminate\Http\Request;

class CapTreatmentController extends Controller
{
    public function index()
    {
        $treatments = CapTreatment::all();
        return view('cap_treatment.index', compact('treatments'));
    }

    public function create()
    {
        return view('cap_treatment.create');
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

        CapTreatment::create($validated);
        return redirect()->route('cap_treatment.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
