@extends('admin.admin_master')
@section('admin')

    <style>

        img {
        max-width: 100%; }

        .preview {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
            -ms-flex-direction: column;
                flex-direction: column; }
        @media screen and (max-width: 996px) {
            .preview {
            margin-bottom: 20px; } }

        .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
                flex-grow: 1; }

        .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px; }
        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%; }
            .preview-thumbnail.nav-tabs li img {
            max-width: 100%;
            display: block; }
            .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 0; }
            .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0; }

        .tab-content {
        overflow: hidden; }
        .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
                    animation-name: opacity;
            -webkit-animation-duration: .3s;
                    animation-duration: .3s; }

        .card {
        margin-top: 50px;
        background: #eee;
        padding: 3em;
        line-height: 1.5em; }

        /* @media screen and (min-width: 997px) {
        .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex; } } */

        .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
            -ms-flex-direction: column;
                flex-direction: column; }

        .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
                flex-grow: 1; }

        .product-title, .sizes, .colors {
        text-transform: UPPERCASE;
        font-weight: bold;
        }

        .checked {
        color: #ff9f1a; 
        }

        .prices{
            color: #e00000;
        }

        .product-title, .rating, .product-description, .vote, .sizes {
        margin-bottom: 15px;
        }

        .product-title {
        margin-top: 0; }

        .size {
        margin-right: 10px; }
        .size:first-of-type {
            margin-left: 40px; }

        .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px; }
        .color:first-of-type {
            margin-left: 20px; }

        .add-to-cart, .like {
        background: #ff9f1a;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        -webkit-transition: background .3s ease;
                transition: background .3s ease; }
        .add-to-cart:hover, .like:hover {
            background: #b36800;
            color: #fff; }

        .not-available {
        text-align: center;
        line-height: 2em; }
        .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff; }

        .orange {
        background: #ff9f1a; }

        .green {
        background: #85ad00; }

        .blue {
        background: #0076ad; }

        .tooltip-inner {
        padding: 1.3em; } 

        @-webkit-keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
                    transform: scale(3); }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
                    transform: scale(1); } }

        @keyframes opacity {
        0% {
            opacity: 0;
            -webkit-transform: scale(3);
                    transform: scale(3); }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
                    transform: scale(1); } } 

        /*# sourceMappingURL=style.css.map */
    </style>
	
        
    <div class="container">
        <div class="box-header with-border" style="margin-top: 30px;">
            <h3 class="box-title">Product Details View</h3>
        </div>
        
        <div class="box-body">
            <div class="container-fliud">
                <div class="wrapper row">

                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                @if ($details_view_product->product_thambnail == '' || $details_view_product->product_thambnail == null)
                                    <img src="{{ asset('upload/no_image.jpg') }}" alt="No Image">
                                @else
                                    <img id="preview_click_img" src="{{ URL::to('storage/products/thambnail', $details_view_product->product_thambnail) }}" style="height: 360px;">
                                @endif
                            </div>

                            <ul class="preview-thumbnail nav nav-tabs" style="margin-top: 70px;">

                                <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{{ URL::to('storage/products/thambnail', $details_view_product->product_thambnail) }}" onclick="image_click_change(this.src)" style="height:60px; width:80px;"></a></li>
                                
                                @foreach ($multiImgs as $img)
                                    <li><a data-target="#pic-2" data-toggle="tab"><img src="{{ URL::to('storage/products/multi-image', $img->photo_name) }}" onclick="image_click_change(this.src)" style="height:60px; width:80px;" /></a></li>
                                @endforeach
                               
                            </ul>
                        </div>
                    </div>

                    <div class="details col-md-6">
                        <h4 class="product-title head-text">{{ $details_view_product->product_name_en }}</h4>
                        {{-- <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no head-text">41 reviews</span>
                        </div> --}}
                        <p class="product-description head-text">{{ $details_view_product->short_descp_en }}</p>
                        <br>
                        <h5 class="head-text"><strong>Selling Price: &nbsp;</strong><span class="prices" title="Selling Price"><del>{{ $details_view_product->selling_price }} Taka</del></span></h5>
                        <h5 class="head-text"><strong>Discount Price: &nbsp;</strong><span class="prices" title="Discount Price">{{ $details_view_product->discount_price }} Taka</span></h5><br>
                        <p class="vote head-text" title="Product Quantity"><strong>Product Quantity: &nbsp;</strong>( {{ $details_view_product->product_qty }} )</p>
                        <p class="vote head-text" title="Product Code"><strong>Product Code: &nbsp;</strong>{{ $details_view_product->product_code }}</p>
                        
                        <p class="head-text "><strong>Brand:  &nbsp;</strong>
                            <span class="btn btn-info btn-sm">{{ $details_view_product->brand->brand_name_en }}</span>
                        </p>
                        <p class="head-text"><strong>Category:  &nbsp;</strong>
                            <span class="btn btn-success btn-sm">{{ $details_view_product->category->category_name_en }}</span>
                        </p>

                        @if($details_view_product->subcategory_id == null)
                            
                        @else
                            <p class="head-text"><strong>Sub Category:  &nbsp;</strong>
                                <span class="btn btn-danger btn-sm">{{ $details_view_product->subcategory->subcategory_name_en }}</span>
                            </p>
                        @endif

                        @if($details_view_product->subsubcategory_id == null)
                            
                        @else
                            <p class="head-text"><strong>Sub Sub-Category:  &nbsp;</strong>
                                <span class="btn btn-danger btn-sm">{{ $details_view_product->subsubcategory->subsubcategory_name_en }}</span>
                            </p>
                        @endif

                        {{-- <div class="action">
                            <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        </div> --}}
                    </div>

                    <div class="details col-md-12">
                        <p class="product-description head-text" style="margin-top: 60px;">{{ $details_view_product->long_descp_en }}</p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



    @push('js')
        <script>
            function image_click_change(change_img){
                document.getElementById("preview_click_img").src = change_img;
            }
        </script>
    @endpush


@endsection