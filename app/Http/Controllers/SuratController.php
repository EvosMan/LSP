<?php


namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Surat::with('kategori');
        if (request('search')) {
            $query->where('judul', 'like', '%' . request('search') . '%');
        }
        $surats = $query->orderByDesc('waktu_pengarsipan')->get();
        return view('arsip.index', compact('surats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriList = \App\Models\Kategori::all();
        return view('arsip.form', compact('kategoriList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|unique:surats,nomor_surat',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        // Simpan file
        $filePath = $request->file('file')->store('arsip', 'public');

        $surat = Surat::create([
            'nomor_surat' => $validated['nomor_surat'],
            'kategori_id' => $validated['kategori_id'],
            'judul' => $validated['judul'],
            'file' => $filePath,
            'waktu_pengarsipan' => now(),
        ]);

        return redirect()->route('arsip.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        $surat->load('kategori');
        return view('arsip.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        $kategoriList = \App\Models\Kategori::all();
        return view('arsip.form', compact('surat', 'kategoriList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|unique:surats,nomor_surat,' . $surat->id,
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = [
            'nomor_surat' => $validated['nomor_surat'],
            'kategori_id' => $validated['kategori_id'],
            'judul' => $validated['judul'],
        ];

        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($surat->file && Storage::disk('public')->exists($surat->file)) {
                Storage::disk('public')->delete($surat->file);
            }
            $data['file'] = $request->file('file')->store('arsip', 'public');
        }

        $surat->update($data);

        return redirect()->route('arsip.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        //
    }

    /**
     * Download the PDF file of the surat.
     */
    public function download(Surat $arsip)
    {
        return response()->download(storage_path('app/public/' . $arsip->file));
    }
}
