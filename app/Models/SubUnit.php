<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubUnit extends Model
{
    protected $table = 'truck_subunits';

    protected $fillable = [
        'main_truck',
        'subunit',
        'start_date',
        'end_date'
    ];

    public function mainTruck(): BelongsTo
    {
        return $this->belongsTo(Truck::class, 'main_truck');
    }

    public function subUnit(): BelongsTo
    {
        return $this->belongsTo(Truck::class, 'subunit');
    }

    public static function checkAvailability($id, $startDate, $endDate)
    {
        return self::where('main_truck', $id)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('start_date', [$startDate, $endDate])
                        ->orWhereBetween('end_date', [$startDate, $endDate]);
                })->orWhere(function ($q) use ($startDate, $endDate) {
                    $q->where('start_date', '<=', $startDate)
                        ->where('end_date', '>=', $endDate);
                });
            })->orWhere(function ($query) use ($id, $startDate, $endDate) {
                $query->where('subunit', $id)
                    ->where(function ($q) use ($startDate, $endDate) {
                        $q->where(function ($qq) use ($startDate, $endDate) {
                            $qq->whereBetween('start_date', [$startDate, $endDate])
                                ->orWhereBetween('end_date', [$startDate, $endDate]);
                        })->orWhere(function ($qq) use ($startDate, $endDate) {
                            $qq->where('start_date', '<=', $startDate)
                                ->where('end_date', '>=', $endDate);
                        });
                    });
            })->exists();
    }
}
