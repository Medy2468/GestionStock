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
                    <form method="POST" action="{{route('persistproduit')}}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="libelle">libelle du produit</label>
                            <input class="form-control" type="text" name="libelle" id="libelle">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="date">Quantité du produit</label>
                            <input class="form-control" type="texte" name="qtStock" id="qtStock">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="categories_id">Choisissez une categorie</label>
                            <select class="form-control" type="text" name="categories_id" id="categories_id">
                                <option value="0">Faites un choix</option>
                                @foreach($categorie as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->nomCat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer">
                            <input class="btn btn-danger" type="reset" name="annuler" id="annuler" value="Annuler">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
