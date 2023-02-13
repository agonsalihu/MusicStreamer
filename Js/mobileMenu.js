const mobileMenu = document.getElementById('mobileSidebar');
var open = false;

function openMenu() {
    mobileMenu.style.display = 'block';
    mobileMenu.style.width = '100%';
    mobileMenu.style.opacity = '1';
    // mobileMenu.style.width = '100%';
    open = true;
}

function closeMenu() {
    mobileMenu.style.display = 'none';
    mobileMenu.style.width = '0%';
    mobileMenu.style.opacity = '0';
    open = false;
}

