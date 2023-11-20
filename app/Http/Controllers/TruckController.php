<?php

namespace App\Http\Controllers;

use App\Http\Requests\Truck\TruckStoreRequest;
use App\Http\Requests\Truck\TruckUpdateRequest;
use App\Models\Truck;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::orderByDesc('created_at')->paginate(15);

        return view('trucks.index', ['trucks' => $trucks]);
    }

    public function create()
    {
        return view('trucks.create');
    }

    public function store(TruckStoreRequest $request)
    {
        Truck::create($request->all());

        return redirect()->route('trucks.index')->with('success','Truck created successfully');
    }

    public function edit(Truck $truck)
    {
        return view('trucks.edit', ['truck' => $truck]);
    }

    public function update(TruckUpdateRequest $request, Truck $truck)
    {
        $truck->update($request->all());

        return redirect()->route('trucks.index')->with('success','Truck updated successfully');
    }

    public function destroy(Truck $truck)
    {
        $truck->delete();

        return redirect()->route('trucks.index')->with('success','Truck deleted successfully');
    }
}
