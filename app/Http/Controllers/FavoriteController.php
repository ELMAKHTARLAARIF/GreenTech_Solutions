<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\FavoriteService;
class FavoriteController extends Controller
{
    public function ShowFavorites()
    {

        return view('client.favorite');
    }

    public function AddToFavorite(Request $request)
    {
        $ID = $request->validate([
            'product_id' => 'required|exists:produits,id',
        ]);
        return (new FavoriteService())->AddToFavoriteService($ID['product_id']);
}
}