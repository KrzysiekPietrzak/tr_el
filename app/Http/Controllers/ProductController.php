<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use PHPUnit\Exception;

class ProductController extends Controller
{
    /**
    @return View 
    * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("products.index",[
            'products' => Product::paginate(2)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View 
    {
                return view("products.create");

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $product = new Product($request->all());
        $product->save();
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     * @param Product $product
     * @return View
     */
    public function show(Product $product):View
    {
        return view("products.show",[
            'product' => $product

        ]);

    }

    /**
     * @param Product $product
     * @return View
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product):View
    {
        return view("products.edit",[
            'product' => $product
        ]);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product):RedirectResponse
    {
        $product->fill($request->all());
        $product->save();
        return redirect(route('products.index'));
    }

    /**
     * @param Product $product
     * @return JsonResponse
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product):JsonResponse
    { {
            try {
                $product->delete();
                return response()->json([
                    'status' => 'success'
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Wystąpił błąd'
                ])->setStatusCode(500);
            }
            //
        }
    }
}
