  <!--sidebar start-->
    <div class="cartbar">
     <h6 style="background-color: #340808;padding: 20px;color: aliceblue;">Shop ৳800 more and get free delivery! </h6>
        <ul>
            <li>
                <!--   // Mini Cart Start with Ajax -->
                <div id="miniCart"></div>
                <!--   // End Mini Cart Start with Ajax -->

                <div class="clearfix cart-total"></div>

                <div class="pull-left" style="background-color: #340808;padding: 20px;color: aliceblue;width: 100%;position: absolute;margin-top: 100px;"> <span class="text">Sub Total : </span>
                    <span class='price' id="cartSubTotal"></span>
                    Taka
                </div>

                <div class="clearfix"> </div>
                  <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20"  style="
        justify-content: center;
        display: flex;
        right: 166px;
        position: absolute;
        width: auto;
        margin-top: 190px;
        margin-bottom: 20px;">Checkout</a>
                </div>
                <!-- /.cart-total-->
            </li>
        </ul>
    </div>
    <!--sidebar end-->
