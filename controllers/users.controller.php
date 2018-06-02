<?php

class UsersController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
    }

    //вход пользователя в систему
    public function index()
    {
    }

    //регистрация пользователя в системе
    public function index_registration(){
    }

    //личный кабинет: вывод информации о пользователе + вывод информации об активном заказе
    public function index_userinfo(){
        //получить тел.номер текущего пользователя (POST) и записать в $phone
        $phone = 9998765432;
        $this->data['userinfo'] = User::getUserByPhone($phone);
        $this->data['activeorder'] = Order::getActiveOrder($phone);
    }

}