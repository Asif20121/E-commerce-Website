
// Delete Section JS
$(document).on('click', '.delete_data', function(e) {
    e.preventDefault();
    let url = $(this).attr("href");
    Swal.fire({
        title: 'Are you sure?',
        text: "Delete This Data?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: "No, cancel please!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });
});


