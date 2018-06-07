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
                            <li class="active">
                                <a href="/users/index_userinfo/">Personal Area</a>
                            </li>
                            <li>
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
                    <p><em><?php echo $data["userinfo"]["login"];?></em></p>
                </div>
            </div>
        </div>
    </div><!-- .row -->

    <div class="section-delimiter"></div>

    <div class="container">
        <h1 class="bottom-line">Active Order</h1>
        <div class="personal-info" class="row">
            <div class="margin-40"></div>
            <?php if ($data["activeorder"]) { ?>
                <?php foreach ($data["activeorder"] as $inner_key => $value) { ?>
                    <div class="col-md-6">
                        <div class="text-left">
                            <p>Driver</p>
                            <p>Delivery time</p>
                            <p>Delivery date</p>
                            <p>Order Status</p>
                            <div class="margin-20"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <p><em><?php echo $value["driver_id"]; ?></em></p>
                            <p><em><?php echo $value["delivery_time"]; ?></em></p>
                            <p><em><?php echo $value["delivery_date"]; ?></em></p>
                            <p><em><?php echo $value["order_status"]; ?></em></p>
                            <div class="margin-20"></div>
                        </div>
                    </div>
                    <div class="margin-20"></div>
                <?php } ?>
            <?php } else { ?>
                <p><em>
                        <div class="text-center">You have no active orders</div>
                    </em></p>
            <?php } ?>
        </div>
    </div><!-- .row -->

    <div class="section-delimiter"></div>

    <div class="container">
        <h1 class="bottom-line">Order History</h1>
        <div class="personal-info" class="row">
            <div class="margin-40"></div>
            <?php if ($data["orderhistory"]) { ?>
                <?php foreach ($data["orderhistory"] as $inner_key => $value) { ?>
                    <div class="col-md-6">
                        <div class="text-left">
                            <p>Driver</p>
                            <p>Delivery time</p>
                            <p>Delivery date</p>
                            <p>Order Status</p>
                            <div class="margin-20"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <p><em><?php echo $value["driver_id"]; ?></em></p>
                            <p><em><?php echo $value["delivery_time"]; ?></em></p>
                            <p><em><?php echo $value["delivery_date"]; ?></em></p>
                            <p><em><?php echo $value["order_status"]; ?></em></p>
                            <div class="margin-20"></div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p><em>
                        <div class="text-center">You have ordered nothing</div>
                    </em></p>
            <?php } ?>
        </div>
    </div><!-- .row -->
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
                    <em>09:00 - 21:00h</em>
                </div>
                <div class="col-xs-6">
                    <em>Saturday-Sunday</em>
                </div>
                <div class="col-xs-6">
                    <em>11:00 - 23:00h</em>
                </div>
            </div>
        </div><!-- .col-md-6 -->
        <div class="col-md-6 responsive-column text-right">
            <h2 class="footer-heading text-uppercase">Our Address</h2>
            <address>
                600000 Gorky street, 10<br>
                Nizhny Novgorod, Russia
                <div class="margin-20"></div>
                Make Reservations: 8 900 100 5566<br>
                Email: info@newfastpizza.com
            </address>
        </div><!-- .col-md-6 -->
    </div>
    </div>
</footer>

</body>
</html>
