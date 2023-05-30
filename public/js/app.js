document.querySelectorAll('.delete').forEach(function(element) {
  element.addEventListener('click', function() {
      var UtilisateurNom = this.getAttribute('data-utilisateur-nom');
      var UtilisateurId = this.getAttribute('data-utilisateur-id');
      var UtilisateurPrenom = this.getAttribute('data-utilisateur-prenom');

      var utilisateurNomElement = document.querySelector('#utilisateurNom' + UtilisateurId);
      utilisateurNomElement.textContent = UtilisateurNom + " " +UtilisateurPrenom;
  });
});

// Edit Modal fournisseur

document.querySelectorAll('.edit').forEach(function(element) {
    element.addEventListener('click', function() {
      var fournisseurNom = this.getAttribute('data-fournisseur-nom');
      var fournisseurId = this.getAttribute('data-fournisseur-id');
      var fournisseurResponsable = this.getAttribute('data-fournisseur-responsable');
      var fournisseurEmail = this.getAttribute('data-fournisseur-email');
      var fournisseurAdresse = this.getAttribute('data-fournisseur-adresse');
      var fournisseurTeleSiege = this.getAttribute('data-fournisseur-tele_siege');
      var fournisseurTeleAgence = this.getAttribute('data-fournisseur-tele_agence');
  

      document.getElementById('fournisseur' + fournisseurId).value = fournisseurNom;
      document.getElementById('responsable' + fournisseurId).value = fournisseurResponsable;
      document.getElementById('email' + fournisseurId).value = fournisseurEmail;
      document.getElementById('adresse' + fournisseurId).value = fournisseurAdresse;
      document.getElementById('site' + fournisseurId).value = fournisseurTeleSiege;
      document.getElementById('agence' + fournisseurId).value = fournisseurTeleAgence;
    });
  });
  
//search function utilisateur
    $(document).ready(function(){
        $('#user_search').on('keyup',function(){
            var query= $(this).val(); 
            $.ajax({
              url:"search-utilisateur" ,
              type:"GET",
              data:{'search' : query},
              success:function(data){
                $('#search_list').html(data);
                $('#search_results table').addClass('table table-hover table-sm');
                $('#search_results td').addClass('text-overflow');
              }
            });
            //end of ajax call 
        });
    });
//search function fournisseur
    $(document).ready(function(){
      $('#fournisseur_search').on('keyup',function(){
          var query= $(this).val(); 
          $.ajax({
            url:"search-fournisseur" ,
            type:"GET",
            data:{'search' : query},
            success:function(data){
              $('#search_list').html(data);
              $('#search_results table').addClass('table table-hover table-sm');
              $('#search_results td').addClass('text-overflow');
            }
          });
          //end of ajax call 
      });
  });


  $(document).ready(function(){
    $('#materiel_search').on('keyup',function(){
        var query= $(this).val(); 
        $.ajax({
          url:"search-materiel" ,
          type:"GET",
          data:{'search' : query},
          success:function(data){
            $('#search_list').html(data);
            $('#search_results table').addClass('table table-hover table-sm');
            $('#search_results td').addClass('text-overflow');
          }
        });
        //end of ajax call 
    });
});

//creation d'un utilisateur
  function generateUsername() {

    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;

    var username = (nom.substring(0, 6) + prenom.substring(0, 2)).toLowerCase();

    document.getElementById('username').value = username;
  }

  document.getElementById('nom').addEventListener('input', generateUsername);
  document.getElementById('prenom').addEventListener('input', generateUsername);


//ajout d'un utilisateur
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('ajout-utilisateur-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var formControls = document.getElementsByClassName('form-control');
    for (var i = 0; i < formControls.length; i++) {
      formControls[i].classList.remove('is-invalid');
    }

    var password = document.getElementById('password').value;
    var passwordConfirm = document.getElementById('passwordconfirm').value;
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var fonction = document.getElementById('fonction').value;
    var site = document.getElementById('site').value;
    var region = document.getElementById('region').value;
    var direction = document.getElementById('direction').value;

    var isValid = true;

    if (password === '') {
      document.getElementById('password').classList.add('is-invalid');
      isValid = false;
    }

    if (passwordConfirm === '') {
      document.getElementById('passwordconfirm').classList.add('is-invalid');
      isValid = false;
    }

    if (nom === '') {
      document.getElementById('nom').classList.add('is-invalid');
      isValid = false;
    }

    if (prenom === '') {
      document.getElementById('prenom').classList.add('is-invalid');
      isValid = false;
    }

    if (username === '') {
      document.getElementById('username').classList.add('is-invalid');
      isValid = false;
    }

    if (site === '') {
      document.getElementById('site').classList.add('is-invalid');
      isValid = false;
    }
    if (fonction === '') {
      document.getElementById('fonction').classList.add('is-invalid');
      isValid = false;
    }

    if (region === '') {
      document.getElementById('region').classList.add('is-invalid');
      isValid = false;
    }

    if (direction === '') {
      document.getElementById('direction').classList.add('is-invalid');
      isValid = false;
    }

    /*var emailform = /^[A-Za-z0-9._%+-]+@external\.danone\.com$/;
    if (!emailform.test(email)) {
      document.getElementById('email').classList.add('is-invalid');
      isValid = false;
    }*/

    if (password !== passwordConfirm) {
      document.getElementById('password').classList.add('is-invalid');
      document.getElementById('passwordconfirm').classList.add('is-invalid');
      isValid = false;
    }

    if (isValid) {
      this.submit();
    }
  });
  var formInputs = document.getElementsByClassName('form-control');
  for (var i = 0; i < formInputs.length; i++) {
    formInputs[i].addEventListener('input', function() {
      this.classList.remove('is-invalid');
    });
  }
});




  


  



  

