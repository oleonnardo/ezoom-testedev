<header id="header" class="full-header transparent-header">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">
                <div id="logo">
                    <a href="{{ route('site.home') }}">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="{{ config('app.name') }}">
                    </a>
                </div>

                <div class="header-misc">
                    <div id="top-search" class="header-misc-icon">
                        <a href="#" id="top-search-trigger">
                            <i class="icon-line-search"></i>
                            <i class="icon-line-cross"></i>
                        </a>
                    </div>
                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                        <path d="m 30,50 h 40"></path>
                        <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                    </svg>
                </div>

                <nav class="primary-menu">
                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="#"><div>Menu1</div></a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#"><div>Menu2</div></a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="#"><div>Menu3</div></a>
                        </li>
                    </ul>
                </nav>

                <form class="top-search-form" action="#" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                </form>
            </div>
        </div>
    </div>

    <div class="header-wrap-clone"></div>
</header>
