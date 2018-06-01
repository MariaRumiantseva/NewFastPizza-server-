<?php

class OrdersController extends Controller{

    public function __construct($data = array())
    {
        parent::__construct($data);
    }

    //вывод информации о доставке
    public function index(){
        //получить данные из БД о доставке - записать в $data
    }

    //вывод информации об активном заказе
    public function index_active_order(){
        //получить данные из БД об активном заказе - записать в $data
    }


}