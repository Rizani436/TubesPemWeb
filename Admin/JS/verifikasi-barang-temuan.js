document.addEventListener('DOMContentLoaded', function() {
    const terimaButtons = document.querySelectorAll('.btn-terima');
    const tolakButtons = document.querySelectorAll('.btn-tolak');

    terimaButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('Apakah sistem menerima kasus Penemuan barang ini?')) {
                updateStatus(id, 'Diterima');
            }
        });
    });

    tolakButtons.forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('Apakah sistem menolak kasus Penemuan barang ini?')) {
                updateStatus(id, 'Ditolak');
            }
        });
    });

    function updateStatus(id, status) {
        fetch('../PHP/updateStatusBarangTemuan.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${id}&status=${status}`
        })
        .then(response => response.text())
        .then(data => {
                alert('Status berhasil diperbarui');
                location.reload();
        })
        .catch(error => {alert('Status gagal diperbarui'); console.error('Error:', error)});
    }
});