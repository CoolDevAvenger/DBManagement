<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CRS;

class CRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crss = CRS::all();
        return view('crs.index', ['crss' => $crss]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $crs = new CRS;
        $crs->number = $request->number;
        $crs->marks = $request->mark;
        $crs->date = $request->date;

        if ($crs->save()) {
            return response()->json([
                'success' => true,
                'message' => "Data saved successfully"
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Data save failed"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
        $crs = CRS::find($id);

        if ($crs) {
            $crs->delete();
            return response()->json([
                'success' => true,
                'message' => "Data deleted successfully"
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Data delete failed"
            ]);
        }
    }
}
