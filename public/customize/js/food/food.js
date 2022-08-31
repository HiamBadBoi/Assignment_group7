// jquery: thư viện của javascript đc dùng phổ biến trong việc làm giao diện
// $(selector).hàm()
$('.btn_remove_food').on('click', function() {
    let food_name = $(this).data('name');
    let redirectUrl = $(this).data('url');
    Swal.fire({
        title: `Are you sure to delete "${food_name}"?`,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: `No`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = redirectUrl;
        }
    })
})