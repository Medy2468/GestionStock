@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des Sorties</div>
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
                            @foreach ($liste_sortie as $sortie)
                              <tr>
                                  <td>{{$sortie->id}}</td>
                                  <td>{{$sortie->produits_id}}</td>
                                  <td>{{$sortie->QteS}}</td>
                                  <td>{{$sortie->prixS}}</td>
                                  <td><a href="{{route('editentree', ['id'=>$sortie->id])}}">Editer</a></td>
                                  <td><a href="{{route('deleteentree' , ['id'=>$sortie->id] )}}" onclick="return confirm('Voulez-vous supprimer ?');">Supprimer</a></td>
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
