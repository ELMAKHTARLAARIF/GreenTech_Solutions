<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function dashboard()
    {
        $products = Produit::all();
        return view('Admin/Dashboard', compact('products'));
    }

    public function products()
    {
        $products = Produit::all();
        return view('client.produits', compact('products'));
    }

    public function addProductForm()
    {
        return view('Admin.addProduct');
    }

    public function storeProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Produit::create($validatedData);
        return redirect('/Dashboard')->with('success', 'Product added successfully!');
    }

    public function deleteProduct($id)
    {
        $product = Produit::findOrFail($id);
        $product->delete();
        return redirect('/Dashboard')->with('success', 'Product deleted successfully!');
    }

    public function SearchProduct(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);
        $query = $request->input('query');
        $products = Produit::where('name', 'like', "%$query%")->get();
        if ($products->isEmpty()) {
            return redirect()->route('products')->with('error', 'No products found matching your search criteria.');
        } else {
            return view('client.produits', compact('products'));
        }
    }

    public function filtrage(Request $request)
    {
        $category = $request->input('category');

        $products = Produit::where('category', $category)->get();
        if ($products->isEmpty()) {
            return redirect()->route('products')->with('error', 'No products found in this category.');
        } else {
            return view('client.produits', compact('products'));
        }
    }

    public function ToEditForm(Request $request)
    {
        $product = Produit::find($request->id);
        return view('Admin.Edit_Form', compact('product'));
    }

    public function EditProduct(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:produits,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product = Produit::findOrFail($request->id);

        $edited = $product->update($validatedData);

        if ($edited) {
            return redirect('/Dashboard')
                ->with('success', 'Product updated successfully!');
        }

        return redirect('/Dashboard')
            ->with('error', 'You cannot update this product.');
    }

    public function ShowAllCategories()
    {
        $categories = Produit::select('category')->distinct()->get();
        return view('Admin.categories', compact('categories'));
    }
    public function productDetails($id)
    {
        $product = Produit::findOrFail($id);
        return view('client.details', compact('product'));
    }
}
