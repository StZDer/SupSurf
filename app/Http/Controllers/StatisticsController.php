<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use App\Http\Requests\StoreStatisticsRequest;
use App\Http\Requests\UpdateStatisticsRequest;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $today = Carbon::now()->startOfDay();
        $todays = Rent::whereDate('end_date_time', $today)->where('point_id', Auth::user()->point_id)->where('status', '1')->get();
        $last = $todays->last();
        // dd($last);
        if (!empty($last)) {
            $last =  Carbon::parse($last->start_date_time)->diffInMinutes(Carbon::parse($last->end_date_time));
        };

        $differenceSumToday = 0;
        foreach ($todays as $today) {
            $difference = Carbon::parse($today->start_date_time)->diffInMinutes(Carbon::parse($today->end_date_time));
            $differenceSumToday = $differenceSumToday + $difference;
        };

        $yesterdays = Rent::whereDate('end_date_time', Carbon::yesterday()->toDateString())->where('point_id', Auth::user()->point_id)->where('status', '1')->get();
        $differenceSumYesterday = 0;
        foreach ($yesterdays as $yesterday) {
            $difference = Carbon::parse($yesterday->start_date_time)->diffInMinutes(Carbon::parse($yesterday->end_date_time));
            $differenceSumYesterday = $differenceSumYesterday + $difference;
        };
        // dd($differenceSumYesterday);
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $weeks = Rent::whereBetween('end_date_time', [$startOfWeek,$endOfWeek])->where('point_id', Auth::user()->point_id)->where('status', '1')->get();
        $differenceSumWeek = 0;
        foreach ($weeks as $week) {
            $difference = Carbon::parse($week->start_date_time)->diffInMinutes(Carbon::parse($week->end_date_time));
            $differenceSumWeek = $differenceSumWeek + $difference;
        };

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $weeks = Rent::whereBetween('end_date_time', [$startOfMonth,$endOfMonth])->where('point_id', Auth::user()->point_id)->where('status', '1')->get();
        $differenceSumMonth = 0;
        foreach ($weeks as $week) {
            $difference = Carbon::parse($week->start_date_time)->diffInMinutes(Carbon::parse($week->end_date_time));
            $differenceSumMonth = $differenceSumMonth + $difference;
        };

        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
        $weeks = Rent::whereBetween('end_date_time', [$startOfYear,$endOfYear])->where('point_id', Auth::user()->point_id)->where('status', '1')->get();
        $differenceSumYear = 0;
        foreach ($weeks as $week) {
            $difference = Carbon::parse($week->start_date_time)->diffInMinutes(Carbon::parse($week->end_date_time));
            $differenceSumYear = $differenceSumYear + $difference;
        };
        return view('statistics.index', compact(['last', 'differenceSumToday', 'differenceSumYesterday', 'differenceSumWeek', 'differenceSumMonth', 'differenceSumYear']));
    }

    public function history()
    {
        $rents = Rent::orderBy('end_date_time', 'desc')->where('point_id', Auth::user()->point_id)->where('status', '1')->get();
        // dd($rents);
        return view('statistics.history', compact('rents'));
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
    public function store(StoreStatisticsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistics $statistics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistics $statistics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatisticsRequest $request, Statistics $statistics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistics $statistics)
    {
        //
    }
}
