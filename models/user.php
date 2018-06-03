<?php

class User extends Model
{
    //написать функции-запросы к БД для пользователей

    //получение пользователя по логину (users)
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
    public static function getUser($client_id)
    {
        $client_id = App::$db->escape($client_id);
        $sql = "select * from clients where id = '{$client_id}' limit 1";
        $result = App::$db->query($sql);
        if (isset($result[0])) {
            return $result[0];
        }
        return false;
    }

    // add new client
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