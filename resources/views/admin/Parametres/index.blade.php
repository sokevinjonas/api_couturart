@extends('admin.layouts.app')
@section('title', "Paramètres de Configurations")

@section('pagetitle')
<h1>Paramètres</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"> Tableau de Board </a></li>
    <li class="breadcrumb-item active">Paramètres de Configurations </li>
    {{-- <li class="breadcrumb-item active">Profil</li> --}}
  </ol>
</nav>
@endsection
@section('content')
<div class="row">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Colonne gauche : Tableau des forfaits -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Liste des forfaits</h5>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Plan</th>
                <th>Mensuel</th>
                <th>Annuel</th>
                {{-- <th>Actions</th> --}}
              </tr>
            </thead>
            <tbody>
                @forelse ($licences as $licence )
                <tr>
                  <td> {{ $licence->plan }} </td>
                  <td>{{ $licence->prix_mensuel }} Fcfa</td>
                  <td> {{ $licence->prix_mensuel * 12 }} Fcfa </td>
                  {{-- <td>
                    <button class="btn btn-warning btn-sm">Éditer</button>
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce forfait ?')">Supprimer</button>
                  </td> --}}
                </tr>
                @empty
                    <tr>
                        <td>
                            Aucune Licence configurer
                        </td>
                    </tr>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Colonne droite : Formulaire de création de forfait -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Créer un nouveau forfait</h5>
          <form action="{{  route('licence.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="plan" class="form-label">Plan</label>
              <input type="text" class="form-control" id="plan" name="plan" placeholder="Nom du plan (ex : Premium)">
            </div>
            <div class="mb-3">
              <label for="prix-mensuel" class="form-label">Prix Mensuel (FCFA)</label>
              <input type="number" class="form-control" name="prix_mensuel" id="prix-mensuel" placeholder="Ex : 10">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description du plan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
