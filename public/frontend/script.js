// const searchButton = document.getElementById('search-button');
//         const searchInput = document.getElementById('search-input');
//         searchButton.addEventListener('click', () => {
//             const inputValue = searchInput.value;
//             // alert(inputValue);
//         });

        $(document).ready(function () {
            $(document).on('click', '#modal-launcher', function () {
                $('#login-modal').modal('show');
            });

            $(document).on('click', '#modal_close', function () {
                $('#login-modal').modal('hide');
            });

            $(document).on('click', '#newmodal_close', function () {
                $('#exampleModalnew').modal('hide');
            });

            $(document).on('click ', '#threedot_btn', function () {
                var x = document.getElementById("mini_menu");
                if (x.style.display === "none") {
                    x.style.display = "flex";
                    document.getElementById("check").checked = true;
                } else {
                    x.style.display = "none";
                }
            });
            
            $(document).ready(function () {
                $(document).on('click ', '#language_toggle', function () {
                    var x = document.getElementById("language_toggle");
                    if (x.checked  == true) {
                        x.innerHTML = "ভাষা:&nbsp;&nbsp;";
                        sessionStorage.setItem("language", "bangla");
                        window.location.href = "/language/bangla";

                    } else {
                        x.innerHTML = "Language:&nbsp;&nbsp;";
                        sessionStorage.setItem("language", "english");
                        window.location.href = "/language/english";

                    }
                });
            });
            
            $(document).ready(function () {
                $(document).on('click ', '#language_toggle_two', function () {
                    var x = document.getElementById("language_toggle_two");
                    if (x.checked  == true) {
                        x.innerHTML = "ভাষা:&nbsp;&nbsp;";
                        sessionStorage.setItem("language", "bangla");
                        window.location.href = "/language/bangla";

                    } else {
                        x.innerHTML = "Language:&nbsp;&nbsp;";
                        sessionStorage.setItem("language", "english");
                        window.location.href = "/language/english";

                    }
                });
            });

            $(document).on('click ', '#sidebar_btn', function () {
                document.getElementById("mini_menu").style.display = "none";
            });

            $(document).on('click ', '#Login_with_email', function () {
                document.getElementById("mobile_login_sec").style.display = "none";
                document.getElementById("Login_with_email").style.display = "none";
                document.getElementById("Login_with_Phone").style.display= "block";
                document.getElementById("email_login_sec").style.display= "block";
                document.getElementById("forget_password_sec").style.display= "none";
            });
            
            $(document).on('click ', '#Login_with_Phone', function () {
                document.getElementById("mobile_login_sec").style.display = "block";
                document.getElementById("Login_with_email").style.display = "block";
                document.getElementById("Login_with_Phone").style.display= "none";
                document.getElementById("email_login_sec").style.display= "none";
                document.getElementById("forget_password_sec").style.display= "none";
            });

            $(document).on('click ', '#Forget_password', function () {
                document.getElementById("mobile_login_sec").style.display = "none";
                document.getElementById("Login_with_email").style.display = "none";
                document.getElementById("Login_with_Phone").style.display= "block";
                document.getElementById("email_login_sec").style.display= "none";
                document.getElementById("forget_password_sec").style.display= "block";
            });
            $(document).on('click ', '#cart_section', function () {
                var x = document.getElementById("cart_section");
                if(x.style.right == "420px")
                {
                    x.style.right = "0px";
                }
                else
                {
                    x.style.right = "420px";
                }
            });

          
        });
        var swiper = new Swiper(".slide-content", {
            slidesPerView: 5,
            spaceBetween: 25,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
              dynamicBullets: true,
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
        
            breakpoints:{
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 2,
                },
                950: {
                    slidesPerView: 3,
                },
                1050: {
                    slidesPerView: 4,
                },
                1150: {
                    slidesPerView: 5,
                },
            },
          });

    // Get all buttons with the 'custom-button' class
    // const buttons = document.querySelectorAll(".add_cart");

    // for (const button of buttons) {
    // button.addEventListener("click", function() {
    
    // this.style.display = "none";

    // });
    // }

                /* MAGNIFY PLUGIN START
         * ========================= */
    !function ($) {

        "use strict"; // jshint ;_;

        /* MAGNIFY PUBLIC CLASS DEFINITION
         * =============================== */

        var Magnify = function (element, options) {
            this.init('magnify', element, options)
        }

        Magnify.prototype = {

            constructor: Magnify

            , init: function (type, element, options) {
                var event = 'mousemove'
                    , eventOut = 'mouseleave';

                this.type = type
                this.$element = $(element)
                this.options = this.getOptions(options)
                this.nativeWidth = 0
                this.nativeHeight = 0

                this.$element.wrap('<div class="magnify" \>');
                this.$element.parent('.magnify').append('<div class="magnify-large" \>');
                this.$element.siblings(".magnify-large").css("background", "url('" + this.$element.attr("src") + "') no-repeat");

                this.$element.parent('.magnify').on(event + '.' + this.type, $.proxy(this.check, this));
                this.$element.parent('.magnify').on(eventOut + '.' + this.type, $.proxy(this.check, this));
            }

            , getOptions: function (options) {
                options = $.extend({}, $.fn[this.type].defaults, options, this.$element.data())

                if (options.delay && typeof options.delay == 'number') {
                    options.delay = {
                        show: options.delay
                        , hide: options.delay
                    }
                }

                return options
            }

            , check: function (e) {
                var container = $(e.currentTarget);
                var self = container.children('img');
                var mag = container.children(".magnify-large");

                // Get the native dimensions of the image
                if (!this.nativeWidth && !this.nativeHeight) {
                    var image = new Image();
                    image.src = self.attr("src");

                    this.nativeWidth = image.width;
                    this.nativeHeight = image.height;

                } else {

                    var magnifyOffset = container.offset();
                    var mx = e.pageX - magnifyOffset.left;
                    var my = e.pageY - magnifyOffset.top;

                    if (mx < container.width() && my < container.height() && mx > 0 && my > 0) {
                        mag.fadeIn(100);
                    } else {
                        mag.fadeOut(100);
                    }

                    if (mag.is(":visible")) {
                        var rx = Math.round(mx / container.width() * this.nativeWidth - mag.width() / 2) * -1;
                        var ry = Math.round(my / container.height() * this.nativeHeight - mag.height() / 2) * -1;
                        var bgp = rx + "px " + ry + "px";

                        var px = mx - mag.width() / 2;
                        var py = my - mag.height() / 2;

                        mag.css({ left: px, top: py, backgroundPosition: bgp });
                    }
                }

            }
        }


        /* MAGNIFY PLUGIN DEFINITION
         * ========================= */

        $.fn.magnify = function (option) {
            return this.each(function () {
                var $this = $(this)
                    , data = $this.data('magnify')
                    , options = typeof option == 'object' && option
                if (!data) $this.data('tooltip', (data = new Magnify(this, options)))
                if (typeof option == 'string') data[option]()
            })
        }

        $.fn.magnify.Constructor = Magnify

        $.fn.magnify.defaults = {
            delay: 0
        }


        /* MAGNIFY DATA-API
         * ================ */

        $(window).on('load', function () {
            $('[data-toggle="magnify"]').each(function () {
                var $mag = $(this);
                $mag.magnify()
            })
        })

    }(window.jQuery);


            /* MAGNIFY PLUGIN END
         * ========================= */


            //START screen size when less then 900px main menu sidebar checked

            function handleWindowSizeChange(mql) {
                var checkbox = document.getElementById("check");
                
                if (mql.matches) {
                  // Window size is less than 900px
                  checkbox.checked = true;
                  checkbox.classList.add("checked-style");
                } else {
                  // Window size is 900px or more
                  checkbox.checked = false;
                  checkbox.classList.remove("checked-style");
                }
              }
              
              var mql = window.matchMedia("(max-width: 900px)");
              handleWindowSizeChange(mql); // Call the function initially
              
              mql.addEventListener("change", function() {
                handleWindowSizeChange(mql);
              });

               // screen size when less then 900px main menu sidebar checked END



            //    search bar start 
            // getting all required elements
const searchWrapper = document.querySelector(".search-input");
const inputBox = searchWrapper.querySelector("input");
const suggBox = searchWrapper.querySelector(".autocom-box");
const icon = searchWrapper.querySelector(".icon");
let linkTag = searchWrapper.querySelector("a");
var suggestions; 
let webLink;

// if user press any key and release
inputBox.onkeyup = (e)=>{
    let userData = e.target.value; //user enetered data
    let emptyArray = [];
    if(userData){
        icon.onclick = ()=>{
            webLink = `https://www.google.com/search?q=${userData}`;
            linkTag.setAttribute("href", webLink);
            linkTag.click();
        }
        getsearchdata();
        emptyArray = suggestions.filter((data)=>{
            //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
            return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
        });
        emptyArray = emptyArray.map((data)=>{
            // passing return data inside li tag
            return data = `<li>${data}</li>`;
        });
        searchWrapper.classList.add("active"); //show autocomplete box
        showSuggestions(emptyArray);
        let allList = suggBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //adding onclick attribute in all li tag
            allList[i].setAttribute("onclick", "select(this)");
        }
    }else{
        searchWrapper.classList.remove("active"); //hide autocomplete box
    }
}

function select(element){
    let selectData = element.textContent;
    inputBox.value = selectData;
    icon.onclick = ()=>{
        webLink = `https://www.google.com/search?q=${selectData}`;
        linkTag.setAttribute("href", webLink);
        linkTag.click();
    }
    searchWrapper.classList.remove("active");
}

function showSuggestions(list){
    let listData;
    if(!list.length){
        userValue = inputBox.value;
        listData = `<li>${userValue}</li>`;
    }else{
      listData = list.join('');
    }
    suggBox.innerHTML = listData;
}

            //    search bar end
            function getsearchdata() {
                $.ajax({
                    type: 'GET',
                    url: '/get/product-name/',
                    dataType: 'json',
                    success: function(data) {                        
                        suggestions = Object.values(data);                      
                    }
                });


    
            }
            getsearchdata();

           
           
