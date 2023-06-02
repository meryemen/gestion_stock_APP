<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>It Asset Control-Utilisateurs</title>
  <link href="assets/img/TYPOTYPE.png" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
      <form class="search-form d-flex align-items-center " method="GET" action="{{ url('/search-utilisateur') }}">
        <input type="text" name="user_search" id="user_search" placeholder="Enter un mot clé"  title="Enter search keyword" style="border: 2px solid rgb(255, 255, 255);">
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


        <li  class="nav-item dropdown pe-3">

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
              <hr class="dropdown-divider" >
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
      <h1>Utilisateurs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Comptes</a></li>
          <li class="breadcrumb-item">Utilisateurs</li>
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
              <h5 class="card-title" style="display: inline-block">Utilisateurs</h5>
             </div>
             <div id="search_list">
             <table class="table table-hover table-sm" style="table-layout: fixed; width: 100%;">
              <thead>
                  <tr>
                    
                    <th class="text-success">Nom</th>
                    <th class="text-success">Prénom</th>
                    <th class="text-success">Username</th>
                    <th class="text-success">Email</th>
                    <th class="text-success">Fonction</th>
                    <th class="text-success">Site</th>
                    <th class="text-success">Region</th>
                    <th class="text-success">Direction</th>
                    <th class="text-success">Profil</th>
                    @if ($data->manageUsers != 0)
                    <th class="text-success">Action</th>
                    @endif
                   @if ( $data->profil == 'Admin')
                   <th class="text-success">droit d'accès</th>
                   @elseif ($data->profil != 'Admin')
                   
                   @endif
                  
                  </tr>
                </thead>
                <tbody>
                    @foreach ($utilisateur as $user)
                  <tr>
                    
                    <td  class="text-overflow">{{ $user->nom }}</td>
                    <td class="text-overflow">{{ $user->prenom }}</td>
                    <td class="text-overflow">{{ $user->username }}</td>
                    <td class="text-overflow">{{ $user->email }}</td>
                    <td class="text-overflow">{{ $user->Fonction }}</td>
                    <td class="text-overflow">{{ $user->Site }}</td>
                    <td class="text-overflow">{{ $user->Region }}</td>
                    <td class="text-overflow">{{ $user->Direction }}</td>
                    <td class="text-overflow">{{ $user->profil }}</td>
                   
                      @if ($user->nom == 'Ihda')
                            @if ($data->manageUsers != 0)
                            <td class="text-overflow"> </td>
                            @elseif ($data->manageUsers == 0)

                            @endif
                           
                      @elseif($user->nom != 'Ihda' && $data->manageUsers != 0)
                      <td class="text-overflow"> 
                          <a  data-bs-toggle="modal" data-bs-target="#editModalUser{{ $user->id }}" class="edit text-success " data-utilisateur-nom="{{ $user->nom }}" data-utilisateur-id="{{ $user->id }}" data-utilisateur-prenom="{{ $user->prenom }}" data-utilisateur-email="{{ $user->email }}" data-utilisateur-username="{{ $user->username }}" data-utilisateur-fonction="{{ $user->Fonction }}" data-utilisateur-site="{{ $user->Site }}" data-utilisateur-region="{{ $user->Region }}" data-utilisateur-direction="{{ $user->Direction }}" ><i class="ri ri-pencil-fill"></i></a>
                          <a  data-bs-toggle="modal" data-bs-target="#deleteuserModal{{ $user->id }}" class="delete text-danger" data-utilisateur-nom="{{ $user->nom }}" data-utilisateur-prenom="{{ $user->prenom }}" data-utilisateur-id="{{ $user->id }}"><i class="bi bi-trash"></i></a>
                        </td> 
                      @endif
                   
                      @if ($user->nom == 'Ihda' && $data->profil == 'Admin')
                      <td class="text-overflow"></td> 
                      @elseif($user->nom != 'Ihda' && $data->profil == 'Admin')
                      <td class="text-overflow"> 
                      <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $user->id }}"><i class="bi bi-gear" style="float:center"></i></a>
                      </td>
                      @elseif($data->profil != 'Admin')

                      @endif
                 
                      <!-- edit user Modal -->
                      <div class="modal fade" id="editModalUser{{ $user->id }}" tabindex="-1" aria-labelledby="editModalUserLabel{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-success" id="editModalUserLabel{{ $user->id }}"><i class="ri ri-pencil-fill"></i>  Modifier</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('edit-utilisateur', $user->id) }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                  <label for="site" class="col-sm-2 col-form-label">Profil:</label>
                                  <div class="col-sm-4">
                                    <div class="col-sm-6">
                                  <select class="form-select" id="profil" name="profil" >
                                    
                                    <option value="Admin" @if($user->profil == 'Admin') selected @endif>Admin</option>
                                    <option value="Utilisateur" @if($user->profil == 'Utilisateur') selected @endif>Utilisateur</option>
                                   
                                  </select>
                                  </div>
                                 </div>
                                </div>
                                <nav>
                                  <ol class="breadcrumb">
                                    <li class="breadcrumb-item"> Données personnelles</li>
                                  </ol>
                                </nav>
                                  <div class="row mb-3">
                                    <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                                  <div class="col-sm-4">
                                    <input type="text" id="name{{ $user->id }}" name="nom" class="form-control">
                                  </div>
                                        
                                  <label for="prenom" class="col-sm-2 col-form-label">Prenom :</label>
                                  <div class="col-sm-4">
                                    <input type="text" id="pronoun{{ $user->id }}" name="prenom" class="form-control">
                                  </div>
                                    
                                  </div>
                                  <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label" >Username :</label>
                                  <div class="col-sm-4">
                                    <input type="text" id="nameuser{{ $user->id }}" name="username" class="form-control" >
                                  </div>
                                        
                                  <label for="email" class="col-sm-2 col-form-label">Email :</label>
                                  <div class="col-sm-4">
                                    <input type="text" id="mail{{ $user->id }}" name="email" class="form-control" >
                                  </div>
                                    
                                  </div>
                                  <div class="row mb-3">
                                    <label for="fonction" class="col-sm-2 col-form-label">Fonction:</label>
                                  <div class="col-sm-4">
                                    <input type="text" id="function{{ $user->id }}" name="fonction"  class="form-control">
                                  </div>
                                        
                                  <label for="site" class="col-sm-2 col-form-label">Site :</label>
                                  <div class="col-sm-4">
                                    <input type="text" id="sit{{ $user->id }}" name="site" class="form-control">
                                  </div>
                                    
                                  </div>
                                  <div class="row mb-3">
                                    <label for="region" class="col-sm-2 col-form-label">Region:</label>
                                  <div class="col-sm-4">
                                    <input type="text" id="Regi{{ $user->id }}" name="region" class="form-control">
                                  </div>
                                        
                                  <label for="direction" class="col-sm-2 col-form-label">Direction :</label>
                                  <div class="col-sm-4">
                                    <input type="text" id="direct{{ $user->id }}" name="direction" class="form-control">
                                  </div>
                                    
                                  </div>
                              
                              <script>
                                // Edit Modal
                              
                                document.querySelectorAll('.edit').forEach(function (element) {
                                  element.addEventListener('click', function () {
                                    var userNom = this.getAttribute('data-utilisateur-nom');
                                    var userId = this.getAttribute('data-utilisateur-id');
                                    var userprenom = this.getAttribute('data-utilisateur-prenom');
                                    var userEmail = this.getAttribute('data-utilisateur-email');
                                    var userUsername = this.getAttribute('data-utilisateur-username');
                                    var userFonction = this.getAttribute('data-utilisateur-fonction');
                                    var userSite = this.getAttribute('data-utilisateur-site');
                                    var userRegion = this.getAttribute('data-utilisateur-region');
                                    var userDirection = this.getAttribute('data-utilisateur-direction');
                              
                                    document.getElementById('name' + userId).value = userNom;
                                    document.getElementById('pronoun' + userId).value = userprenom;
                                    document.getElementById('nameuser' + userId).value = userUsername;
                                    document.getElementById('mail' + userId).value = userEmail;
                                    document.getElementById('function' + userId).value = userFonction;
                                    document.getElementById('sit' + userId).value = userSite;
                                    document.getElementById('Regi' + userId).value = userRegion;
                                    document.getElementById('direct' + userId).value = userDirection;
                                  });
                                });
                              </script>
                            </div>
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                              <button type="submit" class="btn btn-primary">Confirmer</button>
                            </div>
                          </div>
                        </form>
                        </div>
                      </div>

                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteuserModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteuserModalLabel{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-danger" id="deleteuserModalLabel{{ $user->id }}"> <i class="bi bi-trash"></i>  Suppression</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Êtes-vous sûr de supprimer l'utilisateur : <span id="utilisateurNom{{ $user->id }}"></span></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteuserPasswordModal{{ $user->id }}">Confirmer</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="modal fade" id="deleteuserPasswordModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteuserPasswordModalLabel{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-danger" id="deleteuserPasswordModalLabel{{ $user->id }}"> <i class="bi bi-lock"></i>  Confirmation du mot de passe</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('delete-utilisateur', $user->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="password" class="form-label">Mot de passe</label>
                                  <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      </a>
                    
                   <!-- Modal droits d'accès -->
                   <div class="modal fade" id="exampleModalCenter{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Droits d'accès</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">

                              
                              <form action="{{ route('droit-acces', $user->id) }}" method="POST">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="accessStock{{ $user->id }}" name="accessStock" value="1"  @if($user->accessStock == 1) checked @endif>
                                    <label class="form-check-label" for="accessStock{{ $user->id }}">Accès au stock des équipements</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="manageStock{{ $user->id }}" name="manageStock" value="1"  @if($user->manageStock == 1) checked @endif>
                                    <label class="form-check-label" for="manageStock{{ $user->id }}">Droits de gestion du stock</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="manageUsers{{ $user->id }}" name="manageUsers" value="1"  @if($user->manageUsers == 1) checked @endif>
                                    <label class="form-check-label" for="manageUsers{{ $user->id }}">Droit de gestion des utilisateurs</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="manageSuppliers{{ $user->id }}" name="manageSuppliers" value="1"  @if($user->manageSuppliers == 1) checked @endif>
                                    <label class="form-check-label" for="manageSuppliers{{ $user->id }}">Droit de gestion des fournisseurs</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                  </tr>
                  @endforeach
                  @if ($utilisateur->isEmpty())
                  <tr>
                      <span colspan="7" class="text-center">Aucun résultat trouvé.</span>
                  </tr>
                 @endif
                </tbody>
              </table>
            </div>
           @if ($data->manageUsers != 0)
           <button class="btn btn-outline-primary btn-sm " data-bs-toggle="modal" data-bs-target="#addModal" style="display: inline-block; float:right; margin-top:10px; padding:6px" ><i class="bi bi-plus"></i>Créer un utilisateur</button> 
           @endif
           
             
             
                  <!-- Modal Ajout-->
                  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 text-primary" id="addModalLabel"><i class="bi bi-plus"></i>Créer un utilisateur</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                         <form action="{{ route('ajout-utilisateur') }}" id="ajout-utilisateur-form" method="POST">
                          @csrf
                          <div class="row mb-3">
                          <label for="site" class="col-sm-2 col-form-label">Profil:</label>
                          <div class="col-sm-4">
                            <div class="col-sm-6">
                          <select class="form-select" id="profil" name="profil" >
                            
                            <option value="Admin">Admin</option>
                            <option value="Utilisateur">Utilisateur</option>
                           
                          </select>
                          </div>
                         </div>
                        </div>
                        <nav>
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"> Données personnelles</li>
                          </ol>
                        </nav>
                          <div class="row mb-3">
                            <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                          <div class="col-sm-4">
                            <input type="text" id="nom" name="nom"  class="form-control">
                          </div>
                                
                          <label for="prenom" class="col-sm-2 col-form-label">Prenom :</label>
                          <div class="col-sm-4">
                            <input type="text" id="prenom" name="prenom"  class="form-control">
                          </div>
                            
                          </div>
                          <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Username :</label>
                          <div class="col-sm-4">
                            <input type="text" id="username" name="username"  class="form-control">
                          </div>
                                
                          <label for="email" class="col-sm-2 col-form-label">Email :</label>
                          <div class="col-sm-4">
                            <input type="text" id="email" name="email"  class="form-control">
                            <span id="emailError" class="invalid-feedback" style="display: none;"></span>

                          </div>
                            
                          </div>
                          <div class="row mb-3">
                            <label for="fonction" class="col-sm-2 col-form-label">Fonction:</label>
                          <div class="col-sm-4">
                            <input type="text" id="fonction" name="fonction"  class="form-control">
                          </div>
                                
                          <label for="site" class="col-sm-2 col-form-label">Site :</label>
                          <div class="col-sm-4">
                            <input type="text" id="site" name="site"  class="form-control">
                          </div>
                            
                          </div>
                          <div class="row mb-3">
                            <label for="region" class="col-sm-2 col-form-label">Region:</label>
                          <div class="col-sm-4">
                            <input type="text" id="region" name="region"  class="form-control">
                          </div>
                                
                          <label for="direction" class="col-sm-2 col-form-label">Direction :</label>
                          <div class="col-sm-4">
                            <input type="text" id="direction" name="direction"  class="form-control">
                          </div>
                            
                          </div>
                          <nav>
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item">Mot de passe</li>
                            </ol>
                          </nav>
                          <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Mot de passe:</label>
                          <div class="col-sm-4">
                            <input type="password" id="password" name="password"  class="form-control">
                          </div>
                                
                          <label for="passwordconfirm" class="col-sm-2 col-form-label">Confirmer le mot de passe :</label>
                          <div class="col-sm-4">
                            <input type="password" id="passwordconfirm" name="passwordconfirm"  class="form-control">
                          </div>
                            
                          </div>
                        
                          
                       </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                          <button type="submit" id="btnAjouter" class="btn btn-primary">Ajouter</button>
                        </div>
                        <script>
                          document.getElementById('btnAjouter').addEventListener('click', function(event) {
                              event.preventDefault(); // Empêche le comportement par défaut du formulaire
                      
                              var emailInput = document.getElementById('email');
                              var emailError = document.getElementById('emailError');
                              var emailValue = emailInput.value;
                      
                              // Effectuer une requête AJAX pour vérifier l'unicité de l'e-mail
                              var xhr = new XMLHttpRequest();
                              xhr.open('GET', '/check-email/' + emailValue, true);
                              xhr.onreadystatechange = function() {
                                  if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                      var response = JSON.parse(xhr.responseText);
                                      if (response.exists) {
                                          // L'e-mail existe déjà dans la base de données, afficher l'erreur
                                          emailInput.classList.add('is-invalid');
                                          emailError.textContent = 'Cet e-mail existe déjà.';
                                          emailError.style.display = 'block';
                                      } else {
                                          // L'e-mail est unique, soumettre le formulaire
                                          document.getElementById('ajout-utilisateur-form').submit();
                                      }
                                  }
                              };
                              xhr.send();
                          });
                      </script>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="js/app.js"></script>



</body>

</html>