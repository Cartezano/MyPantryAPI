<?php

namespace App\Http\Controllers;

use App\Models\Pantry;
use Illuminate\Http\Request;

class PantryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pantries = Pantry::all()->toArray();

        return response()->json($pantries, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pantry = Pantry::updateOrCreate(['name' => $request->name], $request->all());

        return response()->json($pantry, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pantry = Pantry::findOrFail($id);

        return response()->json($pantry, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pantry = Pantry::findOrFail($id);
        $pantry->update($request->all());

        return response()->json($pantry, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pantry = Pantry::findOrFail($id);
        $pantry->delete();

        return response()->json($pantry, 200);
    }
}