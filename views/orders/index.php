<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Delivery Page</title>

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
                    <?php if (Session::get('login')) { ?>
                    <?php if (Session::get('role') == 'client') { ?>
                    Welcome, <em href="/users/index_userinfo/"><em
                                class="client-name text-right"><?php echo Session::get('name') ?></em> <a
                                href="/users/client_logout/" class="text-uppercase">Sign out</a>
                        <?php } ?>
                        <?php } else { ?>
                            Welcome Guest, <a href="/users/client_login/" class="text-uppercase">Sign in</a> | <a
                                    href="/users/client_registration/" class="text-uppercase">Create new account</a> |
                            <a href="/users/driver_login/" class="text-uppercase">Sign in as driver</a>
                        <?php } ?>
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
                                <a href="/products/">Home</a>
                            </li>
                            <li>
                                <a href="/users/index_userinfo/">Personal Area</a>
                            </li>
                            <li class="active">
                                <a href="/orders/">Delivery</a>
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
        <h1 class="bottom-line">Delivery</h1>
        <h3 class="text-center text-uppercase delivery-info">Enter the address where you want the order delivered</h3>
        <form class="text-center">
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="email" placeholder="Street Address">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="room" placeholder="House Number">
                </div>
            </div>
            <h3 class="text-center text-uppercase delivery-info">Enter the time when you want the order delivered</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="margin-20"></div>
                        </div>
                        <div class="col-xs-2">
                            <input type="text" name="state" placeholder="HH">
                        </div>
                        <div class="col-xs-2">
                            <input type="text" name="zip" placeholder="MM">
                        </div>
                        <div class="col-xs-4">
                            <div class="margin-20"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="section-delimiter"></div>
        <form class="text-center">
            <h3 class="text-uppercase delivery-info">Please, check your order</h3>
            <p>Show shopping cart from database</p>
            <div class="margin-30"></div>
            <a href="personal_area.html" class="button-yellow button-long with-right-arrow form-submit-trigger">MAKE YOUR ORDER</a>
        </form>
        <div class="margin-20"></div>
    </div><!-- .container -->
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
