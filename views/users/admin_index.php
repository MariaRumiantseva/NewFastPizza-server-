<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign In</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Vollkorn:400,700,400italic,700italic%7CPlayfair+Display:400,700' rel='stylesheet' type='text/css'>

<!--    <link rel="stylesheet" href="/webroot/css/main.css" type="text/css">-->
    <link rel="stylesheet" href="/webroot/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/webroot/font-awesome/css/font-awesome.css" type="text/css">

</head>
<body>

<header>
    <div class="row">
        <div class="col-xs-6">
            <h4>Administration Panel</h4>
        </div>
        <div class="col-xs-6 text-right">
            <h5><?php if (Session::get('role') == 'admin') { ?>
                    Welcome, <em text-right"><?php echo Session::get('login') ?></em>
                    <a href="/admin/users/logout/" class="text-uppercase">Sign out</a>
                <?php } ?></h5>

        </div>
    </div>
</header>

<br class="row-fluid">
    <div class="span6">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>Drivers</b></div>
                <?php if ($data["drivers"]) { ?>
                <div class="pull-right"><span class="badge badge-info"><?php echo(count($data["drivers"])); ?></span>
                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php foreach ($data["drivers"] as $inner_key => $value) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo($value['id']); ?></td>
                            <td><?php echo($value['login']); ?></td>
                            <td><?php echo($value['status']); ?></td>
                            <td><a class="fa fa-remove" href="/admin/users/delete_driver/<?php echo($value['id']); ?>" value="Delete"/></td>
                        </tr>
                        </tbody>
                    <?php } ?>
                    <tr>
                        <form method="post" action="/admin/users/add_driver/" class="text-center">
                            <td>
                                <input type="submit" value="Add Driver"/>
                            </td>
                            <td>
                                <input type="text" id="login" name="login" placeholder="Login"/>
                                <input type="password" id="password" name="password" type="text" placeholder="Password"/>
                            </td>
                            <td></td>
                            <td></td>
                        </form>
                    </tr>
                </table>
                <?php } else { ?>
                    <p><em>
                            <div class="text-center">You have no drivers</div>
                        </em></p>
                <?php } ?>
            </div>
        </div>
        <!-- /block -->
    </div>
    <br></br>
    <div class="span6">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>Clients</b></div>
                <?php if ($data["clients"]) { ?>
                <div class="pull-right"><span class="badge badge-info"><?php echo(count($data["clients"])); ?></span>
                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Phone (login)</th>
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <?php foreach ($data["clients"] as $inner_key => $value) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo($value['id']); ?></td>
                            <td><?php echo($value['login']); ?></td>
                            <td><?php echo($value['name']); ?></td>
                            <td><?php if($value['address']) {echo($value['address']);} else {echo('-');}?></td>
                        </tr>
                        </tbody>
                    <?php } ?>
                </table>
                <?php } else { ?>
                    <p><em>
                            <div class="text-center">You have no clients</div>
                        </em></p>
                <?php } ?>
            </div>
        </div>
        <!-- /block -->
    </div>
    <br></br>
    <div class="span6">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>All orders</b></div>
                <?php if ($data["orders"]) { ?>
                <div class="pull-right"><span class="badge badge-info"><?php echo(count($data["orders"])); ?></span>
                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client ID</th>
                        <th>Driver ID</th>
                        <th>Delivery Time</th>
                        <th>Delivery Date</th>
                        <th>Order status</th>
                    </tr>
                    </thead>
                    <?php foreach ($data["orders"] as $inner_key => $value) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo($value['id']); ?></td>
                            <td><?php echo($value['client_id']); ?></td>
                            <td><?php echo($value['driver_id']); ?></td>
                            <td><?php echo($value['delivery_time']); ?></td>
                            <td><?php echo($value['delivery_date']); ?></td>
                            <td><?php echo($value['order_status']); ?></td>
                        </tr>
                        </tbody>
                    <?php } ?>
                </table>
                <?php } else { ?>
                    <p><em>
                            <div class="text-center">You have no orders</div>
                        </em></p>
                <?php } ?>
            </div>
        </div>
        <!-- /block -->
    </div>
    <br></br>
    <div class="span6">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>Menu</b></div>
                <?php if ($data["menu"]) { ?>
                <div class="pull-right"><span class="badge badge-info"><?php echo(count($data["menu"])); ?></span>
                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Dish name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php foreach ($data["menu"] as $inner_key => $value) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo($value['id']); ?></td>
                            <td><?php echo($value['dish_name']); ?></td>
                            <td><?php echo($value['description']); ?></td>
                            <td><?php echo($value['price']); ?></td>
                            <td><a class="fa fa-remove"
                                   href="/admin/products/delete_menu_item/<?php echo($value['id']); ?>"
                                   value="Delete"/></td>
                        </tr>
                        </tbody>
                    <?php } ?>
                    <tr>
                        <form method="post" action="/admin/products/add_menu_item/" class="text-center">
                            <td><input type="submit" value="Add Menu Item"/>
                            <td><input name="dish_name" type="text" placeholder="Dish name"></td>
                            <td><input name="description" style="width:400px;" type="text" placeholder="Description">
                            </td>
                            <td><input name="price" style="width:100px;" type="text" placeholder="Price"></td>
                        </form>
                    </tr>
                </table>
                <?php } else { ?>
                    <p><em>
                            <div class="text-center">You have no items in menu</div>
                        </em></p>
                <?php } ?>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>

</body>
</html>
