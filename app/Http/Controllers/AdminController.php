<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Dashboard admin - tampilkan semua service
    public function dashboard(Request $request)
    {
        $query = Service::with('user')->latest();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by nama atau resi
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_pelanggan', 'like', '%' . $request->search . '%')
                  ->orWhere('no_resi', 'like', '%' . $request->search . '%');
            });
        }

        $services = $query->paginate(10);

        $total   = Service::count();
        $masuk   = Service::where('status', 'masuk')->count();
        $proses  = Service::where('status', 'proses')->count();
        $selesai = Service::where('status', 'selesai')->count();

        return view('admin.dashboard', compact('services', 'total', 'masuk', 'proses', 'selesai'));
    }

    // Update status service
    public function updateStatus(Request $request, Service $service)
    {
        $request->validate([
            'status' => 'required|in:masuk,proses,selesai',
        ]);

        $service->update(['status' => $request->status]);

        return back()->with('success', 'Status service no. ' . $service->no_resi . ' berhasil diubah ke "' . $request->status . '".');
    }

    // Hapus service
    public function destroy(Service $service)
    {
        $resi = $service->no_resi;
        $service->delete();
        return back()->with('success', 'Data service ' . $resi . ' berhasil dihapus.');
    }
}