@extends('admin.layouts.app')
@section('title', "Paramètres de Configurations")

@section('pagetitle')
<h1>Paramètres</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Tableau de Board</a></li>
    <li class="breadcrumb-item active">Paramètres de Configurations</li>
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
                @forelse ($licences as $licence)
                <tr>
                  <td>{{ $licence->plan }}</td>
                  <td>{{ $licence->prix_mensuel }} Fcfa</td>
                  <td>{{ $licence->prix_mensuel * 12 }} Fcfa</td>
                  <td>
                    <button class="btn btn-warning btn-sm" 
                            data-id="{{ $licence->id }}"
                            data-description="{{ $licence->description }}">
                      Éditer
                    </button>
                  </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4">Aucune Licence configurée</td>
                    </tr>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title" id="formTitle">Créer un nouveau forfait</h5>
          <form id="licenceForm" method="POST">
            @csrf
            <div class="mb-3">
              <label for="plan" class="form-label">Plan</label>
              <input type="text" class="form-control" id="plan" name="plan" required>
            </div>
            <div class="mb-3">
              <label for="prix-mensuel" class="form-label">Prix Mensuel (FCFA)</label>
              <input type="number" class="form-control" name="prix_mensuel" id="prix-mensuel" required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <button type="button" class="btn btn-default" id="resetForm" style="display: none;">Annuler</button>
          </form>
        </div>
      </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.btn-warning');
    const formTitle = document.getElementById('formTitle');
    const form = document.getElementById('licenceForm');
    const resetButton = document.getElementById('resetForm');
    const createRoute = "{{ route('licence.store') }}";
    // const updateRoute = "{{ route('licence.update', $licence->id) }}";
    const updateRoute = "{{ route('licence.update', ['licence' => ':id']) }}";

    function resetForm() {
        form.reset();
        form.action = createRoute;
        form.method = 'POST';
        formTitle.textContent = 'Créer un nouveau forfait';
        resetButton.style.display = 'none';
        const methodInput = document.querySelector('input[name="_method"]');
        if (methodInput) methodInput.remove();
    }

    resetButton.addEventListener('click', resetForm);
    form.action = createRoute;

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const licenceId = this.dataset.id;
            
            document.getElementById('plan').value = row.cells[0].textContent.trim();
            document.getElementById('prix-mensuel').value = row.cells[1].textContent.replace(' Fcfa', '').trim();
            document.getElementById('description').value = this.dataset.description;

            formTitle.textContent = 'Modifier le forfait';
            form.action = updateRoute.replace(':id', licenceId);
            
            if (!document.querySelector('input[name="_method"]')) {
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                form.appendChild(methodInput);
            }
            
            resetButton.style.display = 'inline-block';
        });
    });
});
</script>
@endsection