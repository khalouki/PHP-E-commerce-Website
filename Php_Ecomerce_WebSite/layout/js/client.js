document.addEventListener('DOMContentLoaded', function() {
  var productImages = document.querySelectorAll('.product-image');
  var productImageModal = document.getElementById('productImage');
  var productname = document.getElementById('title');
  productImages.forEach(function(image) {
  image.addEventListener('click', function() {
      var productImageSrc = image.getAttribute('data-product-details');
      var prod_name = image.getAttribute('name');
      productImageModal.setAttribute('src', productImageSrc);
      productname.setAttribute('value',prod_name);
  });
});
////verification ///////////////////
document.getElementById('myForm').addEventListener('submit', function(event) {
    // Empêcher le rechargement de la page par défaut
event.preventDefault();
var name = document.getElementById('name');
var email = document.getElementById('email');
var city = document.getElementById('ville');
var phone = document.getElementById('teliphone');
if (name.value.trim() === '') {
      name.classList.add('error-border');
} else {
      name.classList.remove('error-border');
}
if (email.value.trim() === '') {
      email.classList.add('error-border');
} else {
      email.classList.remove('error-border');
}
if (city.value.trim() === '') {
      city.classList.add('error-border');
  } else {
      city.classList.remove('error-border');
        }
  var phoneValue = phone.value.trim();
  if (phoneValue === '') {
      phone.classList.add('error-border');
      isValid = false;
      } else {
      // Vérifier si le numéro de téléphone commence par "06" et a 10 chiffres
      if (!/^06\d{8}$/.test(phoneValue)) {
      phone.classList.add('error-border');
      Swal.fire({
            title: "format de numero teliphone incorrecte",
          showClass: {
          popup: `
          animate__animated
          animate__fadeInUp
          animate__faster `
            },
          hideClass: {
          popup: `
          animate__animated
          animate__fadeOutDown
          animate__faster
  `
        }
}); 
      isValid = false;
      } else {
      phone.classList.remove('error-border');
      }
            }
  if (name.value.trim() === '' || email.value.trim() === '' || city.value.trim() === '' || phone.value.trim() === '') {
      Swal.fire({
        icon: "error",
        title: "Erreur",
        text: "remplir tout les champs!",
        });
        }
  });
});
// Récupérer une référence vers les champs de formulaire
var nom = document.getElementById('name');
var prenom = document.getElementById('prenom');
var ville = document.getElementById('ville');
var teliphone = document.getElementById('teliphone');
// Fonction pour vider les champs de formulaire
function clearFormFields() {
    nom.value = '';
  prenom.value = '';
  ville.value = '';
  teliphone.value = '';
}
// Détecter le clic en dehors de la modale pour vider les champs
window.addEventListener('click', function(event) {
  var modal = document.getElementById('myModal');
  if (event.target == modal) {
    clearFormFields();
  }
});
// Détecter le clic sur le bouton de fermeture (X) de la modale pour vider les champs
var closeModalBtn = document.querySelector('.close');
closeModalBtn.addEventListener('click', function() {
    clearFormFields();
});
///////////////////buy form code ///////////////////////:
document.getElementById('buy_form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    var formData = new FormData(this); // Get form data
    var xhr = new XMLHttpRequest(); // Create a new XMLHttpRequest object
    xhr.open('POST', 'php/client_php_requet.php', true); // Specify the request method and URL
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) { // When the request is complete
            if (xhr.status === 200) { // If the request was successful
                var data = JSON.parse(xhr.responseText); // Parse the JSON response
                if (data.success) {
                    // Show success message with SweetAlert
                    $('#productModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Excelent',
                        text: 'element commander!', 
                    });
                    
                } else {
                    // Show failure message with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Failure',
                        text: data.message
                    });
                }
            } else {
                console.error('Error:', xhr.statusText); // Log error message
            }
        }
    };
    xhr.onerror = function() {
        console.error('Error:', xhr.statusText); // Log error message
    };
    xhr.send(formData); // Send the form data 
});
////////////////////////header js/////////////////////////////
  // JavaScript to handle header movement with scroll
  var lastScrollTop = 0;
  var header = document.getElementById("main-header");
  var nav = document.getElementById("nv");
  window.addEventListener("scroll", function() {
      var currentScroll = window.pageYOffset || document.documentElement.scrollTop;
      var scrollDirection = currentScroll > lastScrollTop ? 'down' : 'up';
      // Move the header along with the scroll
      if (scrollDirection === 'down') {
          header.style.top = currentScroll + 'px';
      } else {
          header.style.top = Math.max(0, currentScroll) + 'px';
      }
        // Add or remove scrolled class based on scroll position
        if (currentScroll > 0) {
          nav.style.background="white";
          header.classList.add("mar");
      } else {
        nav.style.background="white";
        header.classList.remove("mar")
      }
      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
  });
  //section movement avec click on a
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
        });
    });
});
// client envoi un message
document.getElementById('message_forme').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
        var formData = new FormData(this); // Get form data
        var xhr = new XMLHttpRequest(); // Create a new XMLHttpRequest object
        xhr.open('POST', 'php/client_php_requet.php', true); // Specify the request method and URL
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) { // When the request is complete
                if (xhr.status === 200) { // If the request was successful
                    var data = JSON.parse(xhr.responseText); // Parse the JSON response
                    if (data.success) {
                        //libré les input
                        document.getElementById('nom_client').value="";
                        document.getElementById('teli_client').value="";
                        document.getElementById('email_client').value="";
                        document.getElementById('message_client').value="";
                        // Show success message with SweetAlert
                        $('#productModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Excelent',
                            text: 'message envoyer avec successé!', 
                        });
                        
                    } else {
                        // Show failure message with SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Failure',
                            text: data.message
                        });
                    }
                } else {
                    console.error('Error:', xhr.statusText); // Log error message
                }
            }
        };
        xhr.onerror = function() {
            console.error('Error:', xhr.statusText); // Log error message
        };
        xhr.send(formData); // Send the form data 
});
