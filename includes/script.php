<div id="tb-scrollup"><i class="fa fa-angle-up"></i></div>
    <div class="tb-video-popup">
        <div class="tb-video-popup-overlay"></div>
        <div class="tb-video-popup-content">
            <div class="tb-video-popup-layer"></div>
            <div class="tb-video-popup-container">
                <div class="tb-video-popup-align">
                    <div class="embed-responsive embed-responsive-16by9"> <iframe class="embed-responsive-item"
                            src="about:blank"></iframe></div>
                </div>
                <div class="tb-video-popup-close"></div>
            </div>
        </div>
    </div>
    <script>
    'use strict';

    function debounce(func, wait, immediate) {

        // Debounce
        // http://davidwalsh.name/javascript-debounce-function

        var timeout;
        return function() {
            var context = this,
                args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) {
                    func.apply(context, args);
                }
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) {
                func.apply(context, args);
            }
        };
    }

    var htmlTag = document.getElementsByTagName('html')[0];
    var videoContainer = document.querySelector('#video-container');
    var videoElem = document.querySelector('#video-container video');

    var minW = 320; // Minimum video width allowed
    var vidWOrig; // Original video dimensions
    var vidHOrig;

    vidWOrig = videoElem.getAttribute('width');
    vidHOrig = videoElem.getAttribute('height');

    var videoCover = function() {

        var winWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        var winHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

        // Set the video viewport to the window size

        videoContainer.style.width = winWidth + 'px';
        videoContainer.style.height = winHeight + 'px';

        // Use largest scale factor of horizontal/vertical
        var scaleH = winWidth / vidWOrig;
        var scaleV = winHeight / vidHOrig;
        var scale = scaleH > scaleV ? scaleH : scaleV;

        // Don't allow scaled width < minimum video width
        if (scale * vidWOrig < minW) {
            scale = minW / vidWOrig;
        }

        // Scale the video
        var videoNewWidth = scale * vidWOrig;
        var videoNewHeight = scale * vidHOrig;

        videoElem.style.width = videoNewWidth + 'px';
        videoElem.style.height = videoNewHeight + 'px';

        // Center it by scrolling the video viewport
        videoContainer.scrollLeft = (videoNewWidth - winWidth) / 2;
        videoContainer.scrollTop = (videoNewHeight - winHeight) / 2;

    };

    if (htmlTag.classList.contains('no-touch')) {
        videoCover();

        // Adjust on resize
        var updateVideo = debounce(function() {
            videoCover();
        }, 100);

        window.addEventListener('resize', updateVideo);
    }
    </script>

    <script type="text/javascript" id="wp-api-fetch-js-after">
    wp.apiFetch.use(
        wp.apiFetch.createRootURLMiddleware("consult/wp-json/index.html")
    );
    wp.apiFetch.nonceMiddleware = wp.apiFetch.createNonceMiddleware(
        "125aaee297"
    );
    wp.apiFetch.use(wp.apiFetch.nonceMiddleware);
    wp.apiFetch.use(wp.apiFetch.mediaUploadMiddleware);
    wp.apiFetch.nonceEndpoint =
        "consult/wp-admin/admin-ajaxf809.html?action=rest-nonce";
    </script>
    <script type="text/javascript" id="contact-form-7-js-extra">
    /* <![CDATA[ */
    var wpcf7 = {
        cached: "1",
    }; /* ]]> */
    </script>
    <script type="text/javascript" id="webify-main-js-extra">
    /* <![CDATA[ */
    var get = {
        ajaxurl: "https:\/\/themebubble.com\/demo\/webify\/consult\/wp-admin\/admin-ajax.php",
        siteurl: "https:\/\/themebubble.com\/demo\/webify\/consult\/wp-content\/themes\/webify",
        nonce: "81d28e9810",
    }; /* ]]> */
    </script>
    <script type="text/javascript" id="elementor-frontend-js-before">
    var elementorFrontendConfig = {
        environmentMode: {
            edit: false,
            wpPreview: false,
        },
        i18n: {
            shareOnFacebook: "Share on Facebook",
            shareOnTwitter: "Share on Twitter",
            pinIt: "Pin it",
            download: "Download",
            downloadImage: "Download image",
            fullscreen: "Fullscreen",
            zoom: "Zoom",
            share: "Share",
            playVideo: "Play Video",
            previous: "Previous",
            next: "Next",
            close: "Close",
        },
        is_rtl: false,
        breakpoints: {
            xs: 0,
            sm: 480,
            md: 768,
            lg: 1025,
            xl: 1440,
            xxl: 1600,
        },
        version: "3.0.8",
        is_static: false,
        legacyMode: {
            elementWrappers: true,
        },
        urls: {
            assets: "https:\/\/themebubble.com\/demo\/webify\/consult\/wp-content\/plugins\/elementor\/assets\/",
        },
        settings: {
            page: [],
            editorPreferences: [],
        },
        kit: {
            global_image_lightbox: "yes",
            lightbox_enable_counter: "yes",
            lightbox_enable_fullscreen: "yes",
            lightbox_enable_zoom: "yes",
            lightbox_enable_share: "yes",
            lightbox_title_src: "title",
            lightbox_description_src: "description",
        },
        post: {
            id: 5,
            title: "Home%20-%20Consult",
            excerpt: "",
            featuredImage: "https:\/\/themebubble.com\/demo\/webify\/consult\/wp-content\/uploads\/sites\/3\/2019\/05\/otjiuhq5zcw.jpg",
        },
    };
    </script>
    <script src="remote/impjs.js?ver=19878" data-minify="1"></script>
    
    
    
    <script>
    document.querySelector(".form_submit_btn").addEventListener("click", e => {
        const form = document.querySelector(".form_class");
        form.classList.remove("submitting");

        form.submit();
    })
    </script>

    <script src="https://www.cryptohopper.com/widgets/js/script"></script>
    <script type='text/javascript' id='wp-api-fetch-js-after'>
    wp.apiFetch.use(wp.apiFetch.createRootURLMiddleware("../wp-json/index.html"));
    wp.apiFetch.nonceMiddleware = wp.apiFetch.createNonceMiddleware("4829b6ca0f");
    wp.apiFetch.use(wp.apiFetch.nonceMiddleware);
    wp.apiFetch.use(wp.apiFetch.mediaUploadMiddleware);
    wp.apiFetch.nonceEndpoint = "../wp-admin/admin-ajaxf809.html?action=rest-nonce";
    </script>
    <script type='text/javascript' id='contact-form-7-js-extra'>
    /* <![CDATA[ */
    var wpcf7 = {
        "cached": "1"
    }; /* ]]> */
    </script>
    <script type='text/javascript' id='webify-main-js-extra'>
    /* <![CDATA[ */
    var get = {
        "ajaxurl": "https:\/\/themebubble.com\/demo\/webify\/motivational-speaker\/wp-admin\/admin-ajax.php",
        "siteurl": "https:\/\/webify-13e95.kxcdn.com\/demo\/webify\/motivational-speaker\/wp-content\/themes\/webify",
        "nonce": "1ddd38e2ad"
    }; /* ]]> */
    </script>
    <script type='text/javascript' id='elementor-frontend-js-before'>
    var elementorFrontendConfig = {
        "environmentMode": {
            "edit": false,
            "wpPreview": false
        },
        "i18n": {
            "shareOnFacebook": "Share on Facebook",
            "shareOnTwitter": "Share on Twitter",
            "pinIt": "Pin it",
            "download": "Download",
            "downloadImage": "Download image",
            "fullscreen": "Fullscreen",
            "zoom": "Zoom",
            "share": "Share",
            "playVideo": "Play Video",
            "previous": "Previous",
            "next": "Next",
            "close": "Close"
        },
        "is_rtl": false,
        "breakpoints": {
            "xs": 0,
            "sm": 480,
            "md": 768,
            "lg": 1025,
            "xl": 1440,
            "xxl": 1600
        },
        "version": "3.0.8",
        "is_static": false,
        "legacyMode": {
            "elementWrappers": true
        },
        "urls": {
            "assets": "https:\/\/themebubble.com\/demo\/webify\/motivational-speaker\/wp-content\/plugins\/elementor\/assets\/"
        },
        "settings": {
            "page": [],
            "editorPreferences": []
        },
        "kit": {
            "global_image_lightbox": "yes",
            "lightbox_enable_counter": "yes",
            "lightbox_enable_fullscreen": "yes",
            "lightbox_enable_zoom": "yes",
            "lightbox_enable_share": "yes",
            "lightbox_title_src": "title",
            "lightbox_description_src": "description"
        },
        "post": {
            "id": 439,
            "title": "Contact%20-%20Motivational%20Speaker",
            "excerpt": "",
            "featuredImage": false
        }
    };
    </script>