<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $favoriteIds = $request->user()
            ? $request->user()->favorites()->pluck('products.id')->all()
            : [];

        $products = Product::query()
            ->latest('id')
            ->get()
            ->map(fn (Product $product) => [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'is_favorite' => in_array($product->id, $favoriteIds, true),
            ]);

        return response()->json(['data' => $products]);
    }
}
