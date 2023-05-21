//fournisseur
// Delete Modal
document.querySelectorAll('.delete').forEach(function(element) {
    element.addEventListener('click', function() {
        var fournisseurNom = this.getAttribute('data-fournisseur-nom');
        var fournisseurId = this.getAttribute('data-fournisseur-id');

        document.getElementById('fournisseurNom' + fournisseurId).textContent = fournisseurNom;
    });
});


// Edit Modal

document.querySelectorAll('.edit').forEach(function(element) {
    element.addEventListener('click', function() {
      var fournisseurNom = this.getAttribute('data-fournisseur-nom');
      var fournisseurId = this.getAttribute('data-fournisseur-id');
      var fournisseurResponsable = this.getAttribute('data-fournisseur-responsable');
      var fournisseurEmail = this.getAttribute('data-fournisseur-email');
      var fournisseurAdresse = this.getAttribute('data-fournisseur-adresse');
      var fournisseurTeleSiege = this.getAttribute('data-fournisseur-tele_siege');
      var fournisseurTeleAgence = this.getAttribute('data-fournisseur-tele_agence');
  
      // Populate the form fields or perform any other desired actions for edit functionality
      document.getElementById('fournisseur' + fournisseurId).value = fournisseurNom;
      document.getElementById('responsable' + fournisseurId).value = fournisseurResponsable;
      document.getElementById('email' + fournisseurId).value = fournisseurEmail;
      document.getElementById('adresse' + fournisseurId).value = fournisseurAdresse;
      document.getElementById('site' + fournisseurId).value = fournisseurTeleSiege;
      document.getElementById('agence' + fournisseurId).value = fournisseurTeleAgence;
    });
  });
  


