const flashdata = $('.flash-data').data('flashdata');

// untuk mengecek data flash data pesan
// console.log(flashdata);

if (flashdata) {
    Swal.fire({
        icon: 'error',
        title: 'Oops!' + flashdata,
        text: ''
    });
}

$('.tombol-hapus').on('click', function (e) {

    // UNTUK NON AKTIFKAN HREF
    e.preventDefault();
    // END
    const href = $(this).attr('href');
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => { 
    if (result.isConfirmed) {
        document.location.href = href;
    }
    })
});



const flashdata2 = $('.save-data').data('flashdata');

// untuk mengecek data flash data pesan
// console.log(flashdata);

if (flashdata2) {
    Swal.fire({
        icon: 'success',
        title: '' + flashdata2,
        text: ''
    });
}

const flashdataout = $('.logout-data').data('flashdata');

// untuk mengecek data flash data pesan
// console.log(flashdata);

if (flashdataout) {
    Swal.fire({
        icon: 'success',
        title: '' + flashdataout,
        text: 'Your Account Has Been Logout'
    });
}


