<?php

namespace App\Services;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteService
{

    public function AddToFavoriteService($produitId)
    {
        $userId = Auth::id();
        $iscreated = Favorite::create([
            'user_id' => $userId,
            'produit_id' => $produitId,
        ]);
        return ($iscreated);
    }
    public function deleteProductFromFavoris($id)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('produit_id', $id);

        if ($favorite) {
            $favorite->delete();
            return true;
        } else {
            return false;
        }
    }
}
