const sidebarButton = document.getElementById('close-sidebar');
const sidebar = document.getElementsByClassName('bm-openednav')[0];
const chevron = document.querySelector('#close-sidebar i');
const item = document.getElementById('nav-item-text');
const navbarLogo = document.getElementById('navbar-logo');

sidebarButton.addEventListener('click', function() {
    sidebar.classList.toggle('hide');
    
    if (chevron.classList.contains('bi-chevron-double-right')) {
        chevron.classList.remove('bi-chevron-double-right');
        chevron.classList.add('bi-chevron-double-left');
        
        setTimeout(function() {
            navbarLogo.src = "/images/BroMo Tipografi.png";
        }, 100);
    } else {
        chevron.classList.remove('bi-chevron-double-left');
        chevron.classList.add('bi-chevron-double-right');
        
        navbarLogo.src = "/images/BroMo Logografi.png";
    }
});
