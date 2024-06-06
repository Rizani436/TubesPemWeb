
var btn_terima = document.querySelectorAll('.btn-terima');
btn_terima.forEach(function(button) {
    button.addEventListener('click', function() {
        var row = button.closest('tr');
        var id = row.dataset.id;
        var namaBarang = row.querySelector('.td-namaBarang').textContent;
        var kategoriBarang = row.querySelector('.td-kategoriBarang').textContent;
        var tanggalKehilangan = row.querySelector('.td-tanggalKehilangan').textContent;
        var tempatKehilangan = row.querySelector('.td-tempatKehilangan').textContent;
        var kotaKabupaten = row.querySelector('.td-kotaKabupaten').textContent;
        var informasiDetail = row.querySelector('.td-informasiDetail').textContent;
        var noHP = row.querySelector('.td-noHP').textContent;
        
        document.querySelector('#idBH').value = id;
        document.querySelector('#namaBarang').value = namaBarang;
        document.querySelector('#kategoriBarang').value = kategoriBarang;
        document.querySelector('#tglKehilangan').value = tanggalKehilangan;
        document.querySelector('#tmptKehilangan').value = tempatKehilangan;
        document.querySelector('#kotaKabupaten').value = kotaKabupaten;
        document.querySelector('#informasiDetail').value = informasiDetail;
        document.querySelector('#noHP').value = noHP;
        
        document.querySelector('.popUp-terima').style.display = 'flex';
        document.body.classList.add('no-scroll');
    });
});

var tutup = document.querySelector('.footer-terima button[type="button"]');
tutup.addEventListener('click', function(){
    document.querySelector('.popUp-terima').style.display = 'none';
    document.body.classList.remove('no-scroll');
});

var btn_tolak = document.querySelectorAll('.btn-tolak');
btn_tolak.forEach(function(button) {
    button.addEventListener('click', function() {
        document.querySelector('.popUp-tolak').style.display = 'flex';
        document.body.classList.add('no-scroll');
    });
});

var tutup2 = document.querySelector('.footer-tolak button[type="button"]');
tutup2.addEventListener('click', function(){
    document.querySelector('.popUp-tolak').style.display = 'none';
    document.body.classList.remove('no-scroll');
});

const formTerima = document.querySelector('.formTerima');
const informasiDetail = document.querySelector('.informasiDetail');
const pInformasiDetail = document.querySelector('.p-informasiDetail');

formTerima.addEventListener('submit', function(event) {
    if (informasiDetail.value.length > 255) {
        pInformasiDetail.textContent = 'Panjang Maksikal Karakter 255';
        pInformasiDetail.style.color = 'red';
        event.preventDefault();
    } else {
        pInformasiDetail.textContent = '';
    }
});