@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des categories</div>
                <div class="card-body">
                   <table class="table table-bordered table-striped">
                       <tr>
                           <th>Identifiant</th>
                           <th>Nom de la categorie</th>
                           <th>Action</th>
                           <th>Action</th>
                       </tr>
                       @foreach($liste_categories as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->nomCat}}</td>
                                <td><a href="{{ route('editcategorie',['id'=>$cat->id])}}">Editer</a></td>
                                <td> <a href="{{ route('deletecategorie',['id'=>$cat->id])}}" onclick="return confirm('Voulez-vous supprimer ?');">Supprimer</a></td>
                            </tr>
                       @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
