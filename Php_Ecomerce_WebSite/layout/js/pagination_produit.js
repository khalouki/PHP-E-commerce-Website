window.onload = function() {
    initializeModalFunctionality();
};
function showLoading() {
    $('#loading').show();
}
// Function to hide loading splash
function hideLoading() {
    $('#loading').hide();
}
function initializeModalFunctionality() {
    loadPage(1);
    // AJAX pour remplir le tableau des produits
    function loadPage(page) {
        showLoading();
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                hideLoading();
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var productsData = response.products;
                    var total_pages = response.total_pages;
                    updateTable(productsData);
                    updatePagination(page, total_pages);
                } else {
                    console.error('Error:', xhr.statusText);
                }
            }
        };
        xhr.open('GET', 'php/pagination_client_produit.php?page=' + page, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send();
       
    }
    //function de filter produit in client side page
    document.getElementById('search_prod').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        var formData = new FormData(this); // Get form data
        var xhr = new XMLHttpRequest(); // Create a new XMLHttpRequest object
        xhr.open('POST', 'php/filter_prod_client.php', true); // Specify the request method and URL
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var productsData = response.products;
                    var total_pages = response.total_pages;
                    updateTable(productsData);
                    updatePagination(page, total_pages);
                } else {
                    console.error('Error:', xhr.statusText);
                }
            }
        };
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(formData); // Send the form data
    }); 
    // Foction pour mettre à jour le contenu du tableau
    function updateTable(productsData) {
        var produit_body = document.getElementById("produit_table");
        produit_body.innerHTML = ''; // Effacer le contenu du tableau existant
        productsData.forEach(function(product, index) {
            // Créer un nouvel élément de ligne
            var row = document.createElement('div');
            row.className = 'col-md-6 col-lg-4';
            // Créer une boîte à l'intérieur de la ligne
            var box = document.createElement('div');
            box.className = 'card_produit box';
            box.id = 'box';
            // Créer une boîte d'image à l'intérieur de la boîte
            var imgBox = document.createElement('div');
            imgBox.className = 'img-box';
            // Créer un élément d'image à l'intérieur de la boîte d'image
            var img = document.createElement('img');
            img.src = product.image_prod.substring(34);
            img.alt = 'Produit';
            // Ajouter img à imgBox
            imgBox.appendChild(img);
            // Créer une boîte de détail à l'intérieur de la boîte
            var detailBox = document.createElement('div');
            detailBox.className = 'detail-box';
            // Créer un élément h5 à l'intérieur de detailBox
            var h5 = document.createElement('h5');
            h5.textContent = product.nom;
            // Ajouter h5 à detailBox
            detailBox.appendChild(h5);
            // Créer price_box à l'intérieur de detail-box
            var priceBox = document.createElement('div');
            priceBox.className = 'price_box';
            // Créer un élément h6 à l'intérieur de price_box
            var h6 = document.createElement('h6');
            h6.className = 'price_heading';
            h6.textContent = product.prix;
            var span = document.createElement('span');
            span.innerHTML = '&nbsp&nbsp&nbspDH';
            // Ajouter span à h6
            h6.appendChild(span);
            // Créer un élément p pour l'image du produit à l'intérieur de price_box
            var p = document.createElement('p');
            p.className = 'product-image';
            p.setAttribute('name', product.nom);
            p.setAttribute('data-product-details', product.image_prod.substring(34));
            p.setAttribute('data-toggle', 'modal');
            p.setAttribute('data-target', '#productModal');
            p.style.cursor = 'pointer';
            p.innerHTML = '<span class="animated-text">Acheter maintenant</span>';
            // Ajouter h6 et p à priceBox
            priceBox.appendChild(h6);
            priceBox.appendChild(p);
            // Ajouter imgBox, detailBox et priceBox à la boîte
            box.appendChild(imgBox);
            box.appendChild(detailBox);
            box.appendChild(priceBox);
            // Ajouter la boîte à la ligne
            row.appendChild(box);
            // Ajouter la ligne à votre conteneur (en supposant que votre conteneur ait un id de 'container')
            produit_body.appendChild(row);
        });

    }
    // Fonction pour mettre à jour la pagination
    function updatePagination(currentPage, totalPages) {
        var paginationContainer = document.getElementById('containe');
        paginationContainer.innerHTML = ''; // Efface les liens de pagination existants
        for (var i = 0; i < totalPages; i++) {
            var ligne = document.createElement('li');
            ligne.setAttribute("id", i + 1);
            ligne.className = "page-item" + (currentPage === i + 1 ? " active" : "");
            //ligne.style.cursor="pointer";
            var link_a = document.createElement('a');
            link_a.className = "page-link";
            link_a.textContent = i + 1;
            ligne.appendChild(link_a);
            paginationContainer.appendChild(ligne);
        }
        // Ajoute des écouteurs d'événements aux liens de pagination
        var paginationLinks = paginationContainer.querySelectorAll('a');
        paginationLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Empêche le comportement de lien par défaut
                var page = parseInt(this.textContent); // Extrait le numéro de page à partir du contenu du lien
                loadPage(page); // Charge la page cliquée
            });
        });
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
    }
    
}
