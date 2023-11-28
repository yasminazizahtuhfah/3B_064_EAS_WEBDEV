<?php

namespace App\Http\Controllers;

use App\Models\Tenan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TenanController extends Controller
{
    public function index(Request $request)
    {
        // Fetch data and return view
        $data = Tenan::paginate(10);
        return view('tenan.index', compact('data'));
    }

    public function create()
    {
        // Return the create view
        return view('tenan.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'KodeTenan' => 'required|string|max:255|unique:tenan',
            'NamaTenan' => 'required|string|max:255',
            'HP' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect("tenan/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        // Create Tenan
        Tenan::create($request->all());

        return redirect()->route('tenan.index')->with('success', 'Tenan added successfully');
    }

    public function edit($id)
    {
        // Find the Tenan by ID and return the edit view
        $data = Tenan::findOrFail($id);
        return view('tenan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'KodeTenan' => 'required|string|max:255|unique:tenan,KodeTenan,' . $id,
            'NamaTenan' => 'required|string|max:255',
            'HP' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect("tenan/{$id}/edit")
                        ->withErrors($validator)
                        ->withInput();
        }

        // Update Tenan
        Tenan::where('id', $id)->update($request->except('_method', '_token'));

        return redirect()->route('tenan.index')->with('success', 'Tenan updated successfully');
    }

    public function destroy($id)
    {
        // Delete Tenan
        Tenan::where('id', $id)->delete();

        return redirect()->route('tenan.index')->with('success', 'Tenan deleted successfully');
    }
}
