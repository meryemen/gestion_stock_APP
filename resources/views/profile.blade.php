<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>It Asset Control-Profile-{{  $data->nom  }} {{ $data->prenom }}</title>
  <link href="assets/img/TYPOTYPE.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between ">
      <a href="dashboard" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block " style=" font-size: 20px; margin-left:30px">IT Asset Control</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center " method="POST" action="#">
        <input type="text" name="query" placeholder="Enter un mot clé" title="Enter search keyword" style="border: none; ">
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
        <a class="nav-link collapsed" href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-laptop"></i><span>Equipements</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="stock">
              <i class="bi bi-circle"></i><span>Materiels</span>
            </a>
          </li>
          <li>
            <a href="accessoire">
              <i class="bi bi-circle"></i><span>Accessoires</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End equipements Nav -->
        
      </li><!-- End Accessories Nav -->

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
        <a class="nav-link " href="profile">
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

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active"><a href="profile">Profile</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
     @if (session('success'))
       <div class="alert alert-success">
       {{ session('success') }}
      </div>
      @elseif (session('error'))
      <div class="alert alert-danger">
      {{ session('error') }}
      </div>
       
     @endif
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="css/profil.png" alt="Profile" class="rounded-circle">
              <h2 style="margin-bottom: 10px">{{ $data->nom }} {{ $data->prenom }}</h2>
              <h3>{{ $data->profil }}</h3>
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Cordonnées</button>
                </li>
                
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editer Profile</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer le mot de passe</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  

                  <h5 class="card-title">Profile </h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label "> Nom Complet :</div>
                    <div class="col-lg-9 col-md-8">{{ $data->nom }} {{ $data->prenom }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email :</div>
                    <div class="col-lg-9 col-md-8">{{ $data->email }}</div>
                  </div>

                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Fonction :</div>
                    <div class="col-lg-9 col-md-8">{{ $data->Fonction }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Site :</div>
                    <div class="col-lg-9 col-md-8">{{ $data->Site }}</div>
                  </div><div class="row">
                    <div class="col-lg-3 col-md-4 label">Region :</div>
                    <div class="col-lg-9 col-md-8">{{ $data->Region }}</div>
                  </div><div class="row">
                    <div class="col-lg-3 col-md-4 label">Direction :</div>
                    <div class="col-lg-9 col-md-8">{{ $data->Direction }}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->

                  <form action="{{ route('update-profil') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="css/profil.png" alt="Profile">
                        
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nom" class="col-md-4 col-lg-3 col-form-label">Nom :</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nom" type="text" class="form-control" disabled id="nom" value="{{ $data->nom }}" > 
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="prenom" class="col-md-4 col-lg-3 col-form-label">Prenom :</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="prenom" type="text" class="form-control" disabled id="prenom" value="{{ $data->prenom }}" > 
                        </div>
                      </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email :</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text" class="form-control" disabled id="email" value="{{ $data->email }}">
                      </div>
                    </div>
                    

                    <div class="row mb-3">
                      <label for="fonction" class="col-md-4 col-lg-3 col-form-label">Fonction :</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fonction" type="text" class="form-control" required id="fonction" value="{{ $data->Fonction }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="site" class="col-md-4 col-lg-3 col-form-label">Site</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="site" type="text" class="form-control" required id="site" value="{{ $data->Site }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="region" class="col-md-4 col-lg-3 col-form-label">Region :</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="region" type="text" class="form-control" required id="region" value="{{ $data->Region }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="direction" class="col-md-4 col-lg-3 col-form-label">Direction</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="direction" type="text" class="form-control" required id="direction" value="{{ $data->Direction }}">
                      </div>
                    </div>

                    
         

                    <div class="text-center">
                      <button type="submit" class="btn btn-outline-primary">Confirmer</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                 
                  <!-- Change Password Form -->
                  <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="currentPassword" type="password" class="form-control" requiredid="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau Mot de passe</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newPassword" type="password" class="form-control" required id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmer le nouveau mot de passe</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewPassword" type="password" class="form-control" required id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Confirmer</button>
                    </div>
                  </form><!-- End Change Password Form -->
               

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  

  

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