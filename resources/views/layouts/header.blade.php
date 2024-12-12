<header class="nftmax-header">
    <div class="container">
        <div class="row g-50">
            <div class="col-12">
                <!-- Dashboard Header -->
                <div class="nftmax-header__inner">
                    <div class="nftmax__sicon close-icon d-xl-none"><img src="{{ asset('img/menu-toggle.svg') }}" alt="#"></div>
                    <div class="nftmax-header__left">
                        <!-- Search Form -->
                        <div class="nftmax-header__form">
                            <form class="nftmax-header__form-inner" action="#">
                                <button class="search-btn" type="submit"><img src="{{ asset('img/search.png') }}" alt="#"></button>
                                <input name="s" value="" type="text" placeholder="Search items, collections...">
                            </form>
                        </div>
                        <!-- End Search Form -->
                    </div>
                    <div class="nftmax-header__right">
                        <div class="nftmax-header__group">
                            <!-- Search Form -->
                            <div class="nftmax-header__amount">
                                <div class="nftmax-amount__icon"><img src="{{ asset('img/bag-icon.svg') }}" alt="#"></div>
                                <div class="nftmax-amount__digit"><span>$</span> 234,435.34</div>
                                <div class="nftmax-header__plus"><a href="#"><img src="{{ asset('img/plus-icon.svg') }}" alt="#"></a></div>
                                <!-- NFTMax Balance Hover -->
                                <div class="nftmax-balance">
                                    <h3 class="nftmax-balance__title">Your Balance</h3>
                                    <!-- NFTMax Balance List -->
                                    <ul class="nftmax-balance_list">
                                        <li>
                                            <div class="nftmax-balance-info">
                                                <div class="nftmax-balance__img"><img src="{{ asset('img/wallet-1.png') }}" alt="#"></div>
                                                <h4 class="nftmax-balance-name">MetaMask</h4>
                                            </div>
                                            <div class="nftmax-balance-amount">
                                                <h4 class="nftmax-balance-amount nftmax-scolor">75,320 ETH <span class="nftmax-balance-usd">(773.69 USD)</span></h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="nftmax-balance-info">
                                                <div class="nftmax-balance__img"><img src="{{ asset('img/wallet-2.png') }}" alt="#"></div>
                                                <h4 class="nftmax-balance-name">Coinbase Wallet</h4>
                                            </div>
                                            <div class="nftmax-balance-amount">
                                                <h4 class="nftmax-balance-amount nftmax-scolor">56,124 ETH <span class="nftmax-balance-usd">(773.69 USD)</span></h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="nftmax-balance-info">
                                                <div class="nftmax-balance__img"><img src="{{ asset('img/wallet-3.png') }}" alt="#"></div>
                                                <h4 class="nftmax-balance-name">Bitski</h4>
                                            </div>
                                            <div class="nftmax-balance-amount">
                                                <h4 class="nftmax-balance-amount nftmax-scolor">56,124 ETH <span class="nftmax-balance-usd">(773.69 USD)</span></h4>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="nftmax-balance-info">
                                                <div class="nftmax-balance__img"><img src="{{ asset('img/wallet-4.png') }}" alt="#"></div>
                                                <h4 class="nftmax-balance-name">WalletConnect</h4>
                                            </div>
                                            <div class="nftmax-balance-amount">
                                                <h4 class="nftmax-balance-amount nftmax-scolor">43,728 ETH <span class="nftmax-balance-usd">(773.69 USD)</span></h4>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- NFTMax Balance Button -->
                                    <div class="nftmax-balance__button" data-bs-toggle="modal" data-bs-target="#add_wallet"><a href="#" class="nftmax-btn nftmax-btn__bordered bg radius">Add Money</a></div>
                                </div>
                                <!-- End NFTMax Balance Hover -->
                            </div>
                            <!-- End Search Form -->
                            <div class="nftmax-header__group-two">
                                <div class="nftmax-header__right">
                                    <div class="nftmax-header__alarm"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 22 24" fill="none"><path d="M3.27336 17.6123H18.3622C18.8266 17.6123 19.2841 17.5005 19.6961 17.2863C20.1081 17.072 20.4625 16.7617 20.7292 16.3815C20.9959 16.0014 21.1671 15.5626 21.2283 15.1023C21.2896 14.6419 21.239 14.1736 21.081 13.737L18.3323 6.13763C17.8629 4.44882 16.8532 2.96026 15.4577 1.89961C14.0621 0.838957 12.3576 0.264609 10.6048 0.264404V0.264404C8.78009 0.264376 7.00995 0.886604 5.58662 2.02836C4.16328 3.17011 3.17186 4.76311 2.77605 6.54435L0.511187 13.869C0.377839 14.3015 0.347861 14.7592 0.423665 15.2053C0.49947 15.6515 0.678939 16.0736 0.947633 16.4377C1.21633 16.8018 1.56674 17.0978 1.97069 17.3018C2.37463 17.5058 2.82082 17.6122 3.27336 17.6123Z" fill="#374557"></path><path d="M6.19531 19.5398C6.41651 20.6291 7.00751 21.6085 7.86817 22.312C8.72883 23.0154 9.80622 23.3997 10.9178 23.3997C12.0294 23.3997 13.1068 23.0154 13.9674 22.312C14.8281 21.6085 15.4191 20.6291 15.6403 19.5398H6.19531Z" fill="#374557"></path></svg><span class="nftmax-header__count">3</span>
                                        <!-- NFTMax Alarm Hover -->
                                        <div class="nftmax-balance nftmax-alarm__hover">
                                            <h3 class="nftmax-balance__title">Recent Notification</h3>
                                            <!-- NFTMax Balance List -->
                                            <ul class="nftmax-balance_list">
                                                <li>
                                                    <div class="nftmax-balance-info">
                                                        <div class="nftmax-balance__img nftmax-alarm__default"><img src="{{ asset('img/notify-1.png') }}" alt="#"></div>
                                                        <div class="nftmax-alarm__content">
                                                            <h4 class="nftmax-balance-name">Your Account has been created <strong class="nftmax-balance__second">successfully done</strong></h4>
                                                            <p class="nftmax-alarm__text">2 days ago</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="nftmax-balance-info">
                                                        <div class="nftmax-balance__img nftmax-alarm__img-two"><img src="{{ asset('img/notify-2.png') }}" alt="#"></div>
                                                        <div class="nftmax-alarm__content">
                                                            <h4 class="nftmax-balance-name">Your Account has been created <strong class="nftmax-balance__second">successfully done</strong></h4>
                                                            <p class="nftmax-alarm__text">2 days ago</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="nftmax-balance-info">
                                                        <div class="nftmax-balance__img nftmax-alarm__img-three"><img src="{{ asset('img/notify-3.png') }}" alt="#"></div>
                                                        <div class="nftmax-alarm__content">
                                                            <h4 class="nftmax-balance-name"><strong class="nftmax-balance__second">Thank you!</strong> you made your first sell <strong class="nftmax-balance__second">232.98 ETH</strong></h4>
                                                            <p class="nftmax-alarm__text">2 days ago</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="nftmax-balance-info">
                                                        <div class="nftmax-balance__img nftmax-alarm__img-four"><img src="{{ asset('img/notify-4.png') }}" alt="#"></div>
                                                        <div class="nftmax-alarm__content">
                                                            <h4 class="nftmax-balance-name"><strong class="nftmax-balance__second">Broklan Simons</strong> Start Following you</h4>
                                                            <p class="nftmax-alarm__text">2 days ago</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="nftmax-balance-info">
                                                        <div class="nftmax-balance__img nftmax-alarm__img-five"><img src="{{ asset('img/notify-5.png') }}" alt="#"></div>
                                                        <div class="nftmax-alarm__content">
                                                            <h4 class="nftmax-balance-name">you ranked up and now you are a <strong class="nftmax-balance__second">Author Master</strong></h4>
                                                            <p class="nftmax-alarm__text">6 days ago</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- NFTMax Balance Button -->
                                            <div class="nftmax-balance__button"><a href="#" class="nftmax-balance__sell-all">See all Notification</a></div>
                                        </div>
                                        <!-- End NFTMax Balance Hover -->
                                    </div>
                                    <div class="nftmax-header__author">
                                        <div class="nftmax-header__author-img"><img src="{{ asset('storage/users/'.auth()->user()->photo) }}" alt="#"></div>
                                        <div class="nftmax-header__author-content">
                                            <h4 class="nftmax-header__author-title">{{ auth()->user()->full_name }}</h4>
                                            <p class="nftmax-header__author-text v1"><a href="#">{{'@'. auth()->user()->DNI }}</a></p>
                                        </div>
                                        
                                        <!-- NFTMax Profile Hover -->
                                        <div class="nftmax-balance nftmax-profile__hover">
                                            <h3 class="nftmax-balance__title">My Profile</h3>
                                            <!-- NFTMax Balance List -->
                                            <ul class="nftmax-balance_list">
                                                {{-- <li>
                                                    <div class="nftmax-balance-info">
                                                        <div class="nftmax-balance__img nftmax-profile__img-one"><img src="{{ asset('img/profile-1.png') }}" alt="#"></div>
                                                        <h4 class="nftmax-balance-name"><a href="profile.html">My Profile</a></h4>
                                                    </div>
                                                </li> --}}
                                                
                                                <li>
                                                    <div class="nftmax-balance-info">
                                                        <div class="nftmax-balance__img nftmax-profile__img-five"><img src="{{ asset('img/profile-5.png') }}" alt="#"></div>
                                                        <h4 class="nftmax-balance-name"><a href="{{ route('logout') }}">Log Out</a></h4>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End NFTMax Balance Hover -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>