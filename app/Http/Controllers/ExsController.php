<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ExsController extends Controller
{

    // public function ex1()
    // {
    //     $users = DB::connection('mysql')
    //         ->select('SELECT name,email FROM users 
    //         JOIN favorites ON favorites.user_id = users.id
    //         where favorites.produit_id = 67
    //         ');
    //     dd($users);
    // }

    // public function ex2()
    // {
    //     $users = DB::connection('mysql')
    //         ->select('SELECT name ,count(produit_id) as total FROM produits 
    //     LEFT JOIN favorites on favorites.produit_id = produits.id 
    //     GROUP BY produits.id     public function ex1()
    //     {
    //         $products = DB::connection('mysql')->select('SELECT * FROM produits 
    //     LEFT JOIN favorites on favorites.produit_id = produits.id WHERE favorites.user_id = 11
    // ');
    //         dd($products);
    //     }
    //     limit 1');
    //     dd($users);
    // }

    //     public function ex3()
    //     {
    //         $products = DB::connection('mysql')->select('SELECT * FROM produits 
    //     LEFT JOIN favorites on favorites.produit_id = produits.id WHERE favorites.user_id = 11
    // ');
    //         dd($products);
    //     }

    // public function ex4(){
    //     $user = DB::connection('mysql')->select('SELECT * FROM users 
    //      JOIN favorites on favorites.user_id = users.id
    //      JOIN produits on favorites.produit_id = produits.id WHERE produits.category = "Plantes"
    //     ');
    //     dd($user)
    // }

    // public function ex5(){
    //     $mostProducts = DB::connection('mysql')->select('SELECT produits.*, COUNT(favorites.produit_id) as total FROM produits
    //     JOIN favorites on favorites.produit_id = produits.id
    //     GROUP BY produits.id
    //     ORDER BY total DESC
    //     limit 3
    //     ');
    //     dd($mostProducts);
    // }

    // public function ex6(){

    //     $userHaveAnyFavoriteProdunct = DB::connection('mysql')->select('SELECT * FROM users 
    //     LEFT JOIN favorites on favorites.user_id = users.id WHERE favorites.produit_id IS NULL
    //     ');
    //     dd($userHaveAnyFavoriteProdunct);
    // }

    // public function ex7()
    // {
    //     $productHaveNfavorite = DB::connection('mysql')->select('SELECT produits.* FROM produits WHERE id NOT IN (SELECT produit_id FROM favorites)
    //     ');
    //     dd($productHaveNfavorite);
    // }

    // public function ex8(){
    //     $OneProductInEachCategory = DB::connection('mysql')->select('SELECT users.* FROM users 
    //     JOIN favorites ON favorites.user_id = users.id 
    //     JOIN produits ON produits.id = favorites.produit_id 
    //     GROUP BY users.id
    //     HAVING COUNT(DISTINCT produits.category) = (SELECT COUNT(DISTINCT category) FROM produits)
    //     ');
    //     dd($OneProductInEachCategory);
    // }

    // public function ex9()
    // {

    //     $ProductFavoriteByleastUser = DB::connection('mysql')->select('SELECT produits.name, COUNT(favorites.user_id) AS total
    //         FROM produits
    //         JOIN favorites ON favorites.produit_id = produits.id
    //         GROUP BY produits.id, produits.name
    //         HAVING total > 4;
    // ');
    //     dd($ProductFavoriteByleastUser);
    // }

    // public function ex10(){
    //     $UserFavoriteMorethan3Products = DB::connection('mysql')->select('SELECT users.name, count(user_id) as total
    //     from users
    //     join favorites on favorites.user_id = users.id
    //     GROUP BY user_id
    //     HAVING total >= 3
    //     ');
    //     dd($UserFavoriteMorethan3Products);
    // }

    //     public function ex11()
    //     {
    //         $CategoryWithMostFavoritesProducts = DB::connection('mysql')->select('SELECT p.category, count(f.produit_id) as total 
    //     FROM produits p 
    //     LEFT JOIN favorites f ON f.produit_id = p.id 
    //     GROUP BY p.category 
    //     ORDER BY total DESC
    // ');

    //         dd($CategoryWithMostFavoritesProducts);
    //     }

//     public function ex12()
//     {

//         $numberoffavorisforuser = DB::connection('mysql')->select('SELECT users.name, count(f.produit_id) as numberoffavoris
//         from users
//         left join favorites f on f.user_id = users.id
//         group by users.name
        

// ');
//         dd($numberoffavorisforuser);
//     }

    // public function ex13(){
    //     $NumberFavorisFCategpry = DB::connection('mysql')->select('SELECT produits.category,count(favorites.produit_id) as total
    //     from produits
    //     JOIN favorites on favorites.produit_id = produits.id
        
    //     GROUP BY produits.category
    //     ORDER BY total DESC
    //     ');
    //     dd($NumberFavorisFCategpry);
    // }

    // public function ex14(){
    //     $CategoryWith3Products = DB::connection('mysql')->select ('SELECT produits.category,count(produits.category) as total 
    //     from produits 
    //     GROUP BY produits.category
    //     HAVING total >= 3 
    //     ');
    //     dd($CategoryWith3Products);
    // }


}
