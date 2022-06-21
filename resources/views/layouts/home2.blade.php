
<!DOCTYPE html>
<html lang="rtl" dir="rtl">

<head>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
<style>
    .body{
        font-family: "B Koodak"!important;
    }

</style>
    <style>


        #neonShadow {

            border: none;
            border-radius: 50px;
            transition: 0.3s;
            background-color: var(--primary-color);
            animation: glow 1s infinite;
            transition: 0.5s;
        }

        span:hover {
            transition: 0.1s;
            opacity: 1;
            font-weight: 700;
        }

        #neonShadow:hover {
            transform: translateX(-20px) rotate(10deg);
            border-radius: 5px;
            background-color: #021d7f;
            transition: 0.5s;
        }

        @keyframes glow {
            0% {
                box-shadow: 5px 5px 20px rgb(93, 52, 168), -5px -5px 20px rgb(93, 52, 168);
            }

            50% {
                box-shadow: 5px 5px 20px rgb(81, 224, 210), -5px -5px 20px rgb(81, 224, 210)
            }
            100% {
                box-shadow: 5px 5px 20px rgb(93, 52, 168), -5px -5px 20px rgb(93, 52, 168)
            }
        }
    </style>
    <link rel="icon" href="/home2/images-electro/icon.png" type="image/gif" sizes="16x16">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>کنسرت</title>
    <meta name="keywords" content="کنسرت" >
    <meta name="description" content="کنسرت">
    <meta name="author" content="کنسرت">
    <!-- CSS Files
    ================================================== -->
    <link id="bootstrap" href="/home2/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link id="bootstrap-grid" href="/home2/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />
    <link id="bootstrap-reboot" href="/home2/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <link href="/home2/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="/home2/css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="/home2/css/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="/home2/css/owl.transitions.css" rel="stylesheet" type="text/css" />
    <link href="/home2/css/magnific-popup.css" rel="stylesheet" type="text/css" />
    <link href="/home2/css/jquery.countdown.css" rel="stylesheet" type="text/css" />
    <link id="mdb" href="/home2/css/mdb.min.css" rel="stylesheet" type="text/css" />
    <link href="/home2/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/home2/css/de-electro.css" rel="stylesheet" type="text/css" />
    <!-- color scheme -->
    <link id="colors" href="/home2/css/colors/scheme-03.css" rel="stylesheet" type="text/css" />
    <link href="/home2/css/coloring.css" rel="stylesheet" type="text/css" />
</head>

<body class="dark-scheme">
<div id="wrapper">
    <div id="preloader">
        <div class="preloader1"></div>
    </div>
    <!-- header begin -->
    <header class="transparent">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex sm-pt10">
                        <div class="de-flex-col">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="/">
                                        <img height="50px" width="110px" alt="" src="/home2/logo.jpeg" />
                                    </a>
                                </div>
                                <!-- logo close -->
                            </div>
                            <div class="de-flex-col">
                            </div>
                        </div>
                        @yield('menu')
                        <div class="de-flex-col">
                            <div class="menu_side_area">
                                <a href="/search"  style="font-family: 'B Koodak'" class="btn-main"><i class="fa fa-sign-in"></i><span>پیگیری بلیط</span></a>
                                <span id="menu-btn"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header close -->
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        @yield('content')
        <!-- Carousel wrapper -->
    </div>
    <!-- content close -->
    <a href="/home2/#" id="back-to-top"></a>
    <!-- footer begin -->
    <footer data-bgimage="url(/home2/images-electro/background/1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-1">
                    <div class="widget">
                        <h5>ارتباط با ما</h5>
                        <address class="s1">
                            <span><i class="id-color fa fa-map-marker fa-lg"></i>
                            تبریز - چهاراه آبرسان - پشت قنادی ایوبی - برج امید طبقه 5 - واحد C
                            </span>
                            <span><i class="id-color fa fa-phone fa-lg" dir="rtl"></i>
                            09226787588
                               &nbsp;
                               &nbsp;
09142222688
                            </span>
                            <span><i class="id-color fa fa-envelope-o fa-lg"></i><a target="_blank" href="/support@upbelit.ir">support@upbelit.ir</a></span>
                        </address>
                    </div>
                </div>
                <div class="col-md-1 col-sm-6 col-xs-1">
                </div>

                <div class="col-md-3 col-sm-6 col-xs-1">
                    <img referrerpolicy='origin' id = 'rgvjesgtesgtjzpesizpnbqe'
                         style = 'cursor:pointer' onclick = 'window.open("https://logo.samandehi.ir/Verify.aspx?id=300792&p=xlaoobpdobpdjyoepfvluiwk", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                         alt = 'logo-samandehi'
                         src = 'https://logo.samandehi.ir/logo.aspx?id=300792&p=qftilymalymayndtbsiyodrf' />
                </div>
                <div class="col-md-2 col-sm-6 col-xs-1">
                    <script type="text/javascript" src="https://1abzar.ir/abzar/tools/stat/amar-v3.php?color=333333&bg=F7F4D9&kc=888888&kadr=1&amar=oy4fnjifw9ves7p7-alc68gx59eaup&show=1|1|1|1|0|1|1"></script><div style="display:none"><h3><a href="https://www.1abzar.com/abzar/stat.php">&#1570;&#1605;&#1575;&#1585;&#1711;&#1740;&#1585; &#1608;&#1576;&#1604;&#1575;&#1711;</a></h3></div>


                </div>
                </div>
        </div>
        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex">
                            <div class="de-flex-col">
                                <a href="/home2/03_electrofest-index.html">
                                    <img alt="" class="f-logo" src="/home2/images-electro/logo.png" /><span class="copy">

                                        تمامی حقوق مادی معنوی سایت آپ بلیط تحت لیبل رسانه آپ مدیا و گروه هنر بینهایت برتر شرق می باشد.

                                    </span>
                                </a>
                            </div>
                            <div class="de-flex-col">
                                <div class="social-icons">
                                    <a href="/#"><i class="fa fa-facebook fa-lg"></i></a>
                                    <a href="/#"><i class="fa fa-twitter fa-lg"></i></a>
                                    <a href="/#"><i class="fa fa-linkedin fa-lg"></i></a>
                                    <a href="/#"><i class="fa fa-pinterest fa-lg"></i></a>
                                    <a href="/#"><i class="fa fa-rss fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer close -->
</div>

<!-- Javascript Files
================================================== -->
<script src="/home2/js/jquery.min.js"></script>
<script src="/home2/js/bootstrap.min.js"></script>
<script src="/home2/js/bootstrap.bundle.min.js"></script>
<script src="/home2/js/wow.min.js"></script>
<script src="/home2/js/jquery.isotope.min.js"></script>
<script src="/home2/js/easing.js"></script>
<script src="/home2/js/owl.carousel.js"></script>
<script src="/home2/js/jquery.magnific-popup.min.js"></script>
<script src="/home2/js/enquire.min.js"></script>
<script src="/home2/js/jquery.plugin.js"></script>
<script src="/home2/js/jquery.countTo.js"></script>
<script src="/home2/js/jquery.countdown.js"></script>
<script src="/home2/js/jquery.lazy.min.js"></script>
<script src="/home2/js/jquery.lazy.plugins.min.js"></script>
<script src="/home2/js/mdb.min.js"></script>
<script src="/home2/js/jquery.countdown.js"></script>
<script src="/home2/js/countdown-custom.js"></script>
<script src="/home2/js/cookit.js"></script>
<script src="/home2/js/designesia.js"></script>

<!-- COOKIES PLUGIN  -->

</body>

</html>
