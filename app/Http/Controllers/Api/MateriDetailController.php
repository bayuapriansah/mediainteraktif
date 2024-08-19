<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MateriDetail;
use App\Models\MateriName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriDetailController extends Controller
{
    public function index()
    {
        return MateriDetail::all();
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'materi_1' => 'required|string',
            'image_materi_1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'materi_2' => 'nullable|string',
            'image_materi_2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Create a new MateriName entry
        $materiName = MateriName::create([
            'user_id' => $validated['user_id'],
            'name' => $validated['name'],
        ]);

        // Handle file uploads
        $imageMateri1Path = null;
        $imageMateri2Path = null;

        if ($request->hasFile('image_materi_1')) {
            $imageMateri1Path = $request->file('image_materi_1')->store('images', 'public');
        }

        if ($request->hasFile('image_materi_2')) {
            $imageMateri2Path = $request->file('image_materi_2')->store('images', 'public');
        }

        // Create a new MateriDetail entry
        $materiDetail = MateriDetail::create([
            'materi_name_id' => $materiName->id,
            'materi_1' => $validated['materi_1'],
            'image_materi_1' => $imageMateri1Path,
            'materi_2' => $validated['materi_2'] ?? null,
            'image_materi_2' => $imageMateri2Path,
        ]);

        return response()->json($materiDetail, 201);
    }

    public function show(MateriDetail $materiDetail)
    {
        return $materiDetail;
    }

    public function update(Request $request, MateriDetail $materiDetail)
    {
        // Validate the request data
        $validated = $request->validate([
            'materi_1' => 'string',
            'image_materi_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'materi_2' => 'nullable|string',
            'image_materi_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('image_materi_1')) {
            // Delete the old image if it exists
            if ($materiDetail->image_materi_1) {
                Storage::disk('public')->delete($materiDetail->image_materi_1);
            }
            $materiDetail->image_materi_1 = $request->file('image_materi_1')->store('images', 'public');
        }

        if ($request->hasFile('image_materi_2')) {
            // Delete the old image if it exists
            if ($materiDetail->image_materi_2) {
                Storage::disk('public')->delete($materiDetail->image_materi_2);
            }
            $materiDetail->image_materi_2 = $request->file('image_materi_2')->store('images', 'public');
        }

        // Update the MateriDetail entry
        $materiDetail->update(array_merge(
            $validated,
            [
                'image_materi_1' => $materiDetail->image_materi_1,
                'image_materi_2' => $materiDetail->image_materi_2,
            ]
        ));

        return response()->json($materiDetail, 200);
    }

    public function destroy(MateriDetail $materiDetail)
    {
        // Delete images if they exist
        if ($materiDetail->image_materi_1) {
            Storage::disk('public')->delete($materiDetail->image_materi_1);
        }

        if ($materiDetail->image_materi_2) {
            Storage::disk('public')->delete($materiDetail->image_materi_2);
        }

        $materiDetail->delete();

        return response()->json(null, 204);
    }
}
