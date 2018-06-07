<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign In</title>

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
                    Welcome Guest, <a href="/users/client_login/" class="text-uppercase">Sign in</a> | <a href="/users/client_registration/" class="text-uppercase">Create new account</a> | <a href="/users/driver_login/" class="text-uppercase">Sign in as driver</a>
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
        <h1 class="bottom-line">Create New Account</h1>
        <h3 class="text-center text-uppercase delivery-info">Please, enter your data for creating new account</h3>
        <form method="post" action="/users/client_registration/" class="text-center">
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="col-sm-4">
                    <input type="text" id="login" name="login" placeholder="Enter your phone number - login">
                </div>
                <div class="col-sm-4">
                    <input type="password" id="password" name="password" placeholder="Enter password">
                </div>
                <!--<div class="col-sm-6">-->
                <!--<input type="password" id="password" name="password" placeholder="Enter password for checking">-->
                <!-- </div>-->
            </div>
            <div class="section-delimiter"></div>
            <input type="submit" class="text-center" class="button-yellow button-long with-right-arrow form-submit-trigger" value="Create new account"/>
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
