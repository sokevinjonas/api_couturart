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
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Plan Basique</td>
                <td>10 €</td>
                <td>100 €</td>
                <td>
                  <button class="btn btn-warning btn-sm">Éditer</button>
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce forfait ?')">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>Plan Premium</td>
                <td>20 €</td>
                <td>200 €</td>
                <td>
                  <button class="btn btn-warning btn-sm">Éditer</button>
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce forfait ?')">Supprimer</button>
                </td>
              </tr>
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
          <form>
            <div class="mb-3">
              <label for="plan" class="form-label">Plan</label>
              <input type="text" class="form-control" id="plan" placeholder="Nom du plan (ex : Premium)">
            </div>
            <div class="mb-3">
              <label for="prix-mensuel" class="form-label">Prix Mensuel (€)</label>
              <input type="number" class="form-control" id="prix-mensuel" placeholder="Ex : 10">
            </div>
            <div class="mb-3">
              <label for="prix-annuel" class="form-label">Prix Annuel (€)</label>
              <input type="number" class="form-control" id="prix-annuel" placeholder="Ex : 100">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" rows="3" placeholder="Description du plan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
