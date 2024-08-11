<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JawabanRecord;
use Illuminate\Http\Request;

class JawabanRecordController extends Controller
{
    public function index()
    {
        return JawabanRecord::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tugas_materi_id' => 'required|exists:tugas_materis,id',
            'user_id' => 'required|exists:users,id',
            'answer' => 'required|in:a,b,c,d',
            'score' => 'nullable|integer',
        ]);

        // $tugas = TugasMateri::find($validated['tugas_materi_id']);
        // $score = $tugas->answer === $validated['answer'] ? 25 : 0;

        $jawabanRecord = JawabanRecord::create([
            'tugas_materi_id' => $validated['tugas_materi_id'],
            'user_id' => $validated['user_id'],
            'answer' => $validated['answer'],
            'score' => $validated['score'],
        ]);

        return response()->json([
            'success' => true,
            'data' => $jawabanRecord
        ], 201);
    }

    public function show(JawabanRecord $jawabanRecord)
    {
        return $jawabanRecord;
    }

    public function update(Request $request, JawabanRecord $jawabanRecord)
    {
        $validated = $request->validate([
            'tugas_materi_id' => 'exists:tugas_materi,id',
            'user_id' => 'exists:users,id',
            'answer' => 'in:a,b,c,d',
        ]);

        $tugas = TugasMateri::find($validated['tugas_materi_id'] ?? $jawabanRecord->tugas_materi_id);
        $score = $tugas && ($tugas->answer === ($validated['answer'] ?? $jawabanRecord->answer)) ? 25 : 0;

        $jawabanRecord->update(array_filter([
            'tugas_materi_id' => $validated['tugas_materi_id'] ?? $jawabanRecord->tugas_materi_id,
            'user_id' => $validated['user_id'] ?? $jawabanRecord->user_id,
            'answer' => $validated['answer'] ?? $jawabanRecord->answer,
            'score' => $score,
        ]));

        return response()->json($jawabanRecord, 200);
    }

    public function destroy(JawabanRecord $jawabanRecord)
    {
        $jawabanRecord->delete();
        return response()->json(null, 204);
    }
}
