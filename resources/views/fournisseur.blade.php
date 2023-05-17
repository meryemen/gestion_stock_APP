<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>It Asset Control-Fournisseur</title>
  <link href="assets/img/TYPOTYPE.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
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
  <header id="header" class="header fixed-top d-flex align-items-center" >

    <div class="d-flex align-items-center justify-content-between ">
      <a href="dashboard" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block " style=" font-size: 20px; margin-left:30px">IT Asset Control</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center " method="POST" action="#">
        <input type="text" name="query" placeholder="Enter un mot clé" title="Enter search keyword" style="border: 2px solid rgb(255, 255, 255);">
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
        <a class="nav-link collapsed" href="users-profile.html">
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
        <a class="nav-link collapsed" href="users-profile.html">
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

     

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Table des Fournisseurs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Fournisseur</a></li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if (session('success'))
      <div class="alert alert-success">
      {{ session('success') }}
      </div>
    @elseif (session('fail'))
    <div class="alert alert-danger">
      {{ session('fail') }}
      </div>
    @endif
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card ">
            <div class="card-body">
             <div >
              <h5 class="card-title" style="display: inline-block">Fournisseur</h5>
              
               
             

             </div>
             
              <table class="table table-hover table-sm"  style="table-layout: fixed; width: 100%;">
                <thead>
                  <tr>
                    
                    <th class="text-success">Fournisseur</th>
                    <th class="text-success">Responsable</th>
                    <th class="text-success">Email</th>
                    <th class="text-success">Adresse</th>
                    <th class="text-success">Téléphone-Site</th>
                    <th class="text-success">Téléphone-Agence</th>
                    <th class="text-success">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($fournisseur as $fourni)
                  <tr>
                     
                      <td>{{ $fourni->nom_four }}</td>
                      <td>{{ $fourni->responsable }}</td>
                      <td>{{ $fourni->email }}</td>
                      <td>{{ $fourni->adresse }}</td>
                      <td>{{ $fourni->tele_siege }}</td>
                      <td>{{ $fourni->tele_agence }}</td>
                      
                      <td>
                          <a href="#editEmployeeModal" class="edit text-warning"><i class="ri ri-pencil-fill"></i></a>
                          <a data-bs-toggle="modal" data-bs-target="#deleteModal{{ $fourni->id_fourni }}" class="delete text-danger " data-fournisseur-nom="{{ $fourni->nom_four }}" data-fournisseur-id="{{ $fourni->id_fourni }}"><i class="bi bi-trash"></i></a>
                      </td>
                  </tr>
              
                  <!-- Modal -->
                      <div class="modal fade" id="deleteModal{{ $fourni->id_fourni }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $fourni->id_fourni }}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel{{ $fourni->id_fourni }}"> <i class="bi bi-trash text-danger"></i> Suppression</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <span>Êtes vous sûr de supprimer le fournisseur : <span id="fournisseurNom{{ $fourni->id_fourni }}"></span></p>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                      <form action="{{ route('delete-fournisseur', $fourni->id_fourni ) }}" method="POST">
                                        @csrf
                                      <button type="submit" class="btn btn-danger">Confirmer</button>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach
                        </tbody>


                        <script>
                          document.querySelectorAll('.delete').forEach(function(element) {
                              element.addEventListener('click', function() {
                                  var fournisseurNom = this.getAttribute('data-fournisseur-nom');
                                  var fournisseurId = this.getAttribute('data-fournisseur-id');
                      
                                  document.getElementById('fournisseurNom' + fournisseurId).textContent = fournisseurNom;
                              });
                          });
                      </script>


                      </table>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right"><i class="bi bi-plus"></i>
                    Ajouter un fournisseur
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 text-primary" id="exampleModalLabel"><i class="bi bi-plus"></i>Ajout d'un fournisseur</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                         <form action="{{ route('ajout-fournisseur') }}" method="POST">
                          @csrf
                          
                          <div class="row mb-3">
                            <label for="fournisseur" class="col-sm-2 col-form-label">Fournisseur :</label>
                          <div class="col-sm-4">
                            <input type="text" id="fournisseur" name="fournisseur" required class="form-control">
                          </div>
                                
                          <label for="responsable" class="col-sm-2 col-form-label">Responsable :</label>
                          <div class="col-sm-4">
                            <input type="text" id="responsable" name="responsable" required class="form-control">
                          </div>
                            
                          </div>
                          <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email :</label>
                          <div class="col-sm-4">
                            <input type="text" id="email" name="email" required class="form-control">
                          </div>
                                
                          <label for="adresse" class="col-sm-2 col-form-label">Adresse :</label>
                          <div class="col-sm-4">
                            <input type="text" id="adresse" name="adresse" required class="form-control">
                          </div>
                            
                          </div>
                          <div class="row mb-3">
                            <label for="site" class="col-sm-2 col-form-label">Télephone-Site :</label>
                          <div class="col-sm-4">
                            <input type="text" id="site" name="site" required class="form-control">
                          </div>
                                
                          <label for="agence" class="col-sm-2 col-form-label">Télephone-Agence :</label>
                          <div class="col-sm-4">
                            <input type="text" id="agence" name="agence" required class="form-control">
                          </div>
                            
                          </div>
                       </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                          <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>


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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>