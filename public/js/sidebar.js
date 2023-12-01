const sidebarButton = document.getElementById('close-sidebar');
const sidebar = document.getElementsByClassName('bm-openednav')[0];
const chevron = document.querySelector('#close-sidebar i');
const item = document.getElementById('#nav-item-text');
const navbarLogo = document.getElementById('navbar-logo');

sidebarButton.addEventListener('click', function() {
    sidebar.classList.toggle('hide');
    
    if (chevron.classList.contains('bi-chevron-double-right')) {
        chevron.classList.remove('bi-chevron-double-right');
        chevron.classList.add('bi-chevron-double-left');
    } else {
        chevron.classList.remove('bi-chevron-double-left');
        chevron.classList.add('bi-chevron-double-right');
    }
    // checkImageWidth(navbarLogo);
});

// function checkImageWidth(imageElement) {
//     const lebarGambar = imageElement.width;

//     // Jika lebar gambar kurang dari 50px, ganti src
//     if (lebarGambar < 50) {
//         imageElement.src = '\images\BroMo Logografi.png'; // Ganti dengan nama file gambar yang baru
//     }
// }