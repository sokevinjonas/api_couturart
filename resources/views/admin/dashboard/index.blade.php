@extends('admin.layouts.app')
@section('title', 'Tableau de Bord')
@section('pagetitle')
<h1>Tableau de Board</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"> Tableau de Board </a></li>
    <li class="breadcrumb-item active">Tableau de Board </li>
    {{-- <li class="breadcrumb-item active">Profil</li> --}}
  </ol>
</nav>
@endsection
@section('content')
<div class="row">

    <!-- Left side columns -->
<div class="col-lg-12">
    <div class="row">

      <!-- Utilisateurs inscrits -->
      <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Utilisateurs inscrits</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
              </div>
              <div class="ps-3">
                <h6> {{  $user->count()}}</h6>
                {{-- <span class="text-success small pt-1 fw-bold">12%</span>
                <span class="text-muted small pt-2 ps-1">augmentation</span> --}}
              </div>
            </div>
          </div>
        </div>
      </div><!-- Fin Utilisateurs inscrits -->

      <!-- Licences générées -->
      <div class="col-xxl-4 col-md-6">
        <div class="card info-card revenue-card">
          <div class="card-body">
            <h5 class="card-title">Licences générées</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-card-checklist"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $abonnement->count() }}</h6>
                {{-- <span class="text-success small pt-1 fw-bold">8%</span>
                <span class="text-muted small pt-2 ps-1">augmentation</span> --}}
              </div>
            </div>
          </div>
        </div>
      </div><!-- Fin Licences générées -->

      <!-- Actions récentes -->
      <div class="col-xxl-4 col-xl-12">
        <div class="card info-card customers-card">
          <div class="card-body">
            <h5 class="card-title">Abonnements Activés</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-patch-check-fill"></i>
              </div>
              <div class="ps-3">
                <h6>
                  {{ $users_active }}
                </h6>
                {{-- <span class="text-danger small pt-1 fw-bold">5%</span>
                <span class="text-muted small pt-2 ps-1">diminution</span> --}}
              </div>
            </div>
          </div>
        </div>
      </div><!-- Fin Actions récentes -->

      <!-- Résumé des activités -->
      <div class="col-12">
        <div class="card top-selling overflow-auto">
          <div class="card-body pb-0">
            <h5 class="card-title">Résumé des activités</h5>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col">Aperçu</th>
                  <th scope="col">Description</th>
                  <th scope="col">Statut</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"><a href="#"><i class="bi bi-person-plus"></i></a></th>
                  <td>Nouvel utilisateur inscrit</td>
                  <td class="text-success">Complété</td>
                  <td>12:34</td>
                </tr>
                <tr>
                  <th scope="row"><a href="#"><i class="bi bi-card-checklist"></i></a></th>
                  <td>Licence générée</td>
                  <td class="text-warning">En attente</td>
                  <td>11:45</td>
                </tr>
                <tr>
                  <th scope="row"><a href="#"><i class="bi bi-x-circle"></i></a></th>
                  <td>Erreur de validation</td>
                  <td class="text-danger">Échoué</td>
                  <td>10:20</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- Fin Résumé des activités -->

    </div>
  </div><!-- Fin colonne gauche -->

  </div>
@endsection
