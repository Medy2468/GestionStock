<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entree;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class EntreeController extends Controller
{
    //ajout des entrees

    public function add()
    {
        $produits = produit::all();
        return view('entree.add',['produits'=>$produits]);
    }

    //lister les entrees
    public function getAll()
    {
        $liste_entrees = Entree::all();
        //$liste_entrees = entree::paginate(2);
        return view('entree.list',['liste_entree'=>$liste_entrees]);
        //return view('entree.list');
    }

    //editer une entree partir de son id
    public function edit($id)
    {   $entree = entree::find($id);
        return view('entree.edit', ['entree'=> $entree]);
    }

    //mettre a jour les infos d'une entree
    public function update(Request $request)
    {   $entree= entree::find($request->id);
        $entree->produits_id = $request->produits_id;
        $entree->QteE = $request->QteE;
        $entree->prixE = $request->prixE;
        $entree->dateE = $request->dateE;

        $result = $entree->save();

        return redirect('getAllEntree');
        //return $this->lister();
    }

    //supprimer les infos d'une entree a partir de son id
    public function delete($id)
    {
        //retourne vers la liste apres suppression
        $entree = entree::find($id);
        if($entree != null){
            $entree->delete();
        }
        return $this->getAll();
    }

    public function persist(Request $request)
    {
        extract($_POST);
        if(isset($produits_id)){

        $entree= new Entree();
        $produit = produit::find($produits_id);
        $entree->QteE = $request->QteE;
        $entree->dateE = $request->dateE;
        $entree->prixE = $request->prixE;
        $produit->qtStock=$request->QteE+$produit->qtStock;
        $entree->produits_id = $request->produits_id;
        //$produits->user_id = Auth::id();
        //$produits_id->stock = $produit->stock +$entree->quantite;
        $produit->save();
        $result = $entree->save();
        $produits = produit::all();

        return view('entree.add', ['confirmation' => $result,'produits'=>$produits]);


    }
}
}
