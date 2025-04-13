<?php

namespace App\Http\Controllers;


use App\Http\Resources\ProductListResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function home(): Response
    {
        $products = Product::query()
            ->published()
            ->paginate(12);

        return Inertia::render('Home', [
            'products'=>ProductListResource::collection($products)
        ]);
    }

    public function show(Product $product)
    {
        return Inertia::render('Product/Show', [
            'product'=> new ProductResource($product),
            'variationOptions'=> request('options', [])

        ]);

    }

}
