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
          <th scope="col">SMS Restante</th>
          <th scope="col">Durée </th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($abonnement as $ab)
        <tr>
          <td>{{ $ab->user->etablissement ?? 'N/A' }}</td>  <!-- Affichage du nom de l'établissement -->
          <td>{{ $ab->user->nom }}</td>  <!-- Nom de l'utilisateur -->
          <td>{{ ucfirst($ab->licence->plan) }}</td>  <!-- Plan : Essai, Pro, VIP -->
          <td>{{ $ab->duration }} mois</td>  <!-- Durée -->
          {{-- <td>{{ ucfirst($ab->status) }}</td>  <!-- Statut --> --}}
          <td>
            @if($ab->sms_management)
              {{ $ab->sms_management->total_sms_inclus}} SMS
              @else
              Pas autorisé
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708"/>
              </svg>
            @endif 
          </td>
          <td> <span class="text text-primary">{{ \Carbon\Carbon::parse($ab->starts_at)->format('d/m/Y') }} </span> => <span class="text text-danger">{{ \Carbon\Carbon::parse($ab->ends_at)->format('d/m/Y') }}</span> </td>  <!-- Date de début -->
          <td>
            <a class="btn btn-success" href="#">Renouveller SMS</a>
            </td>  <!-- Date d'expiration -->
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
