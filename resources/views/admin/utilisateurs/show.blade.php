@extends('admin.layouts.app')
@section('title', "Information sur un utilisateur")
@section('pagetitle')
<h1>Information sur l'etablissement {{ $user->etablissement}} </h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"> Tableau de Board </a></li>
    <li class="breadcrumb-item active">listes des utilisateurs </li>
    {{-- <li class="breadcrumb-item active">Profil</li> --}}
  </ol>
</nav>
@endsection

@section('content')
  <div class="row">
      <!-- Colonne de gauche : Infos User -->
      <div class="col-md-4">
          <div class="card">
              <div class="card-header text-center">
                  <img src="{{ asset($user->logo ?? 'default-logo.png') }}" class="rounded-circle" width="80" alt="Logo">
                  <h4 class="mt-2">{{ $user->nom }}</h4>
                  <span class="badge bg-primary">{{ ucfirst($user->role) }}</span>
              </div>
              <div class="card-body">
                  <p><strong>Établissement :</strong> {{ $user->etablissement }}</p>
                  <p><strong>Email :</strong> {{ $user->email ?? 'N/A' }}</p>
                  <p><strong>Téléphone :</strong> {{ $user->telephone }}</p>
                  <p><strong>Pays :</strong> {{ $user->pays }}</p>
                  <p><strong>Adresse :</strong> {{ $user->adresse ?? 'N/A' }}</p>
                  <p><strong>Membre depuis :</strong> {{ date('d/m/Y', strtotime($user->created_at)) }}</p>
              </div>
          </div>
      </div>

      <!-- Colonne de droite : Commandes et Transactions -->
      <div class="col-md-8">
          <!-- Dernières Commandes -->
          <div class="card mb-4">
              <div class="card-header bg-success text-white">
                  <h5>📦 Dernières Commandes</h5>
              </div>
              <div class="card-body">
                  <table class="table table-bordered">
                      <thead class="table-light">
                          <tr>
                              <th>#</th>
                              <th>Status</th>
                              <th>Total</th>
                              <th>Avance</th>
                              <th>Reste</th>
                              <th>Date</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($commandes as $index => $commande)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>
                                      <span class="badge bg-{{ $commande->status == 'livrer' ? 'success' : ($commande->status == 'urgente' ? 'danger' : 'warning') }}">
                                          {{ ucfirst($commande->status) }}
                                      </span>
                                  </td>
                                  <td>{{ number_format($commande->total, 0, ',', ' ') }} FCFA</td>
                                  <td>{{ number_format($commande->avance, 0, ',', ' ') }} FCFA</td>
                                  <td>{{ number_format($commande->reste, 0, ',', ' ') }} FCFA</td>
                                  <td>{{ date('d/m/Y', strtotime($commande->created_at)) }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>

          <!-- Dernières Transactions de la Caisse -->
          <div class="card">
              <div class="card-header bg-info text-white">
                  <h5>💰 Dernières Transactions</h5>
              </div>
              <div class="card-body">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Type</th>
                              <th>Montant</th>
                              <th>Raison</th>
                              <th>Date</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($caisses as $index => $caisse)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>
                                      <span class="badge bg-{{ $caisse->operation == 'entrer' ? 'success' : ($caisse->operation == 'sortie' ? 'danger' : 'secondary') }}">
                                          {{ ucfirst($caisse->operation) }}
                                      </span>
                                  </td>
                                  <td>{{ number_format($caisse->amount, 0, ',', ' ') }} FCFA</td>
                                  <td>{{ $caisse->reason }}</td>
                                  <td>{{ date('d/m/Y', strtotime($caisse->created_at)) }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>

      </div>
  </div>
@endsection