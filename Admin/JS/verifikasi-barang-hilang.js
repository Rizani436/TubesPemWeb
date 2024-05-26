var header_left = document.querySelector('.menu-left');
var header_left_menu = document.querySelector('.header-left-menu');
var content = document.querySelector('.content');
var tabel = document.querySelector('.content-top table');
var judul_header = document.querySelector('.judul-header p');

header_left.addEventListener('click', function(){
    if (header_left_menu.style.display === 'none'){
        header_left_menu.style.display = 'block';
        // content.style.marginLeft = '20px';
        tabel.style.width = '1175px';
        content.style.marginLeft = '350px';
        judul_header.style.marginLeft = '230px';
    } else {
        header_left_menu.style.display ='none';
        tabel.style.width = '1700px';
        judul_header.style.marginLeft = '0px';

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
        tabel.style.width = '1500px';
        judul_header.style.marginLeft = '0px';
    }
});

var akun_profil = document.querySelector('.akun-profil');
var profil = document.querySelector('.header-right img');
var popUp_terima = document.querySelector('.popUp-terima');
var popUp_tolak = document.querySelector('.popUp-tolak');

profil.addEventListener('click', function(){
    if(akun_profil.style.display == 'none'){
        akun_profil.style.display = 'block';
    } else {
        akun_profil.style.display = 'none';
    }
})

var terima = document.querySelector('.footer-terima button[type="submit"]');
var tutup = document.querySelector('.footer-terima button[type="button"');
var btn_terima = document.querySelectorAll('.btn-terima');
btn_terima.forEach(function(btn_terima) {
    btn_terima.addEventListener('click', function(){
        if(popUp_terima.style.display === 'none'){
            popUp_terima.style.display = 'block';
            document.body.classList.add('no-scroll');
        } else {
            popUp_terima.style.display = 'none';
        }
    });
});

var close = document.querySelector('.close');
close.addEventListener('click', function(){
    if(popUp_terima.style.display === 'none'){
        popUp_terima.style.display = 'block';
        popUp_tolak.style.display = 'block';
    } else {
        popUp_terima.style.display = 'none';
        popUp_tolak.style.display = 'none';
        document.body.classList.remove('no-scroll');
    }
});

tutup.addEventListener('click', function(){
    if(popUp_terima.style.display === 'none'){
        popUp_terima.style.display = 'block';
    } else {
        popUp_terima.style.display = 'none';
        document.body.classList.remove('no-scroll');
    }
});

var tolak = document.querySelector('.footer-tolak button[type="submit"]');
var tutup2 = document.querySelector('.footer-tolak button[type="button"');
var btn_tolak = document.querySelectorAll('.btn-tolak');
btn_tolak.forEach(function(btn_tolak) {
    btn_tolak.addEventListener('click', function(){
        if(popUp_tolak.style.display === 'none'){
            popUp_tolak.style.display = 'block';
            document.body.classList.add('no-scroll');
        } else {
            popUp_tolak.style.display = 'none';
        }
    });
});

tutup2.addEventListener('click', function(){
    if(popUp_tolak.style.display === 'none'){
        popUp_tolak.style.display = 'block';
    } else {
        popUp_tolak.style.display = 'none';
        document.body.classList.remove('no-scroll');
    }
});