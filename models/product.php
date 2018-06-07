<?php

class Product extends Model
{
    //написать функции-запросы к БД для меню

    //получить список всех имеющихся наименований меню (menu)
    public static function getProductsList()
    {
        $sql = "select * from menu";
        if (isset($sql)) {
            return App::$db->query($sql);
        }
    }

    //получить список наименований меню по ID (menu)
    public static function getProductsListByIds(array $ids)
    {
        if (!$ids) {
            return null;
        }
        $sql = "select * from menu where id in (" . implode(',', $ids) . ")";
        return App::$db->query($sql);
    }

    //добавить наименование меню (menu)
    public function addItem($data)
    {
        if (!isset($data['dish_name']) || !isset($data['description']) || !isset($data['price'])) {
            return null;
        }
        $dish_name = $this->db->escape($data['dish_name']);
        $description = $this->db->escape($data['description']);
        $price = $this->db->escape($data['price']);

        $sql = "INSERT INTO menu SET dish_name = '{$dish_name}', description = '{$description}', price = '{$price}'";
        if ($query = $this->db->query($sql))
            return $query;
    }

    //удалить наименование меню (menu)
    public function deleteItem($item_id)
    {
        if (!$item_id) {
            return null;
        }
        $sql = "DELETE FROM menu WHERE id = {$item_id} ";
        if ($query = App::$db->query($sql)) {
            return $query;
        }
        return null;
    }
}