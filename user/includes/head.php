<head>
    <base href="">
    <meta charset="utf-8">
    <meta name="author" content="Cloudminerglobal">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title><?php echo $page['title'];?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/css/dashlite.css?ver=2.9.0">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css?ver=2.9.0">
    <style>
            
            * {
  box-sizing: border-box;
}

#google_translate_element {
  z-index: 9999999;
  position: top;
  bottom: 25px;
  left: 15px;
}

.goog-te-gadget {
  font-family: Roboto, "Open Sans", sans-serif !important;
  text-transform: uppercase;
}

.goog-te-gadget-simple {
  background-color: rgba(0, 0, 0, 0.5) !important;
  border: 1px solid rgba(255, 255, 255, 0.5) !important;
  padding: 3px !important;
  border-radius: 4px !important;
  font-size: 0.8rem !important;
  line-height: 2rem !important;
  display: inline-block;
  cursor: pointer;
  zoom: 1;
  margin-bottom: 4px;
}

.goog-te-menu2 {
  max-width: 100%;
}

.goog-te-menu-value {
  color: #fff !important;
}
.goog-te-menu-value:before {
  font-family: 'Material Icons';
  content: "\E927";
  margin-right: 16px;
  font-size: 2rem;
  vertical-align: -10px;
}

.goog-te-menu-value span:nth-child(5) {
  display: none;
}

.goog-te-menu-value span:nth-child(3) {
  border: none !important;
  font-family: 'Material Icons';
}
.goog-te-menu-value span:nth-child(3):after {
  font-family: 'Material Icons';
  content: "\E5C5";
  font-size: 1.5rem;
  vertical-align: -6px;
}

.goog-te-gadget-icon {
  background-position: 0px 0px;
  height: 32px !important;
  width: 32px !important;
  margin-right: 8px !important;
  display: none;
}

.goog-te-banner-frame.skiptranslate {
  display: none !important;
}


body {
  top: 0px !important;
}

/* ================================== *\
    Mediaqueries
\* ================================== */
@media (max-width: 667px) {
  #google_translate_element {
  }
  #google_translate_element goog-te-gadget {
  }
  #google_translate_element .skiptranslate {
  }
  #google_translate_element .goog-te-gadget-simple {
    text-align: center;
  }
}
p {
    font-size: 1rem;
}




@import url("https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.container {
  min-height: 100vh;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.content {
  background-color: white;
  color: black;
  position: relative;
  padding: 30px;
  border-radius: 10px;
}
.content h4 {
  cursor: pointer;
}
.popup {
  opacity: 0;
  pointer-events: none;
  position: absolute;
  width: fit-content;
  top: -100px;
  left: 50%;
  transform: translate(-50%, -20px);
  color: white;
  background-color: green;
  text-align: center;
  font-size: 18px;
  border-radius: 5px;
  padding: 10px;
  transition: 0.5s ease-in-out all;
}
.popup.active {
  animation: copyPopup 1s ease forwards;
}

@keyframes copyPopup {
  0% {
    opacity: 0;
    pointer-events: none;
    transform: translate(-50%, -20px);
  }
  40% {
    opacity: 1;
    pointer-events: all;
    transform: translate(-50%, 0);
  }
  80% {
    opacity: 1;
    pointer-events: all;
    transform: translate(-50%, 0);
  }
  100% {
    opacity: 0;
    pointer-events: none;
    transform: translate(-50%, -20px);
  }
}

@media (min-width: 992px) {
  .is-theme .nk-menu .nk-menu-sub {
    background: #ffffff;
    border: 1px solid #e5e9f2;
    box-shadow: 0 4px 12px rgba(43, 55, 72, 0.18);
  }

  .is-theme .nk-menu .nk-menu-sub .nk-menu-link,
  .is-theme .nk-menu .nk-menu-sub .nk-menu-text {
    color: #526484 !important;
  }

  .is-theme .nk-menu .nk-menu-sub .nk-menu-link:hover {
    color: #465fff !important;
    background: #f5f6fa;
  }
}



        </style>
    <link rel="stylesheet" href="assets/css/rux-mobile.css?ver=20261025-mobile1">
</head>