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

<div class="row-fluid">
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
                    </tr>
                    </thead>
                    <?php foreach ($data["drivers"] as $inner_key => $value) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo($value['id']); ?></td>
                            <td><?php echo($value['login']); ?></td>
                            <td><?php echo($value['status']); ?></td>
                        </tr>
                        </tbody>
                    <?php } ?>
                    <tr>
                        <td><input method="post" type="submit" a href="/admin/users/addDriver/"value="Add driver"></td>
                        <td><input name="login" type="text" placeholder="Login"></td>
                        <td><input name="status" type="text" placeholder="Status"></td>
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
                    </tr>
                    </thead>
                    <?php foreach ($data["menu"] as $inner_key => $value) { ?>
                        <tbody>
                        <tr>
                            <td><?php echo($value['id']); ?></td>
                            <td><?php echo($value['dish_name']); ?></td>
                            <td><?php echo($value['description']); ?></td>
                            <td><?php echo($value['price']); ?></td>
                        </tr>
                        </tbody>
                    <?php } ?>
                    <tr>
                        <td><input method="post" type="submit" a href="/admin/products/addItem/"value="Add menu item"></td>
                        <td><input name="dish_name" type="text" placeholder="Dish name"></td>
                        <td><input name="description" style="width:400px;" type="text" placeholder="Description"></td>
                        <td><input name="price" style="width:100px;" type="text" placeholder="Price"></td>
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


<!--<form method="post" action="">-->
<!--    <button>Получить список меню</button>-->
<!--    <table>-->
<!--        <caption> Перечень меню</caption>-->
<!--        --><?php
//        //NТАНЯ ИСПРАВИТ!!!
//        //require 'lib/connect.php';
//        // SQL-запрос
//        //$sql = "SELECT * FROM menu ORDER BY date DESC";
//
//        // Выполнить запрос (набор данных $rs содержит результат)
//         //$rs = query($sql);
//
//        // echo $rs;
//        //App::$db->query($sql);
//        // Цикл по recordset $rs
//        // Каждый ряд становится массивом ($row) с помощью функции mysql_fetch_array
//       /* while($row = fetch_array($rs)) {
//            // Записать значение столбца FirstName (который является теперь массивом $row)
//            echo"<tr>";
//            echo"<tr>";
//            echo"".$row['znachenie']."";
//            echo"".$row['znachenie']."";
//            echo"".$row['znachenie']."";
//            echo"".$row['znachenie']."";
//            echo"</td>";
//            echo"</tr>";
//
//        }   */
//       ?>
<!---->
<!---->
<!--    </table>-->
<!---->
<!--</form>-->
<!---->
<?php //?>
