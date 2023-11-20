<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubUnit\SubUnitRequest;
use App\Models\SubUnit;
use App\Models\Truck;
use App\Services\SubUnitService;

class SubUnitController extends Controller
{
    private SubUnitService $subUnitService;

    public function __construct(SubUnitService $subUnitService)
    {
        $this->subUnitService = $subUnitService;
    }

    public function index()
    {
        $subUnits = SubUnit::orderByDesc('created_at')->paginate(15);

        return view('subunits.index', ['subunits' => $subUnits]);
    }

    public function create()
    {
        $trucks = Truck::get(['id', 'unit_number']);

        return view('subunits.create', ['trucks' => $trucks]);
    }

    public function store(SubUnitRequest $request)
    {
        return $this->subUnitService->store($request->validated());
    }

    public function destroy(int $id)
    {
        SubUnit::find($id)->delete();

        return redirect()->route('units.index')->with('success','Sub unit deleted successfully');
    }
}
