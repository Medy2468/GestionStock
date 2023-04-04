@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Entrees</div>
                   <div class="card-body">
                        <table class="table table-bordered table-stripped">
                            <tr>
                                <th>Identifiant</th>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($liste_entree as $editentree)
                              <tr>
                                  <td>{{$editentree->id}}</td>
                                  <td>{{$editentree->produits_id}}</td>
                                  <td>{{$editentree->QteE}}</td>
                                  <td>{{$editentree->prixE}}</td>
                                  <td><a href="{{route('editentree', ['id'=>$editentree->id])}}">Editer</a></td>
                                  <td><a href="{{route('deleteentree' , ['id'=>$editentree->id] )}}" onclick="return confirm('Voulez-vous supprimer ?');">Supprimer</a></td>
                              </tr>
                          @endforeach
                        </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
