<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
        $products = Product::all();
        return view('product.index', compact('products'));
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
    public function store(StoreProductRequest $request, Product $product)
    {
        // Product::create($request->all());
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->point_id = Auth::user()->point_id;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Успешно добавлен продукт');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $points = Point::all();
        return view('product.show', compact(['product','points']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.index')->with('success', 'Успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->status == 2) {
            return redirect()->route('product.index')->with('delete', 'Товар в аренде, прежде чем удалить, снимите с аренды');
        };
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Продукт удален');
    }
    public function stock(Point $point, $stock)
    {
        $product = Product::find($stock);
        $product->point_id = $point->id;
        $product->save();
        return redirect()->route('point.show', compact('point'));
    }
    public function pointStock(Point $point, $product)
    {
        $product = Product::find($product);
        if ($product->status == 2) {
            return redirect()->route('product.index')->with('delete', 'Товар в аренде, прежде чем перенести на склад, снимите с аренды');
        };
        $product->point_id = '1';
        $product->save();
        return redirect()->route('point.show', compact('point'));
    }
}
