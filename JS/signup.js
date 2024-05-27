document.addEventListener('DOMContentLoaded', function(){
    var form = document.querySelector('form');

    form.addEventListener('submit', function(event){
        var username = document.getElementById('username').value.trim();
        var password = document.getElementById('password').value.trim();
        var confPassword = document.getElementById('confPassword').value.trim();
        var namaLengkap = document.getElementById('namaLengkap').value.trim();
        var alamat = document.getElementById('alamat').value.trim();
        var noHP = document.getElementById('noHP').value.trim();
        var jenisKelamin = document.getElementById('jenisKelamin').value;
        
        if(username.length < 1 || password.length < 1 || confPassword.length < 1 || namaLengkap.length < 1 || alamat.length < 1 || noHP.length < 1 || jenisKelamin === '0') {
            event.preventDefault()
            alert('Mohon isi semua kolom dengan baik');
        }
        if(password != confPassword){
            event.preventDefault()
            alert('Password dan konfirmasi password tidak sama');
        }
    });
});