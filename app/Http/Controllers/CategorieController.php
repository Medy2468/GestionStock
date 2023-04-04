<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(){

        return view('categorie.add');
    }
    public function getAll(){

        //$liste_categories = Categorie::paginate(2); // equivaut de : select * from categorie limit 2;
        $liste_categories = Categorie::all(); // equivaut select * from categorie;
        return view('categorie.list',['liste_categories' => $liste_categories]);
    }
    public function edit($id){

        $categorie = Categorie::find($id);
        return view('categorie.edit',['categorie' => $categorie]);
    }
    public function update(Request $request){
        // Recupère les informations à partir de la base de donnée
        $categorie = Categorie::find($request->id);
        $categorie->nomCat = $request->nomCat;

        $result = $categorie->save(); // 1 ou 0
        return redirect('getAllCategorie');
        //return $this->getAll();
    }
    public function delete($id){

        $categorie = Categorie::find($id); // equivaut de : select * from categorie where $id=$id;
        if($categorie != null)
        {
           $categorie->delete();
        }
        return $this->getAll();
    }
    public function persist(Request $request){


        $categorie = new Categorie();
        $categorie->nomCat = $request->nomCat;

        $result = $categorie->save(); // 1 ou 0

        return view('categorie.add',['confirmation' => $result]);
        //return $this->getAll(); // Une fois enregistré il reste sur la page d'enregistrement

    }
}

