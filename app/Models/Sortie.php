<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    use HasFactory;
    protected $fillable = array('produits_id','dateS', 'qteS','prixS');
    public static $rules = array('produits_id' => 'required|integer',
                                 'dateS' => 'required|min:20',
                                 'qteS' => 'required|min:10',
                                 'prixS' => 'required|min:20');

    public function sortie(){

        return $this->belongsTo('App\Sortie');
    }
}
