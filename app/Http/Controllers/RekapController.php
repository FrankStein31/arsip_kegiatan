<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekaps = Rekap::all();
        // Menggunakan view di folder 'resources/views'
        return view('rekap', compact('rekaps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menggunakan view di folder 'resources/views'
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kegiatan' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'dokumentasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('dokumentasi')) {
            $path = $request->file('dokumentasi')->store('dokumentasi', 'public');
        }

        Rekap::create([
            'nama' => $request->nama,
            'kegiatan' => $request->kegiatan,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'dokumentasi' => $path ?? null,
        ]);

        return redirect()->route('rekaps.index')
            ->with('success', 'Rekap created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rekap $rekap)
    {
        // Menggunakan view di folder 'resources/views'
        return view('show', compact('rekap'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rekap $rekap)
    {
        // Menggunakan view di folder 'resources/views'
        return view('edit', compact('rekap'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rekap $rekap)
    {
        $request->validate([
            'nama' => 'required',
            'kegiatan' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('dokumentasi')) {
            // Delete the old image if exists
            if ($rekap->dokumentasi) {
                Storage::disk('public')->delete($rekap->dokumentasi);
            }
            $path = $request->file('dokumentasi')->store('dokumentasi', 'public');
        }

        $rekap->update([
            'nama' => $request->nama,
            'kegiatan' => $request->kegiatan,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'dokumentasi' => $path ?? $rekap->dokumentasi,
        ]);

        return redirect()->route('rekaps.index')
            ->with('success', 'Rekap updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rekap $rekap)
    {
        $rekap->delete();
        return redirect()->route('rekaps.index')
            ->with('success', 'Rekap deleted successfully.');
    }

    /**
     * Display the history with search functionality.
     */
    // public function history(Request $request)
    // {
    //     $search = $request->get('search');
    //     $date = $request->get('date');
    
    //     $rekaps = Rekap::query()
    //         ->when($search, function ($query, $search) {
    //             return $query->where('nama', 'like', "%{$search}%")
    //                 ->orWhere('kegiatan', 'like', "%{$search}%")
    //                 ->orWhere('keterangan', 'like', "%{$search}%")
    //                 ->orWhere('lokasi', 'like', "%{$search}%");
    //         })
    //         ->when($date, function ($query, $date) {
    //             return $query->whereDate('created_at', $date);
    //         })
    //         ->get();
    
    //     return view('history', compact('rekaps', 'search', 'date'));
    // }

    public function history(Request $request)
    {
        $search = $request->get('search');
        $filter_day = $request->get('filter_day');
        $filter_month = $request->get('filter_month');
        $filter_year = $request->get('filter_year');
    
        $rekaps = Rekap::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('kegiatan', 'like', "%{$search}%")
                    ->orWhere('keterangan', 'like', "%{$search}%")
                    ->orWhere('lokasi', 'like', "%{$search}%");
            })
            ->when($filter_day, function ($query) use ($filter_day) {
                return $query->whereDay('tanggal', $filter_day);
            })
            ->when($filter_month, function ($query) use ($filter_month) {
                return $query->whereMonth('tanggal', $filter_month);
            })
            ->when($filter_year, function ($query) use ($filter_year) {
                return $query->whereYear('tanggal', $filter_year);
            })
            ->get();
    
        return view('history', compact('rekaps', 'search', 'filter_day', 'filter_month', 'filter_year'));
    }    
    
}
