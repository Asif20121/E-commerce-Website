    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="conttent">
                        <a href="{{ route('auth.google') }}"> <button style="width: 100%; width: 100%;
                        border: 1px solid #afaeaf;
                        border-radius: 3px;
                        height: 58px;
                        color:#fff;
                        text-align: center;
                        margin-bottom: 5px;
                        font-size: 14px;
                        background: #ff5d61;">
                                <svg style="display:inline-block;vertical-align:middle;" width="25px" height="25px" viewBox="0 0 48 48">
                                    <defs>
                                        <path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                                    </defs>
                                    <clipPath id="b">
                                        <use xlink:href="#a" overflow="visible" />
                                    </clipPath>
                                    <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                                    <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                                    <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                                    <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                                </svg> &nbsp;&nbsp;Sign Up or Login with
                                <b>Gmail</b>
                            </button></a>
                        <button id="Login_with_email"><svg style="display:inline-block;vertical-align:middle;" width="25px" height="25px" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 491.52 491.52">
                                <rect y="85.914" style="fill:#F6C358;" width="491.52" height="319.693"></rect>
                                <polygon style="fill:#FCD462;" points="245.76,217.258 491.52,405.604 0,405.604 "></polygon>
                                <polygon style="fill:#DC8744;" points="245.76,291.673 0,85.916 491.52,85.916 "></polygon>
                                <polygon style="fill:#FCD462;" points="245.76,274.261 0,85.916 491.52,85.916 "></polygon>
                            </svg><span>&nbsp;&nbsp;Login with
                                <b>Email</b></span>
                        </button>
                        <button id="Login_with_Phone" style="display: none;"><svg version="1.1" id="Capa_1" style="display:inline-block;vertical-align:middle;" width="25px" height="25px" x="0px" y="0px" viewBox="0 0 58 58">
                                <path style="fill:#38454F;" d="M40.257,58H17.743C14.571,58,12,55.429,12,52.257V5.743C12,2.571,14.571,0,17.743,0h22.514 C43.429,0,46,2.571,46,5.743v46.514C46,55.429,43.429,58,40.257,58z"></path>
                                <rect x="15" y="6" style="fill:#546A79;" width="28" height="43"></rect>
                                <g>
                                    <path style="fill:#78909B;" d="M18,14c0.256,0,0.512-0.098,0.707-0.293l4-4c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0 l-4,4c-0.391,0.391-0.391,1.023,0,1.414C17.488,13.902,17.744,14,18,14z"></path>
                                    <path style="fill:#78909B;" d="M18,19c0.256,0,0.512-0.098,0.707-0.293l2-2c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0 l-2,2c-0.391,0.391-0.391,1.023,0,1.414C17.488,18.902,17.744,19,18,19z"></path>
                                    <path style="fill:#78909B;" d="M21.29,13.29C21.109,13.479,21,13.729,21,14c0,0.26,0.109,0.52,0.29,0.71 C21.479,14.89,21.74,15,22,15s0.52-0.11,0.71-0.29C22.89,14.52,23,14.26,23,14s-0.11-0.521-0.29-0.71 C22.33,12.92,21.66,12.92,21.29,13.29z"></path>
                                    <path style="fill:#78909B;" d="M23.293,12.707C23.488,12.902,23.744,13,24,13s0.512-0.098,0.707-0.293l3-3 c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0l-3,3C22.902,11.684,22.902,12.316,23.293,12.707z"></path>
                                    <path style="fill:#78909B;" d="M26.293,13.293l-9,9c-0.391,0.391-0.391,1.023,0,1.414C17.488,23.902,17.744,24,18,24 s0.512-0.098,0.707-0.293l9-9c0.391-0.391,0.391-1.023,0-1.414S26.684,12.902,26.293,13.293z"></path>
                                    <path style="fill:#78909B;" d="M28.29,11.29C28.109,11.479,28,11.74,28,12s0.109,0.52,0.29,0.71C28.479,12.89,28.74,13,29,13 s0.52-0.11,0.71-0.29C29.89,12.52,30,12.26,30,12s-0.11-0.521-0.29-0.71C29.34,10.92,28.66,10.92,28.29,11.29z"></path>
                                    <path style="fill:#78909B;" d="M32.707,8.293c-0.391-0.391-1.023-0.391-1.414,0l-1,1c-0.391,0.391-0.391,1.023,0,1.414 C30.488,10.902,30.744,11,31,11s0.512-0.098,0.707-0.293l1-1C33.098,9.316,33.098,8.684,32.707,8.293z"></path>
                                </g>
                                <path style="fill:#546A79;" d="M32,4h-6c-0.553,0-1-0.447-1-1s0.447-1,1-1h6c0.553,0,1,0.447,1,1S32.553,4,32,4z"></path>
                                <path style="fill:#546A79;" d="M41,4h-1c-0.553,0-1-0.447-1-1s0.447-1,1-1h1c0.553,0,1,0.447,1,1S41.553,4,41,4z"></path>
                                <path style="fill:#546A79;" d="M37,4h-1c-0.553,0-1-0.447-1-1s0.447-1,1-1h1c0.553,0,1,0.447,1,1S37.553,4,37,4z"></path>
                                <path style="fill:#CBD4D8;" d="M31.5,55h-5c-0.825,0-1.5-0.675-1.5-1.5l0,0c0-0.825,0.675-1.5,1.5-1.5h5c0.825,0,1.5,0.675,1.5,1.5 l0,0C33,54.325,32.325,55,31.5,55z"></path>
                            </svg>
                            <span>Login with <b>Phone Number</b></span>
                        </button>
                        <h5 style="text-align: center;">or</h5>
                        <div id="mobile_login_sec">
                            <p style="text-align: center;">PLEASE ENTER YOUR MOBILE PHONE NUMBER</p>
                            <input class="modal_input" type="phone" value="+880">
                            <button style="width: 100%; width: 100%;
                        border: 1px solid #afaeaf;
                        border-radius: 3px;
                        height: 58px;
                        color:#fff;
                        text-align: center;
                        margin-bottom: 5px;
                        font-size: 14px;
                        background: #ff5d61;">
                                SIGN UP / LOGIN
                            </button>
                        </div>
                        <div id="email_login_sec" style="display: none;">
                            <p style="text-align: center;">PLEASE ENTER YOUR EMAIL AND PASSWORD</p>
                            <form method="POST" action="{{ route('loginOrSignup') }}">
                                @csrf
                                <input class="modal_input" id="name" type="hidden" name="name" value="User Name">
                                <input class="modal_input"  type="email" name="email" placeholder="Email Address">
                                <input class="modal_input" id="password" type="password" name="password" placeholder="Password">
                                <button class="modal_button" type="submit"> SIGN UP / LOGIN </button>

                            </form>
                            <a href="#" id="Forget_password">Forget your password?</a>

                        </div>
                        <div id="forget_password_sec" style="display: none;">
                            <p style="text-align: center;">PLEASE ENTER YOUR EMAIL ADDRESS</p>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <input class="modal_input" type="email"  id="email" name="email"  value="@gmail.com">
                                <button style="width: 100%; width: 100%;
                        border: 1px solid #afaeaf;
                        border-radius: 3px;
                        height: 58px;
                        color:#fff;
                        text-align: center;
                        margin-bottom: 5px;
                        font-size: 14px;
                        background: #ff5d61;">
                                    RESET MY PASSWORD
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="recaptcha">
                        <h5 class="recaptchaTxt"><span>This site is protected by reCAPTCHA and
                                the Google </span>
                            <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a>
                            <span> and </span>
                            <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a><span> apply.</span>
                        </h5>
                    </div>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End-->