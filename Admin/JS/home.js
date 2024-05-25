var header_left = document.querySelector('.menu-left');
var header_left_menu = document.querySelector('.header-left-menu');
header_left.addEventListener('click', function(){
    if (header_left_menu.style.display === 'none'){
        header_left_menu.style.display = 'block';
    } else {
        header_left_menu.style.display ='none';
    }
});

var menu_dropdowns = document.querySelectorAll('.menu-dropdown');

menu_dropdowns.forEach(function(menu_dropdown) {
    var dropdown = menu_dropdown.querySelector('.dropdown');
    menu_dropdown.addEventListener("click", function(){
        if (dropdown.style.display == 'none'){
            dropdown.style.display = 'block';
            dropdown.style.background = 'white';
        } else {
            dropdown.style.background = 'white';
            dropdown.style.display = 'none';
        }
    });
});

var close_menu = document.querySelector('.close-menu');
var header_left_menu = document.querySelector('.header-left-menu');
close_menu.addEventListener('click', function(){
    if (header_left_menu.style.display === 'none'){
        header_left_menu.style.display = 'block';
    } else {
        header_left_menu.style.display ='none';
    }
});