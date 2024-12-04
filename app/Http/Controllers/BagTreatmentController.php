<?php

namespace App\Http\Controllers;

use App\Models\BagTreatment;
use Illuminate\Http\Request;

class BagTreatmentController extends Controller
{
    public function index()
    {
        $treatments = BagTreatment::all();
        return view('bag_treatment.index', compact('treatments'));
    }

    public function create()
    {
        return view('bag_treatment.create');
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

        BagTreatment::create($validated);
        return redirect()->route('bag_treatment.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
