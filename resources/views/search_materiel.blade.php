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
      <form class="search-form d-flex align-items-center" method="GET" action="{{ url('/search-materiel') }}">
        <input type="text" id="materiel_search" name="materiel_search" placeholder="Enter un mot clé" title="Enter search keyword" style="border: 2px solid rgb(255, 255, 255);" value="{{  $get_id }}">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
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
        <a class="nav-link  collapsed" href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-laptop"></i><span>Equipements</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse show " data-bs-parent="#sidebar-nav">
          <li>
            <a href="stock"  class="active">
              <i class="bi bi-circle"></i><span>Materiels</span>
            </a>
          </li>
          <li>
            <a href="accessoire" >
              <i class="bi bi-circle" ></i><span>Accessoires</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End equipements Nav -->

      
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
      <h1>Stock des materiels</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Materiels</a></li>
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
              <div style="display: flex; align-items: center;">
                <h5 class="card-title" style="margin-right: auto;">Materiels</h5>
            
                <form id="importForm" action="{{ route('importmateriel') }}" method="POST" enctype="multipart/form-data" style="margin-bottom: 0;">
                    @csrf
                    <input type="file" name="file" id="fileInput" style="display: none;">
                    <label for="fileInput" class="btn btn-outline-success btn-sm" style="margin-top: 0; margin-left: 10px;">
                        <i class="ri-file-excel-2-fill"></i> <span>Importer</span>
                    </label>
                    <button type="submit" style="display: none;">Importer</button>
                </form>
            
                <a href="{{ route('exportmateriel') }}" class="btn btn-outline-success btn-sm" style="margin-top: 0; margin-left: 10px;">
                    <i class="ri-file-excel-2-fill"></i> <span>Exporter</span>
                </a>
            </div>
            
              
					
             

             </div>
             <div id="search_list">
             <table class="table table-hover table-sm" style="table-layout: fixed; width: 100%;">
              <thead>
                  <tr>
                    
                    <th class="text-success text-center">Catégorie</th>
                    <th class="text-success text-center">Produit</th>
                    <th class="text-success text-center">Numéro de série</th>
                    <th class="text-success text-center">Caracteristique Tech</th>
                    <th class="text-success text-center">Statut</th>
                    <th class="text-success text-center">NetBios</th>
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
                   @if ($equip->type == 'materiel')
                     
               
                      <td class="text-overflow text-center">{{ $equip->categorie }}</td>
                      <td class="text-overflow text-center">{{ $equip->produit }}</td>
                      <td class="text-overflow text-center">{{ $equip->n_serie }}</td>
                      <td class="text-overflow text-center">{{ $equip->cracteristique_tech }}</td>
                      <td class="text-overflow text-center">{{ $equip->statut }}</td>
                      <td class="text-overflow text-center">{{ $equip->netbios }}</td>
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
                        <a href="#" class="delete text-success" data-toggle="modal" data-target="#consulter{{ $equip->id_equ}}">
                            <i class="bi bi-arrow-90deg-right"></i>
                        </a>
                    </div>
                    
                    <!-- Modal Ajout-->
                  <div class="modal fade" id="consulter{{ $equip->id_equ}}" tabindex="-1" aria-labelledby="consulterLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 text-success" id="exampleModalLabel"><i class="bi bi-card-heading"></i>  Informations sur le stock / {{ $equip->type}}</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form method="POST" action="{{ route('edit_materiel', $equip->id_equ) }}">
             
                            @csrf
                            @method('POST')
                           
                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-4">
                                   <div class="col-sm-6">
                                 <select class="form-select" id="type" name="type" style="width: 240px">
                                   
                                  <option value="materiel" {{ $equip->type == 'materiel' ? 'selected' : '' }}>materiel</option>
                                   <option value="accessoire" {{ $equip->type == 'accessoire' ? 'selected' : '' }}>accessoire</option>
                                  
                                 </select>
                                 </div>
                                </div>
                                    
                                
                                
                                  <label class="col-sm-2 col-form-label">Catégorie</label>
                                  <div class="col-sm-4">
                                    <div class="col-sm-6">
                                      <select class="form-select" id="categorie" name="categorie" style="width: 240px">
                                        <option disabled>Sélectionner une catégorie</option>
                                        <option disabled>Materiel</option>
                                        <option value="PC" {{ $equip->categorie == 'PC' ? 'selected' : '' }}>PC</option>
                                        <option value="Monitor" {{ $equip->categorie == 'Monitor' ? 'selected' : '' }}>Monitor</option>
                                        <option value="Printer" {{ $equip->categorie == 'Printer' ? 'selected' : '' }}>Printer</option>
                                        <option value="Scanner" {{ $equip->categorie == 'Scanner' ? 'selected' : '' }}>Scanner</option>
                                        <option value="Video projecteur" {{ $equip->categorie == 'Video projecteur' ? 'selected' : '' }}>Video projector</option>
                                        <option disabled>Accessoire</option>
                                        <option value="USB" {{ $equip->categorie == 'USB' ? 'selected' : '' }}>USB</option>
                                        <option value="Sac à dos" {{ $equip->categorie == 'Sac à dos' ? 'selected' : '' }}>Sac à dos</option>
                                        <option value="Souris sans fil" {{ $equip->categorie == 'Souris sans fil' ? 'selected' : '' }}>Souris sans fil</option>
                                        <option value="Souris avec fil" {{ $equip->categorie == 'Souris avec fil' ? 'selected' : '' }}>Souris avec fil</option>
                                        <option value="Chargeur 45W" {{ $equip->categorie == 'Chargeur 45W' ? 'selected' : '' }}>Chargeur 45W</option>
                                        <option value="Chargeur 65W" {{ $equip->categorie == 'Chargeur 65W' ? 'selected' : '' }}>Chargeur 65W</option>
                                      </select>
                                    </div>
                                  </div>
                                
                              </div>
                              <div class="row mb-3">
                                <label for="produit" class="col-sm-2 col-form-label">Produit</label>
                              <div class="col-sm-4">
                                <input type="text" id="produit" name="produit" class="form-control" value="{{ $equip->produit }}">
                              </div>
                                    
                              <label for="numero_serie" class="col-sm-2 col-form-label">Numéro de série</label>
                              <div class="col-sm-4">
                                <input type="text" id="numero_serie" name="numero_serie" class="form-control" value="{{ $equip->n_serie }}">
                              </div>
                                
                              </div>
                                
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label">Statut</label>
                                  <div class="col-sm-4">
                                    <div class="col-sm-6">
                                      <select class="form-select" id="statut" name="statut" style="width: 240px">
                                        <option value="In Use" {{ $equip->statut == 'In Use' ? 'selected' : '' }}>In Use</option>
                                        <option value="In Stock / Site" {{ $equip->statut == 'In Stock / Site' ? 'selected' : '' }}>In Stock / Site</option>
                                        <option value="In Stock / Munisys" {{ $equip->statut == 'In Stock / Munisys' ? 'selected' : '' }}>In Stock / Munisys</option>
                                        <option value="In Stock / Louis Rey" {{ $equip->statut == 'In Stock / Louis Rey' ? 'selected' : '' }}>In Stock / Louis Rey</option>
                                        <option value="In Maintenace" {{ $equip->statut == 'In Maintenace' ? 'selected' : '' }}>In Maintenace</option>
                                        <option value="Pending Install" {{ $equip->statut == 'Pending Install' ? 'selected' : '' }}>Pending Install</option>
                                        <option value="Retirement" {{ $equip->statut == 'Retirement' ? 'selected' : '' }}>Retirement</option>
                                        <option value="Stolen" {{ $equip->statut == 'Stolen' ? 'selected' : '' }}>Stolen</option>
                                        <option value="Don" {{ $equip->statut == 'Don' ? 'selected' : '' }}>Don</option>

                                      </select>
                                    </div>
                                  </div>
                                  <label for="prix" class="col-sm-2 col-form-label">Prix</label>
                                  <div class="col-sm-4">
                                    <input type="text" id="prix" name="prix" class="form-control" value="{{ $equip->prix }}">
                                  </div>
              
                            </div>
              
                            <div class="row mb-3">
                              <label for="cracteristique_tech" class="col-sm-2 col-form-label">Caractéristique Tech</label>
                            <div class="col-sm-4">
                              <input type="text" id="cracteristique_tech" name="cracteristique_tech" class="form-control" value="{{ $equip->cracteristique_tech }}">
                            </div>
                            <label for="netbios" class="col-sm-2 col-form-label">Netbios</label>
                            <div class="col-sm-4">
                              <input type="text" id="netbios" name="netbios" class="form-control"  value="{{ $equip->netbios }}">
                            </div>
                              
                            </div>
                            <div class="row mb-3">
                             
                              <label class="col-sm-2 col-form-label">Fournisseur</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" id="fournisseur" name="fournisseur" value="{{ $equip->fournisseur->nom_four ?? '' }}">
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
                              <input type="text" class="form-control input-disabled" id="nom_prenom" name="nom_prenom" value="{{ $equip->personne->nom_prenom ?? '' }}">
                            </div>
                            <label for="nom_prenom" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" id="username" name="username" value="{{ $equip->personne->username ?? '' }}">
                            </div>
                            
                          </div>
                          
                          <div class="row mb-3">
                            <label for="date_affectation" class="col-sm-2 col-form-label">Date d'affectation</label>
                            <div class="col-sm-4">
                              @if ($equip->affectations->isNotEmpty())
                              <input type="date" class="form-control" name="date_affectation" id="date_affectation" value="{{ $equip->affectations->first()->date_affectation }}">
                          @else
                              <input type="date" class="form-control" name="date_affectation" id="date_affectation" value="">
                          @endif
                           </div>
                            <label for="region" class="col-sm-2 col-form-label">Région</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="region" id="region" value="{{ $equip->personne->region ?? '' }}">
                            </div>
                           
                          </div>
                          
                          <div class="row mb-3">
                            <label for="direction" class="col-sm-2 col-form-label">Direction</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="direction" id="direction" value="{{ $equip->personne->direction ?? '' }}">
                            </div>
                            <label for="site" class="col-sm-2 col-form-label">Site</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="site" id="site" value="{{ $equip->personne->site ?? '' }}">
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
                                <input type="text" class="form-control" name="numeroC" id="numeroC" value="{{ $equip->bonCommande->id_com ?? '' }}">
                              </div>
                              <label for="dateBc" class="col-sm-2 col-form-label">Date BC</label>
                              <div class="col-sm-2">
                                <input type="date" class="form-control" name="dateBc" id="dateBc" value="{{ $equip->bonCommande->date_cm ?? '' }}">
                              </div>
                              <label for="QTC" class="col-sm-2 col-form-label">Quantité Commandé </label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" name="QTC" id="QTC" value="{{ $equip->bonCommande->qt_commande ?? '' }}">
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
                                  <input type="text" class="form-control" name="numeroL" id="numeroL" value="{{ $equip->bonLivraison->id_livre ?? '' }}">
                                </div>
                                <label for="dateBl" class="col-sm-2 col-form-label">Date BL</label>
                                <div class="col-sm-2">
                                  <input type="date" class="form-control" name="dateBl" id="dateBl" value="{{ $equip->bonLivraison->date_livre ?? '' }}">
                                </div>
                                <label for="QTL" class="col-sm-2 col-form-label">Quantité Livré </label>
                                <div class="col-sm-2">
                                  <input type="text" class="form-control" name="QTL" id="QTL" value="{{ $equip->bonLivraison->qt_livre ?? '' }}">
                                </div>
                                
                                </div>
                                <div class="modal-footer">
                            

                            <button class="btn btn-outline-primary btn-xs px-3" id="submit" type="submit">Modifier</button>
                            
                          </div>
                          <script>
                            document.addEventListener('DOMContentLoaded', function() {
                              var statut = document.getElementById('statut');
                              var username = document.getElementById('username');
                              var nom_prenom = document.getElementById('nom_prenom');
                              var date_affectation = document.getElementById('date_affectation');
                              var region = document.getElementById('region');
                              var direction = document.getElementById('direction');
                              var site = document.getElementById('site');
                              var cracteristique_tech = document.getElementById('cracteristique_tech');
                              var netbios = document.getElementById('netbios');
                          
                              statut.addEventListener('change', function() {
                                if (statut.value === 'In Use' || statut.value === 'In Maintenace' || statut.value === 'Pending Install' || statut.value === 'Retirement' || statut.value === 'Stolen' || statut.value === 'Don') {
                                  username.disabled = false;
                                  username.required = true;
                                  nom_prenom.disabled = false;
                                  nom_prenom.required = true;
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
                          
                             
                            });
                         </script>
                          </form><!-- End General Form Elements -->
                         
                      </div>
                    </div>
                  </div>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                  	
                 
                </tbody>
              </table>
            </div>
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
  <script src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>