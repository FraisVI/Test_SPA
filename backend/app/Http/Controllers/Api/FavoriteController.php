<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $products = $request->user()
            ->favorites()
            ->latest('favorites.created_at')
            ->get();

        return response()->json(['data' => $products]);
    }

    public function store(Request $request, Product $product): JsonResponse
    {
        $request->user()->favorites()->syncWithoutDetaching([$product->id]);

        return response()->json(['message' => 'Added to favorites']);
    }

    public function destroy(Request $request, Product $product): JsonResponse
    {
        $request->user()->favorites()->detach($product->id);

        return response()->json(status: 204);
    }
}
