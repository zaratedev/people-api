<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\People;
use Exception;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = People::query();

        if ($request->has('q')) {
            $query->where('name', 'like', '%' . $request->input('q') . '%')
                ->orWhere('first_name', 'like', '%' . $request->input('q') . '%')
                ->orWhere('last_name', 'like', '%' . $request->input('q') . '%')
                ->orWhere('phone', 'like', '%' . $request->input('q') . '%')
                ->orWhere('email', 'like', '%' . $request->input('q') . '%')
                ->orWhere('postal_code', 'like', '%' . $request->input('q') . '%')
                ->orWhere('state', 'like', '%' . $request->input('q') . '%');
        }

        $peoples = $query->get();

        return response()->json(['data' => $peoples]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|alpha',
            'first_name' => 'required|alpha',
            'last_name' => 'nullable|alpha',
            'email' => 'required|email|unique:people,email',
            'phone' => 'required|string|regex:/^[0-9]+$/',
            'postal_code' => 'required|string',
            'state' => 'required|string',
        ]);

        $people = People::create($validated);

        return response()->json(['message' => 'People has been created', 'people' => $people], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $people = People::query()->findOrFail($id);

        $people->delete();

        return response()->json(null, 204);
    }
}
