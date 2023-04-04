@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire d'enregistrement des categories</div>

                <div class="card-body">
                    @if(isset($confirmation))
                        @if($confirmation == 1)
                           <div class="alert alert-success">Categorie modifié</div>
                        @else
                            <div class="alert alert-danger">Categorie non modifié</div>
                        @endif
                    @endif
                    <form method="POST" action="{{route('updatecategorie')}}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="id">Identifiant de la categorie</label>
                            <input class="form-control" readonly="true" type="text" name="id" id="id" value="{{ $cat->id }}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="nom">Nom de la categorie</label>
                            <input class="form-control" type="text" name="nom" id="nom" value="{{ $cat->nomCat }}"/>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="envoyer" id="envoyer" value="Envoyer">
                            <a class="btn btn-danger" href="{{ route('getAllCategorie')}}">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
