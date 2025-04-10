<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductListResource;
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

    public function show($product)
    {

    }

}
