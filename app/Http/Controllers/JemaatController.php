<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JemaatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jemaat = Jemaat::paginate(10);
        return view('dashboard.jemaat.index', compact('jemaat'));
    }

    public function create()
    {
        $cabangs = Cabang::orderBy('name')->get();
        return view('dashboard.jemaat.create', compact('cabangs'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|min:10|unique:jemaat',
            'nama_lengkap' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'cabang' => 'required|string',
        ]);

        Jemaat::create($validated);

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil ditambahkan.');
    }

    public function show(Jemaat $jemaat)
    {
        return view('dashboard.jemaat.show', compact('jemaat'));
    }

    public function edit(Jemaat $jemaat)
    {
        $cabangs = Cabang::orderBy('name')->get();
        return view('dashboard.jemaat.edit', compact('jemaat', 'cabangs'));
    }

    public function update(Request $request, Jemaat $jemaat)
    {
        $validated = $request->validate([
            'nik' => 'required|string|min:10|unique:jemaat,nik,' . $jemaat->id,
            'nama_lengkap' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'cabang' => 'required|string',
        ]);

        $jemaat->update($validated);

        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil diperbarui.');
    }


    public function destroy(Jemaat $jemaat)
    {
        $jemaat->delete();
        return redirect()->route('jemaat.index')->with('success', 'Data jemaat berhasil dihapus.');
    }
}
