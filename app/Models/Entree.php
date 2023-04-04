<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{

    protected $fillable =array('produits_id','quantite','prix','date');
    public static $rules = array('produits_id'=>'required|integer',
                                    'quantite'=>'required|Integer',
                                    'prix'=>'required|Integer',
                                     'date'=>'required|min:3',
                                );


    public function entree()
    {
        return $this->belongsTo('App\Entree');
    }
    use HasFactory;
}
