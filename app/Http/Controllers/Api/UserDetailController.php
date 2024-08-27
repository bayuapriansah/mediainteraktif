<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index()
    {
        // Eager load the user relationship and select specific fields
        $userDetails = UserDetail::with('user:id,email')->get();

        // Transform the data to include email in the response
        $userDetails = $userDetails->map(function ($userDetail) {
            return [
                'id' => $userDetail->id,
                'user_id' => $userDetail->user_id,
                'nama' => $userDetail->nama,
                'email' => $userDetail->user->email, // Include email
                'tanggal_lahir' => $userDetail->tanggal_lahir,
                'alamat' => $userDetail->alamat,
                'created_at' => $userDetail->created_at,
                'updated_at' => $userDetail->updated_at,
            ];
        });

        return response()->json($userDetails);
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

    public function getByUserId($user_id)
    {
        // Fetch userDetails where the user_id matches the parameter
        $userDetails = UserDetail::where('user_id', $user_id)->get();

        // Return the results as a JSON response
        return response()->json($userDetails);
    }
}
