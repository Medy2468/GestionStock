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
                           <div class="alert alert-success">Categorie ajouté</div>
                        @else
                            <div class="alert alert-danger">Categorie non ajouté</div>
                        @endif
                    @endif
                    <form method="POST" action="{{route('persistcategorie')}}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="nom">Nom de la categorie</label>
                            <input class="form-control" type="text" name="nomCat" id="nom">
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
