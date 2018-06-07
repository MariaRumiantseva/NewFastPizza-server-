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
                                <div class="has-small-label"><a href="/orders/">Delivery</a><span class="small-label"><span><?php echo (array_sum(Session::get('cart')));?></span></span></div>
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
        <form method="post" action="/order/addOrder/" class="text-center">
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" id="address" name="address" placeholder="Street Address">
                </div>
                <div class="col-sm-6">
                    <input type="text" id="house" name="house" placeholder="House Number">
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
                            <input type="text" id="hour" name="hour" placeholder="HH">
                        </div>
                        <div class="col-xs-2">
                            <input type="text" id="minute" name="minute" placeholder="MM">
                        </div>
                        <div class="col-xs-4">
                            <div class="margin-20"></div>
                        </div>
                    </div>
                </div>
            </div>
<!--        </form>-->
        <div class="section-delimiter"></div>
<!--        <form class="text-center">-->
            <?php if(count(Session::get('cart'))) { ?>
            <h3 class="text-uppercase delivery-info">Please, check your order</h3>
            <section>
                <div class="container">
                    <div id="gallery" class="gallery row">
                        <div class="col-md-3 col-sm-6 col-xs-12 grid-sizer dark-cover"></div><!-- basic size of the grid -->
                        <?php foreach (Session::get('cart') as $inner_key => $value) {?>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="product-preview">
                                    <div class="product-photo">
                                        <img alt="photo" src="/webroot/img/gallery/gallery8.jpg">
                                        <div class="product-price">
                                            <?php echo $value; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item-detail">
                                    <div class="text-center">
                                        <h4 class="gallery-item-heading">
                                            <?php echo $value["dish_name"]; ?>
                                        </h4>
                                        <p class="product-info">
                                            <?php echo $value["description"]; ?>
                                        </p>
                                        <p>
                                            <a href="/orders/deleteOrderItem/<?php echo($inner_key);?>"
                                               class="gallery-detail-icon"><i class="fa fa-remove"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div><!-- .gallery-item -->
                        <?php } ?>
                    </div><!-- .gallery -->
                    <div class="margin-10"></div>
                </div><!-- .container -->
            </section>
            <div class="margin-30"></div>
                <input type="submit" class="text-center" class="button-yellow button-long with-right-arrow form-submit-trigger" value="MAKE YOUR ORDER"/>
            <?php } else {?><h3 class="text-uppercase delivery-info">You haven't chosen any items yet</h3><?php } ?>
        </form>
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
