<?php

class Order extends Model
{
    //получить список заказов (orders)
    public static function getOrdersList()
    {
        $sql = "select * from orders where 1";
        if (isset($sql)) {
            return App::$db->query($sql);
        }
    }

    //получить список заказов по IDs (orders)
    public static function getOrdersListByIds(array $ids)
    {
        if (!$ids) {
            return null;
        }
        $sql = "select * from orders where id in (" . implode(',', $ids) . ")";
        if (isset($sql)) {
            return App::$db->query($sql);
        }
    }

    //добавить заказ (orders)
    public function addNewOrder($hour, $minute, $cart, $login)//$data, $id = null)
    {
        if (!isset($hour) || !isset($minute) || !isset($cart) || !isset($login)) {
            return false;
        }
        $sql = "SELECT COUNT(*) FROM orders";
        $id = $this->db->query($sql);
        $id = (int)$id[0] + 1;
        $client_id = User::getUser($login);
        $client_id = $client_id['id'];
        $driver = $this->selectDriverForOrder();
        $driver_id = $driver['id'];

        $hour = $hour;
        $minute = $minute;
        $date = $hour.$minute."00";
        $time = date('s:i:H', $date);

        if ($id) { // Add new order (in orders, order_details)
            $sql = "INSERT INTO orders
                    SET id = $id,
                    client_id = $client_id,
                    driver_id = $driver_id,
                    delivery_time = {$date},
                    order_status = 'Not delivered'";

            if (App::$db->query($sql)) {
                foreach ($cart as $inner_key => $value) {
                    $sql = "INSERT INTO order_details SET order_id = $id, dish_id = $inner_key, quantity = $value";
                    App::$db->query($sql);
                }
            }
            //set driver status to busy
            $driver_login = $driver['login'];
            (new User())->setDriverStatus($driver_login, 'Busy');
        }
        return null;
    }

    //удалить заказ (orders)
    public function deleteOrder($id)
    {
        $sql = "DELETE FROM orders WHERE id = $id";
        return $this->db->query($sql);
    }

    //вывод текущей корзины клиента (order_details)
    public function viewCurrentCart($client_id)
    {
        if (!$client_id) {
            return null;
        }
        $client_id = (int)$client_id;
        $sql = "SELECT order_details.* 
                FROM orders, order_details
                WHERE orders.client_id =$client_id 
                  AND orders.order_status='' 
                  AND orders.id=order_details.order_id";
        return App::$db->query($sql);
    }

    //добавить наименование меню в корзину клиента (order_details)
    public function addProductToCart($client_id, $dish_id, $quantity)
    {
        if (!$client_id and !$dish_id and !$quantity) {
            return null;
        }
        $sql = "SELECT order_details.* 
                    FROM orders, order_details
                    WHERE orders.client_id =$client_id 
                      AND orders.order_status='' 
                      AND orders.id=order_details.order_id";
        $sql2 = "INSERT INTO $sql values($dish_id, $quantity) ";
        if (isset($sql)) {
            return App::$db->query($sql2);
        } else {
            return null;
        }
    }

    //удалить наименование меню из корзины клиента (order_details)
    public function deleteDish($dish_id)
    {
        if (!$dish_id) {
            return null;
        }
        $query = "DELETE FROM order_details WHERE dish_id = $dish_id";
        if (isset($query)) {
            return App::$db->query($query);
        } else {
            return null;
        }
    }

    //показать информацию об активном заказе для клиента  (orders)
    public static function getActiveOrder($login)
    {
        if (!$login) {
            return null;
        }
        $query = "SELECT id FROM users WHERE login = $login AND role = 'client' limit 1";
        $client_id = App::$db->query($query);
        if (isset($client_id)) {
            $query = "SELECT * FROM orders WHERE client_id = '{$client_id[0]['id']}' AND order_status != 'Delivered'";
            $active_orders = App::$db->query($query);
            if (isset($active_orders)) {
                foreach ($active_orders as $inner_key => $value) {
                    $queryDriver = "SELECT login FROM users WHERE id = '{$value['driver_id']}' limit 1";
                    $driver_login = App::$db->query($queryDriver);
                    if (isset($driver_login)) {
                        $active_orders[$inner_key]['driver_id'] = $driver_login[0]['login'];
                    }
                }
                return $active_orders;
            }
        }
        return null;
    }

    //вывод истории заказов для клиента (orders)
    public static function getOrderHistory($login)
    {
        if (!$login) {
            return null;
        }
        $query = "SELECT id FROM users WHERE login = $login AND role = 'client' limit 1";
        $client_id = App::$db->query($query);
        if (isset($client_id)) {
            $query = "SELECT * FROM orders WHERE client_id = '{$client_id[0]['id']}' AND order_status != 'Not delivered'";
            $active_orders = App::$db->query($query);
            if (isset($active_orders)) {
                foreach ($active_orders as $inner_key => $value) {
                    $queryDriver = "SELECT login FROM users WHERE id = '{$value['driver_id']}' limit 1";
                    $driver_login = App::$db->query($queryDriver);
                    if (isset($driver_login)) {
                        $active_orders[$inner_key]['driver_id'] = $driver_login[0]['login'];
                    }
                }
                return $active_orders;
            }
        }
        return null;
    }

    //распределить заказ на водителя (orders -> driver_id)
    public function selectDriverForOrder()
    {
        $query = "SELECT * FROM users WHERE role='driver' and status='Free' limit 1";
        $driver_id = App::$db->query($query);
        if (isset($driver_id)) {
            return $driver_id[0];
        }
        return null;
    }

    //добавить статус доставки (orders -> order_status)
    public function addOrderStatus($id, $status)
    {
        if ((!$id) || (!$status)) {
            return null;
        }
        $query = "UPDATE orders SET order_status='{$status}' WHERE id=$id";
        if ($query = App::$db->query($query)) {
            return $query;
        }
        return null;
    }

    //показать информацию об активном заказе для водителя (orders)
    public static function getActiveOrderForDriver($login)
    {
        if (!$login) {
            return null;
        }
        $query = "SELECT id FROM users WHERE login = '{$login}' AND role = 'driver' limit 1";
        $driver_id = App::$db->query($query);
        if (isset($driver_id)) {
            $driver_id = $driver_id[0]['id'];
            $query = "SELECT * FROM orders WHERE driver_id = '{$driver_id}' AND order_status != 'Delivered' limit 1";
            if ($query = App::$db->query($query)) {
                return $query;
            }
        }
        return null;
    }

    //получить сумму текущего заказа ID - номер заказа
    public static function getSumCurrentOrder($id)
    {
        if (!$id) {
            return null;
        }
        $sql = "SELECT menu.price from menu, order_details WHERE order_details.order_id=$id AND order_details.dish_id=menu.id";
        if (isset($sql)) {
            $prices = App::$db->query($sql);
        } else {
            echo "ERROR sql has not result!!!";
            return null;
        }
        $sql2 = "SELECT quantity FROM order_details WHERE order_id=$id";
        if (isset($sql2)) {
            $quantities = App::$db->query($sql2);
        } else {
            echo "ERROR sql2 has not result!!!";
            return null;
        }
        $sum_order = 0;
        for ($x = 0; $x < count($prices); $x++) {
            foreach ($prices[$x] as $inner_key => $value) {
                foreach ($quantities[$x] as $inner_key => $val) {
                    $sum_order += $val * $value;
                }
            }
        }
        return $sum_order;
    }

}