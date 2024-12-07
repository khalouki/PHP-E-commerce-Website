/* swap betwen sign and log in */
document.addEventListener('DOMContentLoaded', function() {
    const loginBtn = document.getElementById('loginBtn');
    const signupBtn = document.getElementById('signupBtn');
    const loginSlide = document.getElementById('login');
    const signupSlide = document.getElementById('signup');
    // Function to switch to login form
    function showLogin() {
        loginSlide.classList.remove('hidden');
        signupSlide.classList.add('hidden');
    }

    // Function to switch to signup form
    function showSignup() {
        signupSlide.classList.remove('hidden');
        loginSlide.classList.add('hidden');
    }

    // Event listeners for switching between login and signup forms
    loginBtn.addEventListener('click', showLogin);
    signupBtn.addEventListener('click', showSignup);
});
/*       connection   php ajax      */
document.getElementById('login_forme').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    var formData = new FormData(this); // Get form data
    var xhr = new XMLHttpRequest(); // Create a new XMLHttpRequest object
    xhr.open('POST', 'php/login_php_script.php', true); // Specify the request method and URL
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) { // When the request is complete
            if (xhr.status === 200) { // If the request was successful
                var data = JSON.parse(xhr.responseText); // Parse the JSON response
                if (data.success) {
                        window.location.href = data.redirect; 
                } else {
                    // Show failure message with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'mot de pass ou email incorrect',
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
/*       Inscreption   php ajax      */
document.getElementById('sign_forme').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    var formData = new FormData(this); // Get form data
    var xhr = new XMLHttpRequest(); // Create a new XMLHttpRequest object
    xhr.open('POST', 'php/login_php_script.php', true); // Specify the request method and URL
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) { // When the request is complete
            if (xhr.status === 200) { // If the request was successful
                var data = JSON.parse(xhr.responseText); // Parse the JSON response
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'compte a été créé',
                        text: 'Très bien'
                        }).then((result) => {
                           if (result.isConfirmed) {
                               location.reload();
                              }
                         });
                } else {
                    // Show failure message with SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'password not similaire',
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
////////////////////////////////////////////////////
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const submitButton = document.getElementById('btn_log');
function checkInputs() {
    if (emailInput.value.trim() !== '' && passwordInput.value.trim() !== '') {
        submitButton.disabled = false;
        submitButton.textContent = 'Connection';
        submitButton.style.background="blue";
    } else {
        submitButton.disabled = true;
        submitButton.textContent = 'Remplir tout les Champs';
        submitButton.style.background="rgba(147, 197, 253, var(--tw-bg-opacity))"
    }
}
emailInput.addEventListener('input', checkInputs);
passwordInput.addEventListener('input', checkInputs);