<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    public function store(Request $request)
    {
        Address::create($request->all());
        return "Address created successfully";
    }

    public function show(string $id)
    {
        return Address::where('patient_id', $id)->limit(1)->get();
    }

    public function update(Request $request, string $id)
    {
        Address::where('patient_id', $id)->update($request->all());
        return "Address updated successfully";
    }

    public function destroy(string $id)
    {
        Address::findOrFail($id)->delete();
        return "Address removed successfully";
    }
}
