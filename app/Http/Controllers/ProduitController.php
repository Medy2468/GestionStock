<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(){


        $categorie = Categorie::all();
        return view('produit.add',['categorie'=>$categorie]);
        //return view('produit.add');
    }
    public function getAll(){

        //$liste_produits = Produit::paginate(2); // equivaut de : select * from produit limit 2;
        $liste_produits = Produit::all();
        //$liste_produits = Produit::all(); // equivaut select * from produit;
        return view('produit.list',['liste_produits' => $liste_produits]);
    }
    public function edit($id){

        $produit = Produit::find($id);
        return view('produit.edit',['produit' => $produit]);
    }
    public function update(Request $request){
        // Recupère les informations à partir de la base de donnée
        $produit = Produit::find($request->id);
        $produit->categories_id = $request->categories_id;
        $produit->user_id = Auth::id();
        $produit->libelle = $request->produit;
        $produit->qtStock = $request->qtStock;

        $result = $produit->save(); // 1 ou 0
        return redirect('getAllProduit');
        //return $this->getAll();
    }
    public function delete($id){

        $produit = Produit::find($id); // equivaut de : select * from categorie where $id=$id;
        if($produit != null)
        {
           $produit->delete();
        }
        return $this->getAll();
    }
    public function persist(Request $request){


        $produit = new Produit();
        $produit->libelle = $request->libelle;
        $produit->qtStock = $request->qtStock;
        $produit->categories_id = $request->categories_id;
        $produit->user_id = Auth::id();

        $result = $produit->save(); // 1 ou 0
        $categorie = categorie::all();

        return view('produit.add',['confirmation' => $result,'categorie'=>$categorie]);
        //return $this->getAll(); // Une fois enregistré il reste sur la page d'enregistrement

    }
}


