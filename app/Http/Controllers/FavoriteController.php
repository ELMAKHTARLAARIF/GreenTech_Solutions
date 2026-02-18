<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\FavoriteService;

use App\Models\User;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function ShowFavorites()
    {
        $user = Auth::user();
        $favorites = $user->favorites;

        return view('client.favorite', compact('favorites'));
    }

    public function AddToFavorite(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:produits,id',
        ]);

        $exists = Favorite::where('user_id', Auth::id())
            ->where('produit_id', $data['product_id'])
            ->exists();
        if (! $exists) {
            $check = (new FavoriteService())
                ->AddToFavoriteService($data['product_id']);
            if ($check) {
                return redirect()
                    ->route('products')
                    ->with('success', 'Product added to favorites successfully.');
            }
        }
        return back()->withErrors([
            'error' => 'Product already in favorites.',
        ]);
    }

    public function RemovePFromFavoris(Request $request, $id)
    {
        $request->validate([
            'produit_id' => 'sometimes|exists:produits,id',
        ]);

        $deleted = (new FavoriteService())
            ->deleteProductFromFavoris($id);

        if (! $deleted) {
            return back()->with('error', 'Product not found in favorites.');
        }

        return redirect()
            ->route('ShowFavorites')
            ->with('success', 'Product was removed.');
    }
}
