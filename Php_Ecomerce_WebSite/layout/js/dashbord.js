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
//////////////////ajax upload main content////////////:
////////////////////fulle screnn button ////////////:
const fullscreenButton = document.getElementById('fullscreen-button');
                
fullscreenButton.addEventListener('click', toggleFullscreen);
function toggleFullscreen() {
    if (document.fullscreenElement) {
        // If already in fullscreen, exit fullscreen
        document.exitFullscreen();
    } else {
        // If not in fullscreen, request fullscreen
        document.documentElement.requestFullscreen();
    }
}


