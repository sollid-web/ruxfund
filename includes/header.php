<header class="tb-site-header tb-sticky-logo tb-default-width tb-style1 tb-sticky-disabled tb-transparent-header tb-color2 tb-header-border1 tb-header-overlay">
    <div class="tb-main-header">
        <div class="container">
            <div class="tb-main-header-in">
                <div class="tb-main-header-left">
                    <div class="tb-site-branding tb-site-branding-mobile"> <a href="/index.php"
                            class="tb-custom-logo-link "><img src="site-images/cover-new-removebg-preview.png"
                                style="max-height:30px;" alt="logo" class="tb-custom-logo"></a></div>
                </div>
                    <button class="rux-mobile-menu-toggle" type="button" aria-controls="rux-mobile-nav"
                        aria-expanded="false">
                        <span></span><span></span><span></span>
                        <span class="sr-only">Menu</span>
                    </button>
                <div class="tb-main-header-center">
                    <nav id="rux-mobile-nav" class="tb-main-nav tb-primary-nav">
                        <ul id="nav" class="tb-primary-nav-list">
                            <li id="menu-item-519"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-519"> <a
                                    href="index.php">Home</a></li>
                            <li id="menu-item-674"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-674"><a
                                    href="about.php">About Us</a></li>
                           <li id="menu-item-674"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-674"><a
                                    href="service.php">Our Services</a></li>
                            <li class="menu-item"><a href="plans.php">Investment Plans</a></li>
                            
                        </ul>
                        <div class="tb-site-branding"> <a href="index.php" class="tb-custom-logo-link tb-logo"><img
                                    src="images/logo.png" style="max-height:30px;" alt="logo"
                                    class="tb-custom-logo"></a> <a href="index.php"
                                class="tb-custom-logo-link tb-logo-sticky"><img src="images/logo.png"
                                    alt="logo" class="tb-custom-logo"></a></div>

                        <ul id="nav" class="tb-primary-nav-list">
                            <li id="menu-item-518"
                                class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-200 current_page_item menu-item-518">
                                <a href="contact.php">Contact Us</a>
                            </li>

                            <li id="menu-item-674"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-674"><a
                                    href="auth/login.php">Login</a></li>
                        </ul>

                    </nav>
                </div>
                <div class="tb-main-header-right hide_sm_stefan">
                    <div class="tb-header-btn"><a href="auth/signup.php" class="tb-btn  tb-style9">Create New
                            Account</a></div>
                </div>
            </div>
        </div>
    </div>
</header>  
<script>
    (function () {
        var toggle = document.querySelector('.rux-mobile-menu-toggle');
        var nav = document.getElementById('rux-mobile-nav');
        if (!toggle || !nav) return;
        toggle.addEventListener('click', function () {
            var isOpen = toggle.getAttribute('aria-expanded') === 'true';
            toggle.setAttribute('aria-expanded', String(!isOpen));
            nav.classList.toggle('rux-mobile-nav-open', !isOpen);
        });
    }());
</script>
