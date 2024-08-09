<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MateriName;
use Illuminate\Http\Request;

class MateriNameController extends Controller
{
    public function index()
    {
        return MateriName::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
        ]);

        $materiName = MateriName::create($validated);

        return response()->json($materiName, 201);
    }

    public function show(MateriName $materiName)
    {
        return $materiName;
    }

    public function update(Request $request, MateriName $materiName)
    {
        $validated = $request->validate([
            'user_id' => 'exists:users,id',
            'name' => 'string|max:255',
        ]);

        $materiName->update($validated);

        return response()->json($materiName, 200);
    }

    public function destroy(MateriName $materiName)
    {
        $materiName->delete();
        return response()->json(null, 204);
    }
}
