<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return response()->json($people);
    }

    public function show($id)
    {
        $person = Person::findOrFail($id);
        return response()->json($person);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'sex' => 'required',
        ]);

        $person = Person::create($request->all());
        return response()->json($person, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
        ]);

        $person = Person::findOrFail($id);
        $person->update($request->all());

        return response()->json($person, 200);
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();

        return response()->json(null, 204);
    }
}
