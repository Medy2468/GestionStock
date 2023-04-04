<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = array('categories_id','user_id','libelle', 'qtStock');
    public static $rules = array('categories_id' => 'required|integer',
                                 'user_id' => 'required|bigInteger',
                                 'libelle' => 'required|min:20',
                                 'qtStock' => 'required|integer',);

    public function produit(){

        return $this->belongsTo('App\Categorie');
    }

    public function entree(){

        return $this->belongsTo('App\Entree');
    }

    public function sortie(){

        return $this->belongsTo('App\Sortie');
    }
}
