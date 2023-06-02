<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>It Asset Control-Stock-materiel</title>
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

    <div class="pagetitle">
      <h1>Stock des accessoires</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Accessoires</a></li>
          <li class="breadcrumb-item">Stock</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
      
      @if (Session::has('fail'))
      <div class="alert alert-danger">{{ Session::get('fail') }}</div>
     @endif
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card ">
            <div class="card-body">
             <div >
              <h5 class="card-title" style="display: inline-block">Accessoires</h5>
              
                <a href="#addEmployeeModal" class="btn btn-outline-success btn-sm " style="float:right;margin-top: 15px"><i class="ri-file-excel-2-fill"></i> <span>Importer </span></a>
                <a href="{{ route('exporter') }}" class="btn btn-outline-success btn-sm " style="float:right;margin-top: 15px; margin-right: 10px"><i class="ri-file-excel-2-fill"></i> <span>Exporter</span></a>						
             

             </div>
             
             <table class="table table-hover table-sm" style="table-layout: fixed; width: 100%;">
              <thead>
                  <tr>
                    <th class="text-success text-center ">Catégorie</th>
                    <th class="text-success text-center">Produit</th>
                    <th class="text-success text-center">Numéro de série</th>
                    <th class="text-success text-center">Statut</th>
                    <th class="text-success text-center">Nom & Prénom</th>
                    <th class="text-success text-center">Site</th>
                    <th class="text-success text-center">Région</th>
                    <th class="text-success text-center">Direction</th>
                    <th class="text-success text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($equipments as $equip)
                  <tr>
                    
                    @if ($equip->type == 'accessoire')
                    <td  class="text-overflow text-center">{{ $equip->categorie }}</td>
                    <td  class="text-overflow text-center">{{ $equip->produit }}</td>
                    <td  class="text-overflow text-center">{{ $equip->n_serie }}</td>
                    <td  class="text-overflow text-center">{{ $equip->statut }}</td>
                    @if($equip->personne)
                    <td class="text-overflow text-center">{{ $equip->personne->nom_prenom}}</td>
                    <td class="text-overflow text-center">{{ $equip->personne->site }}</td>
                    <td class="text-overflow text-center">{{ $equip->personne->region }}</td>
                    <td class="text-overflow text-center">{{ $equip->personne->direction }}</td>
                    @else
                    <td class="text-overflow text-center"></td>
                    <td class="text-overflow text-center"></td>
                    <td class="text-overflow text-center"></td>
                    <td class="text-overflow text-center"></td>
                    @endif
                    
                    <td class="text-overflow">
                      <div class="text-center">
                        
                        <a href="info_equipement" class="delete text-success">
                          <i class="bi bi-arrow-90deg-right"></i>
                        </a>
                      </div>
                      </a>
                    </td>
                    @endif
                    @endforeach
                  </tr>
                  
                  	
                 
                </tbody>
              </table>
             <a href="formulaire"><button class="btn btn-outline-primary btn-sm "  style="display: inline-block; float:right; margin-top:10px; padding:6px" ><i class="bi bi-plus"></i> Ajouter un equipement</button></a> 
             
             
            

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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>