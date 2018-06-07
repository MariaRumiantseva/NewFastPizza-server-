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

<section>
    <div class="container">
        <h1 class="bottom-line">Administration Login Form</h1>
        <h3 class="text-center text-uppercase delivery-info">Please, enter administration login and password</h3>
        <form method="post" action="/admin/users/login/" class="text-center">
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" id="login" name="login" placeholder="login">
                </div>
                <div class="col-sm-6">
                    <input type="password" id="password" name="password" placeholder="password">
                </div>
            </div>
            <div class="margin-20"></div>
            <input type="submit" class="text-center"
                   class="button-yellow button-long with-right-arrow form-submit-trigger" value="Login"/>
        </form>
        <div class="margin-20"></div>
    </div><!-- .container -->
</section>

</body>
</html>

