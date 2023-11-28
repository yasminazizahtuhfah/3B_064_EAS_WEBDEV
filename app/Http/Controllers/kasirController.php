<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KasirController extends Controller
{
    public function index(Request $request)
    {
        // Fetch data and return view
        $data = Kasir::paginate(10);
        return view('kasir.index', compact('data'));
    }

    public function create()
    {
        // Return the create view
        return view('kasir.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'KodeKasir' => 'required|string|max:255|unique:kasir',
            'Nama' => 'required|string|max:255',
            'HP' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect("kasir/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create Kasir
        Kasir::create($request->all());

        return redirect()->route('kasir.index')->with('success', 'Kasir added successfully');
    }

    public function edit($id)
    {
        // Find the Kasir by ID and return the edit view
        $data = Kasir::findOrFail($id);
        return view('kasir.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'Kodekasir' => 'required|string|max:255|unique:kasir,Kodekasir,' . $id,
            'Namakasir' => 'required|string|max:255',
            'Satuan' => 'required|string|max:255',
            'HargaSatuan' => 'required|numeric',
            'Stok' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect("kasir/{$id}/edit")
                        ->withErrors($validator)
                        ->withInput();
        }

        // Update Kasir
        Kasir::where('id', $id)->update($request->except('_method', '_token'));

        return redirect()->route('kasir.index')->with('success', 'Kasir updated successfully');
    }

    public function destroy($id)
    {
        // Delete Kasir
        Kasir::where('id', $id)->delete();

        return redirect()->route('kasir.index')->with('success', 'Kasir deleted successfully');
    }
}
