<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data = [
            'name' => 'Product Name',
            'price' => 9.99,
            'sale_price' => 4.99,
            'sale_start' => '2021-01-01',
            'sale_end' => '2021-01-31',
            'sale_text' => '50%',
            'description' => 'Product description',
            'rating' => 4.5,
            'images' => 'https://via.placeholder.com/150',
            'options' => [
                [
                    'name' => 'Size',
                    'image' => 'https://via.placeholder.com/150',
                    'values' => [
                        'Small',
                        'Medium',
                        'Large'
                    ]
                ],
                [
                    'name' => 'Color',
                    'values' => [
                        'Red',
                        'Green',
                        'Blue'
                    ]
                ]
            ],
        ];
        return view('app', compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function buy(Request $request)
    {
        Customer::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Customer created successfully'
        ], 201);
    }
}
