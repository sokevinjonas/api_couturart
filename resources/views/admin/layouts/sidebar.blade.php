<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Tableau de bord -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="./dashboard.html">
          <i class="bi bi-speedometer2"></i>
          <span>Tableau de bord</span>
        </a>
      </li>

      <!-- Gestion des utilisateurs -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Utilisateurs</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse">
          <li>
            <a href="{{route('utilisateurs')}}">
              <i class="bi bi-circle"></i><span>Liste des utilisateurs</span>
            </a>
          </li>
          <li>
            <a href="./users-add.html">
              <i class="bi bi-circle"></i><span>Ajouter un utilisateur</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Gestion des licences -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#licenses-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-key"></i><span>Licences</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="licenses-nav" class="nav-content collapse">
          <li>
            <a href="{{route('licence.create')}}">
              <i class="bi bi-circle"></i><span>Générer une licence</span>
            </a>
          </li>
          <li>
            <a href="./licenses-list.html">
              <i class="bi bi-circle"></i><span>Liste des licences</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Statistiques -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="./statistics.html">
          <i class="bi bi-bar-chart"></i>
          <span>Statistiques</span>
        </a>
      </li>

      <!-- Paramètres -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('paremetre')}}">
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
