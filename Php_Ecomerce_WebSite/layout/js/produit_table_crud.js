function initializeModalFunctionality() {
    loadPage(1);
    // Function to show modal
    function showModal(modal) {
        modal.classList.remove("hidden");
        //modal.style.opacity=1;
    }
    var cor = document.getElementById("corp");
    // Function to close modal
    function closeModal(modal) {
        modal.classList.add("hidden");
    }
    // Get close button element
    var closeBtn = document.querySelector(".modal .close");
    // Function to close modify modal
    closeBtn.addEventListener("click", function () {
        var modal = document.getElementById("crud-modal");
        closeModal(modal);
    });
    // Add click event listener to show_add modal
    var showAddBtn = document.getElementById("show_add");
    showAddBtn.addEventListener("click", function () {
        var mod = document.getElementById("ajout_produit");
        showModal(mod);
    });
    // Function to close ajoute produit modal
    var closeAddBtn = document.getElementById("close_add");
    closeAddBtn.addEventListener("click", function () {
        var mod = document.getElementById("ajout_produit");
        closeModal(mod);
    });
    //function to close delete modal
    var closedeletebtn = document.getElementById("close_delete");
    closedeletebtn.addEventListener("click", function () {
        var mod = document.getElementById("popup-modal");
        closeModal(mod);
    });
    // Save data to database
    document.getElementById('ajoute_produit_form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        var formData = new FormData(this); // Get form data
        var xhr = new XMLHttpRequest(); // Create a new XMLHttpRequest object
        xhr.open('POST', 'php/CRUD_ADMIN_PAGE.php', true); // Specify the request method and URL
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) { // When the request is complete
                if (xhr.status === 200) { // If the request was successful
                    var data = JSON.parse(xhr.responseText); // Parse the JSON response
                    if(data.validate_format==true){
                        if (data.success) {
                            // Show success message with SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Excelent',
                                text: 'Data saved successfully!',
                                onClose: function() {
                                    //effacer les ancien donné
                                    document.getElementById("nom_pro").value="";
                                    document.getElementById("prix_pro").value=" ";
                                    document.getElementById("contité_pro").value=" ";
                                    document.getElementById("image_pro").value=" ";
                                    // Hide the modal after clicking the alert
                                    var modal = document.getElementById("ajout_produit");
                                    closeModal(modal);
                                    loadPage(1);
                                }
                            });
                        } else {
                            // Show failure message with SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Failure',
                                text: data.message
                            });
                        }
                    }else{
                        document.getElementById("mes_nom").innerHTML=data.error_nom;
                        document.getElementById("mes_prix").innerHTML=data.error_prix;
                        document.getElementById("mes_contité").innerHTML=data.error_contité;
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
    //fonction pour modifier les donner 
    document.getElementById('modify_produit_form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        var formData = new FormData(this); // Get form data
        var xhr = new XMLHttpRequest(); // Create a new XMLHttpRequest object
        xhr.open('POST', 'php/CRUD_ADMIN_PAGE.php', true); // Specify the request method and URL
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) { // When the request is complete
                if (xhr.status === 200) { // If the request was successful
                    var data = JSON.parse(xhr.responseText); // Parse the JSON response
                    if (data.success) {
                        // Show success message with SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Excelent',
                            text: 'les donner sont modifier avec succé',
                            onClose: function() {
                                // Hide the modal after clicking the alert
                                var modal = document.getElementById("crud-modal");
                                closeModal(modal);
                                loadPage(1);
                            }
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
    //delete product
    function open_delete(productId){
        var mod = document.getElementById("popup-modal");
        var btn=  document.getElementById("cmd_id");
        btn.setAttribute('value',productId);
        showModal(mod);
    }
    document.getElementById('delete_produit_form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        var formData = new FormData(this); // Get form data
        var xhr = new XMLHttpRequest(); // Create a new XMLHttpRequest object
        xhr.open('POST', 'php/CRUD_ADMIN_PAGE.php', true); // Specify the request method and URL
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) { // When the request is complete
                if (xhr.status === 200) { // If the request was successful
                    var data = JSON.parse(xhr.responseText); // Parse the JSON response
                    if (data.success) {
                        // Show success message with SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Excelent',
                            text: 'les donner sont modifier avec succé',
                            onClose: function() {
                                // Hide the modal after clicking the alert
                                var modal = document.getElementById("popup-modal");
                                closeModal(modal);
                                loadPage(1);
                            }
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
    // Function to open the modify modal
    function opne_modify(){
        document.querySelectorAll('tr[data-product-id]').forEach(function(row) {
            row.addEventListener('click', function() {
                var nom_pro = row.querySelector('.nom').textContent;
                var prix_pro = row.querySelector('.prix').textContent;
                var catego_pro = row.querySelector('.cate').textContent;
                var conti_pro = row.querySelector('.contité').textContent;
                var id_pro = row.querySelector('.id').textContent;
                // Populate modal fields with the extracted data
                document.getElementById('nom').value = nom_pro;
                document.getElementById('contité').value = conti_pro;
                document.getElementById('category').value = catego_pro;
                document.getElementById('prix').value = prix_pro;
                document.getElementById('id_prod').value = id_pro;
                /* Show the modal
                var modal = document.getElementById('crud-modal');
                modal.classList.add('show');*/
            });    
        });
        // Get all modal buttons
        var modalBtns = document.querySelectorAll(".open-modal-btn");
        // Add click event listener to each modal button
        modalBtns.forEach(function (btn) {
            btn.addEventListener("click", function () {
                var modal = document.getElementById("crud-modal");
                showModal(modal);
            });
        });
    }
    function show_image(){
        document.querySelectorAll('tr[data-product-id]').forEach(function(row) {
            row.addEventListener('click', function() {
                var image_prod_path = row.querySelector('.imm').textContent;
                var nom_pro = row.querySelector('.nom').textContent;
                // Populate modal fields with the extracted data
                document.getElementById('image_ch').src =image_prod_path.slice(34) ;
                document.getElementById('title_img').textContent =nom_pro ;
            });    
        });
        // Get all modal buttons
        var modalBtns = document.querySelectorAll(".img-btn");
        // Add click event listener to each modal button
        modalBtns.forEach(function (btn) {
            btn.addEventListener("click", function () {
                var modal = document.getElementById("image_content");
                showModal(modal);
            });
        });
        var closeBtn = document.getElementById("close_img");
        closeBtn.addEventListener("click", function () {
        var modal = document.getElementById("image_content");
        closeModal(modal);
    });
    }
    ///ajax pour remplir le tableaud des produits /////////////
    function loadPage(page) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var productsData = response.products;
                    var total_pages = response.total_pages;
                    updateTable(productsData);
                    updatePagination(page, total_pages);
                    opne_modify();
                    show_image();
                } else {
                    console.error('Error:', xhr.statusText);
                }
            }
        };
        xhr.open('POST', 'pagination.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('table=produit&page=' + page);
    }
    // function to update table content
    function updateTable(productsData) {
        var tableBody = document.getElementById("table-pro");
        tableBody.innerHTML = ''; // Clear existing table content
        productsData.forEach(function(product, index) {
            var row = document.createElement('tr');
            row.setAttribute('data-product-id', index); // Set data-product-id attribute
            row.className = 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600';
            // Create table cells for each product property
            //affiche imga button
            var cell1 = document.createElement('td');
            cell1.style = 'display: flex; padding-block: 14px; padding-left: 18px; gap: 22px;';
            //cell1.className = 'w-4 p-4';
            var affiche_img = document.createElement('button');
            affiche_img.className = 'img-btn';
            affiche_img.innerHTML = '<i style="font-size: 26px; color: blue;"  class="ri-image-2-line"></i>';
            var img_path = document.createElement('p');
            img_path.className='hidden imm';
            img_path.textContent=product.image_prod;
            cell1.appendChild(affiche_img);
            cell1.appendChild(img_path);
            row.appendChild(cell1);
            ////////////////////////////////////////
            var cell2 = document.createElement('th');
            cell2.scope = 'row';
            cell2.className = 'nom px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white';
            cell2.textContent = product.nom;
            row.appendChild(cell2);
            //////////////////////////////////////
            var cell3 = document.createElement('td');
            cell3.className = 'prix px-6 py-4';
            cell3.textContent = product.prix;
            row.appendChild(cell3);
            var cell4 = document.createElement('td');
            cell4.className = 'cate px-6 py-4';
            cell4.textContent = product.catégorie;
            row.appendChild(cell4);
    
            var cell5 = document.createElement('td');
            cell5.className = 'contité px-6 py-4';
            cell5.textContent = product.contité;
            row.appendChild(cell5);
            var cell6 = document.createElement('td');
            cell6.style = 'display: flex; padding-block: 14px; padding-left: 18px; gap: 22px;';
            var editButton = document.createElement('button');
            editButton.className = 'open-modal-btn';
            editButton.innerHTML = '<i style="font-size: 26px; color: blue;" class="ri-edit-box-fill"></i>';
            var deleteButton = document.createElement('button');
            //deleteButton.className = 'open-delete_modal';
            deleteButton.innerHTML = '<i style="font-size: 26px; color: red;" class="ri-delete-bin-6-line"></i>';
            deleteButton.onclick = function(productId) {
                return function() {
                    // Call the open_delete function with the productId
                    open_delete(productId);
                };
            }(product.id);
            cell6.appendChild(editButton);
            cell6.appendChild(deleteButton);
            row.appendChild(cell6);
            // id product row
            var cell7 = document.createElement('td');
            cell7.className = 'hidden id px-6 py-4';
            cell7.textContent = product.id;
            row.appendChild(cell7);
            ///////////////affect row a table
            tableBody.appendChild(row);
        });
        
    }
    // function to update pagination pointer
    function updatePagination(currentPage, totalPages) {
        var paginationContainer = document.getElementById('pagination-links');
        paginationContainer.innerHTML = ''; // Clear existing pagination links
        
        // Create previous page link if current page is not the first page
        if (currentPage > 1) {
            var prevPageLink = createPaginationLink(currentPage - 1, 'Previous', 'rounded-l-lg');
            paginationContainer.appendChild(prevPageLink);
        }
        // Create page number links
        for (var i = 1; i <= totalPages; i++) {
            var pageLink = createPaginationLink(i, i);
            paginationContainer.appendChild(pageLink);
        }
    
        // Create next page link if current page is not the last page
        if (currentPage < totalPages) {
            var nextPageLink = createPaginationLink(currentPage + 1, 'Next', 'rounded-r-lg');
            paginationContainer.appendChild(nextPageLink);
        }
        // Add click event listeners to pagination links
        var paginationLinks = paginationContainer.querySelectorAll('a');
        paginationLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                var page = parseInt(this.getAttribute('data-page')); // Extract page number from data-page attribute
                loadPage(page); // Load the clicked page
            });
        });
    }
    // Helper function to create a pagination link
    function createPaginationLink(page, label, additionalClass = '') {
        var link = document.createElement('a');
        link.setAttribute('href', '#');
        link.setAttribute('data-page', page); // Set data-page attribute to store the page number
        link.className = 'flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 ' + additionalClass + ' hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white';
        
        if (label === 'Previous') {
            link.innerHTML = '<span class="sr-only">' + label + '</span><svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/></svg>';
        } else if (label === 'Next') {
            link.innerHTML = '<span class="sr-only">' + label + '</span><svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>';
        } else {
            link.innerHTML = '<span class="sr-only">' + label + '</span>' + page;
        }
        
        return link;
    }
    
    
}
