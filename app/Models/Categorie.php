<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = array( 'nomCat');
    public static $rules = array('nomCat' => 'required|min:3');

    public function produit(){
        return $this->hasMany('App\Produit');
    }
}
