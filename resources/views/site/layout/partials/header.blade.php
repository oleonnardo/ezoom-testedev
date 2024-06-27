<header id="header" class="full-header transparent-header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">
                <div id="logo">
                    <a href="{{ route('site.home') }}">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="{{ config('app.name') }}">
                    </a>
                </div>

                <div class="header-content">
                    <nav class="primary-menu">
                        <ul class="menu-container">
                            <li class="menu-item">
                                <a class="menu-link" href="#">Menu1</a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="#">Menu2</a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="#">Menu3</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="header-icon-search">
                        <a href="javascript:void(0)">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>

                    <div class="social-icons">
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                        <li><a href="#"><i class="icon-line-microphone"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="header-wrap-clone"></div>
</header>
