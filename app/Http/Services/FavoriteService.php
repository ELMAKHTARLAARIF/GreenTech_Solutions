<?php
namespace App\Http\Services;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
class FavoriteService{

    public function AddToFavoriteService($produitId){
        $userId = Auth::id();
                Favorite::create([
            'user_id' => $userId,
            'produit_id' => $produitId,
        ]);
        return redirect()->route('products')->with('success', 'Product added to favorites successfully.');
    }
}