@extends('admin.layouts.app')

@section('title', 'Listes des utilisateurs')

@section('pagetitle')
<h1>Abonnement</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de Board</a></li>
    <li class="breadcrumb-item active">Liste des Licences Générées / Abonnement</li>
  </ol>
</nav>
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Liste des abonnements</h5>
    <!-- Table pour afficher les abonnements -->
    <table class="table table-bordered datatable">
      <thead>
        <tr>
          <th scope="col">Établissement</th>
          <th scope="col">Nom</th>
          <th scope="col">Plan</th>
          <th scope="col">Durée (mois)</th>
          <th scope="col">Statut</th>
          <th scope="col">Début</th>
          <th scope="col">Expiration</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($abonnement as $ab)
        <tr>
          <td>{{ $ab->user->nom ?? 'N/A' }}</td>  <!-- Affichage du nom de l'établissement -->
          <td>{{ $ab->user->nom }}</td>  <!-- Nom de l'utilisateur -->
          <td>{{ ucfirst($ab->licence->plan) }}</td>  <!-- Plan : Essai, Pro, VIP -->
          <td>{{ $ab->duration }} mois</td>  <!-- Durée -->
          <td>{{ ucfirst($ab->status) }}</td>  <!-- Statut -->
          <td>{{ \Carbon\Carbon::parse($ab->starts_at)->format('d/m/Y') }}</td>  <!-- Date de début -->
          <td>{{ \Carbon\Carbon::parse($ab->ends_at)->format('d/m/Y') }}</td>  <!-- Date d'expiration -->
        </tr>
        @empty
        <tr>
          <td colspan="7" class="text-center">Aucun abonnement trouvé.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    <!-- Fin de la table des abonnements -->
  </div>
</div>
@endsection
