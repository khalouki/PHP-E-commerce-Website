function initializehistotable() {
    loadPage(1);
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
                } else {
                    console.error('Error:', xhr.statusText);
                }
            }
        };
        xhr.open('POST', 'pagination.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('table=historique&page=' + page);
    }
    // function to update table content
function open_delete(productId){
        var mod = document.getElementById("popup-modal");
        var btn=  document.getElementById("cmd_id");
        btn.setAttribute('value',productId);
        showModal(mod);
}
function closeModal(modal) {
    modal.classList.add("hidden");
}
function showModal(modal) {
    modal.classList.remove("hidden");
}
 //function to close delete modal
var closedeletebtn = document.getElementById("close_delete");
closedeletebtn.addEventListener("click", function () {
    var mod = document.getElementById("popup-modal");
    closeModal(mod);
});
function updateTable(productsData) {
    var tableBody = document.getElementById("table-historique");
    tableBody.innerHTML = ''; // Clear existing table content
    productsData.forEach(function(product, index) {
        // Create table cells for each product property
        var row = document.createElement('tr');
        row.className = 'bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600';
        ////////////////////////////////////
        var cell1 = document.createElement('td');
        cell1.scope = 'row';
        cell1.className = ' px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white';
        cell1.textContent = product.nom;
        row.appendChild(cell1);
        ////////////////////////////////////////
        var cell2 = document.createElement('td');
        cell2.scope = 'row';
        cell2.className = 'px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white';
        cell2.textContent = product.prenom;
        row.appendChild(cell2);
        //////////////////////////////////////
        var cell3 = document.createElement('td');
        cell3.className = ' px-6 py-4';
        cell3.textContent = product.ville;
        row.appendChild(cell3);
        //////////////////////////:
        var cell4 = document.createElement('td');
        cell4.className = ' px-6 py-4';
        cell4.textContent = product.phone;
        row.appendChild(cell4);

        var cell5 = document.createElement('td');
        cell5.className = ' px-6 py-4';
        cell5.textContent = product.adress;
        row.appendChild(cell5);
        // id product row
        var cell7 = document.createElement('td');
        cell7.className = ' id px-6 py-4';
        cell7.textContent = product.produit;
        row.appendChild(cell7);
        /////////////////////
        var cell8 = document.createElement('td');
        cell8.className = ' id px-6 py-4 hidden';
        cell8.textContent = product.id;
        row.appendChild(cell8);
        ////////////////////
        var cell9 = document.createElement('td');
        cell9.className = ' flex justify-center p-[21px]';
        var deleteButton = document.createElement('button');
        //deleteButton.className = 'open-delete_modal';
        deleteButton.innerHTML = '<i style="font-size: 26px; color: red;" class="ri-delete-bin-6-line"></i>';
        deleteButton.onclick = function(productId) {
                return function() {
                    // Call the open_delete function with the productId
                    open_delete(productId);
                };
        }(product.id);
        cell9.appendChild(deleteButton);
        row.appendChild(cell9);
        tableBody.appendChild(row);
    });
}
// function to update pagination pointer
function updatePagination(currentPage, totalPages) {
    var paginationContainer = document.getElementById('pagination_histo-links');
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
document.getElementById('delete_histo').addEventListener('submit', function(event) {
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
}