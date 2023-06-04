

// Confirm Order Section  start JS
    $(document).on('click', '#confirm', function(e) {
        e.preventDefault();
        let url = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure Confirm?',
            text: "Once Confirm, You will not be able to Pending again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0ff769',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Yes, Confirm!',
            cancelButtonText: "No, cancel please!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire("Confirm!", "Confirm Changes", "success");
            }
        });
    });
// Confirm Order Section  End JS



// Processing Order Section Start JS
$(document).on('click', '#processing', function(e) {
    e.preventDefault();
    let url = $(this).attr("href");
    Swal.fire({
        title: 'Are you sure Processing?',
        text: "Once Processing, You will not be able to Pending again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0ff769',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Yes, Processing!',
        cancelButtonText: "No, cancel please!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Processing!", "Processing Changes", "success");
        }
    });
});
// Processing Order Section End JS



// Picked Order Section Start JS
$(document).on('click', '#picked', function(e) {
    e.preventDefault();
    let url = $(this).attr("href");
    Swal.fire({
        title: 'Are you sure Picked?',
        text: "Once Picked, You will not be able to Pending again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0ff769',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Yes, Picked!',
        cancelButtonText: "No, cancel please!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Picked!", "Picked Changes", "success");
        }
    });
});
// Picked Order Section End JS



// Shipped Order Section Start JS
$(document).on('click', '#shipped', function(e) {
    e.preventDefault();
    let url = $(this).attr("href");
    Swal.fire({
        title: 'Are you sure Shipped?',
        text: "Once Shipped, You will not be able to Pending again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0ff769',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Yes, Shipped!',
        cancelButtonText: "No, cancel please!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Shipped!", "Shipped Changes", "success");
        }
    });
});
// Shipped Order Section End JS



// Delivered Order Section Start JS
$(document).on('click', '#delivered', function(e) {
    e.preventDefault();
    let url = $(this).attr("href");
    Swal.fire({
        title: 'Are you sure Delivered?',
        text: "Once Delivered, You will not be able to Pending again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0ff769',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Yes, Delivered!',
        cancelButtonText: "No, cancel please!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Delivered!", "Delivered Changes", "success");
        }
    });
});
// Delivered Order Section End JS




// User Order Cancel Order Section Start JS
$(document).on('click', '#order_cancel', function(e) {
    e.preventDefault();
    let url = $(this).attr("href");
    Swal.fire({
        title: 'Are you sure Order Cancel?',
        text: "Once Order Cancel, You will not be able to Pending again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, Order Cancel!',
        cancelButtonText: "No, cancel please!",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Order Cancel!", "Order Cancel Changes", "success");
        }
    });
});
// User Order Cancel Order Section End JS





