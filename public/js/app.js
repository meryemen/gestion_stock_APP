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





  


  



  
