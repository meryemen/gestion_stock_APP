<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">



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
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" style="margin-right: 5px">
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
        <a class="nav-link collapsed" href="users-profile.html">
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-9">
    <div class="row">
    <!-- Sales Card -->
    <div class="col-xxl-4 col-md-6">
      <div class="card info-card sales-card"  style="border-radius: 15px;">

        <div class="card-body">
          <h5 class="card-title">Materiels </h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-laptop display-6 text-danger"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $materiel }}</h6>
              <span class="text-secondary">| in use </span>
            </div>
          </div>
        </div>

      </div>
    </div><!-- End Sales Card -->
  
    <!-- Revenue Card -->
    <div class="col-xxl-4 col-md-6">
      <div class="card info-card revenue-card "  style="border-radius: 15px;">


        <div class="card-body">
          <h5 class="card-title">Accessoires   
         </h5>

          <div class="d-flex align-items-center col">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-headset display-6 text-success"></i>
            </div>
          
            <div class="ps-3">
              <h6>{{ $accessoire }}</h6>
              <span class="text-secondary">| in use </span>
            </div>
          </div>
        </div>

      </div>
    </div><!-- End Revenue Card -->

    <!-- Customers Card -->
    <div class="col-xxl-4 col-xl-12">

      <div class="card info-card customers-card"  style="border-radius: 15px;">


        <div class="card-body">
          <h5 class="card-title">Utilisateurs </h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people display-6 text-primary"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $user }}</h6>
            </div>
          </div>

        </div>
      </div>

    </div><!-- End Customers Card -->
    
  </div>
</div>
 <div class="row">
    <div class="col-lg-6">
      <div class="card"  style="border-radius: 15px;">
        <div class="card-body">
          <h5 class="card-title">Materiels</h5>
          
          <!-- Pie Chart -->
          <div id="pieChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
             var inuse = {{ $inuse ?? 0 }};
             var munisys = {{ $munisys ?? 0 }};
             var louisrey = {{ $louisrey ?? 0 }};
             var site = {{ $site ?? 0 }};
             var maintenance = {{ $maintenance ?? 0 }};
             var pending = {{ $pending ?? 0 }};
             var retirement = {{ $retirement ?? 0 }};
             var stolen = {{ $stolen ?? 0 }};
             var don = {{ $don ?? 0 }};
              
              echarts.init(document.querySelector("#pieChart")).setOption({
                title: {
                  text: 'Statut',
                  
                  left: 'center'
                },
                tooltip: {
                  trigger: 'item'
                },
                legend: {
                  orient: 'vertical',
                  left: 'left'
                },
                series: [{
                  name: 'Quantité',
                  type: 'pie',
                  radius: '50%',
                  data: [{
                      value: inuse,
                      name: 'In Use'
                    },
                    {
                      value: munisys,
                      name: 'In Stock / Munisys'
                    },
                    {
                      value: louisrey,
                      name: 'In Stock / Louis Rey'
                    },
                    {
                      value: site,
                      name: 'In Stock / Site'
                    },
                    {
                      value: maintenance,
                      name: 'In Maintenace'
                    },
                    {
                      value: pending,
                      name: 'Pending Install'
                    },
                    {
                    value: retirement,
                      name: 'Retirement'
                    },
                    {
                    value: stolen,
                      name: 'Stolen'
                    },
                    {
                    value: don,
                      name: 'Don'
                    }
                    
                  ],
                  emphasis: {
                    itemStyle: {
                      shadowBlur: 10,
                      shadowOffsetX: 0,
                      shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                  }
                }]
              });
            });
          </script>
          <!-- End Pie Chart -->

        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Equipements <span>| Quantité </span></h5>
          <!-- Polar Area Chart -->
          <canvas id="polarAreaChart" style="max-height: 400px;"></canvas>
          <script>
            document.addEventListener("DOMContentLoaded", () => {
              var materiel = {{ $materiel ?? 0 }};
              var access = {{ $access ?? 0 }};
              new Chart(document.querySelector('#polarAreaChart'), {
                type: 'polarArea',
                data: {
                  labels: [
                    'Materiels',
                    'Accessoires',
                    
                  ],
                  datasets: [{
                    label: 'Quantité',
                    data: [materiel, access],
                    backgroundColor: [
                      'rgb(255, 99, 132)',
                      'rgb(75, 192, 192)',
                     
                    ]
                  }]
                }
              });
            });
          </script>
          <!-- End Polar Area Chart -->

        </div>
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