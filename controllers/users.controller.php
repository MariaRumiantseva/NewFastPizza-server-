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
        //получить id текущего пользователя сессии и записать в $client_id
        $client_id = 1;
        $this->data['userinfo'] = User::getUser($client_id);
        $this->data['activeorder'] = Order::getActiveOrder($client_id);
    }

}