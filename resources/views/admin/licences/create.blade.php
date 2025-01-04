@extends('admin.layouts.app')
@section('title', "Paramètres de Configurations")

@section('pagetitle')
<h1>Créer une Licence</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"> Tableau de Board </a></li>
    <li class="breadcrumb-item active">Créer une Licence </li>
    {{-- <li class="breadcrumb-item active">Profil</li> --}}
  </ol>
</nav>
@endsection
@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Générer une licence</h3>

    <!-- Barre de recherche -->
    <div class="input-group mb-4">
      <input type="text" class="form-control" placeholder="Recherchez un établissement par numéro ou nom..." id="searchInput">
      <button class="btn btn-primary">Rechercher</button>
    </div>

    <!-- Résultats de la recherche (Cartes) -->
    <div id="searchResults" class="row">
      <!-- Exemple de carte -->
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Établissement XYZ</h5>
            <p class="card-text">
              <strong>Numéro :</strong> 12345<br>
              <strong>Adresse :</strong> Ouagadougou, Burkina Faso
            </p>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateLicenseModal">Générer une licence</button>
          </div>
        </div>
      </div>
      <!-- Fin exemple -->
    </div>

    <!-- Modal : Formulaire de génération de licence -->
    <div class="modal fade" id="generateLicenseModal" tabindex="-1" aria-labelledby="generateLicenseModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="generateLicenseModalLabel">Générer une licence</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>
          <div class="modal-body">
            <form id="generateLicenseForm">
              <div class="mb-3">
                <label for="licenseType" class="form-label">Type de licence</label>
                <select class="form-select" id="licenseType">
                  <option value="basic">Basic</option>
                  <option value="premium">Premium</option>
                  <option value="pro">Pro</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="licenseDuration" class="form-label">Durée (en mois)</label>
                <input type="number" class="form-control" id="licenseDuration" placeholder="Ex : 6">
              </div>
              <button type="submit" class="btn btn-primary">Confirmer</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
