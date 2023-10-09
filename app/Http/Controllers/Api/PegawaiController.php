<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list', ['only' => ['index']]);

    }
    public function index()
    {
        $pegawais = Pegawai::all();
        return response()->json($pegawais);
    }

    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return response()->json($pegawai);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'status_pegawai' => 'required|string',
            'gaji' => 'required|integer',
        ]);

        $pegawai = Pegawai::create($request->all());

        return response()->json($pegawai, 201);
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nama' => 'required|string',
            'status_pegawai' => 'required|string',
            'gaji' => 'required|integer',
        ]);

        $pegawai->update($request->all());

        return response()->json($pegawai, 200);
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return response()->json(null, 204);
    }
}
