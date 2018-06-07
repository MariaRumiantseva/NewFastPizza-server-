<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Main Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--<link rel="manifest" href="site.webmanifest">-->
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

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
                        <?php if (Session::get('role') == 'driver') { ?>
                        Welcome, <em href="/users/index_userinfo/"><em
                                    class="client-name text-right"><?php echo Session::get('login') ?></em> <a
                                    href="/users/client_logout/" class="text-uppercase">Sign out</a>
                            <?php } ?>
                            <?php } else { ?>
                                Welcome Guest, <a href="/users/client_login/" class="text-uppercase">Sign in</a> |
                                <a href="/users/client_registration/" class="text-uppercase">Create new account</a> |
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
                            <li class="active">
                                <a href="/products/">Home</a>
                            </li>
                            <?php if ( Session::get('login') && (Session::get('role') == 'client')) { ?>
                                <li>
                                    <a href=/users/index_userinfo/">Personal Area</a>
                                </li>
                                <li>
                                    <div class="has-small-label"><a href="/orders/">Delivery</a><span class="small-label"><span><?php echo (array_sum(Session::get('cart')));?></span></span></div>
                                </li>
                            <?php }?>
                        </ul>
                    </nav>
                </div><!-- .relative-container -->
            </div><!-- .container -->
        </div><!-- #main-navigation-inner -->
    </div><!-- #main-navigation-container -->
    <div id="main-navigation-placeholder"></div>
</header>

<?php if ((Session::get('role') == 'client') || (!Session::get('login'))) { ?>

<div class="page-title-img">
    <img class="img-full" alt="page title img" src="/webroot/img/headers/gallery.png">
</div><!-- .page-title-img -->

<section>
    <div class="container">
        <div id="gallery" class="gallery row">
            <div class="col-md-3 col-sm-6 col-xs-12 grid-sizer"></div><!-- basic size of the grid -->
            <?php foreach ($data["menu"] as $inner_key => $value) {?>
                <div class="col-md-3 col-sm-6 col-xs-12 gallery-item dark-cover">
                    <div class="product-preview">
                        <div class="product-photo">
                            <img alt="photo" src="/webroot/img/gallery/gallery8.jpg">
                            <div class="product-price">
                                <sub>$</sub><?php echo $value["price"]; ?>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-item-detail">
                        <div class="text-center">
                            <?php if ( Session::get('login') ) { ?>
                            <p>
                                <?php if (!Session::get('cart')) { $arrayItems = array(); Session::set('cart', $arrayItems); } ?>
                                <a href="/orders/addOrderItem/<?php echo($value["id"]);?>" class="gallery-detail-icon"><i class="fa fa-check"></i></a>
                            </p>
                            <?php } ?>
                            <h4 class="gallery-item-heading">
                                <?php echo $value["dish_name"]; ?>
                            </h4>
                            <p class="product-info">
                                <?php echo $value["description"]; ?>
                            </p>
                        </div>
                    </div>
                </div><!-- .gallery-item -->
            <?php } ?>
        </div><!-- .gallery -->
        <div class="section-delimiter"></div>
        <div class="margin-10"></div>
    </div><!-- .container -->
</section>

    <?php if (!Session::get('login')) { ?>
        <div class="text-center signing-info"><em>Please, sign in for making order</em></div>
    <?php } ?>

<?php }?>

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

<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
</body>
</html>
