<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AMP;

class AMPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amps = AMP::all();
        return view('amp.index', ['amps' => $amps]);
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
        $amp = new AMP;
        $amp->reference = $request->reference;
        $amp->marks = $request->mark;
        $amp->date = $request->date;

        if ($amp->save()) {
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
        $amp = AMP::find($id);

        if ($amp) {
            $amp->delete();
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
