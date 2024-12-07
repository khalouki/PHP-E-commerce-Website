<?php
if (!empty($_COOKIE['user_email'])) {
        session_start();
}
else {
        session_destroy();
        header('Location: login_admin.php');
        exit(); // Toujours ajouter exit après une redirection pour s'assurer que le script s'arrête.
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/dashbord.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="images/admin.jpg" type="image/gif" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Admin Panel</title>
</head>
<body class="text-gray-800 font-inter">
    <!--sidenav -->
    <div class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <h2 class="font-bold text-2xl"><?php echo $_SESSION['nom'] ?> <span class="bg-[#bc6c25] text-white px-2 rounded-md">store</span></h2>
        </a>
        <ul class="mt-4">
            <span class="text-gray-400 font-bold">ADMIN</span>
            <li id="page1" class="mb-[7%] group">
                <a href="javascript:void()" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li  id="page2" class="mb-[7%] group">
                <a href="javascript:void()"  class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class='bx bx-store mr-3 text-lg'></i>                
                    <span class="text-sm">magasin</span>
                </a>
            </li>
            <li id="page3" class="mb-[7%] group">
                <a href="javascript:void()" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class='ri-truck-line mr-3 text-lg'></i>                
                    <span class="text-sm">Commande</span>
                </a>
            </li>
            <li id="page4" class="mb-[7%] group">
                <a href="javascript:void()" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class='bx bx-archive mr-3 text-lg'></i>                
                    <span class="text-sm">Historique</span>
                </a>
            </li> 
            <li id="page5" class="mb-[7%] group">
                <a href="javascript:void()" class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class='bx bx-envelope mr-3 text-lg' ></i>                
                    <span class="text-sm">Messages</span>
                    <span class=" md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-600 bg-green-200 rounded-full">2 New</span>
                </a>
            </li>
            <li class="flex flex-col justify-end  h-[13rem]">
                <form method="POST" action="php/login_php_script.php">
                    <button style="width:100%" name="logout"  class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer">
                        <i style="font-size: 28px;margin-right: 10px;" class="ri-logout-box-line"></i>
                        <h2>Déconncetion</h2>
                    </button>
                </form>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end sidenav -->
    <main style="background:#e3d5ca" class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <!-- navbar -->
        <div class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            <button type="button" class="text-lg text-gray-900 font-semibold sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="ml-auto flex items-center">
                <li class="dropdown ml-3"> 
                    <button type="button" class="dropdown-toggle flex items-center">
                        <div class="flex-shrink-0 w-10 h-10 relative">
                            <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                                <img class="w-8 h-8 rounded-full" src="images/admin.jpg" alt=""/>
                                <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping"></div>
                                <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                            </div>
                        </div>
                        <div class="p-2 md:block text-left">
                            <h2 class="text-sm font-semibold text-gray-800"><?php echo $_SESSION['nom'] ?></h2>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>                
                    </button>
                    <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Settings</a>
                        </li>
                        <li>
                            <form method="POST" action="login_form.php">
                                <button style="width:100%" name="logout"  class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer">
                                    <a role="menuitem"
                                            >
                                            Log Out
                                    </a>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- end navbar -->
        <!-- Content -->
        <div id="content" class="p-6">
            <?php include "statistique.php"?>
        </div>
        <div id="loading">
        <div class="spinner"></div>
        </div>
        <!-- End Content -->
    </main> 
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <!---------side bar code -------------------------->
    <script>
        // start: Sidebar
        const sidebarToggle = document.querySelector('.sidebar-toggle')
        const sidebarOverlay = document.querySelector('.sidebar-overlay')
        const sidebarMenu = document.querySelector('.sidebar-menu')
        const main = document.querySelector('.main')
        sidebarToggle.addEventListener('click', function (e) {
            e.preventDefault()
            main.classList.toggle('active')
            sidebarOverlay.classList.toggle('hidden')
            sidebarMenu.classList.toggle('-translate-x-full')
        })
        sidebarOverlay.addEventListener('click', function (e) {
            e.preventDefault()
            main.classList.add('active')
            sidebarOverlay.classList.add('hidden')
            sidebarMenu.classList.add('-translate-x-full')
        })
        document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (item) {
            item.addEventListener('click', function (e) {
                e.preventDefault()
                const parent = item.closest('.group')
                if (parent.classList.contains('selected')) {
                    parent.classList.remove('selected')
                } else {
                    document.querySelectorAll('.sidebar-dropdown-toggle').forEach(function (i) {
                        i.closest('.group').classList.remove('selected')
                    })
                    parent.classList.add('selected')
                }
            })
        })
        // end: Sidebar
        // start: Popper
        const popperInstance = {}
        document.querySelectorAll('.dropdown').forEach(function (item, index) {
            const popperId = 'popper-' + index
            const toggle = item.querySelector('.dropdown-toggle')
            const menu = item.querySelector('.dropdown-menu')
            menu.dataset.popperId = popperId
            popperInstance[popperId] = Popper.createPopper(toggle, menu, {
                modifiers: [
                    {
                        name: 'offset',
                        options: {
                            offset: [0, 8],
                        },
                    },
                    {
                        name: 'preventOverflow',
                        options: {
                            padding: 24,
                        },
                    },
                ],
                placement: 'bottom-end'
            });
        })
        document.addEventListener('click', function (e) {
            const toggle = e.target.closest('.dropdown-toggle')
            const menu = e.target.closest('.dropdown-menu')
            if (toggle) {
                const menuEl = toggle.closest('.dropdown').querySelector('.dropdown-menu')
                const popperId = menuEl.dataset.popperId
                if (menuEl.classList.contains('hidden')) {
                    hideDropdown()
                    menuEl.classList.remove('hidden')
                    showPopper(popperId)
                } else {
                    menuEl.classList.add('hidden')
                    hidePopper(popperId)
                }
            } else if (!menu) {
                hideDropdown()
            }
        })
        function hideDropdown() {
            document.querySelectorAll('.dropdown-menu').forEach(function (item) {
                item.classList.add('hidden')
            })
        }
        function showPopper(popperId) {
            popperInstance[popperId].setOptions(function (options) {
                return {
                    ...options,
                    modifiers: [
                        ...options.modifiers,
                        { name: 'eventListeners', enabled: true },
                    ],
                }
            });
            popperInstance[popperId].update();
        }
        function hidePopper(popperId) {
            popperInstance[popperId].setOptions(function (options) {
                return {
                    ...options,
                    modifiers: [
                        ...options.modifiers,
                        { name: 'eventListeners', enabled: false },
                    ],
                }
            });
        }
        // end: Popper
    </script>
    <!--///ajax script -->
    <script> 
            $(document).ready(function(){
                // Function to show loading splash
                function showLoading() {
                    $('#loading').show();
                }
                // Function to hide loading splash
                function hideLoading() {
                    $('#loading').hide();
                }
                // Function to load content via AJAX
                function loadContent(page) {
                    showLoading(); // Show loading splash
                    $.ajax({
                        url: page,
                        success: function (data) {
                            hideLoading(); // Hide loading splash
                            $('#content').html(data);
                
                            // Execute JavaScript code after loading content
                            // For example, if the loaded content contains JavaScript code, you can execute it here
                        },
                        error: function () {
                            hideLoading(); // Hide loading splash on error
                            alert('Error loading content.');
                        }
                    });
                }
                function loadScript(url, callback) {
                    var script = document.createElement('script');
                    script.src = url;
                    // Define a callback function for when the script is loaded
                    script.onload = callback;
                    document.body.appendChild(script);
                }
                // Click event for links
                $('#page1').click(function (e) {
                    e.preventDefault(); // Prevent default link behavior
                    loadContent('statistique.php'); // Load content from statistique.php
                });             
                $('#page2').click(function (e) {
                    e.preventDefault(); // Prevent default link behavior
                    showLoading(); // Show loading splash       
                    // Load content from add_prod.php
                    $.ajax({
                        url: 'produit_table_layout.php',
                        success: function (data) {
                            hideLoading(); // Hide loading splash
                            $('#content').html(data);
                
                            // Execute JavaScript code after loading content
                            loadScript('js/produit_table_crud.js', function() {
                           // Once script.js is loaded, execute its contents
                            initializeModalFunctionality();
                            
                         });
                            // For example, if the loaded content contains JavaScript code, you can execute it here
                        },
                        error: function () {
                            hideLoading(); // Hide loading splash on error
                            alert('Error loading content.');
                        }
                    });
                });
                $('#page3').click(function (e) {
                    e.preventDefault(); // Prevent default link behavior
                    showLoading(); // Show loading splash       
                    // Load content from add_prod.php
                    $.ajax({
                        url: 'commande_table_layout.php',
                        success: function (data) {
                            hideLoading(); // Hide loading splash
                            $('#content').html(data);
                             // Execute JavaScript code after loading content
                            loadScript('js/commande_table_layout.js', function() {
                                // Once script.js is loaded, execute its contents
                                initializecomandetable();
                            });
                        },
                        error: function () {
                            hideLoading(); // Hide loading splash on error
                            alert('Error loading content.');
                        }
                    });
                });
                $('#page4').click(function (e) {
                    e.preventDefault(); // Prevent default link behavior
                    showLoading(); // Show loading splash       
                    // Load content from add_prod.php
                    $.ajax({
                        url: 'historique_table_layout.php',
                        success: function (data) {
                            hideLoading(); // Hide loading splash
                            $('#content').html(data);
                             // Execute JavaScript code after loading content
                            loadScript('js/historique_table_layout.js', function() {
                                // Once script.js is loaded, execute its contents
                                initializehistotable();
                            });
                        },
                        error: function () {
                            hideLoading(); // Hide loading splash on error
                            alert('Error loading content.');
                        }
                    });
                });
                $('#page5').click(function (e) {
                    e.preventDefault(); // Prevent default link behavior
                    showLoading(); // Show loading splash       
                    // Load content from add_prod.php
                    $.ajax({
                        url: 'message_table_layout.php',
                        success: function (data) {
                            hideLoading(); // Hide loading splash
                            $('#content').html(data);
                             // Execute JavaScript code after loading content
                            loadScript('js/message_table_layout.js', function() {
                                // Once script.js is loaded, execute its contents
                                initializemessagetable();
                            });
                        },
                        error: function () {
                            hideLoading(); // Hide loading splash on error
                            alert('Error loading content.');
                        }
                    });
                });
                // Add more click events for other links if needed
            });
    </script>
    <!-- jQery -->
</body>
</html>
