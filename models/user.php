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
    public function addUserAddress($login, $address)
    {
        $address = $this->db->escape($address);
        $query = "UPDATE users SET address=$address WHERE login='{$login}''";
        if ($query = $this->db->query($query)) {
            return $query;
        }
        return null;
    }

    //добавление нового клиента
    public function addClient($data, $id = null)
    {
        $login = $this->db->escape($data['login']);
        $password = 'jd7sj3sdkd964he7e' + $this->db->escape($data['password']);
        $name = $this->db->escape($data['name']);
        $sql = "INSERT INTO users 
                SET login = '{$login}', 
                    password = md5({$password}), 
                    role = 'client',
                    name = '{$name}',
                    address = ''";
        if (isset($sql)) {
            return $this->db->query($sql);
        } else {
            throw new Exception('Error');
        }
    }

    //вывод списка всех зарегистрированных пользователей (users)
    public function getClients()
    {
        $query = "SELECT * FROM users WHERE role = 'client'";
        if (isset($query)) {
            return App::$db->query($query);}
        else {
            return null;
        }
    }

    //вывод списка всех водителей (drivers)
    public function getDrivers()
    {
        $query = "SELECT * FROM users WHERE role = 'driver'";
        if (isset($query)) {
            return App::$db->query($query);
        } else {
            return null;
        }
    }

    //добавление нового водителя (drivers)
    public function  addDriver($login, $password)
    {
        $login = $this->db->escape($login);
        $password = 'jd7sj3sdkd964he7e' + $this->db->escape($password);
        $sql = "INSERT INTO users SET login = '{$login}', password = md5({$password}), role = 'driver', status = 'Off work'";
        return $this->db->query($sql);
    }

    //удаление водителя (drivers)
    public function deleteDriver($driver_id)
    {
        $sql = "DELETE FROM users WHERE id = '{$driver_id}' AND role='driver'";
        if ($delete = App::$db->query($sql)) {
            return $delete;
        }
    }

    //изменение рабочего статуса для водителя (drivers -> status)

}