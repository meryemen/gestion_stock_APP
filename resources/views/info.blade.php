<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>It Asset Control-Ajout d'un equipement</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/TYPOTYPE.png" rel="icon">



  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-zo/xTlU8Tr3N7HkryELNcv+LwRtk/VXeq1FzU3a3jPupcK1do6tS1V43GUnnqQ2FV8sCvLj9JYdWfPQWljgnzA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.6.1/font/bootstrap-icons.min.css" integrity="sha512-cvjHJjONhj0xOy/cLpJQcuz4IVN9Yws/T+nAbdei98bGxRLvS9Hmy3MQLV8ZmIenbv+mEUpO8nUZUAG+ETph0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.snow.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.bubble.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/remixicon.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/simple-datatables/style.css') }}">


  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" >

    <div class="d-flex align-items-center justify-content-between ">
      <a href="dashboard" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block " style=" font-size: 20px; margin-left:30px">IT Asset Control</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center " method="POST" action="#">
        <input type="text" name="query" placeholder="Enter un mot clé" title="Enter search keyword" style="border: 2px solid rgb(252, 251, 251);">
        <button type="submit" title="Search"><i class="bi bi-search "></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="css/profil.png" alt="Profile" class="rounded-circle" style="margin-right: 5px">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ $data->nom }} {{ $data->prenom }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ $data->nom }} {{ $data->prenom }}</h6>
              <span>{{ $data->profil }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Paramètre du compte</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout">
                <i class="bi bi-box-arrow-left"></i>
                <span>Se deconnecter</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="stock">
          <i class="bi bi-laptop"></i>
          <span>Materiels</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="accessoire">
          <i class="bi bi-usb-drive"></i>
          <span>Accessoires</span>
        </a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="fournisseur">
          <i class="bi bi-person-lines-fill"></i>
          <span>Fournisseurs</span>
        </a>
      </li>


      <li class="nav-heading">Compte</li>

      


      <li class="nav-item">
        <a class="nav-link collapsed" href="utilisateurs">
          <i class="bi bi-people"></i>
          <span>Utilisateurs</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="historique">
          <i class="bi bi-clock-history"></i>
          <span>Historique</span>
        </a>
      </li>

     
      <li class="nav-item">
        <a class="nav-link collapsed" href="logout">
          <i class="bi bi-box-arrow-left"></i>
          <span>Se deconnecter</span>
        </a>
      </li><!-- End Contact Page Nav -->
      <li class="nav-item">
        <img src="unnamed.png" alt="" style="width:90%; position: absolute; bottom: 0;">
      </li>
     

    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div >

        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Information</li>
                </ol>
              </nav>
            </div>
            <!-- General Form Elements -->
            <form method="POST" action="{{ route('ajout-equipement') }}">
             
              @csrf
              @method('POST')
              @if (Session::has('success'))
              <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Type</label>
                  <div class="col-sm-4">
                     <div class="col-sm-6">
                   <select class="form-select" id="type" name="type">
                     
                     <option value="materiel">materiel</option>
                     <option value="accessoire">accessoire</option>
                    
                   </select>
                   </div>
                  </div>
                      
                  
                  
                    <label class="col-sm-2 col-form-label">Catégorie</label>
                    <div class="col-sm-4">
                      <div class="col-sm-6">
                        <select class="form-select" id="categorie" name="categorie">
                          <option disabled selected>Sélectionner une catégorie</option>
                          <option disabled >Materiel</option>
                          <option value="PC">PC</option>
                          <option value="Monitor">Monitor</option>
                          <option value="Printer">Printer</option>
                          <option value="Scanner">Scanner</option>
                          <option value="Video projecteur">Video projector</option>
                          <option disabled>Accessoire</option>
                          <option value="USB">USB</option>
                          <option value="Sac à dos">Sac à dos</option>
                          <option value="Souris sans fil">Souris sans fil</option>
                          <option value="Souris avec fil">Souris avec fil</option>
                          <option value="Chargeur 45W">Chargeur 45W</option>
                          <option value="Chargeur 65W">Chargeur 65W</option>
                        </select>
                      </div>
                    </div>
                  
                </div>
                <div class="row mb-3">
                  <label for="produit" class="col-sm-2 col-form-label">Produit</label>
                <div class="col-sm-4">
                  <input type="text" id="produit" name="produit" class="form-control">
                </div>
                      
                <label for="numero_serie" class="col-sm-2 col-form-label">Numéro de série</label>
                <div class="col-sm-4">
                  <input type="text" id="numero_serie" name="numero_serie" class="form-control">
                </div>
                  
                </div>
                  
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Statut</label>
                    <div class="col-sm-4">
                      <div class="col-sm-6">
                        <select class="form-select" id="statut" name="statut">
                          <option disabled selected>Sélectionner un statut</option>
                          <option value="In Use" >In Use</option>
                          <option value="In Stock / Site" >In Stock / Site</option>
                          <option value="In Stock / Munisys">In Stock / Munisys</option>
                          <option value="In Stock / Louis Rey">In Stock / Louis Rey</option>
                          <option value="In Maintenace">In Maintenace</option>
                          <option value="Pending Install">Pending Install</option>
                          <option value="Retirement">Retirement </option>
                          <option value="Stolen">Stolen</option>
                          <option value="Don">Don</option>
                        </select>
                      </div>
                    </div>
                    <label for="prix" class="col-sm-2 col-form-label">Prix</label>
                    <div class="col-sm-4">
                      <input type="text" id="prix" name="prix" class="form-control">
                    </div>

              </div>

              <div class="row mb-3">
                <label for="cracteristique_tech" class="col-sm-2 col-form-label">Caractéristique Tech</label>
              <div class="col-sm-4">
                <input type="text" id="cracteristique_tech" name="cracteristique_tech" class="form-control">
              </div>
              <label for="netbios" class="col-sm-2 col-form-label">Nebios</label>
              <div class="col-sm-4">
                <input type="text" id="netbios" name="netbios" class="form-control">
              </div>
                
              </div>
              <div class="row mb-3">
               
                <label class="col-sm-2 col-form-label">Fournisseur</label>
                <div class="col-sm-4">
                  <div class="col-sm-6">
                    <select class="form-select" name="fournisseur" id="fournisseur">
                      @foreach ($fournisseur as $fourn )
                      <option value="{{ $fourn }}" >{{ $fourn }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
              </div>

              <div class="card-title">
              
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Affectation</li>
                </ol>
              </nav>
            </div>
            
            <div class="row mb-3">
              <label for="nom_prenom" class="col-sm-2 col-form-label">Nom & Prenom</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="nom_prenom" name="nom_prenom">
              </div>
              <label for="nom_prenom" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="username" name="username">
              </div>
              
            </div>
            
            <div class="row mb-3">
              <label for="date_affectation" class="col-sm-2 col-form-label">Date d'affectation</label>
              <div class="col-sm-4">
                <input type="date" class="form-control" name="date_affectation" id="date_affectation">
              </div>
              <label for="region" class="col-sm-2 col-form-label">Région</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="region" id="region">
              </div>
             
            </div>
            
            <div class="row mb-3">
              <label for="direction" class="col-sm-2 col-form-label">Direction</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="direction" id="direction">
              </div>
              <label for="site" class="col-sm-2 col-form-label">Site</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="site" id="site">
              </div>
              </div>
              <div class="card-title">
              
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">  Bon de commande</li>
                  </ol>
                </nav>
              </div>
              <div class="row mb-3">
                <label for="numeroC" class="col-sm-2 col-form-label">Numéro de BC </label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" name="numeroC" id="numeroC">
                </div>
                <label for="dateBc" class="col-sm-2 col-form-label">Date BC</label>
                <div class="col-sm-2">
                  <input type="date" class="form-control" name="dateBc" id="dateBc">
                </div>
                <label for="QTC" class="col-sm-2 col-form-label">Quantité Commandé </label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" name="QTC" id="QTC">
                </div>
                
                </div>
                <div class="card-title">
              
                  <nav>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">  Bon de livraison</li>
                    </ol>
                  </nav>
                </div>
                <div class="row mb-3">
                  <label for="numeroL" class="col-sm-2 col-form-label">Numéro de BL </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="numeroL" id="numeroL">
                  </div>
                  <label for="dateBl" class="col-sm-2 col-form-label">Date BL</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control" name="dateBl" id="dateBl">
                  </div>
                  <label for="QTL" class="col-sm-2 col-form-label">Quantité Livré </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="QTL" id="QTL">
                  </div>
                  
                  </div>
              <button class="btn btn-outline-primary btn-xs px-3" id="submit" type="submit">Ajouter</button>

            </form><!-- End General Form Elements -->
           <script>
               document.addEventListener('DOMContentLoaded', function() {
                var username = document.getElementById('champ1');
                var nom_prenom = document.getElementById('nom_prenom');
                var username = document.getElementById('username');
                var date_affectation = document.getElementById('date_affectation');
                var region = document.getElementById('region');
                var direction = document.getElementById('direction');
                var site = document.getElementById('site');
                var cracteristique_tech = document.getElementById('cracteristique_tech');
                var netbios = document.getElementById('netbios');

              statut.addEventListener('change', function() {
                if (statut.value === 'In Use' || statut.value === 'In Maintenace' ||statut.value === 'Pending Install'|| statut.value === 'Retirement'|| statut.value === 'Stolen' || statut.value === 'Don' ) {
                  username.disabled = false;
                  username.required = true;
                  nom_prenom.disabled = false;
                  nom_prenom.required = true;
                  username.disabled = false;
                  username.required = true;
                  date_affectation.disabled = false;
                  date_affectation.required = true;
                  region.disabled = false;
                  region.required = true;
                  direction.disabled = false;
                  direction.required = true;
                  site.disabled = false;
                  site.required = true;
                } else {
                  username.disabled = true;
                  username.required = false;
                  nom_prenom.disabled = true;
                  nom_prenom.required = false;
                  username.disabled = true;
                  username.required = false;
                  date_affectation.disabled = true;
                  date_affectation.required = false;
                  region.disabled = true;
                  region.required = false;
                  direction.disabled = true;
                  direction.required = false;
                  site.disabled = true;
                  site.required = false;
                }
              });
              type.addEventListener('change', function() {
                if(type.value == 'materiel'){
                  cracteristique_tech.required= true;
                  cracteristique_tech.disabled= false;
                  netbios.required= true;
                  netbios.disabled= false;
                }else{
                  cracteristique_tech.required= false;
                  cracteristique_tech.disabled= true;
                  netbios.required= false;
                  netbios.disabled= true;
                }
              });
               });

           </script>
            
            
            
          </div>
        </div>

      </div>
  </main>

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>