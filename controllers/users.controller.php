<?php

class UsersController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new User();
    }

    //вход в систему для клиента
    public function client_login()
    {
        if ($_POST && isset($_POST['login']) && isset($_POST['password'])) {
            $user = $this->model->getUserByLogin($_POST['login']);
            $hash = md5(Config::get('salt') . $_POST['password']);
            if ($user && $hash == $user['password']) {
                Session::set('login', $user['login']);
                Session::set('name', $user['name']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/products/');
        }
    }

    //регистрация клиента в системе
    public function client_registration()
    {
        if ($_POST && isset($_POST['name']) && isset($_POST['login']) && isset($_POST['password'])) {
            $user = $this->model->addClient($_POST);
            if ($user) {
                $user = $this->model->getUserByLogin($_POST['login']);
                Session::set('login', $user['login']);
                Session::set('name', $user['name']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/products/');
        }
    }

    //личный кабинет: вывод информации о пользователе + вывод информации об активном заказе
    public function index_userinfo()
    {
        $this->data['userinfo'] = User::getUser(Session::get('login'));
        $this->data['activeorder'] = Order::getActiveOrder(Session::get('login'));
    }

    //вход в систему для водителя
    public function driver_login()
    {
        if ($_POST && isset($_POST['login']) && isset($_POST['password'])) {
            $user = $this->model->getUserByLogin($_POST['login']);
            $hash = md5(Config::get('salt') . $_POST['password']);
            if ($user && $hash == $user['password']) {
                Session::set('login', $user['login']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/products/');
        }
    }

    //вход в систему для администратора
    public function admin_login()
    {
        if ($_POST && isset($_POST['login']) && isset($_POST['password'])) {
            $user = $this->model->getUserByLogin($_POST['login']);
            $hash = md5(Config::get('salt') . $_POST['password']);
            if ($user && $hash == $user['password']) {
                Session::set('login', $user['login']);
                Session::set('role', $user['role']);
            }
            Router::redirect('/admin/');
        }
    }

    //выход клиента из системы
    public function client_logout()
    {
        Session::destroy();
        Router::redirect('/products/');
    }

    //выход водителя из системы
    public function driver_logout()
    {
        Session::destroy();
        Router::redirect('/products/');
    }

    //выход администратора из системы
    public function admin_logout()
    {
        Session::destroy();
        Router::redirect('/admin/');
    }

}