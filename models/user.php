<?php

class User extends Model
{
    //написать функции-запросы к БД для пользователей

    //получение пользователя по логину-номеру телефона (users)
    public function getUserByLogin($login)
    {
        $login = $this->db->escape($login);
        $sql = "select * from users where login = '{$login}' limit 1";
        $result = $this->db->query($sql);
        if (isset($result[0])) {
            return $result[0];
        }
        return false;
    }

    //получение информации о пользователе по id (users)
    public static function getUser($login)
    {
        $login = App::$db->escape($login);
        $sql = "select * from users where login = '{$login}' limit 1";
        $result = App::$db->query($sql);
        if (isset($result[0])) {
            return $result[0];
        }
        return false;
    }

    //добавление адреса для пользователя (users)
    public static function addUserAddress($client_id, $data)
    {
        if (!isset($client_id) && !isset($data['address'])) {
            return null;
        }
        //получаем из $data адрес пользователя
        $address = App::$db->escape($data['address']);
        $query = "update clients set address=$address where id=$client_id";
        if (isset($query)) {
            return App::$db->query($query);
        } else {
            return null;
        }
    }

    //добавление нового клиента
    public function addClient($data, $id = null)
    {
        if (!isset($data['login']) || !isset($data['name'])
            || !isset($data['address'])) {
            return false;
        }
        $id = (int)$id;
        $login = $this->db->escape($data['login']);
        $password = 'jd7sj3sdkd964he7e' + $this->db->escape($data['password']);
        $name = $this->db->escape($data['name']);
        $address = $this->db->escape($data['address']);
        $sql = "INSERT INTO `users` 
                SET login = '{$login}', 
                    password = md5({$password}), 
                    role = 'client',
                    name = '{$name}',
                    address = '{$address}'";
        return $this->db->query($sql);
    }

    //вывод списка всех зарегистрированных пользователей (users)

    //вывод списка всех водителей (drivers)

    //добавление нового водителя (drivers)

    //удаление водителя (drivers)

    //изменение рабочего статуса для водителя (drivers -> status)

}