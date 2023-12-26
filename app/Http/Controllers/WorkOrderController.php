<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkOrder;
use App\Models\Client;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workOrders = WorkOrder::all();
        $clients = Client::all();
        return view('work-order.index', ['workOrders' => $workOrders, 'clients' => $clients]);
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
        $work = new WorkOrder;
        $work->number = $request->number;
        $work->owner = json_encode(Client::find($request->owner));
        $work->envelop = $request->envelop;
        $work->basket = $request->basket;
        $work->burner = $request->burner;
        $work->cylinder = $request->cylinder;
        $work->requestedTasks = $request->requestedTasks;
        $work->workAccept = $request->workAccept;
        $work->ownerApproval = $request->ownerApproval;
        $work->certificates = $request->certificates;
        $work->comments = $request->comments;
        $work->organization = $request->organization;
        $work->completeDate = $request->completeDate;
        $work->performedTasks = $request->performedTasks;

        if ($work->save()) {
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
        $workOrder = WorkOrder::find($id);

        if ($workOrder) {
            $workOrder->delete();
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
