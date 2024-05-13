menu_dropdowns = document.querySelectorAll('.menu-dropdown')

menu_dropdowns.forEach(function(menu_dropdown) {
    var dropdown = menu_dropdown.querySelector('.dropdown');
    menu_dropdown.addEventListener("click", function(){
        if (dropdown.style.display == 'none'){
            dropdown.style.display = 'block';
        } else {
            dropdown.style.display = 'none';
        }
    });
});

akun_profil = document.querySelector('.akun-profil');
profil = document.querySelector('.profil');

profil.addEventListener('click', function(){
    if(akun_profil.style.display == 'none'){
        akun_profil.style.display = 'block';
    } else {
        akun_profil.style.display = 'none';
    }
})



