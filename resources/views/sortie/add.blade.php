@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire d'ajout sortie</div>
                   <div class="card-body">
                   @if (isset($confirmation) )
                            @if ($confirmation ==  1)
                            <div class="alert alert-success">Sortie ajoutée</div>
                            @else
                            <div class="alert alert-danger">Sortie non ajoutée</div>
                            @endif
                       @endif
                   <form method="POST" action={{{route('persistsortie')}}}>
                       @csrf
                      <div class="form-group">
                        <label class="control-label" for="QteS">Quantite</label>
                        <input class="form-control" type="number" name="QteS" id="QteS"/>
                      </div>
                       <div class="form-group">
                        <label class="control-label" for="prixS">Prix</label>
                        <input class="form-control" type="number" name="prixS" id="prixS"/>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="dateS">Date</label>
                        <input class="form-control" type="date" name="dateS" id="dateS"/>
                      </div>
                       <div class="form-group">
                        <label class="control-label" for="produit">Produit</label>
                        <select class="form-control" type="text" name="produits_id">
                            <option value="0">Choisissez produit</option>
                            @foreach ($produits as $produit)
                                  <option value="{{$produit->id}}">{{$produit->libelle}}</option>
                                @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer"/>
                        <input  class="btn btn-danger" type="reset" name="annuler" id="annulser" value="Annuler"/>
                      </div>
                    </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
