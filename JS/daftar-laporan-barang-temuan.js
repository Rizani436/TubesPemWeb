document.addEventListener('DOMContentLoaded', function() {
    var resultText = document.querySelector('.resultText');
    
    function updateDisplayText() {
        var lokasi = localStorage.getItem("lokasiDropdown") || "All";
        var kategori = localStorage.getItem("kategoriDropdown") || "All";
        resultText.innerHTML = `Kota/Kabupaten: ${lokasi}, Kategori: ${kategori}`;
    }
    
    var firstButtonLokasi = document.querySelector('.lokasi-barang ul li button:first-child');
    firstButtonLokasi.classList.add("active");
    var buttonLokasi = document.querySelectorAll(".lokasi-barang ul li button");

    buttonLokasi.forEach(function(button) {
        button.addEventListener('click', function() {
            buttonLokasi.forEach(function(btn){ 
                btn.classList.remove('active');
            });
            button.classList.add('active');
            localStorage.setItem("lokasiDropdown", button.textContent);
            updateDisplayText();
        });
    });

    var firstButtonKategori = document.querySelector('.kategori ul li button:first-child');
    firstButtonKategori.classList.add("active");
    var buttonsKategori = document.querySelectorAll(".kategori ul li button");
    
    buttonsKategori.forEach(function(button) {
        button.addEventListener('click', function() {
            buttonsKategori.forEach(function(btn){ 
                btn.classList.remove('active');
            });
            button.classList.add('active');
            localStorage.setItem("kategoriDropdown", button.textContent);
            updateDisplayText();
        });
    });

    var savedLokasiPenemuan = localStorage.getItem("lokasiDropdown");
    var savedKategoriPenemuan = localStorage.getItem("kategoriDropdown");
    
    if (savedLokasiPenemuan){
        firstButtonLokasi.classList.remove("active");
        buttonLokasi.forEach(function(button){
            if (button.textContent === savedLokasiPenemuan) {
                button.classList.add('active');
            }
        });
    }

    if (savedKategoriPenemuan){
        firstButtonKategori.classList.remove("active");
        buttonsKategori.forEach(function(button){
            if (button.textContent === savedKategoriPenemuan) {
                button.classList.add('active');
            }
        });
    }
    
    updateDisplayText();

    var menu_dropdowns = document.querySelectorAll('.menu-dropdown')

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

    var akun_profil = document.querySelector('.akun-profil');
    var profil = document.querySelector('.profil');
    
    profil.addEventListener('click', function(){
        if(akun_profil.style.display == 'none'){
            akun_profil.style.display = 'block';
        } else {
            akun_profil.style.display = 'none';
        }
    })
    
    const reactionImages = document.querySelectorAll('.reaction img');
    
    reactionImages.forEach((img, index) => {
        img.addEventListener('click', () => {
            const likeCounter = img.nextElementSibling;

            if (img.src.includes('love-white.png')) {
                img.src = 'icon/love-red.png';
                let currentLikes = parseInt(likeCounter.textContent.split(' ')[0]);
                currentLikes++;
                likeCounter.textContent = `${currentLikes} likes`;
            } else {
                img.src = 'icon/love-white.png';
                let currentLikes = parseInt(likeCounter.textContent.split(' ')[0]);
                currentLikes--;
                likeCounter.textContent = `${currentLikes} likes`;
            }
        });
    });


});