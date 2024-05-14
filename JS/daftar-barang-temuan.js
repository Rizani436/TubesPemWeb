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

document.addEventListener('DOMContentLoaded', function(){
    var form = document.querySelector('form');

    form.addEventListener('submit', function(event){
        var namaBarang = document.getElementById('namaBarang').value.trim();
        var kategoriBarang = document.getElementById('kategoriBarang').value;
        var tglPenemuan = document.getElementById('tglPenemuan').value;
        var tmptPenemuan = document.getElementById('tmptPenemuan').value.trim();
        var kotaKabupaten = document.getElementById('kotaKabupaten').value.trim();
        var noHP = document.getElementById('noHP').value.trim();
        var informasiDetail = document.getElementById('informasiDetail').value.trim();
        var gambarBarang = document.getElementById('gambarBarang').value.trim();

        var p_namaBarang = document.querySelector('.p-namaBarang');
        var p_kategoriBarang = document.querySelector('.p-kategoriBarang');
        var p_tglPenemuan = document.querySelector('.p-tglPenemuan');
        var p_tmptPenemuan = document.querySelector('.p-tmptPenemuan');
        var p_kotaKabupaten = document.querySelector('.p-kotaKabupaten');
        var p_noHP = document.querySelector('.p-noHP');
        var p_gambarBarang = document.querySelector('.p-gambarBarang');
        var p_informasiDetail = document.querySelector('.p-informasiDetail');
        
        if(namaBarang.length < 1 ){
            event.preventDefault()
            p_namaBarang.innerHTML = 'Silakan isi Nama Barang';
        }   else {
            p_namaBarang.innerHTML = '';
        }

        if(kategoriBarang === '0' ){
            event.preventDefault()
            p_kategoriBarang.innerHTML = 'Silakan pilih Kategori Barang';
        }   else {
            p_kategoriBarang.innerHTML = '';
        }

        if(tglPenemuan === '' ){
            event.preventDefault()
            p_tglPenemuan.innerHTML = 'Silakan isi Tanggal Kehilangan';
        }   else {
            p_tglPenemuan.innerHTML = '';
        }

        if(tmptPenemuan.length < 1 ){
            event.preventDefault()
            p_tmptPenemuan.innerHTML = 'Silakan isi Tempat Kehilangan';
        }   else {
            p_tmptPenemuan.innerHTML = '';
        }

        if(kotaKabupaten === '0' ){
            event.preventDefault()
            p_kotaKabupaten.innerHTML = 'Silakan pilih Kota/Kabupaten';
        }   else {
            p_kotaKabupaten.innerHTML = '';
        }

        if(noHP.length < 1 ){
            event.preventDefault()
            p_noHP.innerHTML = 'Silakan isi Nomor Handphone';
        }   else {
            p_noHP.innerHTML = '';
        }

        if(informasiDetail.length < 1 ){
            event.preventDefault()
            p_informasiDetail.innerHTML = 'Silakan isi pertanyaan yang ingin diajukan';
        }   else {
            p_informasiDetail.innerHTML = '';
        }

        if(gambarBarang.length < 1 ){
            event.preventDefault()
            p_gambarBarang.innerHTML = 'Silakan unggah Gambar Barang';
        }   else {
            p_gambarBarang.innerHTML = ''
        }

        
        
    });
});
