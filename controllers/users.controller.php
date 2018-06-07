<?php

class UsersController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new User();
    }

    public function admin_index() {
        $this->data['drivers'] = $this->model->getDrivers();
        $this->data['clients'] = $this->model->getClients();
        $this->data['orders'] = Order::getOrdersList();
        $this->data['menu'] = Product::getProductsList();
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

    //личный кабинет: вывод информации о пользователе + вывод информации об активном заказе + история заказов
    public function index_userinfo()
    {
        $login = Session::get('login');
        $this->data['userinfo'] = User::getUser($login);
        $this->data['activeorder'] = Order::getActiveOrder($login);
        $this->data['orderhistory'] = Order::getOrderHistory($login);
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
                Router::redirect('/admin/users/');
            }
            else {
                Router::redirect('/admin/users/login/');
            }
        }
    }

    //добавление водителя
    public function admin_add_driver(){
        if ($_POST && isset($_POST['login']) && isset($_POST['password'])) {
            $this->model->addDriver($_POST['login'],$_POST['password']);
        }
        Router::redirect('/admin/users/');
    }

    //удаление водителя
    public function admin_delete_driver(){
        $this->model->deleteDriver(App::getRouter()->getParams()[0]);
        Router::redirect('/admin/users/');
    }

    //обновить статус водителя
    public function driver_status_update()
    {
        if ($_POST) {
            $order_status = $_POST['selectvalue2'];
            if ($order_status != 'Off work') {
                $this->model->setDriverStatus(Session::get('login'), $order_status);
            } else {
                Session::destroy();
                Router::redirect('/products/');
            }
        }
        Router::redirect('/products/');
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
        Router::redirect('/admin/users/login/');
    }
}