
const deleteBtn = document.querySelectorAll('.deleteBtn');
deleteBtn.forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        Swal.fire({
            title: "Apakah anda yakin ?",
            text: "Data yang dihapus tidak bisa dikembalikan lagi !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit()
            }
        })
    })

})

