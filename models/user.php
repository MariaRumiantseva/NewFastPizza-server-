<?php

class User extends Model
{
    //написать функции-запросы к БД для пользователей

    //получение пользователя по логину (users)
    public function getByLogin($login)
    {
        $login = $this->db->escape($login);
        $sql = "select * from users where login = '{$login}' limit 1";
        $result = $this->db->query($sql);
        if (isset($result[0])) {
            return $result[0];
        }
        return false;
    }

    //вывод списка всех зарегистрированных пользователей (users)

    //вывод списка всех водителей (drivers)

    //добавление нового водителя (drivers)

    //удаление водителя (drivers)

    //изменение рабочего статуса для водителя (drivers -> status)

}