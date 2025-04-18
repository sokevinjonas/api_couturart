<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
          Couturart - Simplifiez et modernisez votre activité grâce à une application intuitive et performante
        </title>

        <!-- Métadonnées SEO -->
        <meta name="description" content="Couturart est une application intuitive et performante pour moderniser votre activité. Découvrez des fonctionnalités simplifiées pour une gestion optimale de votre entreprise." />
        <meta name="keywords" content="Couturart, application de gestion, activité, moderne, intuitive, performance" />
        <meta name="robots" content="index, follow" />

        <!-- Open Graph (OG) pour l'intégration sur les réseaux sociaux -->
        <meta property="og:title" content="Couturart - Simplifiez et modernisez votre activité grâce à une application intuitive et performante" />
        <meta property="og:description" content="Couturart est une application intuitive et performante pour moderniser votre activité. Découvrez des fonctionnalités simplifiées pour une gestion optimale de votre entreprise." />
        <meta property="og:image" content="{{asset('assets/images/icon.jpg')}}" /> <!-- Remplace par l'URL de ton image pour la carte -->
        <meta property="og:url" content="https://couturart.eliteero.com/" /> <!-- Remplace par l'URL de ton site -->
        <meta property="og:type" content="website" />

        <!-- Twitter Card (pour Twitter) -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Couturart - Simplifiez et modernisez votre activité grâce à une application intuitive et performante" />
        <meta name="twitter:description" content="Couturart est une application intuitive et performante pour moderniser votre activité. Découvrez des fonctionnalités simplifiées pour une gestion optimale de votre entreprise." />
        <meta name="twitter:image" content="{{asset('assets/images/icon.jpg')}}" /> <!-- Remplace par l'URL de ton image pour la carte -->

        <!-- Lien vers Bootstrap et Font Awesome -->
        <link
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
          rel="stylesheet"
        />
        <link
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          rel="stylesheet"
        />

        <!-- Lien vers ton CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
      </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{asset('assets/images/icon.jpg')}}" alt="Couturart Logo" class="logo" />
          Couturart - Gestion de couture
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
            <h1>Modernisez votre atelier de couture</h1>
            <p class="lead">
              Avec <strong>Couturart</strong>, adoptez un logiciel de gestion moderne pour votre activité de couture. Gérez commandes, mesures et finances en toute simplicité.
            </p>
            <a href="#download" class="btn btn-primary btn-lg mt-3">Essai gratuit de 30 jours</a>
          </div>
          
          
          <div class="col-lg-6 mt-3">
            <iframe width="350" height="250" 
                src="https://www.youtube.com/embed/wqkBO4f6lVk" 
                title="YouTube video player" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" 
                allowfullscreen>
            </iframe>
        </div>
        
        </div>
      </div>
    </header>

    <section id="features" class="features">
      <div class="container">
        <h2 class="text-center mb-5">Transformez votre atelier en référence d'excellence</h2>
        <div class="row g-4">
    
          <!-- Carte 1 -->
          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-bolt feature-icon"></i>
              <h3>Boostez votre performance</h3>
              <p>
                Libérez-vous des cahiers de notes et des méthodes dépassées. Avec CouturArt, vous gagnez un temps précieux pour créer, innover et atteindre de nouveaux sommets.
              </p>
            </div>
          </div>
    
          <!-- Carte 2 -->
          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-cloud feature-icon"></i>
              <h3>Valorisez votre expertise</h3>
              <p>
                Vos données, c'est votre savoir-faire. CouturArt sécurise chaque information, vous permettant de briller et de démontrer votre professionnalisme sans compromis.
              </p>
            </div>
          </div>
    
          <!-- Carte 3 -->
          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-money-bill-wave feature-icon"></i>
              <h3>Maîtrisez votre succès</h3>
              <p>
                Prenez le contrôle de vos finances et transformez votre atelier en une véritable machine à profits. Suivez vos revenus et dépenses pour prendre des décisions qui boostent votre rentabilité.
              </p>
            </div>
          </div>
    
          <!-- Carte 4 -->
          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-mobile-alt feature-icon"></i>
              <h3>Opérez en toute liberté</h3>
              <p>
                Ne laissez jamais une connexion limiter votre ambition. Utilisez CouturArt hors ligne et restez maître de votre atelier, où que vous soyez, quand vous le souhaitez.
              </p>
            </div>
          </div>
    
          <!-- Carte 5 -->
          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-users feature-icon"></i>
              <h3>Fidélisez et impressionnez</h3>
              <p>
                Offrez à vos clients une expérience inoubliable. Grâce à un suivi personnalisé et un historique complet, montrez-leur à quel point vous valorisez leur confiance et faites d’eux vos ambassadeurs.
              </p>
            </div>
          </div>
    
          <!-- Carte 6 -->
          <div class="col-md-4">
            <div class="feature-card">
              <i class="fas fa-star feature-icon"></i>
              <h3>Accompagnement sur-mesure</h3>
              <p>
                Rejoignez l'élite des professionnels du secteur. Notre équipe locale 100% Burkinabè est à vos côtés pour vous former, vous conseiller et faire de votre atelier un véritable symbole d’excellence.
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
                src="{{ asset('assets/images/image_1.png') }}"
                alt="Écran de suivi des commandes"
                class="img-fluid rounded-3 shadow"
              />
              <p class="text-center mt-3">Page Inscription/Connexion</p>
            </div>
            <div class="col-md-4">
              <img
                src="{{ asset('assets/images/image_2.png') }}"
                alt="Écran de mes clients"
                class="img-fluid rounded-3 shadow"
              />
              <p class="text-center mt-3">Page Accueil</p>
            </div>
            <div class="col-md-4">
              <img
                src="{{ asset('assets/images/image_3.png') }}"
                alt="Écran pour la synchronisation"
                class="img-fluid rounded-3 shadow"
              />
              <p class="text-center mt-3">Page Rdv/Commandes</p>
            </div>
          </div>
        </div>
      </section>


      <section id="pricing" class="pricing">
        <div class="container">
          <h2 class="text-center mb-5">Choisissez votre formule</h2>
          <div class="row g-4">
            <!-- Plan Essentiel -->
            <div class="col-md-6">
              <div class="pricing-card">
                <h3>Essentiel</h3>
                <div class="pricing-options">
                  <p class="price">30 000 FCFA<span>/an</span></p>
                </div>
                <p class="text-muted mb-4">Idéal pour une gestion simple et efficace</p>
                <ul class="feature-list">
                  <li><i class="fas fa-check"></i> Gestion des mesures et commandes</li>
                  <li><i class="fas fa-check"></i> Historique client local (stocké sur l’appareil)</li>
                  <li><i class="fas fa-check"></i> Utilisation hors ligne</li>
                  <li><i class="fas fa-times text-danger"></i> Sauvegarde en ligne des données</li>
                  <li><i class="fas fa-times text-danger"></i> Notifications (SMS ou application)</li>
                  <li><i class="fas fa-times text-danger"></i> Suivi financier</li>
                  <li><i class="fas fa-times text-danger"></i> Rapports ou analyses avancées</li>
                </ul>
                <a href="https://wa.me/22656785580?text=Bonjour,%20je%20souhaite%20m'abonner%20au%20plan%20Essentiel." class="btn btn-outline-danger btn-lg">Choisir Essentiel</a>
              </div>
            </div>

            <!-- Plan Standard -->
            <div class="col-md-6">
              <div class="pricing-card featured">
                <div class="popular-badge">Plus populaire</div>
                <h3>Standard</h3>
                <div class="pricing-options">
                  <p class="price">60 000 FCFA<span>/an</span></p>
                </div>
                <p class="text-muted mb-4">Parfait pour une gestion avancée et sécurisée</p>
                <ul class="feature-list">
                  <li><i class="fas fa-check"></i> Toutes les fonctionnalités du plan Essentiel</li>
                  <li><i class="fas fa-check"></i> Sauvegarde en ligne des données</li>
                  <li><i class="fas fa-check"></i> Synchronisation entre appareils</li>
                  <li><i class="fas fa-check"></i> Notifications automatiques dans l’application</li>
                  <li><i class="fas fa-check"></i> Suivi financier détaillé</li>
                  <li><i class="fas fa-check"></i> Notifications SMS (100 sms gratuits)</li>
                  {{-- <li><i class="fas fa-check"></i> Rapports mensuels sur revenus et bénéfices</li> --}}
                  {{-- <li><i class="fas fa-times text-danger"></i> Notifications SMS (option disponible)</li> --}}
                </ul>
                <a href="https://wa.me/22656785580?text=Bonjour,%20je%20souhaite%20m'abonner%20au%20plan%20Standard." class="btn btn-primary btn-lg">Choisir Standard</a>
              </div>
            </div>
          </div>
        </div>
      </section>



      <section id="testimonials" class="testimonials">
        <div class="container">
          <h2 class="text-center mb-5">Ce que disent nos clients</h2>
          <div class="row">
            <!-- Burkina Faso -->
            <div class="col-md-4">
              <div class="testimonial-card">
                <p>
                  "Couturart a complètement transformé la gestion de mon atelier. Je gagne un temps précieux chaque jour."
                </p>
                <h4>Aminata K.</h4>
                <p class="text-muted">Styliste à Ouagadougou, Burkina Faso</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="testimonial-card">
                <p>
                  "Mes clients sont ravis de recevoir des notifications sur l'avancement de leurs commandes. C'est un vrai plus pour mon activité."
                </p>
                <h4>Issouf T.</h4>
                <p class="text-muted">Tailleur à Bobo-Dioulasso, Burkina Faso</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="testimonial-card">
                <p>
                  "Les statistiques m'aident à mieux comprendre mon activité et à prendre les bonnes décisions pour développer mon atelier."
                </p>
                <h4>Fatou S.</h4>
                <p class="text-muted">Créatrice de mode à Koudougou, Burkina Faso</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="testimonial-card">
                <p>
                  "Avec Couturart, j'ai pu améliorer la relation avec mes clients. Ils se sentent mieux suivis et plus satisfaits."
                </p>
                <h4>Moussa Z.</h4>
                <p class="text-muted">Couturier à Banfora, Burkina Faso</p>
              </div>
            </div>

            <!-- Mali -->
            <div class="col-md-4">
              <div class="testimonial-card">
                <p>
                  "Depuis que j'utilise Couturart, mon atelier est beaucoup mieux organisé, et mes revenus ont augmenté."
                </p>
                <h4>Awa D.</h4>
                <p class="text-muted">Styliste à Bamako, Mali</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="testimonial-card">
                <p>
                  "L'application est simple et efficace. Je ne peux plus m'en passer pour gérer les commandes de mes clients."
                </p>
                <h4>Abdoulaye K.</h4>
                <p class="text-muted">Tailleur à Sikasso, Mali</p>
              </div>
            </div>

            <!-- Bénin -->
            <div class="col-md-4">
              <div class="testimonial-card">
                <p>
                  "Couturart m'a permis de digitaliser mes processus. C'est un outil indispensable pour tout couturier professionnel."
                </p>
                <h4>Judith A.</h4>
                <p class="text-muted">Couturière à Cotonou, Bénin</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="testimonial-card">
                <p>
                  "Grâce à cette application, je gère mes finances plus facilement, et je peux me concentrer sur mon travail."
                </p>
                <h4>Mathieu E.</h4>
                <p class="text-muted">Créateur de mode à Porto-Novo, Bénin</p>
              </div>
            </div>

            <!-- Côte d'Ivoire -->
            <div class="col-md-4">
              <div class="testimonial-card">
                <p>
                  "Je suis impressionné par la simplicité d'utilisation et les fonctionnalités proposées. C'est un vrai changement pour mon atelier."
                </p>
                <h4>Koffi N.</h4>
                <p class="text-muted">Tailleur à Abidjan, Côte d'Ivoire</p>
              </div>
            </div>
          </div>
        </div>
      </section>

    <section id="download" class="cta">
        <div class="container text-center">
          <h2 class="mb-4">Téléchargez Couturart maintenant</h2>
          <div class="mt-4">
            <a href="https://play.google.com/store/apps/details?id=bf.couturart.com" target="_blank" class="btn btn-light btn-lg me-3 mb-3">
              <i class="fab fa-google-play me-2"></i>PlayStore
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
              <li><a href="#" onclick="confirmDownload(event, '{{ asset('version-app/couturart-v-4-6.apk') }}')">.</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h5>Contactez-nous</h5>
            <p>Email: sokevin7@gmail.com<br />Tél: +226 56 78 55 80 /  +226 52 64 56 34</p>
            <div class="social-icons mt-3">
              <a href="https://www.facebook.com/profile.php?id=61568132046099&mibextid=ZbWKwL" target="_blank"  class="me-2"><i class="fab fa-facebook-f"></i></a>
              <a href="https://www.tiktok.com/@couturartofficiel" target="_blank"  class="me-2"><i class="fab fa-tiktok"></i></a>
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
