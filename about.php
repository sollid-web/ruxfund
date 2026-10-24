<?php
$mobileview = 0;
$about_page = 1;
include('includes/server.php');
include('includes/functions.php');
$header_type = array('id'=>4,'head'=>'About Us','subhead'=>$getsite['name']);
$page = array('id'=>6,'title'=>'About Us','bread'=>'About Us');
$pagename = 'About Us';

?>

<!doctype html>
<html class="no-js" lang="en-US">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->


<!---->
<?php include './includes/head.php';?>
<!---->



<body class="page-template-default page page-id-200 wp-embed-responsive elementor-default elementor-kit-1342 elementor-page elementor-page-200">
    
    <!---->
    <?php include './includes/header.php';?>
    <!---->
      
    <div class="tb-content elementor-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-top:0px">
                    <div data-elementor-type="wp-post" data-elementor-id="200"
                        class="elementor elementor-200 elementor elementor-5 elementor-609 elementor-7 elementor-393 elementor-391"
                        data-elementor-settings="[]">
                        <div class="elementor-inner">
                            <div class="elementor-section-wrap">
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-f7878f3 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                    data-id="f7878f3" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-no">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-cbfb1e0"
                                                data-id="cbfb1e0" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-b450231 elementor-widget elementor-widget-webify-hero-banner-widget"
                                                            data-id="b450231" data-element_type="widget"
                                                            data-widget_type="webify-hero-banner-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-hero tb-parallax has-overlay tb-style9 tb-bg tb-flex text-center"
                                                                    data-speed="0.4"
                                                                    style="background-image: url('/site-images/bitstock-capital-1.jpg') !important; background-position: center !important;">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="tb-hero-text">
                                                                                    <h1
                                                                                        class="tb-hero-title tb-text-slider tb-white-c tb-f60-lg tb-f38-sm tb-font-name tb-m0 stef_header_title">
                                                                                        <?php echo $getsite['name'];?> Cryptocurrency
                                                                                        Investments</h1>
                                                                                    <div class="empty-space marg-lg-b5">
                                                                                    </div>
                                                                                    <div
                                                                                        class="tb-hero-subtitle tb-white-c tb-f20-lg tb-line1-6">
                                                                                        We offer our investors access to
                                                                                        high-growth investment
                                                                                        opportunities in the Bitcoin
                                                                                        markets.</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section
                                    class="t_a_c elementor-section elementor-top-section elementor-element elementor-element-f7878f3 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                    data-id="f7878f3" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}"
                                    style="padding: 0; overflow: hidden;">
                                    <div class="tradingview-widget-container" style="width: 100%; height: 72px;">
                                        <iframe scrolling="no" allowtransparency="true" frameborder="0"
                                            src="https://s.tradingview.com/embed-widget/tickers/?locale=en#%7B%22symbols%22%3A%5B%7B%22proName%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22title%22%3A%22S%26P%20500%22%7D%2C%7B%22proName%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22title%22%3A%22Nasdaq%20100%22%7D%2C%7B%22proName%22%3A%22FX_IDC%3AEURUSD%22%2C%22title%22%3A%22EUR%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22title%22%3A%22BTC%2FUSD%22%7D%2C%7B%22proName%22%3A%22BITSTAMP%3AETHUSD%22%2C%22title%22%3A%22ETH%2FUSD%22%7D%5D%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Afalse%2C%22width%22%3A%22100%25%22%2C%22height%22%3A72%2C%22utm_source%22%3A%22ulscapital.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22tickers%22%7D"
                                            style="box-sizing: border-box; height: 72px; width: 100%;"></iframe>

                                        <style>
                                        .tradingview-widget-copyright {
                                            font-size: 13px !important;
                                            line-height: 32px !important;
                                            text-align: center !important;
                                            vertical-align: middle !important;
                                            font-family: 'Trebuchet MS', Arial, sans-serif !important;
                                            color: #9db2bd !important;
                                        }

                                        .tradingview-widget-copyright .blue-text {
                                            color: #2196f3 !important;
                                        }

                                        .tradingview-widget-copyright a {
                                            text-decoration: none !important;
                                            color: #9db2bd !important;
                                        }

                                        .tradingview-widget-copyright a:visited {
                                            color: #9db2bd !important;
                                        }

                                        .tradingview-widget-copyright a:hover .blue-text {
                                            color: #38acdb !important;
                                        }

                                        .tradingview-widget-copyright a:active .blue-text {
                                            color: #299dcd !important;
                                        }

                                        .tradingview-widget-copyright a:visited .blue-text {
                                            color: #2196f3 !important;
                                        }
                                        </style>
                                    </div>
                                </section>

                                <br> <br>
<section
    class="jcjcjc elementor-section elementor-top-section elementor-element elementor-element-6e29cb6 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="6e29cb6" data-element_type="section">
    <div class="elementor-container elementor-column-gap-extended">
        <div class="elementor-row">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-373db66"
                data-id="373db66" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-ddac270 elementor-invisible elementor-widget elementor-widget-webify-about-us-widget"
                            data-id="ddac270" data-element_type="widget"
                            data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}"
                            data-widget_type="webify-about-us-widget.default">
                            <div class="elementor-widget-container">
                                <div class="tb-about tb-style1">
                                    <div class="tb-about-img text-center">
                                        <img style="max-height: 150px" src="site-images/awards/PRI-Logo-09.svg"
                                            alt="image">
                                    </div>
                                    <div class="empty-space marg-lg-b30"></div>
                                    <div class="tb-section-heading tb-style2 text-center">
                                        <div class="tb-f13-lg tb-line1-6 text-uppercase tb-sub-heading tb-spacing1 tb-mb2 tb-mt-5"
                                            class="tb-f13-lg tb-line1-6 text-uppercase tb-sub-heading tb-spacing1 tb-mb2 tb-mt-5">
                                            Build your financial future</div>
                                        <div class="empty-space marg-lg-b5"></div>
                                        <h2 class="tb-f36-lg tb-f25-sm tb-heading tb-font-name tb-m0"
                                            class="tb-f36-lg tb-f25-sm tb-heading tb-font-name tb-m0">
                                            <?php echo $getsite['name'];?> Cryptocurrency Investments
                                        </h2>
                                        <div class="empty-space marg-lg-b20 marg-sm-b20">
                                        </div>
                                    </div>
                                    <div class="text-center tb-f18-lg tb-about-content tb-f18-sm tb-line1-6"
                                        class="text-center tb-f18-lg tb-about-content tb-f18-sm tb-line1-6">
                                        <?php echo $getsite['name'];?> is the new reality in
                                        cryptocurrency investment services, with safe
                                        and easy access to crypto assets. <br> <br> We
                                        are proud to work to the highest ethical
                                        standards of Bitcoin investment, mining and
                                        trading strategies. We are pleased to implement
                                        some of the most dynamic and high-performing
                                        trading/investment strategies available.</div>
                                    <div class="empty-space marg-lg-b30 marg-sm-b30">
                                    </div>
                                    <div class="tb-awards tb-style1 tb-flex">
                                        <div class="tb-award"><img src="site-images/awards/gb.svg" style="height: 120px"
                                                alt="award"></div>
                                        <div class="tb-award"><img style="width: 200px"
                                                src="site-images/awards/WWFAAM.png" alt="award"></div>
                                        <div class="tb-award"><img style="height: 200px"
                                                src="site-images/awards/IE-UK-1.png" alt="award"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>                                 <br> <br>
 <!-- media slider -->
 <section
     class="hshssns elementor-section elementor-top-section elementor-element elementor-element-b0a55fb elementor-section-boxed elementor-section-height-default elementor-section-height-default"
     data-id="b0a55fb" data-element_type="section">
     <div class="elementor-container elementor-column-gap-extended">
         <div class="elementor-row">
             <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-ba3f9b5"
                 data-id="ba3f9b5" data-element_type="column">
                 <div class="elementor-column-wrap elementor-element-populated">
                     <div class="elementor-widget-wrap">
                         <div class="elementor-element elementor-element-b072b17 elementor-widget elementor-widget-webify-client-widget"
                             data-id="b072b17" data-element_type="widget"
                             data-widget_type="webify-client-widget.default">
                             <div class="elementor-widget-container">
                                 <div class="tb-client-wrapper">
                                     <div class="tb-arrow-closest tb-poind-closest tb-slider tb-style4">
                                         <div class="tb-slick-inner-pad-wrap">
                                             <div class="slick-container" data-autoplay="0" data-loop="1"
                                                 data-speed="600" data-center="0" data-slides-per-view="responsive"
                                                 data-xs-slides="1" data-sm-slides="2" data-md-slides="3"
                                                 data-lg-slides="4" data-add-slides="5">
                                                 <div class="slick-wrapper">
                                                     <div class="slick-slide">
                                                         <div class="tb-slick-inner-pad">
                                                             <div class="tb-client tb-style1 tb-flex">
                                                                 <img src="site-images/logos2/cnbc-1.svg"
                                                                     alt="client-image">
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="slick-slide">
                                                         <div class="tb-slick-inner-pad">
                                                             <div class="tb-client tb-style1 tb-flex">
                                                                 <img src="site-images/logos2/business-insider-1.svg"
                                                                     alt="client-image">
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="slick-slide">
                                                         <div class="tb-slick-inner-pad">
                                                             <div class="tb-client tb-style1 tb-flex">
                                                                 <img src="site-images/logos2/new-york-times.svg"
                                                                     alt="client-image">
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="slick-slide">
                                                         <div class="tb-slick-inner-pad">
                                                             <div class="tb-client tb-style1 tb-flex">
                                                                 <img src="site-images/logos2/reuters-6.svg"
                                                                     alt="client-image">
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="slick-slide">
                                                         <div class="tb-slick-inner-pad">
                                                             <div class="tb-client tb-style1 tb-flex">
                                                                 <img src="site-images/logos2/forbes-2.svg"
                                                                     alt="client-image">
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="slick-slide">
                                                         <div class="tb-slick-inner-pad">
                                                             <div class="tb-client tb-style1 tb-flex">
                                                                 <img src="site-images/logos2/in-wave-media-2.svg"
                                                                     alt="client-image">
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="pagination tb-style3 hidden"></div>
                                         <div class="swipe-arrow tb-style4">
                                             <div class="slick-arrow-left"></div>
                                             <div class="slick-arrow-right"></div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>                                <br> <br>
                                <section
    class="elementor-section elementor-top-section elementor-element elementor-element-3c792b1 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
    data-id="3c792b1" data-element_type="section"
    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
    <div class="elementor-container elementor-column-gap-default">
        <div class="elementor-row">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7db8815"
                data-id="7db8815" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-a9f3a33 elementor-widget elementor-widget-webify-icon-box-slider-widget"
                            data-id="a9f3a33" data-element_type="widget"
                            data-widget_type="webify-icon-box-slider-widget.default">
                            <div class="elementor-widget-container">
                                <div class="tb-overflow-hidden">
                                    <div class="tb-arrow-closest tb-poind-closest tb-slider tb-text-box-slider tb-style1 tb-bg"
                                        style="background-image:url(https://webify-13e95.kxcdn.com/demo/webify/motivational-speaker/wp-content/uploads/sites/48/2019/08/zzz-1-1.jpg)">
                                        <div class="slick-container" data-delay="" data-autoplay="0" data-loop="1"
                                            data-speed="600" data-center="0" data-slides-per-view="responsive"
                                            data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4"
                                            data-add-slides="4">
                                            <div class="slick-wrapper">
                                                <div class="slick-slide">
                                                    <div class="tb-text-box tb-style2">
                                                        <div class="tb-text-box-in">
                                                            <h2
                                                                class="tb-special-text tb-text-box-slider-count-item tb-f48-lg tb-line0-9 tb-white-c  tb-m0 tb-mb-3">
                                                                $13BN+</h2>
                                                            <div class="empty-space marg-lg-b20">
                                                            </div>
                                                            <h3
                                                                class="tb-font-name tb-f18-lg tb-text-box-slider-title tb-white-c tb-font-name tb-m0 tb-mt-3 tb-mb-6 tt_cap_stef">
                                                                IN ACTIVE INVESTMENTS
                                                            </h3>
                                                            <div class="empty-space marg-lg-b20">
                                                            </div>
                                                            <div
                                                                class="tb-white-c7 tb-text-box-slider-content  tb-mb-6 tb-mt-6">
                                                                Our goal is to enhance
                                                                lives by providing a
                                                                safe avenue, inspired by
                                                                effective and innovative
                                                                solutions for investing
                                                                in the different,
                                                                emerging cryptocurrency
                                                                markets in order to
                                                                improve our investors'
                                                                financial situation and
                                                                ultimately provide them
                                                                financial freedom.</div>
                                                            <div class="tb-text-box-btn">
                                                                <a href="about.php" target="_self"
                                                                    class="tb-btn tb-style1">Learn
                                                                    More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slick-slide">
                                                    <div class="tb-text-box tb-style2">
                                                        <div class="tb-text-box-in">
                                                            <h2
                                                                class="tb-special-text tb-text-box-slider-count-item tb-f48-lg tb-line0-9 tb-white-c  tb-m0 tb-mb-3">
                                                                87M+</h2>
                                                            <div class="empty-space marg-lg-b20">
                                                            </div>
                                                            <h3
                                                                class="tb-font-name tb-f18-lg tb-text-box-slider-title tb-white-c tb-font-name tb-m0 tb-mt-3 tb-mb-6 tt_cap_stef">
                                                                ACTIVE INVESTMENT
                                                                ACCOUNTS</h3>
                                                            <div class="empty-space marg-lg-b20">
                                                            </div>
                                                            <div
                                                                class="tb-white-c7 tb-text-box-slider-content  tb-mb-6 tb-mt-6">

                                                                <?php echo $getsite['name'];?> was
                                                                founded on a simple but
                                                                revolutionary idea that
                                                                an investment company
                                                                should be run for the
                                                                sole benefit of its
                                                                investors. And so
                                                                <?php echo $getsite['name'];?> was
                                                                designed to be
                                                                different, removing
                                                                outside owners and
                                                                outside interests from
                                                                the equation.

                                                                <!-- Because of
                                                                                                our investor-owned
                                                                                                structure, BitStock Capital 's success can only
                                                                                                be measured by your
                                                                                                success. -->

                                                            </div>
                                                            <div class="tb-text-box-btn">
                                                                <a href="about.php" target="_self"
                                                                    class="tb-btn tb-style1">Learn
                                                                    More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slick-slide">
                                                    <div class="tb-text-box tb-style2">
                                                        <div class="tb-text-box-in">
                                                            <h2
                                                                class="tb-special-text tb-text-box-slider-count-item tb-f48-lg tb-line0-9 tb-white-c  tb-m0 tb-mb-3">
                                                                $4BN+</h2>
                                                            <div class="empty-space marg-lg-b20">
                                                            </div>
                                                            <h3
                                                                class="tb-font-name tb-f18-lg tb-text-box-slider-title tb-white-c tb-font-name tb-m0 tb-mt-3 tb-mb-6 tt_cap_stef">
                                                                Total GROSS INTEREST
                                                                EARNED BY INVESTORS TO
                                                                DATE</h3>
                                                            <div class="empty-space marg-lg-b20">
                                                            </div>
                                                            <div
                                                                class="tb-white-c7 tb-text-box-slider-content  tb-mb-6 tb-mt-6">
                                                                Our professional team
                                                                will take charge of
                                                                trading and mining
                                                                management.
                                                                We provide investment
                                                                products and solutions
                                                                to our clients across
                                                                the world. Our breadth
                                                                of investment
                                                                capabilities is
                                                                extensive and among the
                                                                most innovative within
                                                                the market.</div>
                                                            <div class="tb-text-box-btn">
                                                                <a href="about.php" target="_self"
                                                                    class="tb-btn tb-style1">Learn
                                                                    More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slick-slide">
                                                    <div class="tb-text-box tb-style2">
                                                        <div class="tb-text-box-in">
                                                            <h2
                                                                class="tb-special-text tb-text-box-slider-count-item tb-f48-lg tb-line0-9 tb-white-c  tb-m0 tb-mb-3">
                                                                100+
                                                            </h2>
                                                            <div class="empty-space marg-lg-b20">
                                                            </div>
                                                            <h3
                                                                class="tb-font-name tb-f18-lg tb-text-box-slider-title tb-white-c tb-font-name tb-m0 tb-mt-3 tb-mb-6 tt_cap_stef">
                                                                Sophisticated crypto
                                                                mining servers</h3>
                                                            <div class="empty-space marg-lg-b20">
                                                            </div>
                                                            <div
                                                                class="tb-white-c7 tb-text-box-slider-content  tb-mb-6 tb-mt-6">
                                                                <?php echo $getsite['name'];?>
                                                                Investments utilizes
                                                                innovative proprietary
                                                                technologies to provide
                                                                managed cryptocurrency
                                                                trading services to
                                                                yield higher returns for
                                                                investors.
                                                            </div>
                                                            <div class="tb-text-box-btn">
                                                                <a href="about.php" target="_self"
                                                                    class="tb-btn tb-style1">Learn
                                                                    More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slick-slide">
                                                    <div class="tb-text-box tb-style2">
                                                        <div class="tb-text-box-in">
                                                            <h2
                                                                class="tb-special-text tb-text-box-slider-count-item tb-f48-lg tb-line0-9 tb-white-c  tb-m0 tb-mb-3">
                                                                98%</h2>
                                                            <div class="empty-space marg-lg-b20">
                                                            </div>
                                                            <h3
                                                                class="tb-font-name tb-f18-lg tb-text-box-slider-title tb-white-c tb-font-name tb-m0 tb-mt-3 tb-mb-6">
                                                                Success Ratio</h3>
                                                            <div class="empty-space marg-lg-b20">
                                                            </div>
                                                            <div
                                                                class="tb-white-c7 tb-text-box-slider-content  tb-mb-6 tb-mt-6">
                                                                Our solutions are
                                                                complex, automated and
                                                                using the market's
                                                                leading self-learning
                                                                trading program, which
                                                                aims at high profits
                                                                within a short period of
                                                                time in this bitcoin
                                                                investment platform.
                                                            </div>
                                                            <div class="tb-text-box-btn">
                                                                <a href="about.php" target="_self"
                                                                    class="tb-btn tb-style1">Learn
                                                                    More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="pagination tb-style2 hidden"></div>
                                        <div class="swipe-arrow tb-style3">
                                            <div class="slick-arrow-left"><i class="fa fa-angle-left"></i></div>
                                            <div class="slick-arrow-right"><i class="fa fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>                                <section
                                    class='elementor-section elementor-top-section elementor-element elementor-element-3c792b1 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default pd-top-main_ pd-bottom-main_ elementor-section elementor-top-section elementor-element elementor-element-3a1084e4 elementor-section-boxed elementor-section-height-default elementor-section-height-default'
                                    data-id='3c792b1' data-element_type='section'
                                    data-settings='{&quot;stretch_section&quot;:&quot;section-stretched&quot;}'
                                    style="padding-top: 50px">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-fea07a2"
                                                data-id="fea07a2" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-5857c1d7 elementor-invisible elementor-widget elementor-widget-webify-section-heading-widget"
                                                            data-id="5857c1d7" data-element_type="widget"
                                                            data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                                                            data-widget_type="webify-section-heading-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-section-heading tb-style2">
                                                                    <h2 class="t_a_c tb-f36-lg tb-f30-sm tb-font-name tb-big-heading tb-mt-5 tb-mt-3-sm tb-m0"
                                                                        class="tb-f36-lg tb-f30-sm tb-font-name tb-big-heading tb-mt-5 tb-mt-3-sm tb-m0"
                                                                        style="font-size: 25px;">
                                                                        WHAT OUR INVESTORS ARE SAYING ABOUT US</h2>
                                                                    <div class="empty-space marg-lg-b10"></div>
                                                                    <div none=""
                                                                        class="t_a_c tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7"
                                                                        class="tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7">
                                                                        We use the reviews of our investors as the yard
                                                                        stick to measure how well or otherwise we are
                                                                        doing in the dispensation of our services to our
                                                                        investors all over the world. We are always
                                                                        happy to share the positive reviews of our
                                                                        investors and improve on the areas we have been
                                                                        found wanting.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-4fd55bf2 elementor-widget elementor-widget-spacer"
                                                            data-id="4fd55bf2" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-4c7955a elementor-widget elementor-widget-webify-testimonial-slider-widget"
                                                            data-id="4c7955a" data-element_type="widget"
                                                            data-widget_type="webify-testimonial-slider-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="row">
                                                                    <div class="col-lg-5">
                                                                        <div class="empty-space marg-lg-b60 marg-sm-b0">
                                                                        </div>
                                                                        <div class="tb-testimonial-wrap">
                                                                            <div
                                                                                class="tb-arrow-closest tb-poind-closest tb-slider tb-style1">
                                                                                <div class="tb-overflow-hidden">
                                                                                    <div class="slick-container"
                                                                                        data-delay="2000"
                                                                                        data-autoplay="0" data-loop="1"
                                                                                        data-speed="600" data-center="0"
                                                                                        data-slides-per-view="responsive"
                                                                                        data-xs-slides="1"
                                                                                        data-sm-slides="1"
                                                                                        data-md-slides="1"
                                                                                        data-lg-slides="1"
                                                                                        data-add-slides="1">
                                                                                        <div class="slick-wrapper">
                                                                                            <div class="slick-slide">
                                                                                                <div
                                                                                                    class="tb-testimonial tb-style1">
                                                                                                    <span
                                                                                                        class="tb-testimonial-icon tb-font-name"><i class="fas fa-quote-right" style="font-size: 30px"></i></span>
                                                                                                    <div
                                                                                                        class="tb-testimonial-text tb-f18-lg tb-f16-sm tb-line1-6">
                                                                                                        <p>I've had
                                                                                                            incredible
                                                                                                            customer
                                                                                                            service
                                                                                                            since i
                                                                                                            started
                                                                                                            investing
                                                                                                            here, I'm a
                                                                                                            repeat
                                                                                                            investor.
                                                                                                            I've been
                                                                                                            investng
                                                                                                            with
                                                                                                            <?php echo $getsite['name'];?>  for
                                                                                                            nearly 3
                                                                                                            years now
                                                                                                            and i've
                                                                                                            loved every
                                                                                                            bit of the
                                                                                                            experience
                                                                                                            so far.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="empty-space marg-lg-b30 marg-sm-b30">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tb-testimonial-meta">
                                                                                                        <img width="50"
                                                                                                            height="50"
                                                                                                            src="site-images/reviewers/reviewer1.jpg"
                                                                                                            class="tb-radious-50 wp-post-image"
                                                                                                            alt=""
                                                                                                            loading="lazy"
                                                                                                            srcset="site-images/reviewers/reviewer1.jpg" />
                                                                                                        <h3
                                                                                                            class="tb-f18-lg tb-font-name tb-m0 tb-testimonial-name">
                                                                                                            Ron DiCicco
                                                                                                        </h3>
                                                                                                        <div
                                                                                                            class="tb-testimonial-position">
                                                                                                            Florida,
                                                                                                            United
                                                                                                            States</div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="slick-slide">
                                                                                                <div
                                                                                                    class="tb-testimonial tb-style1">
                                                                                                    <span
                                                                                                        class="tb-testimonial-icon tb-font-name"><i
                                                                                                            class="material-icons">format_quote</i></span>
                                                                                                    <div
                                                                                                        class="tb-testimonial-text tb-f18-lg tb-f16-sm tb-line1-6">
                                                                                                        <p>Transparent,
                                                                                                            profitable,
                                                                                                            and reliable
                                                                                                            bitcoin
                                                                                                            investment
                                                                                                            company that
                                                                                                            will make
                                                                                                            you real
                                                                                                            money.
                                                                                                            Thanks to
                                                                                                            all of you
                                                                                                            at
                                                                                                            <?php echo $getsite['name'];?>  for
                                                                                                            the
                                                                                                            excellent
                                                                                                            service.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="empty-space marg-lg-b30 marg-sm-b30">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tb-testimonial-meta">
                                                                                                        <img width="50"
                                                                                                            height="50"
                                                                                                            src="site-images/reviewers/reviewer2.jpg"
                                                                                                            class="tb-radious-50 wp-post-image"
                                                                                                            alt=""
                                                                                                            loading="lazy" />
                                                                                                        <h3
                                                                                                            class="tb-f18-lg tb-font-name tb-m0 tb-testimonial-name">
                                                                                                            Diane
                                                                                                            Podmanik
                                                                                                        </h3>
                                                                                                        <div
                                                                                                            class="tb-testimonial-position">
                                                                                                            Budapest,
                                                                                                            Hungary
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="slick-slide">
                                                                                                <div
                                                                                                    class="tb-testimonial tb-style1">
                                                                                                    <span
                                                                                                        class="tb-testimonial-icon tb-font-name"><i
                                                                                                            class="material-icons">format_quote</i></span>
                                                                                                    <div
                                                                                                        class="tb-testimonial-text tb-f18-lg tb-f16-sm tb-line1-6">
                                                                                                        <p>I have always
                                                                                                            been
                                                                                                            searching
                                                                                                            for an
                                                                                                            opportunity
                                                                                                            to earn on
                                                                                                            bitcoin and
                                                                                                            finally I
                                                                                                            found
                                                                                                            <?php echo $getsite['name'];?>  and
                                                                                                            they have
                                                                                                            proven to be
                                                                                                            very
                                                                                                            reliable
                                                                                                            since i've
                                                                                                            been
                                                                                                            investing
                                                                                                            with them.
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="empty-space marg-lg-b30 marg-sm-b30">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="tb-testimonial-meta">
                                                                                                        <img width="50"
                                                                                                            height="50"
                                                                                                            src="site-images/reviewers/reviewer3.jpg"
                                                                                                            class="tb-radious-50 wp-post-image"
                                                                                                            alt=""
                                                                                                            loading="lazy" />
                                                                                                        <h3
                                                                                                            class="tb-f18-lg tb-font-name tb-m0 tb-testimonial-name">
                                                                                                            Joe Tantillo
                                                                                                        </h3>
                                                                                                        <div
                                                                                                            class="tb-testimonial-position">
                                                                                                            Prague,
                                                                                                            Czech
                                                                                                            Republic
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="swipe-arrow tb-style1">
                                                                                    <div class="slick-arrow-left"><i
                                                                                            class="fa fa-angle-left"></i>
                                                                                    </div>
                                                                                    <div class="slick-arrow-right"><i
                                                                                            class="fa fa-angle-right"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="empty-space marg-lg-b60 marg-sm-b0">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-7">
                                                                        <div class="tb-testimonial-img tb-style1 tb-bg"
                                                                            style="background-image: url(site-images/bitstock-capital-14.jpg);">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section
                                    class="mt_20 elementor-section elementor-top-section elementor-element elementor-element-7e45fe4 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="7e45fe4" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b8289ac"
                                                data-id="b8289ac" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-95b1f45 elementor-widget elementor-widget-spacer"
                                                            data-id="95b1f45" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-3c639ae elementor-widget elementor-widget-webify-intro-text-widget"
                                                            data-id="3c639ae" data-element_type="widget"
                                                            data-widget_type="webify-intro-text-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-intro-text text-center">
                                                                    <div
                                                                        class="tb-sample-text tb-f18-lg tb-line1-6 tb-mt-5">
                                                                        <div none=""
                                                                            class="tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7">
                                                                            Our values are based on three tenets:
                                                                            reliability, security, and performance. With
                                                                            our deep understanding of technology,
                                                                            economics, and finance, and by applying
                                                                            knowledge and innovation, we have created
                                                                            one of the most sophisticated and
                                                                            technologically advanced trading platforms
                                                                            in the industry. Our vision extends also to
                                                                            be an innovative partner for investors to
                                                                            achieve their wealth goals.</div>
                                                                    </div>
                                                                    <div class="empty-space marg-lg-b15"></div>
                                                                    <a href="auth/signup.php" target="_self"
                                                                        class="tb-btn tb-btn-primary tb-style3 tb-color6">Create
                                                                        a free investment account</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>                                <br> <br>

                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-3c792b1 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                    data-id="3c792b1" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="bg_vid_stef">

                                        <div id="video-container">
                                            <video poster="./site-images/bitstock-capital-12.jpg" preload="auto"
                                                autoplay loop muted>
                                                <source src="./site-images/bg-chc.mp4" type="video/mp4">
                                            </video>
                                        </div>
                                        <div class="overlay">
                                            <div class="overlay__inner">
                                                <h2>Invest with confidence and benefit from the reliability of a trusted
                                                    investment company with a proven record of <span
                                                        style="border-bottom: 4px solid #073cec;">stability, security
                                                        and strength.</span></h2>
                                                <p class="c_w">
                                                    We are pleased to offer some of the most dynamic and high-performing
                                                    cryptocurrency trading and investment strategies available. We offer
                                                    our investors access to high-growth investment opportunities in the
                                                    Bitcoin markets.
                                                </p>
                                                <br>

                                                <a href="auth/signup.php" target="_self"
                                                    class="tb-btn tb-btn-primary tb-style3 tb-color6">Create a free
                                                    investment account now</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>


                                <br> <br> <br>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-1ebd8ae elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="1ebd8ae" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-ea1adf1"
                                                data-id="ea1adf1" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-fee63bd elementor-widget elementor-widget-webify-text-block-with-signature-widget"
                                                            data-id="fee63bd" data-element_type="widget"
                                                            data-widget_type="webify-text-block-with-signature-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-vertical-middle">
                                                                    <div class="tb-text-box tb-style1">
                                                                        <h2
                                                                            class="tb-f32-lg tb-heading tb-f28-sm tb-font-name tb-mt-5 tb-mp0 tup_fsz">
                                                                            WHY CHOOSE <span class="tup"><?php echo $getsite['name'];?> </span> INVESTMENTS?</h2>
                                                                        <div class="empty-space marg-lg-b15"></div>
                                                                        <div
                                                                            class="tb-f16-lg tb-description tb-line1-6">
                                                                            <?php echo $getsite['name'];?> is a leading cryptocurrency
                                                                            investment company offering premium
                                                                            investment services to investors; both
                                                                            individuals and corporations. We pride
                                                                            ourselves in our guarantees and success
                                                                            track record in the cryptocurrency
                                                                            trading/investment market. <br> <br>
                                                                            Our goal is to enhance lives by providing a
                                                                            safe avenue, inspired by effective and
                                                                            innovative solutions for investing in the
                                                                            different, emerging cryptocurrency markets
                                                                            in order to improve our investors' financial
                                                                            situation and ultimately provide them
                                                                            financial freedom.</div>
                                                                        <div class="empty-space marg-lg-b40"></div> <a
                                                                            href="auth/signup.php" target="_self"
                                                                            class="tb-btn tb-btn-primary tb-style3 tb-color6">Open
                                                                            a free investment account now</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-86e35b6"
                                                data-id="86e35b6" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-d72790d elementor-widget elementor-widget-webify-image-gallery-slider-widget"
                                                            data-id="d72790d" data-element_type="widget"
                                                            data-widget_type="webify-image-gallery-slider-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-half-slider tb-style1">
                                                                    <div class="tb-half-slider-in">
                                                                        <div
                                                                            class="tb-arrow-closest tb-poind-closest tb-slider tb-style5 tb-type1">
                                                                            <div class="slick-container"
                                                                                data-delay="2000" data-autoplay="0"
                                                                                data-loop="1" data-speed="600"
                                                                                data-autoplay-timeout="3000"
                                                                                data-center="1"
                                                                                data-slides-per-view="3">
                                                                                <div class="slick-wrapper">
                                                                                    <div class="slick-slide">
                                                                                        <div class="tb-bg"
                                                                                            style="background-image: url('site-images/bitstock-capital-9.jpg');">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="slick-slide">
                                                                                        <div class="tb-bg"
                                                                                            style="background-image: url('site-images/bitstock-capital-3-cropped.jpg');">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="slick-slide">
                                                                                        <div class="tb-bg"
                                                                                            style="background-image: url('site-images/bitstock-capital-5.jpg');">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="slick-slide">
                                                                                        <div class="tb-bg"
                                                                                            style="background-image: url('site-images/bitstock-capital-13.jpg');">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="pagination tb-style3"></div>
                                                                            <div class="swipe-arrow tb-style3">
                                                                                <div class="slick-arrow-left"><i
                                                                                        class="fa fa-angle-left"></i>
                                                                                </div>
                                                                                <div class="slick-arrow-right"><i
                                                                                        class="fa fa-angle-right"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <br> <br>

                                <section
                                    class='elementor-section elementor-top-section elementor-element elementor-element-3c792b1 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default'
                                    data-id='3c792b1' data-element_type='section'
                                    data-settings='{&quot;stretch_section&quot;:&quot;section-stretched&quot;}'>
                                </section>

                                <br> <br>



                                <br> <br>

                                <section
                                    class="pd-top-main pd-bottom-main_ bg-tinted elementor-section elementor-top-section elementor-element elementor-element-b4dfdb0 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="153b77c" data-element_type="section"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d03dbe3"
                                                data-id="d03dbe3" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-dd34b63 elementor-widget elementor-widget-webify-section-heading-widget"
                                                            data-id="dd34b63" data-element_type="widget"
                                                            data-widget_type="webify-section-heading-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-section-heading tb-style2">
                                                                    <h2 class="tb-f36-lg tb-f30-sm tb-font-name tb-big-heading tb-mt-5 tb-mt-3-sm tb-m0 stef_header_title"
                                                                        class="tb-f36-lg tb-f30-sm tb-font-name tb-big-heading tb-mt-5 tb-mt-3-sm tb-m0 stef_header_title">
                                                                        <?php echo $getsite['name'];?> Investments has been praised in
                                                                        the press by notable figures in the finance
                                                                        industry.</h2>
                                                                    <div class="empty-space marg-lg-b10"></div>
                                                                    <div none=""
                                                                        class="tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7"
                                                                        class="tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7"
                                                                        style="margin-bottom: 20px !important;">
                                                                        Invest with confidence and benefit from the
                                                                        reliability of a trusted broker with a proven
                                                                        record of stability, security and strength.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-09aaae0 elementor-widget elementor-widget-spacer"
                                                            data-id="09aaae0" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-ce6c682 elementor-widget elementor-widget-webify-testimonial-slider-widget"
                                                            data-id="ce6c682" data-element_type="widget"
                                                            data-widget_type="webify-testimonial-slider-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div
                                                                    class="tb-arrow-closest tb-poind-closest tb-slider tb-style1">
                                                                    <div class="slick-container" data-delay="2000"
                                                                        data-autoplay="0" data-loop="1" data-speed="600"
                                                                        data-autoplay-timeout="1000" data-loop="1"
                                                                        data-center="0" data-slides-per-view="1">
                                                                        <div class="slick-wrapper">
                                                                            <div class="slick-slide">
                                                                                <div
                                                                                    class="tb-testimonial tb-style6 tb-border tb-radious-5">
                                                                                    <div class="tb-testimonial-left">
                                                                                        <div
                                                                                            class="tb-testimonial-logo">
                                                                                            <img style="width: 100px"
                                                                                                src="site-images/logos2/new-york-times.svg"
                                                                                                alt="logo">
                                                                                        </div>
                                                                                        <div
                                                                                            class="tb-testimonial-text tb-f18-lg tb-line1-6">
                                                                                            <p>&#8220;<?php echo $getsite['name'];?>
                                                                                                has developed an
                                                                                                easy-to-use investment
                                                                                                service for managing
                                                                                                investments in crypto
                                                                                                currencies. Their use of
                                                                                                multi-sig technology in
                                                                                                bitcoin and litecoin to
                                                                                                create investment
                                                                                                contracts is quite
                                                                                                powerful. That they have
                                                                                                done it in a super
                                                                                                user-friendly way is
                                                                                                commendable.&#8221;
                                                                                            </p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="tb-testimonial-meta">
                                                                                            <br>
                                                                                            <h3
                                                                                                class="tb-f16-lg tb-font-name tb-testimonial-name tb-m0">
                                                                                                David Rubin</h3>
                                                                                            <div
                                                                                                class=" tb-mb-6 tb-testimonial-position tb-f13-lg">
                                                                                                CMO, New York Times
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="tb-testimonial-right">
                                                                                        <div class="tb-bg tb-testimonial-img"
                                                                                            style="background-image: url(site-images/EyiJOlbWUAEarFc.jpeg);">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="slick-slide">
                                                                                <div
                                                                                    class="tb-testimonial tb-style6 tb-border tb-radious-5">
                                                                                    <div class="tb-testimonial-left">
                                                                                        <div
                                                                                            class="tb-testimonial-logo">
                                                                                            <img style="width: 100px"
                                                                                                src="site-images/logos2/dash-4.svg"
                                                                                                alt="logo">
                                                                                        </div>
                                                                                        <div
                                                                                            class="tb-testimonial-text tb-f18-lg tb-line1-6">
                                                                                            <p>“<?php echo $getsite['name'];?> is
                                                                                                bringing innovation and
                                                                                                simplicity to
                                                                                                cryptocurrency
                                                                                                investing… <?php echo $getsite['name'];?>  is the first
                                                                                                company to enable such a
                                                                                                diverse range of
                                                                                                cryptocurrencies in one
                                                                                                wallet, and I'm excited
                                                                                                to see Dash as one of
                                                                                                the supported
                                                                                                cryptocurrencies at
                                                                                                launch.”</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="tb-testimonial-meta">
                                                                                            <br>
                                                                                            <h3
                                                                                                class="tb-f16-lg tb-font-name tb-testimonial-name tb-m0">
                                                                                                Ryan Taylor</h3>
                                                                                            <div
                                                                                                class=" tb-mb-6 tb-testimonial-position tb-f13-lg">
                                                                                                CEO, Dash core team
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="tb-testimonial-right">
                                                                                        <div class="tb-bg tb-testimonial-img"
                                                                                            style="background-image: url(site-images/Ryan-Taylor-DASH-CEO-Core-Team-1280x640.jpeg);">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="slick-slide">
                                                                                <div
                                                                                    class="tb-testimonial tb-style6 tb-border tb-radious-5">
                                                                                    <div class="tb-testimonial-left">
                                                                                        <div
                                                                                            class="tb-testimonial-logo">
                                                                                            <img style="width: 100px"
                                                                                                src="site-images/logos2/forbes-2.svg"
                                                                                                alt="logo">
                                                                                        </div>
                                                                                        <div
                                                                                            class="tb-testimonial-text tb-f18-lg tb-line1-6">
                                                                                            <p>&#8220;<?php echo $getsite['name'];?>’s
                                                                                                broad appeal means that
                                                                                                it can cater to both
                                                                                                worlds — a convenient
                                                                                                way to access
                                                                                                cryptocurrency for those
                                                                                                in developed countries,
                                                                                                as well as a parallel
                                                                                                financial service in
                                                                                                those less developed
                                                                                                areas.&#8221;
                                                                                            </p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="tb-testimonial-meta">
                                                                                            <br>
                                                                                            <h3
                                                                                                class="tb-f16-lg tb-font-name tb-testimonial-name tb-m0">
                                                                                                Mike Federle</h3>
                                                                                            <div
                                                                                                class=" tb-mb-6 tb-testimonial-position tb-f13-lg">
                                                                                                CEO, Forbes</div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="tb-testimonial-right">
                                                                                        <div class="tb-bg tb-testimonial-img"
                                                                                            style="background-image: url(site-images/rsz_gettyimages-1184030955-1024x1024.jpg);">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="swipe-arrow tb-style1">
                                                                        <div class="slick-arrow-left"><i
                                                                                class="fa fa-angle-left"></i></div>
                                                                        <div class="slick-arrow-right"><i
                                                                                class="fa fa-angle-right"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section style="padding-top: 20px"
                                    class="hide_sm_stefan mt_20 elementor-section elementor-top-section elementor-element elementor-element-7e45fe4 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="7e45fe4" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b8289ac"
                                                data-id="b8289ac" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-95b1f45 elementor-widget elementor-widget-spacer"
                                                            data-id="95b1f45" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-3c639ae elementor-widget elementor-widget-webify-intro-text-widget"
                                                            data-id="3c639ae" data-element_type="widget"
                                                            data-widget_type="webify-intro-text-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-intro-text text-center">
                                                                    <div
                                                                        class="tb-sample-text tb-f18-lg tb-line1-6 tb-mt-5">
                                                                        <p>We put our clients first. We know our clients
                                                                            are educated and informed and require a
                                                                            service that can be tailored to their high
                                                                            expectations. We have balanced the risk and
                                                                            reward to put together an easy to understand
                                                                            investment strategy that is in-line with
                                                                            your preferences. We have an in-depth
                                                                            understanding of the Bitcoin markets and
                                                                            have leveraged that knowledge to benefit all
                                                                            of our users. Thanks to our dedicated team
                                                                            of industry-leading experts, we have been
                                                                            able to generate industry-beating returns.

                                                                            <br> <br>
                                                                            We’re proud to be an asset management
                                                                            company whose culture is driven by strong
                                                                            values and a long-term vision. At Pelstrod,
                                                                            our vision, mission and core values serve as
                                                                            the catalyst in our relations with our
                                                                            clients, employees, shareholders and in the
                                                                            communities in which we live and work. They
                                                                            are our guiding compass in our business each
                                                                            day.
                                                                        </p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <br> <br>

                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-7fb626e elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="7fb626e" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-34cbb93"
                                                data-id="34cbb93" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-b9ef69e elementor-widget elementor-widget-spacer"
                                                            data-id="b9ef69e" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <div class="elementor-element elementor-element-0cb394a elementor-widget elementor-widget-divider"
                                    data-id="0cb394a" data-element_type="widget" data-widget_type="divider.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-divider"> <span class="elementor-divider-separator">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- 16 -->
                                <br> <br>
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-2b24006 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="2b24006" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-b149c43"
                                                data-id="b149c43" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-5192d59 animated-slow elementor-invisible elementor-widget elementor-widget-webify-section-heading-widget"
                                                            data-id="5192d59" data-element_type="widget"
                                                            data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}"
                                                            data-widget_type="webify-section-heading-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-section-heading">
                                                                    <h2 class="tb-f32-lg tb-f28-sm tb-big-heading tb-font-name tb-mt-5 tb-mb-8 tb-mb-6-sm"
                                                                        class="tb-f32-lg tb-f28-sm tb-big-heading tb-font-name tb-mt-5 tb-mb-8 tb-mb-6-sm">
                                                                        <?php echo $getsite['name'];?> Investments
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7c681b3"
                                                data-id="7c681b3" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-38b2ae2 elementor-widget elementor-widget-webify-text-block-with-button-widget"
                                                            data-id="38b2ae2" data-element_type="widget"
                                                            data-widget_type="webify-text-block-with-button-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-section-heading tb-style2">
                                                                    <div class="tb-text-box-btn">
                                                                        <a href="auth/signup.php" target="_self"
                                                                            class="tb-btn tb-btn-primary tb-style3 tb-color2 tb-font-name">Create
                                                                            new account</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <br> <br>

                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-d2235f4 animated-slow elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible"
                                    data-id="d2235f4" data-element_type="section"
                                    data-settings="{&quot;animation&quot;:&quot;fadeIn&quot;}">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-675f87f"
                                                data-id="675f87f" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-4536eff elementor-invisible elementor-widget elementor-widget-webify-image-box-widget"
                                                            data-id="4536eff" data-element_type="widget"
                                                            data-settings="{&quot;_animation&quot;:&quot;bounce&quot;}"
                                                            data-widget_type="webify-image-box-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div
                                                                    class="tb-image-box tb-style4 tb-zoom tb-radious-4 tb-relative tb-border text-center">
                                                                    <div class="tb-image tb-overflow-hidden">
                                                                        <div class="tb-bg tb-zoom-in1"
                                                                            style="background-image: url(site-images/bitstock-capital-10.jpg);">
                                                                        </div>
                                                                    </div>
                                                                    <div class="empty-space marg-lg-b30">
                                                                    </div>
                                                                    <div class="tb-image-meta">
                                                                        <h3
                                                                            class="tb-f18-lg tb-font-name tb-font-name tb-image-box-heading tb-mt-3 tb-mb-6">
                                                                            Have questions?
                                                                        </h3>
                                                                        <div class="empty-space marg-lg-b20">
                                                                        </div>
                                                                        <div
                                                                            class=" tb-mt-5 tb-mb-6 tb-image-box-text tb-description-text">
                                                                            Email us for answers.
                                                                        </div>
                                                                    </div>
                                                                    <div class="empty-space marg-lg-b30">
                                                                    </div>
                                                                    <div class="tb-image-box-btn tb-mt-7">
                                                                        <a href="mailto:<?php echo $getsite['email'];?>" target="_self"
                                                                            class="tb-btn tb-style1">Email
                                                                            us</a>
                                                                    </div>
                                                                    <div class="empty-space marg-lg-b30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-2cd70bb"
                                                data-id="2cd70bb" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-930ce84 elementor-invisible elementor-widget elementor-widget-webify-image-box-widget"
                                                            data-id="930ce84" data-element_type="widget"
                                                            data-settings="{&quot;_animation&quot;:&quot;bounce&quot;}"
                                                            data-widget_type="webify-image-box-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div
                                                                    class="tb-image-box tb-style4 tb-zoom tb-radious-4 tb-relative tb-border text-center">
                                                                    <div class="tb-image tb-overflow-hidden">
                                                                        <div class="tb-bg tb-zoom-in1"
                                                                            style="background-image: url(site-images/bitstock-capital-7-cropped.jpg);">
                                                                        </div>
                                                                    </div>
                                                                    <div class="empty-space marg-lg-b30">
                                                                    </div>
                                                                    <div class="tb-image-meta">
                                                                        <h3
                                                                            class="tb-f18-lg tb-font-name tb-font-name tb-image-box-heading tb-mt-3 tb-mb-6">
                                                                            Affiliate Program
                                                                        </h3>
                                                                        <div class="empty-space marg-lg-b20">
                                                                        </div>
                                                                        <div
                                                                            class=" tb-mt-5 tb-mb-6 tb-image-box-text tb-description-text">
                                                                            Earn also from referral commissions.
                                                                        </div>
                                                                    </div>
                                                                    <div class="empty-space marg-lg-b30">
                                                                    </div>
                                                                    <div class="tb-image-box-btn tb-mt-7">
                                                                        <a href="affiliate.php" target="_self"
                                                                            class="tb-btn tb-style1">Learn more</a>
                                                                    </div>
                                                                    <div class="empty-space marg-lg-b30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-9bcba9e"
                                                data-id="9bcba9e" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-8eb224a elementor-invisible elementor-widget elementor-widget-webify-image-box-widget"
                                                            data-id="8eb224a" data-element_type="widget"
                                                            data-settings="{&quot;_animation&quot;:&quot;bounce&quot;}"
                                                            data-widget_type="webify-image-box-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div
                                                                    class="tb-image-box tb-style4 tb-zoom tb-radious-4 tb-relative tb-border text-center">
                                                                    <div class="tb-image tb-overflow-hidden">
                                                                        <div class="tb-bg tb-zoom-in1"
                                                                            style="background-image: url(site-images/pexels-artem-podrez-5716054.jpg);">
                                                                        </div>
                                                                    </div>
                                                                    <div class="empty-space marg-lg-b30">
                                                                    </div>
                                                                    <div class="tb-image-meta">
                                                                        <h3
                                                                            class="tb-f18-lg tb-font-name tb-font-name tb-image-box-heading tb-mt-3 tb-mb-6">
                                                                            Contact us
                                                                        </h3>
                                                                        <div class="empty-space marg-lg-b20">
                                                                        </div>
                                                                        <div
                                                                            class=" tb-mt-5 tb-mb-6 tb-image-box-text tb-description-text">
                                                                            Wish to speak with us? Contact us now!</div>
                                                                    </div>
                                                                    <div class="empty-space marg-lg-b30">
                                                                    </div>
                                                                    <div class="tb-image-box-btn tb-mt-7">
                                                                        <a href="contact.php" target="_self"
                                                                            class="tb-btn tb-style1">Contact page</a>
                                                                    </div>
                                                                    <div class="empty-space marg-lg-b30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <br> <br>

                                <section style="background-image: url('site-images/pexels-photo-3823487.jpeg');"
                                    class="bg_settings elementor-section elementor-top-section elementor-element elementor-element-88cf3bf elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="88cf3bf" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                    <div class="elementor-background-overlay"></div>
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2113e11"
                                                data-id="2113e11" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-84d9a65 elementor-widget elementor-widget-spacer"
                                                            data-id="84d9a65" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-fa9862b elementor-invisible elementor-widget elementor-widget-webify-text-block-with-button-widget"
                                                            data-id="fa9862b" data-element_type="widget"
                                                            data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}"
                                                            data-widget_type="webify-text-block-with-button-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-section-heading">
                                                                    <div class="tb-style2">
                                                                        <div class="tb-f16-lg tb-small-heading tb-mt-4">
                                                                            A cryptocurrency investment company devoted
                                                                            to your financial success.
                                                                        </div>
                                                                        <div class="empty-space marg-lg-b10"></div>
                                                                        <h2
                                                                            class="tup_fsz tb-f32-lg tb-big-heading tb-f25-sm tb-font-name tb-m0">
                                                                            Invest with confidence and benefit from the
                                                                            reliability of a trusted broker with a
                                                                            proven record of stability, security and
                                                                            strength.</h2>
                                                                        <div class="empty-space marg-lg-b25"></div>
                                                                    </div> <a href="auth/signup.php" target="_self"
                                                                        class="tb-btn tb-btn-primary tb-style3 tb-color3">Open
                                                                        a free investment account now</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-4519567 elementor-widget elementor-widget-spacer"
                                                            data-id="4519567" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-ac8bb62 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                    data-id="ac8bb62" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-no">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-558d166"
                                                data-id="558d166" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-783b9b0 elementor-widget elementor-widget-spacer"
                                                            data-id="783b9b0" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-0c10d24 elementor-widget elementor-widget-divider"
                                                            data-id="0c10d24" data-element_type="widget"
                                                            data-widget_type="divider.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-divider"> <span
                                                                        class="elementor-divider-separator"> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-ac8bb62 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                    data-id="ac8bb62" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-no">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-558d166"
                                                data-id="558d166" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-783b9b0 elementor-widget elementor-widget-spacer"
                                                            data-id="783b9b0" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-0c10d24 elementor-widget elementor-widget-divider"
                                                            data-id="0c10d24" data-element_type="widget"
                                                            data-widget_type="divider.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-divider"> <span
                                                                        class="elementor-divider-separator"> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-293a24b elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                    data-id="293a24b" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-no">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-3bbea4f"
                                                data-id="3bbea4f" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-24e8dc9 elementor-widget elementor-widget-divider"
                                                            data-id="24e8dc9" data-element_type="widget"
                                                            data-widget_type="divider.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-divider"> <span
                                                                        class="elementor-divider-separator"> </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-950b4b0 elementor-widget elementor-widget-spacer"
                                                            data-id="950b4b0" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <br>
                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-4f4f0b2 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="4f4f0b2" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2a6fd4a"
                                                data-id="2a6fd4a" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-9b9bb5c elementor-widget elementor-widget-webify-section-heading-widget"
                                                            data-id="9b9bb5c" data-element_type="widget"
                                                            data-widget_type="webify-section-heading-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-section-heading tb-style2">
                                                                    <h2 class="tb-f36-lg tb-f30-sm tb-font-name tb-big-heading tb-mt-5 tb-mt-3-sm tb-m0 t_a_c stef_header_title">Frequently Asked Questions</h2>
                                                                    <div class="empty-space marg-lg-b20"></div>
                                                                    <div class="t_a_c tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7" style="text-align:left;">
                                                                        <?php
                                                                        $faq_result = loop_table($con, 'faq');
                                                                        if ($faq_result && $faq_result->num_rows > 0) {
                                                                            while ($faq_item = mysqli_fetch_assoc($faq_result)) {
                                                                                echo '<div style="text-align:left; margin-bottom:18px; padding:16px 18px; background:#fff; border:1px solid #e9e9e9; border-radius:8px;">';
                                                                                echo '<h4 style="margin:0 0 8px; font-size:18px; color:#0b1727;">' . htmlspecialchars($faq_item['question']) . '</h4>';
                                                                                echo '<p style="margin:0; color:#555;">' . nl2br(htmlspecialchars($faq_item['answer'])) . '</p>';
                                                                                echo '</div>';
                                                                            }
                                                                        } else {
                                                                            echo '<p>No FAQs available at the moment.</p>';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <br>
                                <section
                                    class="pd-top-main_ t_a_c elementor-section elementor-top-section elementor-element elementor-element-d93971f elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="d93971f" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e80081b"
                                                data-id="e80081b" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-fb2ab99 elementor-widget elementor-widget-webify-section-heading-widget"
                                                            data-id="fb2ab99" data-element_type="widget"
                                                            data-widget_type="webify-section-heading-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-section-heading tb-style2">
                                                                    <h2 class="tb-f36-lg tb-f30-sm tb-font-name tb-big-heading tb-mt-5 tb-mt-3-sm tb-m0 t_a_c stef_header_title"
                                                                        class="tb-f36-lg tb-f30-sm tb-font-name tb-big-heading tb-mt-5 tb-mt-3-sm tb-m0">
                                                                        OUR MISSION & OUR PLAN</h2>
                                                                    <div class="empty-space marg-lg-b10"></div>
                                                                    <div none=""
                                                                        class="t_a_c tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7"
                                                                        class="tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7">
                                                                        Empowering investors by providing them an avenue
                                                                        for controlling their financial future by
                                                                        providing outstanding service, innovation, and
                                                                        expertise in the custody of alternative and
                                                                        traditional assets. We are pleased to offer some
                                                                        of the most dynamic and high-performing trading
                                                                        strategies available. We have become well known
                                                                        in our industry and we are well respected by our
                                                                        peers.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-d7f9366 elementor-widget elementor-widget-spacer"
                                                            data-id="d7f9366" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <br> <br>

                                <section
                                    class="elementor-section elementor-top-section elementor-element elementor-element-a38b2c1 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                    data-id="a38b2c1" data-element_type="section"
                                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                    <div class="elementor-container elementor-column-gap-no">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f7417ee"
                                                data-id="f7417ee" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-f68ab74 elementor-widget elementor-widget-webify-image-gallery-slider-widget"
                                                            data-id="f68ab74" data-element_type="widget"
                                                            data-widget_type="webify-image-gallery-slider-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-overflow-hidden">
                                                                    <div
                                                                        class="tb-arrow-closest tb-poind-closest tb-slider tb-style1">
                                                                        <div class="tb-slick-inner-pad-wrap">
                                                                            <div class="slick-container"
                                                                                data-delay="2000" data-autoplay="1"
                                                                                data-loop="1" data-speed="600"
                                                                                data-center="0"
                                                                                data-slides-per-view="responsive"
                                                                                data-xs-slides="1" data-sm-slides="2"
                                                                                data-md-slides="3" data-lg-slides="3"
                                                                                data-add-slides="3">
                                                                                <div class="slick-wrapper">
                                                                                    <div class="slick-slide">
                                                                                        <div class="tb-slick-inner-pad">
                                                                                            <div
                                                                                                class="tb-image-box tb-style1">
                                                                                                <div class="tb-image">
                                                                                                    <div class="tb-bg"
                                                                                                        style="background-image: url(site-images/bitstock-capital-18.jpg);">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="slick-slide">
                                                                                        <div class="tb-slick-inner-pad">
                                                                                            <div
                                                                                                class="tb-image-box tb-style1">
                                                                                                <div class="tb-image">
                                                                                                    <div class="tb-bg"
                                                                                                        style="background-image: url(site-images/pexels-artem-podrez-5716054.jpg);">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="slick-slide">
                                                                                        <div class="tb-slick-inner-pad">
                                                                                            <div
                                                                                                class="tb-image-box tb-style1">
                                                                                                <div class="tb-image">
                                                                                                    <div class="tb-bg"
                                                                                                        style="background-image: url(site-images/bitstock-capital-4.jpg);">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="slick-slide">
                                                                                        <div class="tb-slick-inner-pad">
                                                                                            <div
                                                                                                class="tb-image-box tb-style1">
                                                                                                <div class="tb-image">
                                                                                                    <div class="tb-bg"
                                                                                                        style="background-image: url(site-images/pexels-kampus-production-8204402.jpg);">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                        <div class="swipe-arrow tb-style6">
                                                                            <div class="slick-arrow-left"><i
                                                                                    class="fa fa-angle-left"></i></div>
                                                                            <div class="slick-arrow-right"><i
                                                                                    class="fa fa-angle-right"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <br>
                                <section
                                    class="mt_20 elementor-section elementor-top-section elementor-element elementor-element-7e45fe4 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="7e45fe4" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-b8289ac"
                                                data-id="b8289ac" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-95b1f45 elementor-widget elementor-widget-spacer"
                                                            data-id="95b1f45" data-element_type="widget"
                                                            data-widget_type="spacer.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-spacer">
                                                                    <div class="elementor-spacer-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-3c639ae elementor-widget elementor-widget-webify-intro-text-widget"
                                                            data-id="3c639ae" data-element_type="widget"
                                                            data-widget_type="webify-intro-text-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-intro-text text-center">
                                                                    <div none=""
                                                                        class="t_a_c tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7"
                                                                        class="tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7">
                                                                        Our plan is to not only protect the value of
                                                                        your assets but to increase them with our
                                                                        trading desk. Involving professional traders
                                                                        that manage money in high risk markets. This
                                                                        is achieved by strict standards of risk
                                                                        management through technical and fundamental
                                                                        analysis. Our trading operations are online
                                                                        and around the clock to ensure immediate
                                                                        reaction to movements in the market.</div>

                                                                    <div class="empty-space marg-lg-b15"></div> <a
                                                                        href="contact.php" target="_self"
                                                                        class="tb-btn tb-style1">Contact us</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <br> <br>

                                <section
                                    class='elementor-section elementor-top-section elementor-element elementor-element-3c792b1 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default'
                                    data-id='3c792b1' data-element_type='section'
                                    data-settings='{&quot;stretch_section&quot;:&quot;section-stretched&quot;}'>
                                    <div class="page-title-area">
                                        <div class="container">
                                            <div class="page-title-content">
                                                <h1>Our Affiliate Program</h1>
                                                <p>Earn even more money by attracting other participants as your referrals.</p><a href="affiliate.php" target="_self" class="tb-btn tb-btn-primary tb-style3 tb-color6 btn_stef">Learn
                                                            More</a>
                                            </div>
                                        </div>
                                        <div class="lines">
                                            <div class="line"></div>
                                            <div class="line"></div>
                                            <div class="line"></div>
                                            <div class="line"></div>
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                </section>

                                <section
    class="pd-top-main_ mt-lg-stef2 elementor-section elementor-top-section elementor-element elementor-element-12080f90 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
    data-id="12080f90" data-element_type="section"
    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
    <div class="elementor-container elementor-column-gap-extended">
        <div class="elementor-row">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2524a874"
                data-id="2524a874" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    <div class="elementor-widget-wrap">
                        <div class="elementor-element elementor-element-6dfe769b elementor-widget elementor-widget-webify-section-heading-widget"
                            data-id="6dfe769b" data-element_type="widget"
                            data-widget_type="webify-section-heading-widget.default" style="margin-bottom: 20px">
                            <div class="elementor-widget-container" style="padding-bottom: 35px">
                                <div class="tb-section-heading tb-style2">
                                    <h2 class="tb-f36-lg tb-f30-sm tb-font-name tb-big-heading tb-mt-5 tb-mt-3-sm tb-m0 stef_header_title"
                                        class="tb-f36-lg tb-f30-sm tb-font-name tb-big-heading tb-mt-5 tb-mt-3-sm tb-m0">
                                        THE REVOLUTION IN DIGITAL ASSETS MANAGEMENT</h2>
                                    <div class="empty-space marg-lg-b10"></div>
                                    <div none="" class="tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7"
                                        class="tb-f18-lg tb-f16-sm tb-line1-6 tb-description tb-mb-7">
                                        With employees in more than 40 locations worldwide, our operations extend across
                                        global financial capitals and important regional centres. This brings us closer
                                        to our investors around the world, and provides invaluable asset management and
                                        investments services to our investors. <br>
                                        We combine our deep knowledge of local markets with the power of coordinated
                                        global oversight to drive better investment outcomes for you.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-3dfafc47 elementor-widget elementor-widget-spacer"
                            data-id="3dfafc47" data-element_type="widget" data-widget_type="spacer.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-spacer">
                                    <div class="elementor-spacer-inner"></div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-56c2054b elementor-widget elementor-widget-webify-video-block-widget"
                            data-id="56c2054b" data-element_type="widget"
                            data-widget_type="webify-video-block-widget.default">
                            <div class="elementor-widget-container">
                                <div class="tb-video-block-wrapper tb-hover-layer" id="unhover" style="box-shadow: unset !important">
                                    <div class="tb-video-block tb-style1 tb-bg tb-flex tb-radious-4"
                                        style="background-image: url(site-images/bitstock-capital-5.jpg);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-f8554eb elementor-widget elementor-widget-spacer"
                            data-id="f8554eb" data-element_type="widget" data-widget_type="spacer.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-spacer">
                                    <div class="elementor-spacer-inner"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="elementor-element elementor-element-753422e6 elementor-widget elementor-widget-webify-award-widget"
                            data-id="753422e6" data-element_type="widget"
                            data-widget_type="webify-award-widget.default">
                            <div class="elementor-widget-container">
                                <div class="tb-arrow-closest tb-poind-closest tb-slider tb-style1">
                                    <div class="tb-slick-inner-pad-wrap">
                                        <div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600"
                                            data-center="0" data-slides-per-view="responsive" data-xs-slides="2"
                                            data-sm-slides="3" data-md-slides="4" data-lg-slides="5"
                                            data-add-slides="6">
                                            <div class="slick-wrapper">
                                                <div class="slick-slide">
                                                    <div class="tb-slick-inner-pad">
                                                        <div
                                                            class="tb-award-box tb-style1 tb-border tb-radious-4 tb-relative tb-flex">
                                                            <div class="tb-award-img">
                                                                <img src="site-images/awards/IE-BM-1.png" alt="award"
                                                                    style="width: 160px;">
                                                            </div>
                                                            <div class="tb-award-text">
                                                                <h3 class="tb-award-title tb-white-c tb-m0 tb-f18-lg">
                                                                    Bermuda Crypto
                                                                    Mining Investemnt
                                                                    Managers award
                                                                </h3>
                                                                <div class="tb-award-year tb-white-c">
                                                                    Winner 2018</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slick-slide">
                                                    <div class="tb-slick-inner-pad">
                                                        <div
                                                            class="tb-award-box tb-style1 tb-border tb-radious-4 tb-relative tb-flex">
                                                            <div class="tb-award-img">
                                                                <img src="site-images/awards/gb.svg" alt="award"
                                                                    style="width: 160px;">
                                                            </div>
                                                            <div class="tb-award-text">
                                                                <h3 class="tb-award-title tb-white-c tb-m0 tb-f18-lg">
                                                                    International
                                                                    Investment Awards
                                                                </h3>
                                                                <div class="tb-award-year tb-white-c">
                                                                    Winner 2020</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slick-slide">
                                                    <div class="tb-slick-inner-pad">
                                                        <div
                                                            class="tb-award-box tb-style1 tb-border tb-radious-4 tb-relative tb-flex">
                                                            <div class="tb-award-img">
                                                                <img src="site-images/awards/ukt21_LOGO-NoSponsor.svg"
                                                                    alt="award" style="width: 145px;">
                                                            </div>
                                                            <div class="tb-award-text">
                                                                <h3 class="tb-award-title tb-white-c tb-m0 tb-f18-lg">
                                                                    UK Tech Award</h3>
                                                                <div class="tb-award-year tb-white-c">
                                                                    Winner 2021</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slick-slide">
                                                    <div class="tb-slick-inner-pad">
                                                        <div
                                                            class="tb-award-box tb-style1 tb-border tb-radious-4 tb-relative tb-flex">
                                                            <div class="tb-award-img">
                                                                <img src="site-images/awards/logo_FT_401_Advisers_2020_FT_401_Advisers_Logo_2020_2i.svg"
                                                                    alt="award" style="width: 190px;">
                                                            </div>
                                                            <div class="tb-award-text">
                                                                <h3 class="tb-award-title tb-white-c tb-m0 tb-f18-lg">
                                                                    Financial Times Top
                                                                    Financial Advisors
                                                                    Awards
                                                                </h3>
                                                                <div class="tb-award-year tb-white-c">
                                                                    Winner 2020</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slick-slide">
                                                    <div class="tb-slick-inner-pad">
                                                        <div
                                                            class="tb-award-box tb-style1 tb-border tb-radious-4 tb-relative tb-flex">
                                                            <div class="tb-award-img">
                                                                <img src="site-images/awards/risk-markets-technology.png"
                                                                    alt="award" style="width: 180px;">
                                                            </div>
                                                            <div class="tb-award-text">
                                                                <h3 class="tb-award-title tb-white-c tb-m0 tb-f18-lg">
                                                                    Risk Markets
                                                                    Technology Awards
                                                                </h3>
                                                                <div class="tb-award-year tb-white-c">
                                                                    Winner 2021</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slick-slide">
                                                    <div class="tb-slick-inner-pad">
                                                        <div
                                                            class="tb-award-box tb-style1 tb-border tb-radious-4 tb-relative tb-flex">
                                                            <div class="tb-award-img">
                                                                <img src="site-images/awards/Pam_Winner_Mono.png"
                                                                    alt="award">
                                                            </div>
                                                            <div class="tb-award-text">
                                                                <h3 class="tb-award-title tb-white-c tb-m0 tb-f18-lg">
                                                                    The Internstional Business PAM Award</h3>
                                                                <div class="tb-award-year tb-white-c">
                                                                    Winner 2019</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slick-slide">
                                                    <div class="tb-slick-inner-pad">
                                                        <div
                                                            class="tb-award-box tb-style1 tb-border tb-radious-4 tb-relative tb-flex">
                                                            <div class="tb-award-img">
                                                                <img src="site-images/awards/GCA.png" alt="award">
                                                            </div>
                                                            <div class="tb-award-text">
                                                                <h3 class="tb-award-title tb-white-c tb-m0 tb-f18-lg">
                                                                    The European
                                                                    Game Changer Company Award</h3>
                                                                <div class="tb-award-year tb-white-c">
                                                                    Winner 2017</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="swipe-arrow tb-style1">
                                        <div class="slick-arrow-left"><i class="fa fa-angle-left"></i></div>
                                        <div class="slick-arrow-right"><i class="fa fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<br> <br>

<section
    class='elementor-section elementor-top-section elementor-element elementor-element-3c792b1 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default'
    data-id='3c792b1' data-element_type='section'
    data-settings='{&quot;stretch_section&quot;:&quot;section-stretched&quot;}'>

    <div class="account-register-area ptb-100">
        <div class="container">
            <div class="account-register-content">
                <h2>Lucrative CryptoCurrency Investment opportunity at your fingertips.
                </h2>
                <p>
                    You can begin profiting from the cryptocurrencies market by simply
                    opening a free investment account with us today, fund the account
                    and watch your money grow.
                </p>
                <a href="auth/signup.php"
                    class="tb-btn tb-style3 tb-cta-btn tb-color1"><span>Get Started
                        Now</span></a>
            </div>
        </div>
        <div class="shape6">
            <img src="site-images/images/shape/shape6.png" alt="image" />
        </div>
        <div class="shape7">
            <img src="site-images/images/shape/shape7.png" alt="image" />
        </div>
        <div class="shape8">
            <img src="site-images/images/shape/shape8.png" alt="image" />
        </div>
        <div class="shape9">
            <img src="site-images/images/shape/shape9.png" alt="image" />
        </div>
        <div class="shape10">
            <img src="site-images/images/shape/shape10.png" alt="image" />
        </div>
    </div>

</section>                                
                                <section
                                    class="ptb-100 elementor-section elementor-top-section elementor-element elementor-element-1ebd8ae elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="1ebd8ae" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="section-title">
                                            <h2 class="tup">A cohesive team of <span
                                                    class="highlight_stef_span">professionals
                                                </span></h2>
                                            <br>
                                            <div class="tb-f16-lg tb-description tb-line1-6">
                                                <?php echo $getsite['name'];?> Investments is the best team of professional traders on
                                                cryptocurrency market today. All funds are managed with proper
                                                responsibility.

                                            </div>
                                        </div>
                                        <div class="elementor-row">
                                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-86e35b6"
                                                data-id="86e35b6" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-d72790d elementor-widget elementor-widget-webify-image-gallery-slider-widget"
                                                            data-id="d72790d" data-element_type="widget"
                                                            data-widget_type="webify-image-gallery-slider-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <img src="site-images/pexels-artem-podrez-5716027.jpg" style="min-height: 377px; object-fit: cover;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-ea1adf1"
                                                data-id="ea1adf1" data-element_type="column">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        <div class="elementor-element elementor-element-fee63bd elementor-widget elementor-widget-webify-text-block-with-signature-widget"
                                                            data-id="fee63bd" data-element_type="widget"
                                                            data-widget_type="webify-text-block-with-signature-widget.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="tb-vertical-middle">
                                                                    <div class="tb-text-box tb-style1">
                                                                        <h2
                                                                            class="tb-f32-lg tb-heading tb-f28-sm tb-font-name tb-mt-5 tb-mp0 tup_fsz">
                                                                            THE REVOLUTION IN CRYPTOCURRENCY INVESTMENTS
                                                                            MANAGEMENT</h2>
                                                                        <div class="empty-space marg-lg-b15"></div>
                                                                        <div
                                                                            class="tb-f16-lg tb-description tb-line1-6">
                                                                            We offer our investors access to high-growth
                                                                            investment opportunities in the Bitcoin
                                                                            markets through the utility of
                                                                            state-of-the-art technical facilities and
                                                                            the implementation of industry standard
                                                                            cryptocurrency trading strategies.
                                                                            <br> <br>
                                                                            We’re proud to be an asset management
                                                                            company whose culture is driven by strong
                                                                            values and a long-term vision. At <?php echo $getsite['name'];?>
                                                                            Investments, our vision, mission and core
                                                                            values serve as the catalyst in our
                                                                            relations with our clients, employees,
                                                                            shareholders and in the communities in which
                                                                            we live and work. They are our guiding
                                                                            compass in our business each day.
                                                                        </div>
                                                                        <div class="empty-space marg-lg-b25"></div>

                                                                        <!-- <div class="tb-text-box-btn"> <a
                                                                                href="about.php" target="_self"
                                                                                class="tb-btn tb-btn-primary tb-style3 tb-color2 tb-font-name">Learn
                                                                                More</a></div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="bottom-ticker">
                                    <iframe
                                        src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=light&pref_coin_id=1505&invert_hover="
                                        width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0"
                                        frameborder="0" border="0" style="border:0;margin:0;padding:0;"> </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
   <!---->
   <?php include 'includes/footer.php';?>
   <!---->

    <!---->
   <?php include 'includes/script.php';?>
   <!---->
   
</body>

</html>