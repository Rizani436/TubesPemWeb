var header_left = document.querySelector('.menu-left');
var header_left_menu = document.querySelector('.header-left-menu');
var content = document.querySelector('.content');
var box_item = document.querySelectorAll('.box-item');
var box = document.querySelector('.box');
var judul_header = document.querySelector('.judul-header p');

header_left.addEventListener('click', function(){
    if (header_left_menu.style.display === 'none'){
        header_left_menu.style.display = 'block';
        // content.style.marginLeft = '20px';
        content.style.marginLeft = '350px';
        box.style.width = '1100px';
        judul_header.style.marginLeft = '230px';
        box_item.forEach(function(box_item) {
            box_item.style.width = '300px';
            box_item.style.height = '200px';
        });
    } else {
        header_left_menu.style.display ='none';
        box.style.width = '1500px';
        judul_header.style.marginLeft = '0px';
        content.style.marginLeft = '20px';
        box_item.forEach(function(box_item) {
            box_item.style.width = '250px';
            box_item.style.height = '230px';
        });
    }
});

var mengelola_sistem = document.querySelector('.header-left-menu .menu-bottom > ul > .menu-dropdown:nth-child(4) > button');
var memverifikasi_informasi = document.querySelector('.header-left-menu .menu-bottom > ul > .menu-dropdown:nth-child(3) > button');
var menu_dropdowns = document.querySelectorAll('.menu-dropdown');

menu_dropdowns.forEach(function(menu_dropdown) {
    var dropdown = menu_dropdown.querySelector('.dropdown');
    menu_dropdown.addEventListener("click", function(){
        if (dropdown.style.display == 'none'){
            dropdown.style.display = 'block';
            if (menu_dropdown.contains(memverifikasi_informasi)) {
                mengelola_sistem.style.marginTop = '103px';
            }
        } else {
            dropdown.style.display = 'none';
            if (menu_dropdown.contains(memverifikasi_informasi)) {
                mengelola_sistem.style.marginTop = '0px';
            }
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
        content.style.marginLeft = '20px';
        box.style.width = '1500px';
        judul_header.style.marginLeft = '0px'
        box_item.forEach(function(box_item) {
            box_item.style.width = '250px';
            box_item.style.height = '230px';
        });
    }
});

var akun_profil = document.querySelector('.akun-profil');
var profil = document.querySelector('.header-right img');

profil.addEventListener('click', function(){
    if(akun_profil.style.display == 'none'){
        akun_profil.style.display = 'block';
    } else {
        akun_profil.style.display = 'none';
    }
})
