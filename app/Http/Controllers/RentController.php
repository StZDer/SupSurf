<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
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
        $rents = Rent::where('status', '0')->get();
        return view('rent.index', compact('rents'));
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
    public function store(StoreRentRequest $request, Rent $rent)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRentRequest $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent)
    {
        //
    }

    public function StoreRent($request)
    {
        // dd($rent->product->point_id);
        $product = Product::where('id',$request)->first();
        $product->status = '2';
        $product->save();
        $rent = new Rent();
        $rent->product_id  = $request;
        $rent->start_date_time = Carbon::now();
        $rent->user_id = Auth::user()->id;
        $rent->point_id  = Auth::user()->point_id;
        $rent->save();
        // $rents = Rent::where('status', '0')->get();
        return redirect()->route('rent.index');
    }

    public function storeStock($request)
    {
        $rent = Rent::where('id',$request)->first();
        $rent->end_date_time = Carbon::now();
        $rent->payment = round((Carbon::parse($rent->start_date_time)->diffInMinutes(Carbon::now()) / 60) * $rent->product->price);
        $rent->status = '1';
        $rent->product->status = '1';
        $rent->product->TimeInRental = Carbon::parse($rent->start_date_time)->diffInMinutes(Carbon::now()) + $rent->product->TimeInRental;
        $rent->save();
        $rent->product->save();
        return redirect()->route('stock.index');
    }

    public function activ($request)
    {
        $rents = Rent::where('status', '0')->get();
        return view('rent.activ', compact(['rents', 'request']));
    }
}
