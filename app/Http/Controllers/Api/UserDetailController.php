<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index()
    {
        return UserDetail::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
        ]);

        $userDetail = UserDetail::create($validated);

        return response()->json($userDetail, 201);
    }

    public function show(UserDetail $userDetail)
    {
        return $userDetail;
    }

    public function update(Request $request, UserDetail $userDetail)
    {
        $validated = $request->validate([
            'user_id' => 'exists:users,id',
            'nama' => 'string|max:255',
            'tanggal_lahir' => 'date',
            'alamat' => 'string|max:255',
        ]);

        $userDetail->update($validated);

        return response()->json($userDetail, 200);
    }

    public function destroy(UserDetail $userDetail)
    {
        $userDetail->delete();
        return response()->json(null, 204);
    }
}
