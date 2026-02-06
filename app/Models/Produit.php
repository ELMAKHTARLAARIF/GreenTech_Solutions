<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
  /** @use HasFactory<\Database\Factories\ProduitFactory> */
  use HasFactory;
  protected $fillable = [
    'name',
    'price',
    'stock',
    'category',
    'description'
  ];

  public function favoritedByUsers()
  {
      return $this->belongsToMany(
          User::class,
          'favorites',
          'produit_id',
          'user_id'
      );
  }
}
