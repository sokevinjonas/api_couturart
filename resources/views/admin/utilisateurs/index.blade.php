@extends('admin.layouts.app')
@section('title', 'Listes des utilisateurs')
@section('pagetitle')
<h1>Utilisateurs</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"> Tableau de Board </a></li>
    <li class="breadcrumb-item active">Listes des utilisateurs </li>
    {{-- <li class="breadcrumb-item active">Profil</li> --}}
  </ol>
</nav>
@endsection
@section('content')
<div class="card">
        <div class="card-body">
          <h5 class="card-title">Liste des utilisateurs</h5>
          <!-- Table pour afficher les articles -->
          <table class="table table-bordered datatable">
            <thead>
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Etablissement</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Créé le</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user )
              <tr>
                <td>{{  $user->nom}}</td>
                <td>{{ $user->etablissement  }}</td>
                <td>{{ $user->pays }} {{ $user->telephone  }}</td>
                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
              </tr>
              @empty
                <tr>
                  <td>Aucun utilisateurs</td>
                </tr>
              @endforelse
            </tbody>
          </table>
          <!-- Fin de la table des articles -->
        </div>
      </div>
@endsection
