<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      Couturart - L'application révolutionnaire pour les couturiers et stylistes
      au Burkina Faso
    </title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{asset('assets/images/icon.jpeg')}}" alt="Couturart Logo" class="logo" />
          Couturart
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#features">Fonctionnalités</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#preview">Aperçu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pricing">Tarifs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#testimonials">Témoignages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#download">Télécharger</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="hero">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h1>Révolutionnez votre atelier de couture</h1>
            <p class="lead">
              Couturart : L'application 100% Burkinabè qui simplifie la gestion
              de votre activité
            </p>
            <a href="#download" class="btn btn-primary btn-lg mt-3"
              >Essai gratuit de 60 jours</a
            >
          </div>
          <div class="col-lg-6 mt-3">
            <img
              src="{{asset('assets/images/ecran1.png')}}"
              alt="Couturart App Preview"
              class="img-fluid rounded-3 shadow-lg"
            />
          </div>
        </div>
      </div>
    </header>

    <section id="features" class="features">
      <div class="container">
        <h2 class="text-center mb-5">Fonctionnalités clés</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-bolt feature-icon"></i>
              <h3>Gain de temps considérable</h3>
              <p>
                Fini les cahiers et les calculs manuels ! Gérez vos clients et
                commandes 3 fois plus rapidement qu'avec les méthodes
                traditionnelles.
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-cloud feature-icon"></i>
              <h3>Données sécurisées</h3>
              <p>
                Vos données sont sauvegardées automatiquement dans le cloud.
                Plus de risque de perte même si votre téléphone tombe en panne !
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-money-bill-wave feature-icon"></i>
              <h3>Meilleur suivi financier</h3>
              <p>
                Suivez facilement vos revenus, dépenses et bénéfices. Identifiez
                vos modèles les plus rentables en un coup d'œil.
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-mobile-alt feature-icon"></i>
              <h3>Travaillez hors connexion</h3>
              <p>
                L'application fonctionne même sans internet ! Vos données se
                synchronisent automatiquement dès que vous retrouvez une
                connexion.
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-users feature-icon"></i>
              <h3>Fidélisez vos clients</h3>
              <p>
                Gardez un historique détaillé de chaque client et de leurs
                préférences. Informez-les automatiquement quand leur commande
                est prête !
              </p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-star feature-icon"></i>
              <h3>Service client local</h3>
              <p>
                Une équipe 100% Burkinabè à votre écoute pour vous accompagner
                et vous former à l'utilisation de l'application.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="preview" class="preview">
        <div class="container">
          <h2 class="text-center mb-5">Aperçu de l'application</h2>
          <div class="row g-4">
            <div class="col-md-4">
              <img
                src="{{ asset('assets/images/ecran2.png') }}"
                alt="Écran de suivi des commandes"
                class="img-fluid rounded-3 shadow"
              />
              <p class="text-center mt-3">Écran de suivi des commandes</p>
            </div>
            <div class="col-md-4">
              <img
                src="{{ asset('assets/images/ecran3.png') }}"
                alt="Écran de mes clients"
                class="img-fluid rounded-3 shadow"
              />
              <p class="text-center mt-3">Écran de mes clients</p>
            </div>
            <div class="col-md-4">
              <img
                src="{{ asset('assets/images/ecran4.png') }}"
                alt="Écran pour la synchronisation"
                class="img-fluid rounded-3 shadow"
              />
              <p class="text-center mt-3">Écran pour la synchronisation</p>
            </div>
          </div>
        </div>
      </section>


      <section id="pricing" class="pricing">
        <div class="container">
          <h2 class="text-center mb-5">Choisissez votre formule</h2>
          <div class="row g-4">
            <!-- Essai Gratuit -->
            <div class="col-md-4">
              <div class="pricing-card">
                <h3>Essai Gratuit</h3>
                <div class="pricing-options">
                  <p class="price">Gratuit<span>/2 mois</span></p>
                </div>
                <p class="text-muted mb-4">Idéal pour découvrir l'application</p>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i> Commandes illimitées</li>
                    <li><i class="fas fa-check"></i> Rapports par mois</li>
                    <li><i class="fas fa-check"></i> Galerie photos illimitée</li>
                    <li><i class="fas fa-check"></i> Notifications WhatsApp clients</li>
                    <li><i class="fas fa-check"></i> 2h de formation incluse</li>
                </ul>
                <p class="text-success mb-4">✨ Essai gratuit pendant 2 mois !</p>
                <a href="#download" class="btn btn-outline-danger btn-lg">Commencer gratuitement</a>
              </div>
            </div>

            <!-- Plan Pro -->
            <div class="col-md-4">
              <div class="pricing-card featured">
                <div class="popular-badge">Plus populaire</div>
                <h3>Pro</h3>
                <div class="pricing-options">
                  <div class="monthly">
                    <p class="price">5 000 FCFA<span>/mois</span></p>
                    <small>ou</small>
                    <p class="annual-price text-success">
                      50 000 FCFA<span>/an</span>
                    </p>
                    <div class="savings-badge">Économisez 10 000 FCFA</div>
                  </div>
                </div>
                <p class="text-muted mb-4">Pour les ateliers en croissance</p>
                <ul class="feature-list">
                  <li><i class="fas fa-check"></i> Commandes limitées à 30</li>
                  <li><i class="fas fa-check"></i> Rapports par mois</li>
                  <li><i class="fas fa-check"></i> Galerie photos limitée</li>
                  <li><i class="fas fa-check"></i> Notifications WhatsApp clients</li>
                  <li><i class="fas fa-check"></i> 2h de formation incluse</li>
                  <li><i class="fas fa-check"></i> Support dédié 24/7</li>
                  <li><i class="fas fa-times text-danger"></i> Personnalisation de l'interface</li>
                  <li><i class="fas fa-times text-danger"></i> Rapports personnalisés</li>
                  <li><i class="fas fa-times text-danger"></i> Site web boutique incluse</li>
                </ul>
                <a href="https://wa.me/22656785580?text=Bonjour,%20je%20suis%20intéressé%20par%20le%20plan%20Pro." class="btn btn-primary btn-lg">Choisir Pro</a>
              </div>
            </div>

            <!-- Plan VIP -->
            <div class="col-md-4">
              <div class="pricing-card">
                <h3>VIP</h3>
                <div class="pricing-options">
                  <div class="monthly">
                    <p class="price">15 000 FCFA<span>/mois</span></p>
                    <small>ou</small>
                    <p class="annual-price text-success">
                      150 000 FCFA<span>/an</span>
                    </p>
                    <div class="savings-badge">Économisez 30 000 FCFA</div>
                  </div>
                </div>
                <p class="text-muted mb-4">Pour les grands ateliers</p>
                <ul class="feature-list">
                  <li><i class="fas fa-check"></i> Toutes les fonctionnalités Pro sans limites</li>
                  <li><i class="fas fa-check"></i> Personnalisation de l'interface</li>
                  <li><i class="fas fa-check"></i> Rapports personnalisés</li>
                  <li><i class="fas fa-check"></i> Site web boutique incluse</li>
                </ul>
                <a href="https://wa.me/22656785580?text=Bonjour,%20je%20suis%20intéressé%20par%20le%20plan%20VIP." class="btn btn-outline-danger btn-lg">Devenir VIP</a>
              </div>
            </div>
          </div>
        </div>
      </section>


    <section id="testimonials" class="testimonials">
      <div class="container">
        <h2 class="text-center mb-5">Ce que disent nos clients</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="testimonial-card">
              <img
                src="https://placeholderimage.eu/api/80/80"
                alt="Aminata K."
                class="rounded-circle"
              />
              <p>
                "Couturart a complètement transformé la gestion de mon atelier.
                Je gagne un temps précieux chaque jour."
              </p>
              <h4>Aminata K.</h4>
              <p class="text-muted">Styliste à Ouagadougou</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="testimonial-card">
              <img
                src="https://placeholderimage.eu/api/80/80"
                alt="Issouf T."
                class="rounded-circle"
              />
              <p>
                "Mes clients sont ravis de recevoir des notifications sur
                l'avancement de leurs commandes. C'est un vrai plus pour mon
                activité."
              </p>
              <h4>Issouf T.</h4>
              <p class="text-muted">Tailleur à Bobo-Dioulasso</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="testimonial-card">
              <img
                src="https://placeholderimage.eu/api/80/80"
                alt="Fatou S."
                class="rounded-circle"
              />
              <p>
                "Les statistiques m'aident à mieux comprendre mon activité et à
                prendre les bonnes décisions pour développer mon atelier."
              </p>
              <h4>Fatou S.</h4>
              <p class="text-muted">Créatrice de mode à Koudougou</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="download" class="cta">
        <div class="container text-center">
          <h2 class="mb-4">Téléchargez Couturart maintenant</h2>
          <p class="lead">Disponible sur Android, iOS, Web et PC</p>
          <div class="mt-4">
            <a href="#" class="btn btn-light btn-lg me-3 mb-3" onclick="confirmDownload(event, '{{ asset('version-app/couturart_v-2-2-0.apk') }}')">
              {{-- <i class="fab fa-google-play me-2"></i>Google Play --}}
              <i class="fab fa-android me-2"></i>Android
            </a>
            <a href="https://app-couturart.eliteero.com" target="_blank" class="btn btn-light btn-lg me-3 mb-3">
              <i class="fab fa-apple me-2"></i>Iphone
            </a>
            <a href="https://app-couturart.eliteero.com" target="_blank" class="btn btn-light btn-lg mb-3">
              <i class="fas fa-globe me-2"></i>Web & PC
            </a>
          </div>
        </div>
      </section>

    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5>À propos de Couturart</h5>
            <p>
              Couturart est la solution 100% Burkinabè pour les professionnels
              de la couture et de la mode.
            </p>
          </div>
          <div class="col-md-4">
            <h5>Liens rapides</h5>
            <ul class="list-unstyled">
              <li><a href="#features">Fonctionnalités</a></li>
              <li><a href="#preview">Aperçu</a></li>
              <li><a href="#pricing">Tarifs</a></li>
              <li><a href="#testimonials">Témoignages</a></li>
              <li><a href="#download">Télécharger</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h5>Contactez-nous</h5>
            <p>Email: contact@couturart.com<br />Tél: +226 56 78 55 80 /  +226 52 64 56 34</p>
            <div class="social-icons mt-3">
              <a href="#" class="me-2"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="me-2"><i class="fab fa-tiktok"></i></a>
            </div>
          </div>
        </div>
        <hr />
        <div class="text-center mt-3">
          <p>&copy; 2024 Couturart - Tous droits réservés</p>
        </div>
      </div>
    </footer>
    <script>
        function confirmDownload(event, url) {
          event.preventDefault(); // Empêche le lien de suivre son URL immédiatement
          const confirmation = confirm("Êtes-vous sûr de vouloir télécharger Couturart ?");
          if (confirmation) {
            window.location.href = url; // Redirige vers l'URL pour démarrer le téléchargement
          } else {
            console.log("Téléchargement annulé.");
          }
        }
      </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
