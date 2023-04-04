@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire d'ajout entree</div>
                   <div class="card-body">
                   @if (isset($confirmation) )
                            @if ($confirmation ==  1)
                            <div class="alert alert-success">Entrée ajoutée</div>
                            @else
                            <div class="alert alert-danger">Entrée non ajoutée</div>
                            @endif
                       @endif
                   <form method="POST" action={{{route('persistentree')}}}>
                       @csrf
                      <div class="form-group">
                        <label class="control-label" for="QteE">Quantite</label>
                        <input class="form-control" type="number" name="QteE" id="QteE"/>
                      </div>
                       <div class="form-group">
                        <label class="control-label" for="prixE">Prix</label>
                        <input class="form-control" type="number" name="prixE" id="prixE"/>
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="dateE">Date</label>
                        <input class="form-control" type="date" name="dateE" id="dateE"/>
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
