<?php

class Order extends Model
{
    //написать функции-запросы к БД для заказов

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
    public function add($data, $id = null)
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
                insert into messages
                   set name = '{$name}',
                       email = '{$email}',
                       message = '{$message}'
            ";
        } else { // Update existing record
            $sql = "
                update messages
                   set name = '{$name}',
                       email = '{$email}',
                       message = '{$message}'
                   where id = {$id}
            ";
        }

        return $this->db->query($sql);

    }

    //удалить заказ (orders)
    public function delete($id)
    {
        $id = (int)$id;
        $sql = "delete from orders where id = {$id}";
        return $this->db->query($sql);
    }

    //вывод текущей корзины клиента (order_details)
    public function viewCurrentCart($client_id)
    {
        if (!$client_id ) {
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

    public function addProductToCart($client_id/*$order_id*/, $dish_id, $quantity)
    {
            if (!$client_id and /*!$order_id and*/ !$dish_id and !$quantity) {
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
            return App::$db->query($query);}
        else {
            return null;
        }
    }

    //показать информацию об активном заказе для клиента  (orders)
    public static function getActiveOrder($client_id)
    {
        if (!$client_id) {
            return null;
        }
        $query = "SELECT * FROM orders WHERE client_id = $client_id AND order_status != 'Delivered'";
        if (isset($query)) {
            return App::$db->query($query);}
        else {
            return null;
        }
    }

    //вывод истории заказов для клиента (orders)
    public function order_history($client_id)
    {
        if (!$client_id) {
            return null;
        }
        $query = "SELECT * FROM orders WHERE client_id = $client_id";
        if (isset($query)) {
            return App::$db->query($query);}
        else {
            return null;
        }
    }

    //распределить заказ на водителя (orders -> driver_id)
    public function order_select_driver($id, $driver_id)
    {
        if (!$id) {
            return null;
        }
        if (!$driver_id) {
            return null;
        }
        $id=(int)$id;
        $query="UPDATE orders SET driver_id=$driver_id WHERE id=$id";
        if (isset($query)) {
            return App::$db->query($query);
        }
        else {
            return null;
        }
    }

    //добавить статус доставки (orders -> order_status)
    public function order_status($id, $status)
    {
        if (!$id) {
            return null;
        }
        if (!$status) {
            return null;
        }
        $id=(int)$id;
        $query="UPDATE orders SET order_status=$status WHERE id=$id";
        if (isset($query)) {
            return App::$db->query($query);
        }
        else {
            return null;
        }
    }

}