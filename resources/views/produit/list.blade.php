@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des produits</div>
                <div class="card-body">
                   <table class="table table-bordered table-striped">
                       <tr>
                           <th>Identifiant du produit</th>
                           <th>Libelle du produit</th>
                           <th>Quantité du produit</th>
                           <th>Categorie du  produit</th>
                           <th>Action</th>
                           <th>Action</th>
                       </tr>
                       @foreach($liste_produits as $produit)
                            <tr>
                                <td>{{$produit->id}}</td>
                                <td>{{$produit->libelle}}</td>
                                <td>{{$produit->qtStock}}</td>
                                <td>{{$produit->categories_id}}</td>
                                <td><a href="{{ route('editproduit',['id'=>$produit->id])}}">Editer</a></td>
                                <td> <a href="{{ route('deleteproduit',['id'=>$produit->id])}}" onclick="return confirm('Voulez-vous supprimer ?');">Supprimer</a></td>
                            </tr>
                       @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
