<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') </title>
    <link rel="icon" type="image/png" href="{{ asset('frontend/logopng05.png')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/style_two.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Top Bar Message Show Section CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">



    <!-- Bootstrap Core CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}"> --}}

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('frontend/swiper-bundle.min.css') }}">
    <script src="{{ asset('frontend/swiper-bundle.min.js') }}"></script>

    {{-- Payment Stripe Set up  JS --}}
    <script src="https://js.stripe.com/v3/"></script>


</head>

<body>

    <input type="checkbox" id="check" name="accept">
    <input type="checkbox" id="cart_check" checked>
    <!--header area start-->
    @include('frontend.body.header')
    <!--header area end-->

    <!--sidebar start-->
    @include('frontend.body.sidebar')
    <!--sidebar end-->

    <!--main content start-->
    @yield('mainpage')
    <!--main content end-->



    <!-- footer start -->
    @include('frontend.body.footer')
    <!-- footer end -->

    @include('frontend.modal.signin_modal')
    @include('frontend.modal.user_modal')

    <script src="{{ asset('frontend/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('frontend/script.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>




    {{-- Delete Section JS --}}
    <script src="{{ asset('assets/delete_custom_js/delete_custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{--User Order Cancel Section JS --}}
    <script src="{{ asset('assets/order_controll_js/order_controll.js') }}"></script>




    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>

    <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>

    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js')}}"></script>

    <script src="{{ asset('frontend/assets/js/echo.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js')}}"></script>




    {{-- Toastr Message Js Link --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Top Bar Message Show Section JS --}}
    @if(Session::has('message'))
    <script>
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    </script>
    @endif
    <style>
        div.scrollmenu {
            overflow: auto;
            white-space: nowrap;
        }

        div.scrollmenu img {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
        }

        div.scrollmenu a:hover {
            background-color: #777;
        }
    </style>
    <!-- Product detail modal start  -->
    <div class="modal fade modal-xl" id="pdoductDetailModal" tabindex="-1" aria-labelledby="pdoductDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdoductDetailModalLabel">Product Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row" id="modal_main_image">
                                <img id="spdimage" data-toggle="magnify" class="img-responsive img-rounded center-block" src="" alt="" width="100%">
                            </div>
                            <div class="row mt-2" id="modal_extra_image">
                                <div id="scrollmenu" class="scrollmenu">
                                <img src="{{ url('/storage/products/thambnail/${data.product.product_thambnail}' )}}" alt="" width="70px" onclick="changeThumbImg(this.src)">
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="row">
                                <div class="col-md">
                                    <div>
                                        <h1 id="spdname" style="justify-content: center;display: flex;"></h1>
                                    </div>
                                    <div>
                                        <table style="width:100%">
                                            <tr>
                                                <th>
                                                    <h5 style="font-weight: bolder;">Brand:</h5>
                                                </th>
                                                <td>
                                                    <h6 id="spdbrandName"> </h6>
                                                </td>
                                                <td><img id="spdbrandImage" src="" alt="" style="width: 20%;"></td>
                                            </tr>
                                            <tr>
                                                <th>Selling Price</th>
                                                <td>Discount Price</td>
                                                <td>
                                                    <h1> </h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 id="spdsprice" style="text-decoration: line-through;"></h3>
                                                </td>
                                                <td>
                                                    <h3 id="spddprice" style="color:crimson; font-weight: bold;"></h3>
                                                </td>
                                                <th>
                                                    <h1> </h1>
                                                </th>
                                            </tr>

                                            <tr id="modalbuttongroup">
                                                <td> <button type="submit" class="btn btn-warning btn-sm cart_modal_decrease" id="" onclick="cartModalDecrement(this.id)" style="width:100px;height:50px;">-</button> </td>
                                                <td> <input type="text" value="" min="1" max="100" disabled="" style="width:150px;height:50px;"> </td>
                                                <th><button type="submit" class="btn btn-success btn-sm cart_modal_increase" id="" onclick="cartModalIncrement(this.id)" style="width:100px;height:50px;">+</button></th>
                                            </tr>

                                        </table>
                                    </div>
                                    <div id="spdlong_descp_en" style="margin-top: 25px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product detail modal end  -->
    <script type="text/javascript">
        function show_product_detail(id) {
            parentElement = document.getElementById('modalbuttongroup');
            scrollparentElement = document.getElementById('scrollmenu');
            $.ajax({
                type: 'GET',
                url: '/productone/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    $('#spdname').text(data.product.product_name_en);
                    $('#spdsprice').text(data.product.selling_price);
                    $('#spddprice').text(data.product.discount_price);

                    $('#spdbrandImage').attr('src', '/storage/brand/' + data.product.brand.brand_image);
                    $('#spdbrandName').text(data.product.brand.brand_name_en);
                    const strippedString = data.product.long_descp_en.replace(/(<([^>]+)>)/gi, "");
                    $('#spdlong_descp_en').text(strippedString);

                    document.querySelector('button[type="submit"].btn.btn-success.btn-sm.cart_modal_increase').id = id;

                    $('#spdimage').attr('src', '/storage/products/thambnail/' + data.product.product_thambnail);
                    $('#spdimage').siblings(".magnify-large").css("background", "url('" + $('#spdimage').attr("src") + "') no-repeat");

                    $('#spdqty').val(1);
                    $('#spdqty').attr('max', data.product.product_qty);

                   var elementItem = `<img src="{{ url('/storage/products/thambnail/${data.product.product_thambnail}' )}}" alt="" width="70px"  onclick="changeThumbImg(this.src)">`;

                   $.each(data.multiImg, function(key, value) {
                     elementItem += `<img src="{{ url('/storage/products/multi-image/${value.photo_name}' )}}" alt="" width="70px"  onclick="changeThumbImg(this.src)">`;
                   })

                    $.each(data.carts, function(key, value) {
                        if (value.id == id) {
                            parentElement.innerHTML = `<td> <button type="submit" class="btn btn-warning btn-sm cart_modal_decrease" id="${value.rowId}" onclick="cartModalDecrement(this.id)" style="width:100px;height:50px;">-</button> </td>
                            <td> <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:150px;height:50px;"> </td>
                            <th><button type="submit" class="btn btn-success btn-sm cart_modal_increase" id="${id}" onclick="cartModalIncrement(this.id)" style="width:100px;height:50px;">+</button></th>`;
                        }
                    });
                    scrollparentElement.innerHTML = elementItem;

                }
            })
        }

        function changeThumbImg(IMGsrc){
            document.getElementById('spdimage').src= IMGsrc;
            $('#spdimage').siblings(".magnify-large").css("background", "url('" +IMGsrc+ "') no-repeat");
        }
    </script>

    <script>
        function cartModalIncrement(id) {
            // var button = document.querySelector(`button[id="${id}"].btn.btn-danger.add_cart`);
            var parentElement = document.getElementById("modalbuttongroup");;

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    id: id,
                },
                url: `{{ route('direct.cart') }}`,
                success: function(data) {
                    miniCart()
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            // type: 'success',
                            title: data.success

                        });

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }

                    $.each(data.carts, function(key, value) {
                        if (value.id == id) {
                            parentElement.innerHTML = `<td> <button type="submit" class="btn btn-warning btn-sm cart_modal_decrease" id="${value.rowId}" onclick="cartModalDecrement(this.id)" style="width:100px;height:50px;">-</button> </td>
                            <td> <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:150px;height:50px;"> </td>
                            <th><button type="submit" class="btn btn-success btn-sm cart_modal_increase" id="${id}" onclick="cartModalIncrement(this.id)" style="width:100px;height:50px;">+</button></th>`;
                        }
                        if (value.qty > 0) {
                        var button = document.querySelector(`button[id="${value.rowId}"].btn.btn-success.btn-sm.cart_increase`);
                        button.parentElement.innerHTML = `
                        <button type="submit" class="btn btn-warning btn-sm cart_decrease" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> 
                        <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >  
                        <button type="submit" class="btn btn-success btn-sm cart_increase" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button> 
                        `;
                    }

                    });
                }

            })


        }
        //End add to cart direct
    </script>
    <script>
        function cartModalDecrement(rowId) {
            var parentElement = document.getElementById("modalbuttongroup");

            var button =  document.querySelector('button[type="submit"].btn.btn-success.btn-sm.cart_modal_increase');

            var productID = button.getAttribute('id');

            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();

                    parentElement.innerHTML = `<td> <button type="submit" class="btn btn-warning btn-sm cart_modal_decrease" id="${data.carts.rowId}" onclick="cartModalDecrement(this.id)" style="width:100px;height:50px;">-</button> </td>
                            <td> <input type="text" value="${data.carts.qty}" min="1" max="100" disabled="" style="width:150px;height:50px;"> </td>
                            <th><button type="submit" class="btn btn-success btn-sm cart_modal_increase" id="${productID}" onclick="cartModalIncrement(this.id)" style="width:100px;height:50px;">+</button></th>`;

                    if (data.carts.qty < 1) {
                        var button = document.querySelector(`button[id="${data.carts.rowId}"].btn.btn-success.btn-sm.cart_increase`);
                        button.parentElement.innerHTML = `<button type="button" class="btn btn-danger cart_button add_cart" title="Add Cart"  id="${productID}" onclick="add_product_to_cart(this.id)">ADD TO CART</button>`;
                    }
                    if (data.carts.qty > 0) {
                        var button = document.querySelector(`button[id="${data.carts.rowId}"].btn.btn-success.btn-sm.cart_increase`);
                        button.parentElement.innerHTML = `
                        <button type="submit" class="btn btn-warning btn-sm cart_decrease" id="${data.carts.rowId}" onclick="cartDecrement(this.id)" >-</button> 
                        <input type="text" value="${data.carts.qty}" min="1" max="100" disabled="" style="width:25px;" >  
                        <button type="submit" class="btn btn-success btn-sm cart_increase" id="${data.carts.rowId}" onclick="cartIncrement(this.id)" >+</button> 
                        `;
                    }
                }
            });
        }
    </script>

    <!-- Add to Cart Product Modal -->
    <div class="modal fade" id="exampleModalnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="newmodal_close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;" id="pimage">
                            </div>
                        </div><!-- // end col md -->
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price: <strong class="text-danger">$<span id="pprice"></span></strong>
                                    <del id="oldprice">$</del>
                                </li>
                                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                                <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>
                                </li>
                            </ul>
                        </div><!-- // end col md -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="color">Choose Color</label>
                                <select class="form-control" id="color" name="color">
                                </select>
                            </div> <!-- // end form group -->
                            <div class="form-group mt-2" id="sizeArea">
                                <label for="size">Choose Size</label>
                                <select class="form-control" id="size" name="size">
                                    <option>1</option>
                                </select>
                            </div> <!-- // end form group -->

                            <div class="form-group mt-2">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control" id="qty" value="1" min="1" max="">
                            </div> <!-- // end form group -->

                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary mt-2" onclick="addToCart()">Add to Cart</button>
                        </div><!-- // end col md -->
                    </div> <!-- // end row -->
                </div> <!-- // end modal Body -->

            </div>
        </div>
    </div>
    <!-- End Add to Cart Product Modal -->


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        // Start Product View with Modal 

        function productView(id) {
          
            $.ajax({
                type: 'GET',
                url: '/productone/view/modal/' + id,
                dataType: 'json',
                success: function(data) {

                    $('#pname').text(data.product.product_name_en);
                    $('#price').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#pimage').attr('src', '/storage/products/thambnail/' + data.product.product_thambnail);
                    $('#product_id').val(id);
                    $('#qty').val(1);
                    $('#qty').attr('max', data.product.product_qty);

                    // Product Price 
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);

                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);

                    } // end prodcut price 

                    // Start Stock opiton
                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');

                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    } // end Stock Option 

                    // Color
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value + ' </option>')
                    }) // end color

                    // Size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value + ' </option>')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    }) // end size
                }

            })
        }
        // Eend Product View with Modal 

        //add product throw Modal Start



        //Start add to cart direct

        function add_product_to_cart(id) {
            var button = document.querySelector(`button[id="${id}"].btn.btn-danger.add_cart`);
            var parentElement = button.parentElement;

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    id: id,
                },
                url: `{{ route('direct.cart') }}`,
                success: function(data) {
                    miniCart()
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            // type: 'success',
                            title: data.success

                        });

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message 
                    // $.each(data.carts, function(key, value) {
                    //     if (value.id === id) {
                    //         button.previousElementSibling.value = value.qty;

                    //     }
                    // });
                    $.each(data.carts, function(key, value) {
                        if (value.id == id) {
                            parentElement.innerHTML = `<button type="submit" class="btn btn-warning btn-sm cart_decrease" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> 
                        <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >  
                        <button type="submit" class="btn btn-success btn-sm cart_increase" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button> `;
                        }
                    });
                }

            })


        }
        //End add to cart direct


        // Start Add To Cart Product 
        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart()
                    $('#newmodal_close').click();


                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }

                    // End Message 
                }
            })
        }

        // End Add To Cart Product 
    </script>


    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    $('span[id="cartSubTotal"]').text(response.cartTotal);
                    $('#cartQty').text(response.cartQty);

                    var miniCart = ""
                    $.each(response.carts, function(key, value) {
                        miniCart += `<div class="cart-item product-summary">
    <div class="row">
        <div class="col-3">
            <div class="image"> 
                <a href="detail.html">
                    <img src="/storage/products/thambnail/${value.options.image}" alt="" style="width: 100%;">
                </a>
            </div>
        </div>
        <div class="col-6">
            <h3 class="name"><a href="index.php?page-detail" style="font-size: 16px; text-decoration:none;color: black;">${value.name}</a></h3>
            <div class="price"> ${value.price} * ${value.qty}</div>
        </div>
        <div class="col-1">
            <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" style="border: none;background: transparent;"><i class="fa fa-trash" style="color: crimson; border: none;"></i></button>
        </div>
    </div>
</div>
<!-- /.cart-item -->
<div class="clearfix"></div>
<hr>`
                    });

                    $('#miniCart').html(miniCart);
                }
            })

        }
        miniCart();

        /// mini cart remove Start 
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product-remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    miniCart();

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }

        //  end mini cart remove 
    </script>
  @if (Auth::check())
    <!--  /// Start Add Wishlist Page  //// -->

    <script type="text/javascript">
        function addToWishList(product_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,

                success: function(data) {
                    // document.getElementById('#wish_list_count').innerHTML=data.wish_count;
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000

                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 


                }

            })

        }
    </script>

    <!--  /// End Add Wishlist Page  ////   -->

    <!-- /// Load Wishlist Data  -->
    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: 'GET',
                url: '/user/get-wishlist-product',
                dataType: 'json',
                success: function(response) {

                    var rows = ""
                    $.each(response, function(key, value) {
                        rows += `<tr>
                    <td class="col-md-2"><img src="/storage/products/thambnail/${value.product.product_thambnail} " alt="imga" style="
    width: 100%;
"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                         
                        <div class="price">
                        ${value.product.discount_price == null
                            ? `${value.product.selling_price}`
                            :
                            `${value.product.discount_price} <span style="text-decoration: line-through;">৳&nbsp;${value.product.selling_price}</span>`
                        }

                            
                        </div>
                    </td>
        <td class="col-md-2">
            <button type="button" class="btn btn-danger cart_button" title="Add Cart" data-bs-toggle="modal" data-bs-target="#exampleModalnew" id="${value.product_id}" onclick="productView(this.id)">
                                ADD TO CART
                                </button>
            </td>
        
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
                    });
                    $('#wishlist').html(rows);
                }
            })
        }
        wishlist();



        ///  Wishlist remove Start 
        function wishlistRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/wishlist-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    wishlist();
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }

        // End Wishlist remove   
    </script>
    <!-- /// End Load Wisch list Data  -->
@endif

    <!-- /// Load My Cart /// -->
    <script type="text/javascript">
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/user/get-cart-product',
                dataType: 'json',
                success: function(response) {

                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr>
        <td class="col-md-2"><img src="/storage/products/thambnail/${value.options.image} " alt="imga" style="width:60px; height:60px;"></td>
        
        <td class="col-md-2">
            <div class="product-name"><a href="#">${value.name}</a></div>
             
            <div class="price"> 
                            ${value.price}
                        </div>
                    </td>


          <td class="col-md-2">
            <strong>${value.options.color} </strong> 
            </td>

         <td class="col-md-2">
          ${value.options.size == null
            ? `<span> .... </span>`
            :
          `<strong>${value.options.size} </strong>` 
          }           
            </td>

           <td class="col-md-2">

           ${value.qty > 1

            ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> `

            : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button> `
            }
        

        <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >  

         <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>    
         
            </td>

             <td class="col-md-2">
            <strong>$${value.subtotal} </strong> 
            </td>

         
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
                    });

                    $('#cartPage').html(rows);
                }
            })

        }
        cart();



        ///  Cart remove Start 
        function cartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/user/cart-remove/' + id,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                    $('#couponField').show();
                    $('#coupon_name').val('');

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }

        // End Cart remove   


        // -------- CART INCREMENT --------//

        function cartIncrement(rowId) {
            var button = document.querySelector(`button[id="${rowId}"].btn.btn-success.btn-sm.cart_increase`);
            // var button = document.getElementById(rowId);
            var parentElement = button.parentElement;
            var productID = parentElement.lastElementChild.id;
            $.ajax({
                type: 'GET',
                url: "/cart-increment/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                    button.previousElementSibling.value = data.carts.qty;

                }
            });
        }
        // ---------- END CART INCREMENT -----///



        // -------- CART Decrement  --------//

        function cartDecrement(rowId) {
            var button = document.querySelector(`button[id="${rowId}"].btn.btn-warning.btn-sm.cart_decrease`);
            var parentElement = button.parentElement;
            var productID = parentElement.getAttribute('id');

            $.ajax({
                type: 'GET',
                url: "/cart-decrement/" + rowId,
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                    button.nextElementSibling.value = data.carts.qty;
                    if (data.carts.qty < 1) {
                        button.parentElement.innerHTML = `<button type="button" class="btn btn-danger cart_button add_cart" title="Add Cart"  id="${productID}" onclick="add_product_to_cart(this.id)">ADD TO CART</button>`;
                    }
                }
            });
        }


        // ---------- END CART Decrement -----///
    </script>

    <!-- //End Load My cart / -->



    <!--  //////////////// =========== Coupon Apply Start ================= ////  -->
    <script type="text/javascript">
        function applyCoupon() {
            var coupon_name = $('#coupon_name').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    coupon_name: coupon_name
                },
                url: "{{ url('/coupon-apply') }}",
                success: function(data) {
                    couponCalculation();
                    miniCart();
                    if (data.validity == true) {
                        $('#couponField').hide();
                    }

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }

            })
        }


        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-calculation') }}",
                dataType: 'json',
                success: function(data) {
                    if (data.total) {
                        $('#couponCalField').html(
                            `<tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md"> $ ${data.total}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md"> $ ${data.total}</span>
                                    </div>
                                </th>
                            </tr>`
                        )

                    } else {

                        $('#couponCalField').html(
                            `<tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md"> $ ${data.subtotal}</span>
                                    </div>
                                    <div class="cart-sub-total">
                                        Coupon<span class="inner-left-md text-info""> $ ${data.coupon_name}</span>
                                        <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i>  </button>
                                    </div>

                                    <div class="cart-sub-total">
                                        Discount Amount<span class="inner-left-md text-info""> $ ${data.discount_amount}</span>
                                    </div>

                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md"> $ ${data.total_amount}</span>
                                    </div>
                                </th>
                            </tr>`
                        )

                    }
                }

            });
        }
        couponCalculation();
    </script>

    <!--  //////////////// =========== End Coupon Apply Start ================= ////  -->


    <!--  //////////////// =========== Start Coupon Remove ================= ////  -->

    <script type="text/javascript">
        function couponRemove() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success: function(data) {
                    couponCalculation();
                    miniCart();
                    $('#couponField').show();
                    $('#coupon_name').val('');


                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })

                    }

                    // End Message 

                }
            });

        }
    </script>


    <!--  //////////////// =========== End Coupon Remove================= ////  -->





    <!-- show slider script  end-->

    @stack('custom-scripts')
</body>

</html>