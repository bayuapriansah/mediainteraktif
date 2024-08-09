<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MateriDetail;
use Illuminate\Http\Request;

class MateriDetailController extends Controller
{
    public function index()
    {
        return MateriDetail::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'materi_name_id' => 'required|exists:materi_names,id',
            'materi_1' => 'required|string',
            'image_materi_1' => 'nullable|string',
            'materi_2' => 'nullable|string',
            'image_materi_2' => 'nullable|string',
        ]);

        $materiDetail = MateriDetail::create($validated);

        return response()->json($materiDetail, 201);
    }

    public function show(MateriDetail $materiDetail)
    {
        return $materiDetail;
    }

    public function update(Request $request, MateriDetail $materiDetail)
    {
        $validated = $request->validate([
            'materi_name_id' => 'exists:materi_names,id',
            'materi_1' => 'string',
            'image_materi_1' => 'nullable|string',
            'materi_2' => 'nullable|string',
            'image_materi_2' => 'nullable|string',
        ]);

        $materiDetail->update($validated);

        return response()->json($materiDetail, 200);
    }

    public function destroy(MateriDetail $materiDetail)
    {
        $materiDetail->delete();
        return response()->json(null, 204);
    }
}
