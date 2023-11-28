<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class barangController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;
        if (strlen($katakunci)) {
            $data = barang::where('KodeBarang', 'like', "%$katakunci%")
                ->orWhere('NamaBarang', 'like', "%$katakunci%")
                ->orWhere('Satuan', 'like', "%$katakunci%")
                ->orWhere('HargaSatuan', 'like', "%$katakunci%")
                ->orWhere('Stok', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = barang::orderBy('id', 'asc')->paginate($jumlahbaris);
        }
        return view('barang.index')->with('data', $data);
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'KodeBarang' => 'required|string|max:255|unique:barang',
            'NamaBarang' => 'required|string|max:255',
            'Satuan' => 'required|string|max:255',
            'HargaSatuan' => 'required|numeric',
            'Stok' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect("barang/create")
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'KodeBarang' => $request->KodeBarang,
            'NamaBarang' => $request->NamaBarang,
            'Satuan' => $request->Satuan,
            'HargaSatuan' => $request->HargaSatuan,
            'Stok' => $request->Stok,
        ];

        barang::create($data);

        return redirect()->route('barang.index')->with('success', 'Berhasil menambahkan data barang');
    }

    public function edit($id)
    {
        $data = barang::findOrFail($id);
        return view('barang.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'KodeBarang' => 'required|string|max:255|unique:barang,KodeBarang,' . $id,
            'NamaBarang' => 'required|string|max:255',
            'Satuan' => 'required|string|max:255',
            'HargaSatuan' => 'required|numeric',
            'Stok' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect("barang/{$id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'KodeBarang' => $request->KodeBarang,
            'NamaBarang' => $request->NamaBarang,
            'Satuan' => $request->Satuan,
            'HargaSatuan' => $request->HargaSatuan,
            'Stok' => $request->Stok,
        ];

        barang::where('id', $id)->update($data);

        return redirect()->route('barang.index')->with('success', 'Berhasil melakukan update data barang');
    }

    public function destroy($id)
    {
        barang::findOrFail($id)->delete();
        return redirect()->route('barang.index')->with('success', 'Berhasil melakukan delete data barang');
    }
}
