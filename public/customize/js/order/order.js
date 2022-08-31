$('.huy').on('click', function() {
    let redirectUrl = $(this).data('url');
    Swal.fire({
        title: `Bọn có chắc muốn hủy ?`,
        showCancelButton: true,
        confirmButtonText: 'Có',
        cancelButtonText: `Hủy`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = redirectUrl;
        }
    })
  })
  $('.xoa').on('click', function() {
    let redirectUrl = $(this).data('url');
    Swal.fire({
        title: `Bọn có chắc muốn xóa món không ?`,
        showCancelButton: true,
        confirmButtonText: 'Có',
        cancelButtonText: `Hủy`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = redirectUrl;
        }
    })
  })
  $('.dat_mon').on('click', function() {
    let username = $(this).data('name');
    let redirectUrl = $(this).data('url');
    Swal.fire({
        title: `Xác nhận đăt món ?`,
        showCancelButton: true,
        confirmButtonText: 'Có',
        cancelButtonText: `Hủy`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = redirectUrl;
        }
    })
  })
  $('.done').on('click', function() {
    let username = $(this).data('name');
    let redirectUrl = $(this).data('url');
    Swal.fire({
        title: `Xác nhận dọn xong ?`,
        showCancelButton: true,
        confirmButtonText: 'Có',
        cancelButtonText: `Hủy`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location.href = redirectUrl;
        }
    })
  })