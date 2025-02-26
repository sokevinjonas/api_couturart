<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Tableau de bord -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : 'collapsed' }}" href="{{route('dashboard')}}">
          <i class="bi bi-speedometer2"></i>
          <span>Tableau de bord</span>
        </a>
      </li>

      <!-- Gestion des utilisateurs -->
      <li class="nav-item">
        <a @class(['nav-link', 'collapsed' => !request()->routeIs('users.*')]) data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Utilisateurs</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" @class(['nav-content', 'collapse', 'show' => request()->routeIs('users.*')])>
          <li>
            <a href="{{route('users.index')}}" class="{{request()->routeIs('users.index') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Liste des utilisateurs</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Ajouter un utilisateur</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Gestion des licences -->
      <li class="nav-item">
        <a @class(['nav-link', 'collapsed' => !request()->routeIs('licence.*')]) data-bs-target="#licenses-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-key"></i><span>Licences & SMS</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="licenses-nav" @class(['nav-content', 'collapse', 'show' => request()->routeIs('licence.*')])>
          <li>
            <a href="{{route('licence.create')}}" class="{{request()->routeIs('licence.create') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Générer une licence / SMS</span>
            </a>
          </li>
          <li>
            <a href="{{  route('licence.index')}}" class="{{request()->routeIs('licence.index') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Liste des licences</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Statistiques -->
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="./statistics.html">
          <i class="bi bi-bar-chart"></i>
          <span>Statistiques</span>
        </a>
      </li> --}}

      <!-- Paramètres -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('paremetre') ? 'active' : 'collapsed' }}" href="{{route('paremetre')}}">
          <i class="bi bi-gear"></i>
          <span>Paramètres</span>
        </a>
      </li>

      <!-- Déconnexion -->
      <li class="nav-heading">
        <hr>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="nav-link collapsed" onclick="return confirm('Êtes-vous sûr ?')">
                <i class="bi bi-box-arrow-right"></i>
                <span>Déconnexion</span>
            </button>
        </form>
    </li>
    </ul>
  </aside>
