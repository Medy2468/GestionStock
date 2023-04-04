<?php

namespace App\Http\Controllers;

use App\Models\Entree;
use App\Models\Sortie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SortieController extends Controller
{
    //ajout des sorties

    public function add()
    {
        $produits = produit::all();
        return view('sortie.add',['produits'=>$produits]);
    }

    //lister les sorties
    public function getAll()
    {
        $liste_sorties = Sortie::all();
        //$liste_sorties = sortie::paginate(2);
        return view('sortie.list',['liste_sortie'=>$liste_sorties]);
        //return view('entree.list');
    }

    //editer une sortie partir de son id
    public function edit($id)
    {   $sortie = sortie::find($id);
        return view('sortie.edit', ['sortie'=> $sortie]);
    }

    //mettre a jour les infos d'une sortiee
    public function update(Request $request)
    {   $sortie = Sortie::find($request->id);
        $sortie->produits_id = $request->produits_id;
        $sortie->QteS = $request->QteS;
        $sortie->prixS = $request->prixS;
        $sortie->dateS = $request->dateS;

        $result = $sortie->save();

        return redirect('getAllSortie');
        //return $this->lister();
    }

    //supprimer les infos d'une entree a partir de son id
    public function delete($id)
    {
        //retourne vers la liste apres suppression
        $sortie = Entree::find($id);
        if($sortie != null){
            $sortie->delete();
        }
        return $this->getAll();
    }

    public function persist(Request $request)
    {
        extract($_POST);
        if(isset($produits_id)){

        $sortie= new Sortie();
        $produit = produit::find($produits_id);
        $sortie->QteS = $request->QteS;
        $sortie->dateS = $request->dateS;
        $sortie->prixS = $request->prixS;
        //$produit->qtStock=$produit->qtStock-$request->QteS;
        $produit->qtStock=$produit->qtStock-$request->QteS;
        $sortie->produits_id = $request->produits_id;
        //$produits->user_id = Auth::id();

        $produit->save();
        $result = $sortie->save();
        $produits = produit::all();
        return view('sortie.add', ['confirmation' => $result,'produits'=>$produits]);


    }
}
}
