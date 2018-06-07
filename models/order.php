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
    public function addOrder($data, $id = null)
    {
        if (!isset($data['name']) || !isset($data['email']) || !isset($data['message'])) {
            return false;
        }

        $id = (int)$id;
        $name = $this->db->escape($data['name']);
        $email = $this->db->escape($data['email']);
        $message = $this->db->escape($data['message']);

        if (!$id) { // Add new record
            $sql = "
                insert into order
                   set name = '{$name}',
                       email = '{$email}',
                       message = '{$message}'
            ";
        } else { // Update existing record
            $sql = "
                update order
                   set name = '{$name}',
                       email = '{$email}',
                       message = '{$message}'
                   where id = {$id}
            ";
        }
        return $this->db->query($sql);
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
        if (!$client_id and /*!$order_id and*/
            !$dish_id and !$quantity) {
            return null;
        }
        $client_id = (int)$client_id;
        // $order_id = (int)$order_id;
        $dish_id = (int)$dish_id;
        $quantity = (int)$quantity;
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
    public function delete_dish($dish_id)
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
    public function selectDriverForOrder($order_id)
    {
        if (!$order_id) {
            return null;
        }
        $query = "SELECT id FROM users WHERE role='driver' and status='Free' limit 1";
        $driver_id = App::$db->query($query);
        if (isset($driver_id)) {
            $query = "UPDATE orders SET driver_id=$driver_id WHERE id=$order_id";
            if ($query = App::$db->query($query)) {
                return $query;
            }
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

}