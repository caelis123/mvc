<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    // Halaman form pendaftaran service
    public function create()
    {
        return view('service.create');
    }

    // Simpan data service baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan'  => 'required|string|max:255',
            'no_hp'           => 'required|string|max:20',
            'jenis_perangkat' => 'required|string|max:100',
            'keluhan'         => 'required|string',
        ]);

        $service = Service::create([
            'user_id'         => Auth::id(),
            'nama_pelanggan'  => $request->nama_pelanggan,
            'no_hp'           => $request->no_hp,
            'jenis_perangkat' => $request->jenis_perangkat,
            'keluhan'         => $request->keluhan,
            'no_resi'         => 'SVC-' . strtoupper(uniqid()),
            'status'          => 'masuk',
        ]);

        return redirect()->route('service.tracking')
            ->with('success', 'Pendaftaran berhasil!')
            ->with('resi', $service->no_resi);
    }

    // Halaman cek resi (publik)
    public function tracking(Request $request)
    {
        $service  = null;
        $searched = false;

        if ($request->filled('resi')) {
            $searched = true;
            $service  = Service::where('no_resi', $request->resi)->first();
        }

        return view('service.tracking', compact('service', 'searched'));
    }

    // Riwayat service milik pelanggan yang login
    public function riwayat()
    {
        $services = Service::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pelanggan.riwayat', compact('services'));
    }
}