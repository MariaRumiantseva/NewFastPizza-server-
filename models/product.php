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
    public function add($item_id, $data)
    {
        if (!isset($data['dish_name']) || !isset($data['description']) || !isset($data['price'])) {
            return null;
        }

        $item_id = (int)$item_id;
        $dish_name = $this->db->escape($data['dish_name']);
        $description = $this->db->escape($data['description']);
        $price = $this->db->escape($data['price']);

        if (!$item_id)
            $sql = "
              insert into menu
                set dish_name = {$dish_name},
                    description = '{$description}',
                    price = '{$price}'
            ";
        else
            $sql = "
              update into menu
                set dish_name = {$dish_name},
                    description = '{$description}',
                    price = '{$price}'
                    where id = {$item_id}
            ";

        return $this->db->query($sql);
//        if (!isset($data['price']) || !isset($data['description'])) {
////            return null;
////        }
//
//        $item_id = (int)$item_id;
//        $description = $this->db->escape($data['description']);
//        $msg = $this->db->escape($data['price']);
//
//        $reply_to = 0;
//        if (isset($data['dish_name'])) {
//            $reply_to = $this->db->escape($data['dish_name']);
//        }
//
//        $sql = "
//          insert into menu
//            set id = {$item_id},
//                dish_name = {$reply_to},
//                description = '{$description}',
//                price = '{$msg}'
//        ";
//
//        if ($this->db->query($sql)) {
//            return $this->db->insertId();
//        } else {
//            return false;
//        }
    }

    //удалить наименование меню (menu)
    public function delete($item_id)
    {
        //написать запрос на удаление наименования из меню
        if (!$item_id) {
            return null;
        }
        $sql = "delete from menu WHERE id = {$item_id} ";
        return App::$db->query($sql);
    }

}