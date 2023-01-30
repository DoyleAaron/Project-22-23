let vNav = document.querySelector('.vertical-nav');
let hamburger = document.querySelector('.ri-menu-line');

hamburger.onclick = function() {
    console.log('clicked');
    vNav.classList.toggle('active');
}