<?php

class Order extends Model
{
    //написать функции-запросы к БД для заказов

    //получить список заказов (orders)
    public static function getOrdersList()
    {
        $sql = "select * from orders where 1";
        return App::$db->query($sql);
    }

    //получить список заказов по IDs (orders)
    public static function getOrdersListByIds(array $ids)
    {
        if (!$ids) {
            return null;
        }
        $sql = "select * from orders where id in (" . implode(',', $ids) . ")";
        return App::$db->query($sql);
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

    //добавить наименование меню в корзину клиента (order_details)

    //удалить наименование меню из корзины клиента (order_details)

    //показать информацию об активном заказе для клиента  (orders)

    //вывод истории заказов для клиента (orders)

    //распределить заказ на водителя (orders -> driver_id)

    //добавить статус доставки (orders -> order_status)

}