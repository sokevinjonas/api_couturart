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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h3 class="mb-4">Générer une licence</h3>

    <!-- Barre de recherche -->
    <form method="GET" action="{{ route('licence.create') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Recherchez un établissement par numéro ou nom..." value="{{ $search }}">
            <button class="btn btn-primary">Rechercher</button>
        </div>
    </form>

    <!-- Résultats de la recherche (Cartes) -->
    <div class="row">
        @forelse ($users as $user)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->etablissement }}</h5>
                    <p class="card-text">
                        <strong>Nom Proprietaire :</strong> {{ $user->nom }} <br>
                        <strong>Telephone :</strong> {{ $user->pays }} {{  $user->telephone}} <br>
                        <strong>Date D'adesion: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</strong> <br>
                    </p>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateLicenseModal"
                        data-user-id="{{ $user->id }}"
                        data-user-name="{{ $user->nom }}">
                        Générer une licence
                    </button>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center">Aucun utilisateur trouvé.</p>
        @endforelse
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
                    <form method="POST" action="{{ route('licence.new_licence') }}">
                        @csrf
                        <input type="hidden" id="userIdInput" name="user_id">
                        <div class="mb-3">
                            <label for="licenseType" class="form-label">Type de licence</label>
                            <select class="form-select" id="licenseType" name="plan">
                                @foreach ($licences as $licence)
                                    <option value="{{ $licence->id }}">{{ $licence->plan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="licenseDuration" class="form-label">Durée (en mois)</label>
                            <input type="number" class="form-control" id="licenseDuration" name="duration" placeholder="Ex : 6">
                        </div>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const generateLicenseModal = document.getElementById('generateLicenseModal');
    generateLicenseModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const userId = button.getAttribute('data-user-id');
        const userName = button.getAttribute('data-user-name');

        // Remplir les champs cachés avec les données utilisateur
        document.getElementById('userIdInput').value = userId;

        // Facultatif : Ajout d'informations utilisateur
        const modalTitle = generateLicenseModal.querySelector('.modal-title');
        modalTitle.textContent = `Générer une licence pour ${userName}`;
    });
</script>
@endsection
