// summernote script
$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#summernote').summernote();
  $('#summernote1').summernote();
  $(document).on("click", ".switcher-btn", function () {
    $(".color-switcher").toggleClass("active");
  })
  $(document).on("click", ".add-color", function () {
    $(".select-color").removeClass("select-color").addClass("active-color");
  })
  $(document).on("click", ".remove", function () {
    $(".active-color").removeClass("active-color").addClass("select-color");
  })
  $(document).on("click", ".delete", function () {
    route = $(this).data('route');
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
        $.ajax({
          url: route,
          type: "delete",
          data: {},
          success: function () {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            setTimeout(function () {
              location.reload();
            }, 3000);
          }

        })
      }
    })

  })
  $(document).on("click", ".update", function () {
    route = $(this).data('route');
    $.ajax({
      url: route,
      type: "GET",
      success: function () {
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Product has been Updated',
          showConfirmButton: false,
          timer: 1500
        })

      }

    })


  })

  // search category

  $("#rangePrimary").ionRangeSlider({
    type: "double",
    grid: true,
    min: 0,
    max: 1000,
    from: 200,
    to: 800,
    prefix: "£"
});


});


