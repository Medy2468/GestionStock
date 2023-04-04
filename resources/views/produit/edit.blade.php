@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire d'enregistrement des produits</div>

                <div class="card-body">
                    @if(isset($confirmation))
                        @if($confirmation == 1)
                           <div class="alert alert-success">Produit ajouté</div>
                        @else
                            <div class="alert alert-danger">Produit non ajouté</div>
                        @endif
                    @endif
                    <form method="POST" action="{{route('updateproduit')}}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="id">Identifiant du produit</label>
                            <input class="form-control" readonly="true" type="text" name="id" id="id" value="{{ $produit->id }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="libelle">Libelle du produit</label>
                            <input class="form-control" type="text" name="libelle" id="libelle" value="{{ $produit->libelle }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="qtStock">Quantité du produit</label>
                            <input class="form-control" type="text" name="qtStock" id="qtStock" value="{{ $produit->qtStock }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="categories_id">Categorie du produit</label>
                            <input class="form-control" type="text" name="categories_id" id="categories_id" value="{{ $produit->categories_id }}"/>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer">
                            <a class="btn btn-danger" href="{{ route('getAllProduit')}}">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
