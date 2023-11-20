<?php

namespace App\Services;

use App\Models\SubUnit;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class SubUnitService
{
    public function store(array $data): RedirectResponse
    {
        $startDate        = Carbon::createFromFormat('m/d/Y', $data['start_date']);
        $endDate          = Carbon::createFromFormat('m/d/Y', $data['end_date']);
        $sameTruck        = $data['main_truck'] === $data['subunit'];
        $overlapMainTruck = SubUnit::checkAvailability($data['main_truck'], $startDate, $endDate);
        $overlapSubUnit   = SubUnit::checkAvailability($data['subunit'], $startDate, $endDate);

        if($overlapMainTruck || $overlapSubUnit || $sameTruck) {

            if ($overlapMainTruck) {
                return redirect()->route('units.create')->with('error', 'Overlap with main truck detected');
            }

            if ($overlapSubUnit) {
                return redirect()->route('units.create')->with('error', 'Overlap with subunit detected');
            }

            if ($sameTruck) {
                return redirect()->route('units.create')->with('error', 'Main truck and subunit cannot be the same');
            }
        }

        SubUnit::create([
            'main_truck' => $data['main_truck'],
            'subunit'    => $data['subunit'],
            'start_date' => $startDate,
            'end_date'   => $endDate,
        ]);

        return redirect()->route('units.index')->with('success','Sub unit created successfully');
    }
}
