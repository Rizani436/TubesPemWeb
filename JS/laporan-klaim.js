var popUp_terima = document.querySelector('.popUp-terima');
var popUp_tolak = document.querySelector('.popUp-tolak');
var terima = document.querySelector('.footer-terima button[type="submit"]');
var tutup = document.querySelector('.footer-terima button[type="button"');
var btn_terima = document.querySelector('.button-klaim button.btn-terima');
btn_terima.addEventListener('click', function(){
    popUp_terima.style.display = 'flex';
    document.body.classList.add('no-scroll');
});

tutup.addEventListener('click', function(){
    popUp_terima.style.display = 'none';
    document.body.classList.remove('no-scroll');
});

var tolak = document.querySelector('.footer-tolak button[type="submit"]');
var tutup2 = document.querySelector('.footer-tolak button[type="button"');
var btn_tolak = document.querySelector('.button-klaim button.btn-tolak');

btn_tolak.addEventListener('click', function(){
    popUp_tolak.style.display = 'flex';
    document.body.classList.add('no-scroll');
});

tutup2.addEventListener('click', function(){
    popUp_tolak.style.display = 'none';
    document.body.classList.remove('no-scroll');
});