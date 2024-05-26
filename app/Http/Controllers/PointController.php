<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Http\Requests\StorePointRequest;
use App\Http\Requests\UpdatePointRequest;
use App\Models\Product;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points = Point::all();
        return view('point.index', compact('points'));
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
    public function store(StorePointRequest $request)
    {
        Point::create($request->all());
        return redirect()->route('point.index')->with('success', 'Успешно добавлена точка');
    }

    /**
     * Display the specified resource.
     */
    public function show(Point $point)
    {
        $stocks = Product::where('point_id', '1')->get();
        $products = $point->products;
        return view('point.show', compact(['point','products','stocks']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Point $point)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePointRequest $request, Point $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Point $point)
    {
        //
    }
}
