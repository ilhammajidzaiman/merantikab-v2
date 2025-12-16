<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Models\LeadershipPeriod;
use App\Http\Controllers\Controller;

class LeaderController extends Controller
{
    public function index()
    {
        $data['data'] = LeadershipPeriod::active()
            ->orderByDesc('period')
            ->get();
        return view('pages.leader.index', $data);
    }

    public function show(string $id)
    {
        $data['record'] = Leader::active()
            ->with([
                'leaderships' => function ($q) {
                    $q->join(
                        'leadership_periods',
                        'leaderships.leadership_period_id',
                        '=',
                        'leadership_periods.id'
                    )
                        ->orderByRaw("split_part(leadership_periods.period, '-', 1)::int asc")
                        ->select('leaderships.*')
                        ->with('period');
                }
            ])
            ->where('id', $id)
            ->first();
        return view('pages.leader.show', $data);
    }
}
