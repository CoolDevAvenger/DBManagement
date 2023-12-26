<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskReview;

class TaskReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskReviews = TaskReview::all();
        return view('task-review.index', ['taskReviews' => $taskReviews]);
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
        $taskReview = new TaskReview;
        $taskReview->number = $request->number;
        $taskReview->equipment = $request->equipment;
        $taskReview->model = $request->model;
        $taskReview->sn = $request->sn;
        $taskReview->tasks = $request->tasks;
        $taskReview->additionalTasks = $request->additionalTasks;
        $taskReview->comments = $request->comments;
        $taskReview->materials = $request->materials;
        $taskReview->organization = $request->organization;
        $taskReview->date = $request->date;

        if ($taskReview->save()) {
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
        $taskReview = TaskReview::find($id);

        if ($taskReview) {
            $taskReview->delete();
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
