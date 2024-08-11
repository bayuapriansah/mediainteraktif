<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TugasMateri;
use Illuminate\Http\Request;

class TugasMateriController extends Controller
{
    public function index()
    {
        return TugasMateri::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'materi_name_id' => 'required|exists:materi_names,id',
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'answer' => 'required|in:a,b,c,d',
        ]);

        $tugasMateri = TugasMateri::create($validated);

        return response()->json($tugasMateri, 201);
    }

    public function show(TugasMateri $tugasMateri)
    {
        return $tugasMateri;
    }

    public function update(Request $request, TugasMateri $tugasMateri)
    {
        $validated = $request->validate([
            'materi_name_id' => 'exists:materi_names,id',
            'question' => 'string',
            'option_a' => 'string',
            'option_b' => 'string',
            'option_c' => 'string',
            'option_d' => 'string',
            'answer' => 'in:a,b,c,d',
        ]);

        $tugasMateri->update($validated);

        return response()->json($tugasMateri, 200);
    }

    public function destroy(TugasMateri $tugasMateri)
    {
        $tugasMateri->delete();
        return response()->json(null, 204);
    }

    public function getByMateriNameId($materi_name_id)
    {
        // Fetch TugasMateri where the materi_name_id matches the parameter
        $tugasMateri = TugasMateri::where('materi_name_id', $materi_name_id)->get();

        // Return the results as a JSON response
        return response()->json($tugasMateri);
    }
}
