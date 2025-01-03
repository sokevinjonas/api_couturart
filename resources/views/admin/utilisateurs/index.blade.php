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
          <h5 class="card-title">Liste des articles</h5>
          <!-- Table pour afficher les articles -->
          <table class="table table-bordered datatable">
            <thead>
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Etablissement</th>
                <th scope="col">Pays</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Créé le</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Exemple de données -->
              <tr>
                <td>Jean Dupont</td>
                <td>Université de Ouagadougou</td>
                <td>Burkina Faso</td>
                <td>+226 70 00 00 00</td>
                <td>2024-09-12</td>
                <td>
                  <a href="./users-show.html" class="btn btn-info btn-sm">Voir</a>
                  <a href="./users-edit.html" class="btn btn-warning btn-sm">Éditer</a>
                  <form action="" method="POST" style="display:inline;">
                    <button type="submit" class="btn btn-danger btn-sm"
                      onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                      Supprimer
                    </button>
                  </form>
                </td>
              </tr>
              <tr>
                <td>Marie Koné</td>
                <td>Ecole Supérieure de Bobo</td>
                <td>Burkina Faso</td>
                <td>+226 60 00 00 00</td>
                <td>2024-09-11</td>
                <td>
                  <a href="./users-show.html" class="btn btn-info btn-sm">Voir</a>
                  <a href="./users-edit.html" class="btn btn-warning btn-sm">Éditer</a>
                  <form action="" method="POST" style="display:inline;">
                    <button type="submit" class="btn btn-danger btn-sm"
                      onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                      Supprimer
                    </button>
                  </form>
                </td>
              </tr>
              <!-- Fin exemple -->
            </tbody>
          </table>
          <!-- Fin de la table des articles -->
        </div>
      </div>
@endsection
