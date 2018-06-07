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

    //добавить товар в корзину (Session)
    public function addOrderItem() {
        $flag = false;
        $arrayItems = Session::get('cart');
        $key = App::getRouter()->getParams()[0];
        if (count($arrayItems) != 0) {
            foreach ($arrayItems as $inner_key => $value) {
                if ($key == $inner_key) {
                    $arrayItems[$key] += 1;
                    $flag = true;
                    break;
                }
            }
            if (!$flag) {
                $arrayItems[$key] = 1;
            }
        } else {
            $arrayItems[$key] = 1;
        }
        Session::set('cart', $arrayItems);
        Router::redirect('/products/');
    }

    //удалить товар из корзины (Session)
    public function deleteOrderItem() {
        $flag = false;
        $arrayItems = Session::get('cart');
        $key = App::getRouter()->getParams()[0];
        if (count($arrayItems) != 0) {
            foreach ($arrayItems as $inner_key => $value) {
                if ($key == $inner_key) {
                    if($arrayItems[$key]>1) {
                        $arrayItems[$key] -= 1;
                    } else {
                        unset($arrayItems[$key]);
                    }
                    $flag = true;
                    break;
                }
            }
            if (!$flag) {
                unset($arrayItems[$key]);
            }
        } else {
            unset($arrayItems[$key]);
        }
        Session::set('cart', $arrayItems);
        Router::redirect('/orders/');
    }
}