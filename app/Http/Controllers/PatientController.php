<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        return Patient::paginate();
    }

    public function store(Request $request)
    {
        $patientData = new Patient($request->all());
        $patientData->Photo = $request->file('Photo')->store('photo', 'public');
        return Patient::create($patientData->getAttributes())->id;
    }

    public function show(string $id)
    {
        return Patient::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        Patient::findOrFail($id)->update($request->all());
        return $request->all();
    }

    public function destroy(string $id)
    {
        Patient::findOrFail($id)->delete();
        return "User removed successfully";
    }

    public function search($search)
    {
        return Patient::where('Name', 'ILIKE', '%'.$search.'%')->get();
    }
}
