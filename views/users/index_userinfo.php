<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Client Personal Area Page</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Vollkorn:400,700,400italic,700italic%7CPlayfair+Display:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/webroot/css/main.css" type="text/css">
    <link rel="stylesheet" href="/webroot/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/webroot/font-awesome/css/font-awesome.css" type="text/css">
</head>
<body>

<div id="screen-cover"></div>

<header class="page-header page-header-normal">
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <em class="site-name-info ">Call now: 222-222 <span class="text-uppercase">Pizza delivery</span></em>
                </div>
                <div class="col-xs-6 text-right">
                    Welcome, <a href="personal_area.html"><em class="client-name text-right">Client Name</em></a>
                </div>
            </div>
        </div>
    </div><!-- .page-top -->
    <div id="main-navigation-container">
        <div id="main-navigation-inner">
            <div class="container">
                <div class="relative-container clearfix">
                    <div id="main-navigation-button"><i class="fa fa-reorder"></i></div>
                    <div class="pull-left">
                        <div class="centered-columns">
                            <img class="page-logo" alt="logo" src="/webroot/img/logo.png">
                            <div class="centered-column hidden-xs">
                                <h1 class="site-name">New Fast Pizza</h1>
                            </div>
                        </div>
                    </div>
                    <nav id="main-navigation">
                        <ul id="one-page-nav">
                            <li>
                                <a href="index_sign_client.html">Home</a>
                            </li>
                            <li class="active">
                                <a href="personal_area.html">Personal Area</a>
                            </li>
                            <li>
                                <a href="delivery.html">Delivery</a>
                            </li>
                            <li>
                                <div class="menu-item has-small-label cart-trigger"><i class="fa fa-shopping-cart"></i><span class="small-label"><span>2</span></span></div>
                            </li>
                        </ul>
                    </nav>
                </div><!-- .relative-container -->
            </div><!-- .container -->
        </div><!-- #main-navigation-inner -->
    </div><!-- #main-navigation-container -->
    <div id="main-navigation-placeholder"></div>
</header>

<section>
    <div class="container">
        <h1 class="bottom-line">Personal Information</h1>
        <div class="personal-info" class="row">
            <div class="margin-40"></div>
            <div class="col-md-6" class="text-left">
                <div class="text-left">
                    <p>First Name</p>
                    <p>Phone Number</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <p><em><?php echo $data["userinfo"]["name"];?></em></p>
                    <p><em><?php echo $data["userinfo"]["phone_number"];?></em></p>
                </div>
            </div>
        </div>
    </div><!-- .row -->

    <div class="section-delimiter"></div>

    <div class="container">
        <h1 class="bottom-line">Active Order</h1>
        <div class="personal-info" class="row">
            <div class="margin-40"></div>
            <div class="col-md-6">
                <div class="text-left">
                    <p>Driver</p>
                    <p>Delivery time</p>
                    <p>Delivery date</p>
                    <p>Order Status</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <p><em>"Driver Name"</em></p>
                    <!--<p><em>--><?php //echo $data["activeorder"]["delivery_time"];?><!--</em></p>-->
                    <p><em><?php echo $data["activeorder"][0]["delivery_time"];?></em></p>
                    <p><em><?php echo $data["activeorder"][0]["delivery_date"];?></em></p>
                    <p><em><?php echo $data["activeorder"][0]["order_status"];?></em></p>
                </div>
            </div>
        </div>
    </div><!-- .row -->

    <div class="section-delimiter"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <a class="button-yellow button-long with-right-arrow form-submit-trigger">See order history</a>
            </div>
        </div>
    </div>

    </div>
</section>

<footer class="page-footer">
    <div class="container">
        <div class="col-md-6 responsive-column text-left">
            <h2 class="footer-heading text-uppercase">Opening Hours</h2>
            <div class="row">
                <div class="col-xs-6">
                    <em>Monday - Friday</em>
                </div>
                <div class="col-xs-6">
                    <em>09:00 - 23:00h</em>
                </div>
                <div class="col-xs-6">
                    <em>Saturday</em>
                </div>
                <div class="col-xs-6">
                    <em>12:00 - 18:00h</em>
                </div>
            </div>
        </div><!-- .col-md-6 -->
        <div class="col-md-6 responsive-column text-right">
            <h2 class="footer-heading text-uppercase">Our Address</h2>
            <address>
                Pizzeria Head Office<br>
                54866 2nd Road NY 48766<br>
                Ney York, U.S.A
                <div class="margin-20"></div>
                Make Reservations: 0 800 111 555 666<br>
                Email: info@yourdomain.com
            </address>
        </div><!-- .col-md-6 -->
    </div>
    </div>
</footer>

</body>
</html>
