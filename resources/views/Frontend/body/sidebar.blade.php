    <!--sidebar start-->
    @php
    $main_category = DB::table('categories')->get();
    $sub_category = DB::table('sub_categories')->get();
    $sub_sub_category = DB::table('sub_sub_categories')->get();
    @endphp
    <div class="sidebar" style="overflow-x: hidden;">

        <div class="d-flex justify-content-around">
            <a class="category" href="{{route('productPage.brand')}}" style="margin-top:10px">
                <img width="30" height="30" src="https://img.icons8.com/external-flaticons-flat-flat-icons/64/external-brand-modelling-agency-flaticons-flat-flat-icons.png" alt="external-brand-modelling-agency-flaticons-flat-flat-icons" />
                <span style="font-size: 15px; font-weight: bold; position: inherit; margin-left: 15px;"> {{ session()->get('language')=='bangla'?  "ব্র্যান্ড" : "All Brand" }}</span>
            </a>

        </div>
        @foreach ($main_category as $main)
        <div class="d-flex justify-content-around">
            <a class="category" href="{{ route('productPage.category', [ 'mainCategory_id'=>$main->id, 'mainCategory_name'=>$main->category_name_en] )}}" style="margin-top:10px">
                <img src="{{ asset('storage/category_icon/'.$main->category_icon) }}" alt="" title="{{ $main->category_name_en }}" width="30px" height="30px">
                <span style="font-size: 15px; font-weight: bold; position: inherit; margin-left: 15px;"> {{ session()->get('language')=='bangla'? $main->category_name_bn : $main->category_name_en  }}</span>
            </a>
            <span>
                <input type="checkbox" id="hide_scat_check_{{$main->id}}" checked name="accept" style="display: none;">
                <label class="hide_label_{{$main->id}}" for="hide_scat_check" id="{{$main->id}}" onclick="hidediv(this.id)">
                    <i class="fa-sharp fa-solid fa-chevron-right fa-shake fa-lg" style="color: #ffffff; margin-top: 8px; padding-right: 13px;"></i>
                </label>
            </span>
        </div>
        <ul class="sub_sub_category" id="sub_category_{{$main->id}}" >
            @foreach ($sub_category as $sub)
            @if( $sub->category_id == $main->id )
            <li>
                <div class="d-flex justify-content-around">
                    <a href="{{ route('productPage.subcategory', ['subCategory_id'=>$sub->id, 'subCategory_name'=>$sub->subcategory_name_en] )}}">
                        <span style="font-size: 14px;">
                            {{ session()->get('language')=='bangla'?$sub->subcategory_name_bn : $sub->subcategory_name_en }}
                        </span>
                    </a>
                    <span>
                        <input type="checkbox" id="hide_sscat_check_{{$sub->id}}" checked name="accept" style="display: none;">
                        <label class="hide_slabel_{{$sub->id}}" for="hide_sscat_check" id="{{$sub->id}}" onclick="hidesdiv(this.id)">
                            <i class="fa-sharp fa-solid fa-chevron-right fa-shake fa-sm" style="color: #ffffff; margin-top: 10px; padding-right: 10px;"></i>
                        </label>
                    </span>
                </div>
            </li>
            @endif
            <li>
                <ul class="sub_sub_category" id="sub_sub_category_{{$sub->id}}">
                    @foreach ($sub_sub_category as $sub_sub)
                    @if($sub_sub->subcategory_id == $sub->id && $sub_sub->category_id==$main->id )
                    <li>
                        <a href="{{ route('productPage.subsubcategory', ['subSubCategory_id'=>$sub_sub->id, 'subSubCategory_name'=>$sub_sub->subsubcategory_name_en] )}}"><span style="font-size: 13px;">{{ session()->get('language')=='bangla'? $sub_sub->subsubcategory_name_bn : $sub_sub->subsubcategory_name_en }}</span></a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
        @endforeach
        <ul style="margin-bottom: 100px;"></ul>
    </div>
    <!--sidebar end-->

    <!-- This script is for hide and showw sub cat sub sub cat -->
    <script>
        function hidediv(main_category_id) {
            var x = document.getElementById("sub_category_" + main_category_id);
            var label = document.getElementsByClassName('hide_label_' + main_category_id);
            var icon = label[0].querySelector('i');
            if (x.style.display == "block") {
                x.style.display = "none";
                icon.classList.remove('fa-sharp', 'fa-solid', 'fa-chevron-right', 'fa-shake', 'fa-lg');
                icon.classList.add('fa-sharp', 'fa-solid', 'fa-chevron-down', 'fa-bounce', 'fa-lg');
            } else {
                x.style.display = "block";
                icon.classList.remove('fa-sharp', 'fa-solid', 'fa-chevron-down', 'fa-bounce', 'fa-lg');
                icon.classList.add('fa-sharp', 'fa-solid', 'fa-chevron-right', 'fa-shake', 'fa-lg');
            }
        }

        function hidesdiv(sub_category_id) {
            var x = document.getElementById("sub_sub_category_" + sub_category_id);
            var label = document.getElementsByClassName('hide_slabel_' + sub_category_id);
            var icon = label[0].querySelector('i');
            if (x.style.display == "block") {
                x.style.display = "none";
                icon.classList.remove('fa-sharp', 'fa-solid', 'fa-chevron-right', 'fa-shake', 'fa-sm');
                icon.classList.add('fa-sharp', 'fa-solid', 'fa-chevron-down', 'fa-bounce', 'fa-sm');
            } else {
                x.style.display = "block";
                icon.classList.remove('fa-sharp', 'fa-solid', 'fa-chevron-down', 'fa-bounce', 'fa-sm');
                icon.classList.add('fa-sharp', 'fa-solid', 'fa-chevron-right', 'fa-shake', 'fa-sm');
            }
        }
    </script>

    <!-- This script is for hide and showw sub cat sub sub cat -->